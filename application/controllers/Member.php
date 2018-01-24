<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->model('service_model');
    $this->load->model('client_model');
    $this->load->model('cart_model');
    $this->load->model('general_model');
    $this->load->model('page_model');
    $this->load->model('store_model');
    $this->page['template']	= 'account_html.php';
  }

  public function index()
  {
    $this->page['js'][] = '/front/js/_members';
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
      $redirect_url = '/member/account';
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
    $this->page['js'][] = '/front/js/_members_account';
    $this->page['require_login'] = TRUE;
    $client_id = $this->session->user_id;
    $params['data'] = $this->client_model->client_by_id($client_id);
		$this->load->view('members/account',$params);
	}

  public function update_password()
  {
    $db = 'clients';

    $this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));

    $sql_values['id'] = $this->session->user_id;
    $sql_values['password'] = $form_values->password;
    $sql_values['db_name'] = $db;

    $results = $this->service_model->db_update($sql_values);
    
    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
  }

}
