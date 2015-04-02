<?php
class Admin_menu_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_archives($id = FALSE)
	{
		
		if($id === FALSE)
		{
			$this->db->order_by("bac_created_time", "desc");
			$query=$this->db->get('blog_archives');
			return $query->result_array();
		}

		$query = $this->db->get_where('blog_archives',array('bac_id'=>$id));
		return $query->row_array();
	}
	
}
?>