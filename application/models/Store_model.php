<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_model extends ME_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function products($param_type)
	{
		$type='product';
		if (!empty($param_type) && $param_type=='service') {
			$type='service';
		}

		$sql = "SELECT * FROM products where type=?";
		$query = $this->db->query($sql,array($type));
		return  $query->result();
	}

	public function product_by_id($product_id)
	{
		$sql = "SELECT * FROM products WHERE id=?";
		$query = $this->db->query($sql,array($product_id));
		return  $query->row();
	}

	public function orders()
	{
		$sql = "SELECT * FROM orders";
		$query = $this->db->query($sql);
		$orders = $query->result();

		$orders_array = array();
		foreach ($orders as $index=>$order) {
			$sql = "SELECT email, firstname, lastname, phone, street, state, zip FROM clients WHERE id=".$order->client_id;
			$query = $this->db->query($sql);
			$client = $query->row();
			$orders_array[] = array_merge((array)$order, (array)$client);
		}

		return $orders_array;
	}

	public function customer_orders($client_id)
	{
		$sql = "SELECT * FROM orders WHERE client_id=?";
		$query = $this->db->query($sql,array($client_id));
		$orders = $query->result();

		$orders_array = array();
		foreach ($orders as $index=>$order) {
			$sql = "SELECT email, firstname, lastname, phone, street, state, zip FROM clients WHERE id=".$order->client_id;
			$query = $this->db->query($sql);
			$client = $query->row();
			$orders_array[] = array_merge((array)$order, (array)$client);
		}

		return $orders_array;
	}

	public function order_by_id($order_id)
	{
		$sql = "SELECT orders.*, clients.email, clients.firstname, clients.lastname, clients.phone, clients.street, clients.state, clients.zip
						FROM orders
						LEFT JOIN clients ON orders.client_id = clients.id
						WHERE orders.id=?";

		$query = $this->db->query($sql,array($order_id));
		$order = $query->row();
		$products = array();

		if (!empty($order->id)) {
			$sql = "SELECT products.* FROM orders_products
							LEFT JOIN products ON orders_products.product_id = products.id
							WHERE order_id = ".$order->id;
			$query = $this->db->query($sql);
			$products = $query->result();
		}

		return array(
									'order'=>$order,
									'products'=>$products
								);
	}

}
