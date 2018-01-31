<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends ME_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function tasks()
	{
		$sql = "SELECT * FROM tasks";
		$query = $this->db->query($sql);
		return  $query->result();
	}

	public function task_by_id($task_id)
	{
		$sql = "SELECT * FROM tasks WHERE id=?";
		$query = $this->db->query($sql,array($task_id));
		return  $query->row();
	}

	public function client_tasks($client_id)
	{
		$sql = "SELECT * FROM tasks WHERE client_id=?";
		$query = $this->db->query($sql,array($client_id));
		return  $query->result();
	}

	public function client_task_by_id($task_id,$client_id)
	{
		$sql = "SELECT * FROM tasks WHERE id=? AND client_id=?";
		$query = $this->db->query($sql,array($task_id,$client_id));
		return  $query->row();
	}

	public function client_delete_task_by_id($task_id,$client_id)
	{
		$sql = "DELETE FROM tasks WHERE id=? AND cleint_id=?";
		$query = $this->db->query($sql,array($task_id,$client_id));
		return  $query->row();
	}

}
