<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends ME_Model
{	
	function __construct()
	{
		parent::__construct();
	}

	public function clients()
	{
		$sql = "SELECT * FROM clients";
		$query = $this->db->query($sql);
		return  $query->result();
	}

	public function client_by_id($client_id)
	{
		$sql = "SELECT * FROM clients WHERE id=?";
		$query = $this->db->query($sql,array($client_id));
		return  $query->row();
	}
	
	public function validate_login($type,$email,$password)
	{
		$sql = "SELECT * FROM clients WHERE 
							type=? AND
							email=? AND
							password=?";

		$query = $this->db->query($sql,array($type,$email,$password));
		$results = $query->row();

		if (!empty($results)) {
			return $results->id;
		} else {
			return FALSE;
		}
	}
}