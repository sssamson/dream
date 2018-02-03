<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->page['require_login'] = TRUE;
    $this->load->model('task_model');
		$this->load->model('client_model');
    $this->page['template']	= 'admin_html.php';
		$this->page['section']	= 'tasks';
		$this->page['section_url']	= '/admin/tasks/?page=tasks';
    $this->page['js'][]	= '/back/js/task';
  }

	public function index()
	{
		try {

			$params['page'] = $this->page['title'] = 'Tasks';
			$client_id = $this->session->user_id;
			$params['data'] = $this->task_model->tasks();
			$view = 'admin/task_main';

		}  catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function add()
	{
		try {
			$params['clients'] = $this->client_model->clients();
			$params['page'] = $this->page['title'] = 'Add Tasks';
			$view = 'admin/task_edit';

		} catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function edit()
	{
		$id = $this->input->get('id',TRUE);

		try {

			if (empty($id)) {
				$error_message = 'Task Id is required';
   			throw new Exception($error_message);
			}

			$params['id'] = $id;
			$params['clients'] = $this->client_model->clients();
			$params['data'] = $this->task_model->task_by_id($id);
			$params['page'] = $this->page['title'] = 'Edit Task';
			$view = 'admin/task_edit';

		}  catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function save_task()
	{
		$db = 'tasks';
		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));

		$client_id = $form_values->client_id;

		$sql_values = array(
		  'last_updated' 	=> current_date()['db'],
		  'summary' 			=> !empty($form_values->summary) ? $form_values->summary : '',
			'description' 	=> !empty($form_values->description) ? $form_values->description : '',
			'status' 				=> !empty($form_values->status) ? $form_values->status : '',
			'client_id' 		=> $client_id,
		);

		if (empty($form_values->id)) {
			
			$sql_values['date_created'] = current_date()['db'];
			$results = $this->task_model->db_insert($db,$sql_values);

    } else {

			$sql_values['id'] = $form_values->id;
    	$sql_values['db_name'] = $db;

      $results = $this->task_model->db_update($sql_values);

    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function delete_task()
	{
		$db = 'task';
		$this->page['template'] = 'default_json.php';
    $id = $this->input->post('id',TRUE);
		$client_id = $this->session->user_id;

		if (!empty($id)) {
        $results = $this->client_model->db_delete($id,$db);
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

}
