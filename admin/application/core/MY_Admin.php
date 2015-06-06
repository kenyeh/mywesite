<?php
class MY_Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		
        $this->load->helper('url');
		
		//--驗證session
		$this->load->library('session');
		$session_id = $this->session->userdata('account_id');
		if(empty($session_id))
		{
			redirect(base_url('login'));//登出
		}
		//--
		
    }
    
     public function get_fn_cn()
     {
        
        $this->load->model('menu_model');
     	$url_ary=$this->menu_model->get_fncn(uri_string());
     	return $url_ary;
     }

}
?>