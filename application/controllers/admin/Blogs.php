<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends ME_Controller {

	function __construct()
  {
      parent::__construct();
      $this->page['require_login'] = TRUE;
      $this->load->model('blog_model');
      $this->page['template']	= 'admin_html.php';
      $this->page['section']	= 'blogs';
      $this->page['section_url']	= '/admin/blogs/?page=categories';
      $this->page['js'][]	= '/back/js/blogs';
  }

	public function index()
	{	

		try {
			$params['page'] = $this->page['title'] = 'Articles';
			$params['categories'] = $this->blog_model->categories();
			$params['data'] = $this->blog_model->blogs();
			$view = 'admin/blogs_main';		
		
		}  catch (Exception $e) {
			
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function add()
	{	
		$this->page['js'][]		= '/vendor/datepicker/js/bootstrap-datepicker';
		$this->page['css'][]	= '/vendor/datepicker/css/datepicker';
		$this->page['js'][]		= '/vendor/timepicker/bootstrap-timepicker';
		$this->page['css'][]	= '/vendor/timepicker/bootstrap-timepicker.min';

		try {

			$params['categories'] = $this->blog_model->categories();
			$params['page'] = $this->page['title'] = 'Add Article';
			$view = 'admin/blogs_edit';

		} catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
		
		}

		$this->load->view($view,$params);
	}

	public function edit()
	{	
		$this->page['js'][]		= '/vendor/datepicker/js/bootstrap-datepicker';
		$this->page['css'][]	= '/vendor/datepicker/css/datepicker';
		$this->page['js'][]		= '/vendor/timepicker/bootstrap-timepicker';
		$this->page['css'][]	= '/vendor/timepicker/bootstrap-timepicker.min';

		$blog_id = $this->input->get('id',TRUE);

		try {
		
			if (empty($blog_id)) {
				$error_message = 'Article Id is required';
   			throw new Exception($error_message);
			}

			$params['id'] = $blog_id;
			$params['data'] = $this->blog_model->blog_by_id($blog_id);
			$page = 'Edit Article';
			$params['page'] = $this->page['title'] = $page;
			$view = 'admin/blogs_edit';

		}  catch (Exception $e) {
		
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
	
		}
		
		$this->load->view($view,$params);
	}
	
	public function save_blog()
	{
		$db = 'blogs';
		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));
    
		$sql_values = array(
		  'date' 			=> !empty($form_values->date) ? mdate_to_ddate($form_values->date.' '.$form_values->time) : '',
		  'cat_id' 		=> !empty($form_values->cat_id) ? $form_values->cat_id : NULL,
		  'title' 	=> !empty($form_values->title) ? $form_values->title : NULL,
		  'intro' 			=> !empty($form_values->intro) ? $form_values->intro : NULL,
		  'content' 		=> !empty($form_values->content) ? $form_values->content : NULL
		);

		if (empty($form_values->id)) {
			$sql_values['image'] = !empty($form_values->image) ? $form_values->image : '';

			$results = $this->blog_model->db_insert($db,$sql_values);
    
    } else {

    	$sql_values['id'] = $form_values->id;
    	$sql_values['db_name'] = $db;

    	if (!empty($form_values->image)) {
				$sql_values['image'] = $form_values->image;
    	}

      $results = $this->blog_model->db_update($sql_values);
    
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function delete_blog()
	{
		$db = 'blogs';
		$this->page['template'] = 'default_json.php';
    $id = $this->input->post('id',TRUE);

		if (!empty($id)) {
        $results = $this->blog_model->db_delete($id,$db);
    } 

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}
}
