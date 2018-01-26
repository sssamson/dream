<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->page['require_login'] = FALSE;
    $this->load->model('client_model');
    $this->page['template']	= 'admin_login_html.php';
    $this->page['title'] = 'Log in';
  }

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function logout()
  {
    $this->session->sess_destroy();
    redirect('/admin/', 'refresh');
  }

	public function dologin()
	{
		$this->page['template'] = 'default_json.php';
		$form_values 	= json_decode($this->input->post('form_values',TRUE));
		$validate 		= FALSE;
		$message 			= 'Email and Password do not match';
		$redirect_url = '';

		if (!empty($form_values->mode)) {
			$client_id = $this->client_model->validate_login('admin',$form_values->email,$form_values->password);

			if (!empty($client_id)) {
				$this->session->set_userdata('admin_id', $client_id);
				$redirect_url = '/admin/general/?page=dashboard';
				$validate = TRUE;
				$message = '';
			}

		}

		$return['status'] 	= $validate;
    $return['url'] 			= $redirect_url;
    $return['message'] 	= $message;

    $this->load->view('elements_default/json', compact('return'));

	}

	public function error()
	{
		$this->page['template'] = 'default_json.php';
		$return['message'] 	= $this->session->error;
		$return['status'] 	= TRUE;
		$this->load->view('elements_default/json', compact('return'));
	}
}
