<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends ME_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function blogs($limit=0)
	{
		if (!empty($limit)) {
			$sql = "SELECT * FROM blogs ORDER BY date DESC LIMIT " . (int) $limit;
		} else {
			$sql = "SELECT * FROM blogs ORDER BY date DESC";
		}

		$query = $this->db->query($sql);
		return  $query->result();
	}

	public function blog_by_id($blog_id)
	{
		$sql = "SELECT * FROM blogs WHERE id=?";
		$query = $this->db->query($sql,array($blog_id));
		return  $query->row();
	}

	public function blogs_by_category($category_id)
	{
		$category_id = (int) $category_id;

		if (empty($category_id)) {
			$category_id = 0;
		}

		$sql = "SELECT * FROM blogs WHERE cat_id=?";
		$query = $this->db->query($sql,array($category_id));
		return  $query->result();
	}

	public function categories()
	{
		$sql = "SELECT * FROM blog_categories";
		$query = $this->db->query($sql);
		return  $query->result();
	}

	public function blog_category_by_id($category_id)
	{
		$sql = "SELECT * FROM blog_categories WHERE id=?";
		$query = $this->db->query($sql,array($category_id));
		return  $query->row();
	}

	public function can_update_category($category_name)
	{
		$sql = "SELECT name FROM blog_categories WHERE name=?";
		$query = $this->db->query($sql,array($category_name));
		$result  = $query->num_rows();

		if (empty($result)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
