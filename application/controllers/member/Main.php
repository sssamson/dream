<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->model('service_model');
    $this->load->model('client_model');
    $this->load->model('cart_model');
    $this->load->model('general_model');
    $this->load->model('page_model');
    $this->load->model('store_model');
    $this->page['template']	= 'member_html.php';
  }

  public function index()
  {
    $this->page['js'][] = '/account/js/_members_login';
    $this->page['title'] = 'Log in';
    $this->load->view('members/login');
  }

  public function login()
  {
    $this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));

    $client_id = $this->client_model->validate_login('member',$form_values->email,$form_values->password);

    $redirect_url = '';
    $validate = FALSE;
    $message = 'Invalid Login';

    if (!empty($client_id)) {
      $this->session->set_userdata('user_id', $client_id);
      $redirect_url = '/member/main/account';
      $validate = TRUE;
      $message = '';
    }

    $return['status']   = $validate;
    $return['url']      = $redirect_url;
    $return['message']  = $message;

    $this->load->view('elements_default/json', compact('return'));
  }

	public function account()
	{
    $this->page['js'][] = '/account/js/_members_account';
    $this->page['require_login'] = TRUE;
    $client_id = $this->session->user_id;
    $params['data'] = $this->client_model->client_by_id($client_id);
		$this->load->view('members/account',$params);
	}

	public function orders()
	{
    $this->page['js'][] = '/account/js/_members_orders';
    $this->page['require_login'] = TRUE;
    $client_id = $this->session->user_id;
		$params['data'] = $this->store_model->customer_orders($client_id);
		$this->load->view('members/orders',$params);
	}

	public function view_order()
	{
		$this->page['js'][] = '/account/js/_members_orders';
		$id = $this->input->get('id',TRUE);
		$this->page['require_login'] = TRUE;
		$client_id = $this->session->user_id;
		$params['id'] = $id;
		$params['data'] = $this->store_model->order_by_id($id);
		$this->load->view('members/order_view',$params);
	}

	public function update_account()
	{
		$db = 'clients';
		$this->page['require_login'] = TRUE;

		$this->page['template'] = 'default_json.php';
		$form_values = json_decode($this->input->post('form_values',TRUE));

		$sql_values = array(
		  'id' 				=> $this->session->user_id,
			'firstname' => $form_values->firstname,
			'lastname' 	=> $form_values->lastname,
			'phone' 		=> $form_values->phone,
			'street' 		=> $form_values->street,
			'state' 		=> $form_values->state,
			'zip' 			=> $form_values->zip,
			'country' 	=> $form_values->country,
			'company' 	=> $form_values->company,
			'db_name'		=> $db
		);

		$results = $this->service_model->db_update($sql_values);

		$return['status'] = TRUE;
		$this->load->view('elements_default/json', compact('return'));
	}

  public function update_credentails()
  {
    $db = 'clients';
		$this->page['require_login'] = TRUE;
    $this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));

		if ($this->client_model->email_not_used($form_values->email,$this->session->user_id)) {
			$sql_values['email'] = $form_values->email;
			$sql_values['id'] = $this->session->user_id;
			$sql_values['password'] = $form_values->password;
			$sql_values['db_name'] = $db;
			$results = $this->service_model->db_update($sql_values);
			$return['status'] = TRUE;
		} else {
			$return['message']='Email is current used by anoter member';
			$return['status'] = FALSE;
		}

    $this->load->view('elements_default/json', compact('return'));
  }

}
