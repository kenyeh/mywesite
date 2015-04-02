<?php
class Login_model extends CI_Model{
   
    function __construct() {
        parent::__construct();
         $this->load->database();
    }
   
    function get_login($array){
        $query = $this->db->where($array)->get('admin_account');
		
		if($query->num_rows() > 0)
		{
			return $query;
		}else
		{
			return false;
		}

    }
   
}
?>