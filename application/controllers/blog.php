<?php
class Blog extends MY_Main  
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->helper('url');
		$this->load->library('typography');
	}
	
	public function index()
	{
		$data['archives']=$this->blog_model->get_archives();
		$data['author_name']='Kenyeh';
		$data['title']='Blog archives';
		
		$this->load->view('blog/header');
		$this->load->view('blog/index',$data);
		$this->load->view('blog/footer');
	}
	
	public function view($archive_url)
	{
		$archive_id_code = array_pop(explode("-",$archive_url));//取得id_code
	
		$archive_id=$this->blog_model->ntk_decrypt($archive_id_code);//轉為ID
		
		
		$data['archive_id_code']=$archive_id_code;
		$data['archive']=$this->blog_model->get_archives($archive_id);
		//print_r($data['archive']);exit;
		if(empty($data['archive']))
		{
			show_404();
		}
		
		$this->load->view('blog/header');
		$this->load->view('blog/view',$data);
		$this->load->view('blog/footer');
	}
	
	public function post()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title']='Post a new archive';
		
		$this->form_validation->set_rules('title','標題','required');
		$this->form_validation->set_rules('text','內文','required');
		
		if($this->form_validation->run()===FALSE)
		{
			$this->load->view('blog/header');
			$this->load->view('blog/post');
			$this->load->view('blog/footer');

		}else
		{
			$this->add_archive();
			$this->index();
		}
	}
	
	public function add_archive()
	{
		
		$data=array(
			"bac_title"=>$this->input->post('title'),
			"bac_created_time"=>date('Y-m-d H:i:s'),
			"bac_created_user"=>"Kenyeh",
			"bac_content"=>$this->input->post("text")
		);
		
		return $this->db->insert('blog_archives',$data);
	}
	
	
	
}
?>