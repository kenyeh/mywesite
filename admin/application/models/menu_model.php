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
   
}
?>