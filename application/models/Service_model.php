<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_model extends ME_Model
{	
	function __construct()
	{
		parent::__construct();
	}

	public function days_off($work_week)
	{
		$days_off = array();
		for ($x = 0; $x <= 6; $x++) {
		  if (!in_array($x, $work_week)) {
		  	$days_off[] = $x;
		  }
		}
		return $days_off;
	}

	public function business_hours()
	{
		$sql = "SELECT * FROM appointments_settings where type='schedule'";
		$query = $this->db->query($sql);
		$result = $query->row();
		
		if (!empty($result->weekdays)) {
			$result->days_off = $this->days_off(json_decode($result->weekdays));
		} 

		if (empty($result)) {
			$arr['weekdays'] = '[0,1,2,3,4,5,6]';
			$arr['start'] = '00:00';
			$arr['end'] = '24:00';
			$result = (object)$arr;
		}

		return $result;
	}

	public function appointments_settings()
	{
		$sql = "SELECT * FROM appointments_settings";
		$query = $this->db->query($sql);
		return  $query->result();
	}

	public function appointments()
	{
		$sql = "SELECT 
						appointments.*, 
							clients.email, 
							clients.firstname, 
							clients.lastname, 
							clients.phone, 
							clients.street,
							products.name as service_name,
							products.description as service_description,
							products.image,
							products.price  	 
						FROM appointments 
						LEFT JOIN products ON products.id = appointments.service_id
						LEFT JOIN clients ON clients.id = appointments.client_id";

		$query = $this->db->query($sql);
		return  $query->result();
	}	

	public function appointment_by_id($id)
	{
		$sql = "SELECT 
							appointments.*, 
							clients.email, 
							clients.firstname, 
							clients.lastname, 
							clients.phone, 
							clients.street,
							products.name as service_name,
							products.description as service_description,
							products.image,
							products.price  
						FROM appointments
						LEFT JOIN clients ON appointments.client_id = clients.id
						LEFT JOIN products ON appointments.service_id = products.id
						WHERE appointments.id=?";
		
		$query = $this->db->query($sql,array($id));
		
		return $query->row();
	}

	public function days_off_by_date($range,$begin,$end='')
	{
		if ($range=='d') {
			$sql_begin = date("Y-m-d", strtotime($begin));
			$sql_end = $sql_begin;
		} else if ($range=='m') {
			$year = date("Y", strtotime($begin));
			$month = date("m", strtotime($begin));
			$last_day = cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$sql_begin = date("Y-m-d", strtotime($year.'-'.$month.'-01'));
			$sql_end = date("Y-m-d", strtotime($year.'-'.$month.'-'.$last_day));
		} else {
			$sql_begin = date("Y-m-d", strtotime($begin));
			$sql_end = date("Y-m-d", strtotime($end));
		}

		$range = "'".$sql_begin."' AND '".$sql_end."'";

		$sql = "SELECT *
							FROM appointments_settings 
							WHERE type='days_off' 
							AND date BETWEEN ".$range;

		$query = $this->db->query($sql);
		return $query->result();
	}

	private function appointment_by_daterange($range,$begin,$end)
	{
		if ($range=='d') {
			$sql_begin = date("Y-m-d", strtotime($begin));
			$sql_end = $sql_begin;
		} else if ($range=='m') {
			$year = date("Y", strtotime($begin));
			$month = date("m", strtotime($begin));
			$last_day = cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$sql_begin = date("Y-m-d", strtotime($year.'-'.$month.'-01'));
			$sql_end = date("Y-m-d", strtotime($year.'-'.$month.'-'.$last_day));
		} else {
			$sql_begin = date("Y-m-d", strtotime($begin));
			$sql_end = date("Y-m-d", strtotime($end));
		}

		$range = "'".$sql_begin." 00:00:00' AND '".$sql_end." 23:59:59'";

		$sql = "SELECT 
							appointments.*, 
							clients.email, 
							clients.firstname, 
							clients.lastname, 
							clients.phone, 
							clients.street,
							products.name as service_name,
							products.description as service_description,
							products.image,
							products.price  
						FROM appointments
						LEFT JOIN clients ON appointments.client_id = clients.id
						LEFT JOIN products ON appointments.service_id = products.id
						WHERE appointments.schedule BETWEEN ".$range;

		$query = $this->db->query($sql);
		
		return $query->result();
	}

	public function events($range,$begin,$end)
	{
		if (empty($begin)) {
			$s_date = date("Y-m-d");
		}

		if (empty($range)) {
			$range = 'm';
		}
		
		if (empty($end)) {
			$end = '';
		}

		$appointments = $this->appointment_by_daterange($range,$begin,$end);
		$days_off = $this->days_off_by_date($range,$begin,$end);
		
		$result['days_off'] = $this->generate_days_off($days_off);
		
		if ($this->page['is_admin']) { 
			$result['events'] = $appointments;	
		} else {
			$result['events'] = $this->generate_events($appointments);
		}

		return $result;
	}

	public function generate_days_off($days_off)
	{
		$data_events = array();
		
		foreach ($days_off as $element) {
			$data_events[] = $element->date;
		}

		return $data_events;
	}

	public function generate_events($appointments)
	{
		$data_events = array();
		
		foreach ($appointments as $element) {
			$data_events[] = array(
        "id" => $element->id,
        "schedule" => $element->schedule
      );
		}

		return $data_events;
	}

}