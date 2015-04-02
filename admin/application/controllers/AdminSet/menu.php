<?php
class Admin_menu extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
		//已載入helper('url')
		
		$this->load->model('admin_menu_model');
    }
	
	public function index(){
		
		$this->load->view('template/layout');
       
    }
}
?>