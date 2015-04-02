<?php
class Login_class extends CI_Controller{
   
    function __construct() {
        parent::__construct();
        //載入資料庫行為
        $this->load->model('login_model');
		
        $this->load->library('session');
		
		
        $this->load->helper('url');
    }
   
   
	
	public function logout($msg=''){
		
		$data=array('alert_type'=>$msg);
		$this->session->sess_destroy();//清空session
		
        $this->load->view('signin',$data);
    }
   
    public function login(){
	
		
		
        $post_data = $this->input->post();
		$sql_data=array();
		$sql_data['aac_account']=$post_data['signin_account'];
		$sql_data['aac_password']=md5($post_data['signin_password']);
        $query_data = $this->login_model->get_login($sql_data);
		
		if($query_data===FALSE)
		{
			//帳號密碼錯誤
			redirect(base_url('/login/error'));
		}else
		{
			//登入成功
			$account_data=$query_data->row_array();

			$this->session->set_userdata('account_id', $account_data['aac_id']);
			$this->session->set_userdata('account_name', $account_data['aac_account']);
			
			redirect(base_url('admin_center'));
			
		}
		
    }
   
    
   
}
?>