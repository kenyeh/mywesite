<?php
class Dashboard extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
		//已載入helper('url')
    }
	
	public function index(){
	    $fn_cn_ary=$this->get_fn_cn();
	    $data['fn']=$fn_cn_ary['fn_name'];
	    $data['cn']=$fn_cn_ary['cn_name'];
	    $data['icon']=$fn_cn_ary['fn_icon'];
		
		$this->load->view('template/content_head',$data);
		$this->load->view(uri_string());
		$this->load->view('template/content_footer');
       
    }
}
?>