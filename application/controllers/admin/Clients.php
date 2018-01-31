<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends ME_Controller {

	function __construct()
  {
      parent::__construct();
      $this->page['require_login'] = TRUE;
      $this->load->model('client_model');
      $this->page['template']	= 'admin_html.php';
      $this->page['section']	= 'clients';
      $this->page['section_url']	= '/admin/clients/?page=users';
      $this->page['js'][]	= '/back/js/clients';
  }

	public function index()
	{

		try {
			$params['page'] = $this->page['title'] = 'Users';
			$params['data'] = $this->client_model->clients();
			$view = 'admin/clients_main';

		}  catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function add()
	{

		try {

			$params['page'] = $this->page['title'] = 'Add User';
			$view = 'admin/clients_edit';

		} catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function edit()
	{
		$client_id = $this->input->get('id',TRUE);

		try {

			if (empty($client_id)) {
				$error_message = 'Clients Id is required';
   			throw new Exception($error_message);
			}

			$params['id'] = $client_id;
			$params['data'] = $this->client_model->client_by_id($client_id);
			$page = 'Edit Client';
			$params['page'] = $this->page['title'] = $page;
			$view = 'admin/clients_edit';

		}  catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function save_client()
	{
		$db = 'clients';
		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));

		$sql_values = array(
		  'email' 			=> !empty($form_values->email) ? $form_values->email : '',
		  'password' 		=> !empty($form_values->password) ? $form_values->password : '',
		  'firstname' 	=> !empty($form_values->firstname) ? $form_values->firstname : '',
		  'lastname' 		=> !empty($form_values->lastname) ? $form_values->lastname : '',
		  'phone' 			=> !empty($form_values->phone) ? $form_values->phone : '',
		  'street' 			=> !empty($form_values->street) ? $form_values->street : '',
			'state' 			=> !empty($form_values->state) ? $form_values->state : '',
			'zip' 				=> !empty($form_values->zip) ? $form_values->zip : '',
			'country' 		=> !empty($form_values->country) ? $form_values->country : '',
		);

		if (empty($form_values->id)) {

			$results = $this->client_model->db_insert($db,$sql_values);

    } else {

    	$sql_values['id'] = $form_values->id;
    	$sql_values['db_name'] = $db;

      $results = $this->client_model->db_update($sql_values);

    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function delete_client()
	{
		$db = 'clients';
		$this->page['template'] = 'default_json.php';
    $id = $this->input->post('id',TRUE);

		if (!empty($id)) {
        $results = $this->client_model->db_delete($id,$db);
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}
}
