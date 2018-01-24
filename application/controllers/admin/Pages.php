<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->page['require_login'] = TRUE;
    $this->load->model('page_model');
    $this->page['template']	= 'admin_html.php';
    $this->page['section']	= 'pages';
    $this->page['section_url']	= '/admin/pages/?page=services';
    $this->page['js'][]	= '/back/js/page';
  }

	public function index()
	{	
		$tag = $this->input->get('page',TRUE);
		
		try {
			if (empty($tag)) {
				$error_message = 'Page is required';
   			throw new Exception($error_message);
			}
			
			$params['permissions'] = $this->page_model->ui_permissions($tag);
			
			$params['data'] = $this->page_model->page($tag);

			if (!empty($params['data']['page_header'])) {
				$params['categories'] = $this->page_model->categories($params['data']['page_header']->id);
			} else {
				$params['categories'] = array();
			}

			if (!empty($params['data']['page_header']->section)) {
				$page = $params['data']['page_header']->section;
			} else {
				$page = ucfirst(str_replace("_"," ",$tag));
			}

			$params['page'] = $this->page['title'] = $page;
			$params['tag'] = $tag;
			$view = 'admin/pages_main';		
		
		}  catch (Exception $e) {
			
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function add()
	{	
		$tag = $this->input->get('page',TRUE);
		
		try {
			if (empty($tag)) {
				$error_message = 'Page is required';
   			throw new Exception($error_message);
			}

			$params['permissions'] = $this->page_model->ui_permissions($tag);
			$page_header = $this->page_model->page_header_by_tag($tag);
			$params['data'] = array(
											'page_header'=>$page_header,
											'page_elements'=>NULL);

			if (empty($params['data']['page_header'])) {
				$error_message = 'Page could not be found';
   			throw new Exception($error_message);
			}

			$params['categories'] = $this->page_model->categories($params['data']['page_header']->id);

			$page = 'Add Element: '.$params['data']['page_header']->section;
			$params['page'] = $this->page['title'] = $page;
			$params['tag'] = $tag;
			$view = 'admin/pages_edit';

		} catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
		
		}

		$this->load->view($view,$params);
	}

	public function edit()
	{	
		$element_id = $this->input->get('id',TRUE);

		try {
		
			if (empty($element_id)) {
				$error_message = 'Id is required';
   			throw new Exception($error_message);
			}

			$params['id'] = $element_id;
			$tag = $this->page_model->get_tag_by_id($element_id);
			$params['permissions'] = $this->page_model->ui_permissions($tag);
			$params['data'] = $this->page_model->element($element_id);
			$params['categories'] = $this->page_model->categories($params['data']['page_header']->id);
			$page = 'Edit Element: '. $params['data']['page_header']->section;
			$params['page'] = $this->page['title'] = $page;
			$view = 'admin/pages_edit';

		}  catch (Exception $e) {
		
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
	
		}
		
		$this->load->view($view,$params);
	}
	
	public function save_page()
	{
		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));

		$sql_values = array(
		  'order' 			=> !empty($form_values->order) ? $form_values->order : '',
		  'section' 		=> !empty($form_values->section) ? $form_values->section : '',
		  'subsection' 	=> !empty($form_values->subsection) ? $form_values->subsection : '',
		  'video' 			=> !empty($form_values->video) ? $form_values->video : '',
		  'mediatype' 	=> !empty($form_values->mediatype) ? $form_values->mediatype : ''
		);

		if (empty($form_values->id)) {
		
			$sql_values['tag'] = $form_values->tag;
			$sql_values['image'] = !empty($form_values->image) ? $form_values->image : '';
      $results = $this->page_model->db_insert('page',$sql_values);
    
    } else {

    	$sql_values['id'] = $form_values->id;
    	$sql_values['db_name'] = 'page';
    	if (!empty($form_values->image)) {
				$sql_values['image'] = $form_values->image;
    	}
      $results = $this->page_model->db_update($sql_values);
    
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function save_element()
	{
		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));

		$category_id=0;
		$element_id=0;

		if (!empty($form_values->id)) {
    	$element_id = $form_values->id;
    }

    if (!empty($form_values->category)) {
    	$category_id = $this->page_model->post_element_category($form_values->page_id,$form_values->category);
    }

		$sql_values = array(
			'category_id' => $category_id,
		  'order' 			=> !empty($form_values->order) ? $form_values->order : '',
		  'section' 		=> !empty($form_values->section) ? $form_values->section : '',
		  'subsection' 	=> !empty($form_values->subsection) ? $form_values->subsection : '',
		  'h1' 					=> !empty($form_values->h1) ? $form_values->h1 : '',
		  'h2' 					=> !empty($form_values->h2) ? $form_values->h2 : '',
		  'video' 			=> !empty($form_values->video) ? $form_values->video : '',
		  'mediatype' 	=> !empty($form_values->mediatype) ? $form_values->mediatype : ''
		);

		if (empty($element_id)) {
    	
    	$sql_values['page_id'] = $form_values->page_id;
    	$sql_values['image'] = !empty($form_values->image) ? $form_values->image : '';
      $sql_values['icon'] = !empty($form_values->icon) ? $form_values->image : '';

      $results = $this->page_model->db_insert('page_elements',$sql_values);
    
    } else {
    	
    	if (!empty($form_values->image)) {
				$sql_values['image'] = $form_values->image;
    	}

    	if (!empty($form_values->icon)) {
				$sql_values['icon'] = $form_values->icon;
    	}

    	$sql_values['id'] = $element_id;
    	$sql_values['db_name'] = 'page_elements';
      $results = $this->page_model->db_update($sql_values);
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function delete_element()
	{
		$this->page['template'] = 'default_json.php';
    $id = $this->input->post('id',TRUE);

		if (!empty($id)) {
        $results = $this->page_model->db_delete($id,'page_elements');
    } 

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function add_category()
	{	
		$tag = $this->input->get('page',TRUE);
		
		try {
			if (empty($tag)) {
				$error_message = 'Page is required';
   			throw new Exception($error_message);
			}

			$page_header = $this->page_model->page_header_by_tag($tag);

			if (empty($page_header)) {
				$error_message = 'Page could not be found';
   			throw new Exception($error_message);
			}

			$params['page_id'] = $page_header->id;

			$page = 'Add Category: '.$page_header->section;
			$params['page'] = $this->page['title'] = $page;
			$params['tag'] = $tag;
			$view = 'admin/category_edit';

		} catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
		
		}

		$this->load->view($view,$params);
	}

	public function edit_category()
	{	
		$cat_id = $this->input->get('id',TRUE);

		try {
		
			if (empty($cat_id)) {
				$error_message = 'Category Id is required';
   			throw new Exception($error_message);
			}

			$params['id'] = $cat_id;

			$params['data'] = $this->page_model->category_by_id($cat_id);

			if (empty($params['data'])) {
				$error_message = 'Category could not be found';
   			throw new Exception($error_message);
			}

			$page = 'Edit Category: '. $params['data']->name;
			$params['page'] = $this->page['title'] = $page;

			$view = 'admin/category_edit';

		}  catch (Exception $e) {
		
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
	
		}
		
		$this->load->view($view,$params);
	}

	public function save_category()
	{
		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));

		$sql_values = array(
		  'name' 			=> !empty($form_values->order) ? $form_values->order : ''
		);

		$db = 'page_categories';

		if (empty($form_values->id)) {
		
			$sql_values['page_id'] = $form_values->page_id;

      $results = $this->page_model->db_insert($db,$sql_values);
    
    } else {

    	$sql_values['id'] = $form_values->id;
    	$sql_values['db_name'] = $db;
      $results = $this->page_model->db_update($sql_values);
    
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function delete_category()
	{
		$this->page['template'] = 'default_json.php';
    $id = $this->input->post('id',TRUE);

		if (!empty($id)) {
        $results = $this->page_model->db_delete($id,'page_categories');
    } 

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}
}
