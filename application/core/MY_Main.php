<?php
class MY_Main extends CI_Controller
{
    public $session_name;
	
    public function __construct()
    {
        parent::__construct();
        
        //--驗證session
		$this->load->library('session');
		$this->session_name = $this->session->userdata('session_name');
		
		//--
		
    }
	
	
}
?>