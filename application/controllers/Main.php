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
    $this->page['template']	= 'default_html.php';
  }

	public function index()
	{

		$params = array();
		$params['data']=$this->page_model->page('home');
		$this->load->view('main/home',$params);

		$params = array();
		$params['data']=$this->page_model->page('nav');
		$this->load->view('main/nav',$params);

		$excluded_page = array('home','footer','nav');
		$pages = $this->page_model->all_pages();
		
		foreach ($pages as $page) {
			if (!in_array($page->tag, $excluded_page)) {
				$params = array();
				$params['category']=$this->page_model->categories($page->id);

				if ($page->tag == 'store') {
					$params['products'] = $this->store_model->products('product');
				}

				$params['data']=$this->page_model->page($page->tag);
				$this->load->view('main/'.$page->tag,$params);
			}
		}

		$params = array();
		$params['services'] = $this->store_model->products('service');
		$this->load->view('main/store_service',$params);

		$params = array();
		$params['data']=$this->page_model->page('footer');
		$this->load->view('main/footer',$params);
		
	 }

}
