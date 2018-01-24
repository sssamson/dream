<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends ME_Controller {

	function __construct()
  {
    parent::__construct();
    $this->page['require_login'] = TRUE;
    $this->load->model('store_model');
    $this->load->model('service_model');
    $this->load->model('client_model');
    $this->page['template']	= 'admin_html.php';
    $this->page['section']	= 'services';
    $this->page['section_url']	= '/admin/services/?page=services_com';
    $this->page['js'][]	= '/back/js/service';
  }

	public function index()
	{	

		try {

			$params['page'] = $this->page['title'] = 'Services';
			$params['data'] = $this->store_model->products('service');
			$view = 'admin/services_main';		
		
		}  catch (Exception $e) {
			
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function add()
	{	

		try {

			$params['page'] = $this->page['title'] = 'Add Service';
			$view = 'admin/services_edit';

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
				$error_message = 'Service Id is required';
   			throw new Exception($error_message);
			}

			$params['id'] = $id;
			$params['data'] = $this->store_model->product_by_id($id);
			$page = 'Edit Service';
			$params['page'] = $this->page['title'] = $page;
			$view = 'admin/services_edit';

		}  catch (Exception $e) {
		
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
	
		}
		
		$this->load->view($view,$params);
	}
	
	public function appointments()
	{	
		$this->page['js'] 		= array();
		$this->page['js'][]		= '/back/js/appointments';
    $this->page['js'][] 	= '/front/js/_mycalendar';
    $this->page['js'][] 	= '/front/js/_myhours';
    $this->page['css'][] 	= '/front/css/_mycalendar';
    $this->page['css'][] 	= '/back/css/_mycalendar_add';

		try {
			$params['business_hours'] = $this->service_model->business_hours();
			
			$params['page'] = $this->page['title'] = 'Appointments';
			$params['data'] = $this->service_model->appointments();
			$view = 'admin/appointments_main';		
		
		}  catch (Exception $e) {
			
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';

		}

		$this->load->view($view,$params);
	}

	public function add_appointment()
	{	
		$this->page['js'] = array();
		$this->page['js'][]		= '/vendor/datepicker/js/bootstrap-datepicker';
		$this->page['css'][]	= '/vendor/datepicker/css/datepicker';
		$this->page['js'][]		= '/vendor/timepicker/bootstrap-timepicker';
		$this->page['css'][]	= '/vendor/timepicker/bootstrap-timepicker.min';
		
		$this->page['js'][]		= '/back/js/appointments';

		try {

			$params['page'] = $this->page['title'] = 'Add Appointment';
			$params['clients'] = $this->client_model->clients();
			$params['services'] = $this->store_model->products('service');
			$view = 'admin/appointments_add';

		} catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
		
		}

		$this->load->view($view,$params);
	}

	public function edit_appointment()
	{	
		$id = $this->input->get('id',TRUE);
		
		$this->page['js'] = array();
		$this->page['js'][]		= '/vendor/datepicker/js/bootstrap-datepicker';
		$this->page['js'][]		= '/vendor/timepicker/bootstrap-timepicker';
		$this->page['css'][]	= '/vendor/datepicker/css/datepicker';
		$this->page['css'][]	= '/vendor/timepicker/bootstrap-timepicker.min';
		$this->page['js'][]		= '/back/js/appointments';

		try {
		
			if (empty($id)) {
				$error_message = 'Service Id is required';
   			throw new Exception($error_message);
			}

			$params['id'] = $id;
			$params['data'] = $this->service_model->appointment_by_id($id);
			$page = 'Edit Appointment';
			$params['page'] = $this->page['title'] = $page;
			$view = 'admin/appointments_edit';

		}  catch (Exception $e) {
		
			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
	
		}

		$this->load->view($view,$params);
	}

	public function save_appointment()
	{
		$db = 'appointments';
		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));
    
    $schedule = $form_values->schedule .' '. $form_values->time;

		$sql_values = array(
		  'schedule' 	=> mdate_to_ddate($schedule),
		  'status' 		=> !empty($form_values->status) ? $form_values->status : '',
		);

		if (empty($form_values->id)) {
			
			$sql_values['service_id'] = $form_values->service_id;
			$sql_values['client_id'] = $form_values->client_id;

			$results = $this->service_model->db_insert($db,$sql_values);
    
    } else {

    	$sql_values['id'] = $form_values->id;
    	$sql_values['db_name'] = $db;

      $results = $this->service_model->db_update($sql_values);
    
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function delete_appointment()
	{
		$db = 'appointments';
		$this->page['template'] = 'default_json.php';
    $id = $this->input->post('id',TRUE);

		if (!empty($id)) {
        $results = $this->service_model->db_delete($id,$db);
    } 

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function settings()
	{	
		try {
			$this->page['js'] = array();
    	$this->page['js'][] = '/front/js/_mycalendar';
    	$this->page['js'][] = '/back/js/_myhours';
    	$this->page['css'][] = '/front/css/_mycalendar';
    	$this->page['css'][] 	= '/back/css/_mycalendar_add';
			$this->page['js'][]		= '/back/js/service_settings';
			
			$params['business_hours'] = $this->service_model->business_hours();
			$params['data'] = $this->service_model->appointments_settings();

			foreach ($params['data'] as $key => $value) {
				if ($value->type == 'schedule') {
					$params['schedule'] = $value;
					$params['weekday'] = array();
					$weekdays = json_decode($value->weekdays);
					foreach ($weekdays as $key => $weekday) {
						$params['weekday'][$weekday] = TRUE;
					}
				}
			}

			$params['page'] = $this->page['title'] = 'Business Hours';
			$view = 'admin/service_settings';

		} catch (Exception $e) {

			$params['message'] = $e->getMessage();
			$view = 'errors/admin_message';
		
		}

		$this->load->view($view,$params);
	}

	public function save_settings()
	{
		$db = 'appointments_settings';
		$type = 'schedule';

		$this->page['template'] = 'default_json.php';
    $form_values = json_decode($this->input->post('form_values',TRUE));

		$sql_values = array(
		  'start' 		=> $form_values->start_time,
			'end' 			=> $form_values->end_time,
			'weekdays' 	=> json_encode($form_values->dow)
		);

		if (empty($form_values->id)) {
			
			$sql_values['type'] = $type;
			$results = $this->service_model->db_insert($db,$sql_values);
    
    } else {

    	$sql_values['id'] = $form_values->id;
    	$sql_values['db_name'] = $db;

      $results = $this->service_model->db_update($sql_values);
    
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}

	public function day_off()
	{
		$db = 'appointments_settings';
		$type = 'days_off';

		$this->page['template'] = 'default_json.php';
    $date = $this->input->post('date',TRUE);

    $result = $this->service_model->days_off_by_date('d',mdate_to_ddate($date));

    if (empty(reset($result))) {
    	$sql_values = array(
			  'date' 		=> mdate_to_ddate($date)
			);
			$sql_values['type'] = $type;
			$results = $this->service_model->db_insert($db,$sql_values);
    } else {
    	$first_result = reset($result);
    	$id = $first_result->id;
			$results = $this->client_model->db_delete($id,$db);
    }

    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
	}
}
