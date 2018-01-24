<?php
class ME_Model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('image_lib');
	}

	public function save_image($img_form,$dir)
	{
		$data = array();
		
		$approved_types = $this->config->item('approved_folders');

		if (in_array($dir, $approved_types)) {

			$config['upload_path'] = $this->config->item('upload_folder').'/'.$dir;

			$config['allowed_types'] 			= 'gif|jpg|png';
			$config['file_ext_tolower'] 	= true;
			$config['file_name'] 					= date("U");
			
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload($img_form)) {
				$data = $this->upload->display_errors();
			} else {
				$data = $this->upload->data();
			}
		}

		return $data;
	
	}
	
	public function create_thumb_m($img_name, $img_ext)
	{
		$config['image_library'] 	= 'gd2';
		$config['source_image']		= $this->config->item('upload_folder').$img_name.$img_ext;
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		
		$config['thumb_marker']		= '_m';
		$config['width']	 		= 300;
		$config['height']			= 300;
		
		$this->image_lib->initialize($config);
		$this->image_lib->resize();		
		$this->image_lib->clear();
	}
	
	public function create_thumb_s($img_name, $img_ext)
	{
		$config['image_library'] 	= 'gd2';
		$config['source_image']		= $this->config->item('upload_folder').$img_name.$img_ext;
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		
		$config['thumb_marker']		= '_s';
		$config['width']	 		= 100;
		$config['height']			= 100;
		
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}

	public function db_update($db_obj)
	{	
		$db_update = array();

		foreach ($db_obj as $row=>$value) {
			// purge out other methods
			if (ctype_alpha($row[0])) {
				if ($row == 'id') {
					$update_id = $value;
				} elseif ($row == 'db_name') {
					$db_name = $value;
				} else {
					if (empty($value)) {
						$db_update[$row] = NULL;
					} else {
						$db_update[$row] = $value;
					}
				}
			}
		}		

		$this->db->where('id', $update_id);
		$this->db->update($db_name, $db_update); 
		$sql = $this->db->last_query();	
	}

	public function db_insert($db_name,$db_obj)
	{	
		$this->db->insert($db_name, $db_obj); 
	}

	public function db_delete($id, $db_name)
	{	
		if (!empty($id) && !empty($db_name)) {
			$this->db->where('id', $id);
			$this->db->delete($db_name); 
		}
	}
}