<?php
class Menu_model extends CI_Model{
   
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
   
    function get_menu(){
		
		$this->db->where('amb_enable', 1);
		$this->db->order_by('amb_parent_f_amb asc, amb_order asc, amb_id asc'); 
        $query=$this->db->get('admin_menu_bar');
		
		return $query->result_array();
    }
   	function get_fncn($url)
	{
		$this->db->select('fn.amb_name as fn_name,cn.amb_name as cn_name,fn.amb_icon as fn_icon');
		$this->db->from('admin_menu_bar as cn');
		$this->db->join('admin_menu_bar as fn', 'cn.amb_parent_f_amb = fn.amb_id');
		$this->db->where('cn.amb_link', $url);
		$query = $this->db->get();
		return $query->row_array();
	}
   
}
?>