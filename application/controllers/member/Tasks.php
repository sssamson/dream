<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->page['require_login'] = TRUE;
    $this->load->model('task_model');
    $this->page['template']	= 'member_html.php';
    $this->page['js'][]	= '/member/js/_task';
  }

	public function index()
	{
		try {

			$params['page'] = $this->page['title'] = 'Tasks';
			$client_id = $this->session->user_id;
			$params['data'] = $this->task_model->client_tasks($client_id);
			$view = 'member/task_main';

		}  catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function add()
	{
		try {

			$params['page'] = $this->page['title'] = 'Add Tasks';
			$view = 'member/task_edit';

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
			$client_id = $this->session->user_id;
			$params['data'] = $this->task_model->client_task_by_id($id,$client_id);
			$params['page'] = $this->page['title'] = 'Edit Task';
			$view = 'member/task_edit';

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

		$client_id = $this->session->user_id;

		$sql_values = array(
		  'date_created' 	=> current_date()['db'],
		  'summary' 			=> !empty($form_values->summary) ? $form_values->summary : '',
			'description' 	=> !empty($form_values->description) ? $form_values->description : '',
			'client_id' 		=> $client_id,
		);

		if (empty($form_values->id)) {

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
        $results = $this->task_model->client_delete_task_by_id($id,$client_id);
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

}
