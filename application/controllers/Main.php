<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->model('blog_model');
    $this->load->model('general_model');
    $this->load->model('page_model');
    $this->page['template']	= 'default_html.php';
		$this->page['title'] = 'Carter Media';
  }

	public function index()
	{

		$params = array();
		$params['data']=$this->page_model->page('home');
		$this->load->view('main/home',$params);

		$excluded_page = array('home','footer');
		$pages = $this->page_model->all_pages();

		foreach ($pages as $page_tag) {
			if (!in_array($page_tag, $excluded_page)) {
				$params = array();

				if ($page_tag == 'blog') {
					$params['blog'] = $this->blog_model->blogs(3);
				}

				$params['data']=$this->page_model->page($page_tag);
				$this->load->view('main/'.$page_tag,$params);
			}
		}

	 }

	public function blog_category()
 	{
 		$category_id = $this->input->get('id',TRUE);
		$this->page['template']	= 'blog_html.php';

		try {

 			if (empty($category_id)) {
 				$category_id = 0;
 			}

			$cat = $this->blog_model->blog_category_by_id($category_id);
			$cat_name = 'Uncategorised';
			if (!empty($cat->name)) {
				$cat_name = $cat->name;
			}

			$this->page['title'] = 'Blog Category: ' . $cat_name;
 			$params['id'] = $category_id;
			$params['categories'] = $this->blog_model->categories();
			$params['blogs'] = $this->blog_model->blogs(5);
 			$params['data'] = $this->blog_model->blogs_by_category($category_id);

 			$view = 'main/blog_category';

 		}  catch (Exception $e) {

 			$params['message'] = $e->getMessage();
 			$view = 'errors/admin_message';

 		}

 		$this->load->view($view,$params);
 	}

	public function blog()
	{
		$blog_id = $this->input->get('id',TRUE);
		$this->page['template']	= 'blog_html.php';
		$this->page['title'] = 'Blog';

		try {

			if (empty($blog_id)) {
				$error_message = 'Blog Id is required';
					throw new Exception($error_message);
			}

			$params['id'] = $blog_id;
			$params['categories'] = $this->blog_model->categories();
			$params['blogs'] = $this->blog_model->blogs(10);
			$params['data'] = $this->blog_model->blog_by_id($blog_id);
			$view = 'main/blog_view';

		}  catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function service()
	{
		$service_id = $this->input->get('id',TRUE);
		$this->page['template']	= 'blog_html.php';
		$this->page['title'] = 'Service';

		try {

			if (empty($service_id)) {
				$error_message = 'Service Id is required';
					throw new Exception($error_message);
			}

			$params['id'] = $service_id;
			$params['data'] = $this->page_model->page_element($service_id);
			$view = 'main/service_view';

		}  catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function send_mail()
	{
		$this->page['template'] = 'default_json.php';

		$this->load->library('email');
		$this->email->from('info@cartermedia.net', 'CarterMedia.net');
		$this->email->to('dontaye@cartermedia.net');
		$this->email->subject('Contact Form CarterMedia.net');
		$message = "";
		$message .= "Name: ".$this->input->post('name',TRUE). "\r\n";
		$message .= "Email: ".$this->input->post('email',TRUE). "\r\n";
		$message .= "Phone: ".$this->input->post('phone',TRUE). "\r\n";
		$message .= "--- --- --- ---" . "\r\n";
		$message .= $this->input->post('message',TRUE);

		$this->email->message($message);

		$this->email->send();

		$return['status'] 	= TRUE;
		$this->load->view('elements_default/json', compact('return'));
	}
}
