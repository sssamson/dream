<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->page['require_login'] = TRUE;
    $this->load->model('general_model');
    $this->load->model('page_model');

    $this->page['template']			= 'admin_html.php';
    $this->page['section']			= 'general';
    $this->page['section_url']	= '/admin/general/?page=dashboard';
    $this->page['js'][] = '/back/js/dashboard';
  }

	public function index()
	{	
    $params['pages'] = $this->page_model->all_pages();
		$this->load->view('admin/dashboard',$params);
	}
}
