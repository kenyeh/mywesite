<?php
class Profile extends MY_Main 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->helper('url');
	}
	
	public function index()
	{
		
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('msg_name','Name','required');
		$this->form_validation->set_rules('msg_email','E-mail','required');
		$this->form_validation->set_rules('msg_msg','Your Message','required');
		

		
		if($this->form_validation->run()===FALSE)
		{
			$this->load->view('profile');

		}else
		{
			$this->add_message();
			redirect(base_url());
		}
		
		
	}
	
	public function add_message()
	{
		$data=array(
			"ctmg_created_ip"=>$this->input->ip_address(),
			"ctmg_created_time"=>date('Y-m-d H:i:s'),
			"ctmg_name"=>$this->input->post('msg_name'),
			"ctmg_email"=>$this->input->post('msg_email'),
			"ctmg_message"=>$this->input->post('msg_msg')
		);
		
		return $this->db->insert('contact_message',$data);
	}
}
?>