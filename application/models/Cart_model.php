<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends ME_Model
{	

  protected $cart_contents = array();

	function __construct()
	{
		parent::__construct();
    
    // get the shopping cart array from the session
    $this->cart_contents = !empty($this->session->cart_contents) ? $this->session->cart_contents : NULL;
    
    if ($this->cart_contents === NULL) {
        // set some base values
        $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
    }
	}

  public function contents()
  {
    // rearrange the newest first
    $cart = array_reverse($this->cart_contents);

    // remove these so they don't create a problem when showing the cart table
    unset($cart['total_items']);
    unset($cart['cart_total']);

    return $cart;
  }
    
  public function get_item($row_id)
  {
    return (in_array($row_id, array('total_items', 'cart_total'), TRUE) OR ! isset($this->cart_contents[$row_id]))
        ? FALSE
        : $this->cart_contents[$row_id];
  }
  
  public function total_items()
  {
    return $this->cart_contents['total_items'];
  }
  
  public function total()
  {
    return $this->cart_contents['cart_total'];
  }

  public function insert($item = array())
  {
    if (!is_array($item) OR count($item) === 0) {
        return FALSE;
    } else {
      if (!isset($item['id'], $item['name'], $item['price'], $item['qty'])) {
          return FALSE;
      } else {
        // prep the quantity
        $item['qty'] = (float) $item['qty'];
        if ($item['qty'] == 0) {
            return FALSE;
        }
        // prep the price
        $item['price'] = (float) $item['price'];
        // create a unique identifier for the item being inserted into the cart
        $rowid = md5($item['id']);
        // get quantity if it's already there and add it on
        $old_qty = isset($this->cart_contents[$rowid]['qty']) ? (int) $this->cart_contents[$rowid]['qty'] : 0;
        // re-create the entry with unique identifier and updated quantity
        $item['image'] = !empty($item['image']) ? $item['image'] : '' ;
        $item['rowid'] = $rowid;
        $item['qty'] += $old_qty;
        $this->cart_contents[$rowid] = $item;
        
        // save Cart Item
        if ($this->save_cart()) {
          return isset($rowid) ? $rowid : TRUE;
        }else{
          return FALSE;
        }
      }
    }
  }

  public function update($item = array())
  {
    if (!is_array($item) OR count($item) === 0){
      return FALSE;
    } else {
      if (!isset($item['rowid'], $this->cart_contents[$item['rowid']])) {
          return FALSE;
      } else {
        // prep the quantity
        if(isset($item['qty'])) {
          $item['qty'] = (float) $item['qty'];
          // remove the item from the cart, if quantity is zero
          if ($item['qty'] == 0){
              unset($this->cart_contents[$item['rowid']]);
              return TRUE;
          }
        }
        
        // find updatable keys
        $keys = array_intersect(array_keys($this->cart_contents[$item['rowid']]), array_keys($item));

        // prep the price
        if (isset($item['price'])) {
          $item['price'] = (float) $item['price'];
        }

        // product id & name shouldn't be changed
        foreach (array_diff($keys, array('id', 'name')) as $key) {
          $this->cart_contents[$item['rowid']][$key] = $item[$key];
        }

        // save cart data
        $this->save_cart();
        return TRUE;
      }
    }
  }

  protected function save_cart() {

    $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;

    foreach ($this->cart_contents as $key => $val) {
      // make sure the array contains the proper indexes
      if(!is_array($val) OR !isset($val['price'], $val['qty'])){
        continue;
      }

      $this->cart_contents['cart_total'] += ($val['price'] * $val['qty']);
      $this->cart_contents['total_items'] += $val['qty'];
      $this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['price'] * $this->cart_contents[$key]['qty']);
    }
    
    // if cart empty, delete it from the session
    if (count($this->cart_contents) <= 2) {
      $this->session->unset_userdata('cart_contents');
      return FALSE;
    } else {
      $this->session->set_userdata('cart_contents', $this->cart_contents);
      return TRUE;
    }
  }

  public function has_service()
  {
    $found = FALSE;
    foreach ($this->contents() as $item) {
      foreach ($item as $key => $val) {
        if ($key == 'type' && $val=='service') {
          $found = TRUE;
        }
      }
    }

    return $found;
  }

  public function remove($row_id)
  {
    unset($this->cart_contents[$row_id]);
    $this->save_cart();
    return TRUE;
  }

  public function destroy()
  {
    $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
    $this->session->unset_userdata('cart_contents');
  }
    
}