<?php
class Dashboard extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
		//已載入helper('url')
    }
	
	public function index(){
		
		$this->load->view('template/content_head');
		$this->load->view('dashboard');
		$this->load->view('template/content_footer');
       
    }
}
?>