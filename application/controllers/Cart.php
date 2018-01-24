<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends ME_Controller {

	function __construct()
  {
  	parent::__construct();

  	$this->load->model('cart_model');
  	$this->load->model('service_model');
		$this->load->model('store_model');
		$this->load->model('gateway_model');

    $this->page['template']	= 'default_html.php';
    $this->page['js'][]	= '/front/js/_cart';
  }

	public function index()
	{	
		$params['data'] = $this->cart_model->contents();
		$params['total'] = $this->cart_model->total();
		$this->load->view('cart/index', $params);
	}

	public function add()
	{  
    $product_id = $this->input->get('id',TRUE);
    
    try {
    	$product = $this->store_model->product_by_id($product_id);
    	
    	if (empty($product)) {
				$error_message = 'Product not found';
   			throw new Exception($error_message);
			}

	    $product_data = array(
	      'id' => $product->id,
	      'type' => $product->type,
	      'name' => $product->name,
	      'price' => $product->price,
	      'image' => $product->image,
	      'qty' => 1
	    );

	    $result = $this->cart_model->insert($product_data);
			
	  }  catch (Exception $e) {
		
			$params['message'] = $e->getMessage();
			
		}

		redirect('/cart/', 'refresh');
	}

	public function update()
	{
		$row_id = $this->input->get('id',TRUE);
    $qty = $this->input->get('qty',TRUE);

    try {
    	
    	if (empty($row_id)) {
				$error_message = 'Id cannot be empty';
   			throw new Exception($error_message);
			}

	    $data = array(
	      'rowid' => $row_id,
	      'qty' => $qty
	    );

	    $result = $this->cart_model->update($data);

	  }  catch (Exception $e) {
		
			$params['message'] = $e->getMessage();
	
		}

		redirect('/cart/', 'refresh');
	}

	public function remove()
	{
		$row_id = $this->input->get('id',TRUE);

		if (!empty($row_id)) {
		  $result = $this->cart_model->remove($row_id);
		}

		redirect('/cart/', 'refresh');
	}

	public function checkout()
	{
		$has_service = $this->cart_model->has_service();
		if ($has_service) {
			redirect('/cart/schedule', 'refresh');
		} else {
			redirect('/cart/address', 'refresh');
		}
	}

	public function schedule()
	{	
		try {

	    $this->page['js'][] = '/front/js/_mycalendar';
    	$this->page['js'][] = '/front/js/_myhours';
    	$this->page['css'][] = '/front/css/_mycalendar';

			$params['page'] = $this->page['title'] = 'Appointments';
			$params['business_hours'] = $this->service_model->business_hours();
			$params['cart'] = $this->cart_model->contents();
			$params['total'] = $this->cart_model->total();
			$params['data']= $this->session->service;

			$view = 'cart/schedule';

		} catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
		
		}

		$this->load->view($view,$params);
	}

	public function address()
	{	
		try {
			$params['has_service'] = $this->cart_model->has_service();
			$params['cart'] = $this->cart_model->contents();
			$params['total'] = $this->cart_model->total();
			$params['data']= $this->session->address;

			if (empty($params['cart'])) {
				$error_message = 'Cart is empty';
   			throw new Exception($error_message);
			}
		}  catch (Exception $e) {
			redirect('/cart/', 'refresh');
		}

		$this->load->view('cart/address', $params);
	}

	public function payment()
	{	
		try {
			$params['cart'] = $this->cart_model->contents();
			$params['total'] = $this->cart_model->total();
			$params['data']= $this->session->payment;

			if (empty($params['cart'])) {
				$error_message = 'Cart is empty';
   			throw new Exception($error_message);
			}

		}  catch (Exception $e) {
			redirect('/cart/', 'refresh');
		}

		$this->load->view('cart/payment', $params);
	}

	public function review()
	{	
		try {
			$params['data'] = $this->cart_model->contents();
			$params['total'] = $this->cart_model->total();

			if (empty($params['data'])) {
				$error_message = 'Cart is empty';
   			throw new Exception($error_message);
			}

		}  catch (Exception $e) {
			redirect('/cart/', 'refresh');
		}

		$this->load->view('cart/order_review', $params);
	}

	public function save()
	{
		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));
    $this->session->set_userdata($form_values->page, $form_values);

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function charge()
	{
		$this->page['template'] = 'default_json.php';
		$total = $this->cart_model->total();
		$payment = $this->session->payment;
		$api_response = $this->gateway_model->paypal($payment,$total);
		$this->session->set_userdata('api_response', $api_response);

		$return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function cc_results()
	{	
		$params['cart'] = $this->cart_model->contents();
		$params['total'] = $this->cart_model->total();
		$params['data']= $this->session->api_response;
		$this->load->view('cart/api_response', $params);
	}
}