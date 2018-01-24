<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends ME_Model
{	
	function __construct()
	{
		parent::__construct();
	}

	public function all_pages()
	{
		$sql = "SELECT * FROM page";
		$query = $this->db->query($sql);
		return  $query->result();
	}

	public function page($tag)
	{
		if (empty($tag)) {
			$error_message = 'Page tag cannot be empty';
 			throw new Exception($error_message);
		}

		$page_header = $this->page_header_by_tag($tag);
		$page_elements = array();

		if (!empty($page_header->id)) {
			$page_elements = $this->page_elements($page_header->id);
		}

		$results = array(
								'page_header'=>$page_header,
								'page_elements'=>$page_elements);
		return $results;
	}

	public function element($element_id)
	{
		$page_element = $this->page_element($element_id);

		if (empty($page_element)) {
			$error_message = 'Page Element not Found';
 			throw new Exception($error_message);
		}

		$page_header = $this->page_header_by_id($page_element->page_id);
		
		if (empty($page_header)) {
			$error_message = 'Page not Found';
 			throw new Exception($error_message);
		}

		$results = array(
											'page_header'=>$page_header,
											'page_elements'=>$page_element);
		return $results;
	}

	public function page_header_by_tag($tag)
	{
		$sql = "SELECT * FROM page WHERE tag=?";
		$query = $this->db->query($sql,array($tag));
		return  $query->row();
	}

	public function page_header_by_id($page_id)
	{
		$sql = "SELECT * FROM page WHERE id=?";
		$query = $this->db->query($sql,array($page_id));
		return  $query->row();
	}

	public function page_elements($page_id)
	{
		$sql = "SELECT 
					page_elements.*, 
					page_categories.name as category 
				FROM page_elements
				LEFT JOIN page_categories ON page_elements.category_id = page_categories.id
				WHERE page_elements.page_id=?";

		$query = $this->db->query($sql,array($page_id));
		return $query->result();
	}

	public function page_element($element_id)
	{
		$sql = "SELECT 
							page_elements.*, 
							page_categories.name as category 
						FROM page_elements
						LEFT JOIN page_categories ON page_elements.category_id = page_categories.id
						WHERE page_elements.id=?";

		//$sql = "SELECT * FROM page_elements WHERE id=?";
		$query = $this->db->query($sql,array($element_id));
		return  $query->row();
	}

	public function get_tag_by_id($element_id)
	{
		$page_element = $this->page_element($element_id);
		$page = $this->page_header_by_id($page_element->page_id);
		return $page->tag;
	}	

	public function categories($page_id)
	{
		$sql = "SELECT * FROM page_categories WHERE page_id=?";
		$query = $this->db->query($sql,array($page_id));
		return $query->result();
	}

	public function category_by_id($cat_id)
	{
		$sql = "SELECT * FROM page_categories WHERE id=?";
		$query = $this->db->query($sql,array($cat_id));
		return $query->row();
	}

	public function post_element_category($page_id, $category) 
	{
		if (is_numeric($category)) {
			
			$cat_id = $category;

		} else {

			$sql_values = array(
			  'page_id' => $page_id,
			  'name' 		=> $category
			);

			$results = $this->db_insert('page_categories',$sql_values);
			$cat_id = $this->db->insert_id();
		}

		return $cat_id;
	}

	public function ui_permissions($tag) {
		$ui = array();
		$config = '12474_'.$tag;
		if (!empty($this->config->item($config))) {
		  $ui = $this->config->item($config);
		} else {
		  $ui = $this->config->item('12474_full_permissions');
		}
		return $ui;
	}
}