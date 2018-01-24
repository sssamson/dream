<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->page['require_login'] = TRUE;
    $this->load->model('store_model');
    $this->page['template']	= 'admin_html.php';
    $this->page['section']	= 'store';
    $this->page['section_url']	= '/admin/store/?page=products';
    $this->page['js'][]	= '/back/js/store';
  }

	public function index()
	{	
		try {
			$params['page'] = $this->page['title'] = 'Products';
			$params['data'] = $this->store_model->products('products');
			$view = 'admin/store_main';		
		
		}  catch (Exception $e) {
			
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function add()
	{	

		try {

			$params['page'] = $this->page['title'] = 'Add Product';
			$view = 'admin/store_edit';

		} catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
		
		}

		$this->load->view($view,$params);
	}

	public function edit()
	{	
		$product_id = $this->input->get('id',TRUE);

		try {
		
			if (empty($product_id)) {
				$error_message = 'Product Id is required';
   			throw new Exception($error_message);
			}

			$params['id'] = $product_id;
			$params['data'] = $this->store_model->product_by_id($product_id);
			$page = 'Edit Product';
			$params['page'] = $this->page['title'] = $page;
			$view = 'admin/store_edit';

		}  catch (Exception $e) {
		
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
	
		}
		
		$this->load->view($view,$params);
	}
	
	public function save_product()
	{
		$db = 'products';
		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));
    
		$sql_values = array(
			'type' 				=> !empty($form_values->type) ? $form_values->type : '',
		  'order' 			=> !empty($form_values->order) ? $form_values->order : '',
		  'name' 				=> !empty($form_values->name) ? $form_values->name : '',
		  'description' => !empty($form_values->description) ? $form_values->description : '',
		  'price' 			=> !empty($form_values->price) ? $form_values->price : ''
		);

		if (empty($form_values->id)) {
		
			$sql_values['image'] = !empty($form_values->image) ? $form_values->image : '';
      $results = $this->store_model->db_insert($db,$sql_values);
    
    } else {

    	$sql_values['id'] = $form_values->id;
    	$sql_values['db_name'] = $db;

    	if (!empty($form_values->image)) {
				$sql_values['image'] = $form_values->image;
    	}

      $results = $this->store_model->db_update($sql_values);
    
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function delete()
	{	
		$this->page['template'] = 'default_json.php';
    $id = $this->input->post('id',TRUE);
		$db = $this->input->post('type',TRUE);
		
		if (!empty($id)) {
        $results = $this->store_model->db_delete($id,$db);
    } 

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function orders()
	{	

		try {
			$params['page'] = $this->page['title'] = 'Orders';
			$params['data'] = $this->store_model->orders();
			$view = 'admin/orders_main';		
		
		}  catch (Exception $e) {
			
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function edit_order()
	{	
		$id = $this->input->get('id',TRUE);
		$params['page'] = $this->page['title'] = 'Order';
			
		try {

			$view = 'admin/orders_edit';
			$params['data'] = $this->store_model->order_by_id($id);	
			$return['error'] = '';

		}  catch (Exception $e) {
			
			$return['error'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function update_status()
	{	
		$this->page['template'] = 'default_json.php';
		$id = $this->input->post('id',TRUE);
		$status = $this->input->post('status',TRUE);

		try {

    	$sql_values['id'] = $id;
    	$sql_values['db_name'] = 'orders';
    	$sql_values['status'] = $status;
    	
      $results = $this->store_model->db_update($sql_values);

			$return['error'] = '';

		}  catch (Exception $e) {
			
			$return['error'] = $e->getMessage();

		}

		$return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

}
