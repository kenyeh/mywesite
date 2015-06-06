<?php
class Admin_menu_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_archives($url)
	{

		$this->db->select('*');
		$this->db->from('admin_menu_bar as cn');
		$this->db->join('admin_menu_bar as fn', 'cn.amb_parent_f_amb = fn.amb_id');
		$this->db->where('cn.amb_link', $url);
		$query = $this->db->get();
	}
	
}
?>