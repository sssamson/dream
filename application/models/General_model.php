<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends ME_Model
{	
	function __construct()
	{
		parent::__construct();
	}

	public function products()
	{
		$sql = "SELECT * FROM products";
		$query = $this->db->query($sql);
		return  $query->result();
	}

	public function product_by_id($product_id)
	{
		$sql = "SELECT * FROM products WHERE id=?";
		$query = $this->db->query($sql,array($product_id));
		return  $query->row();
	}
	
}