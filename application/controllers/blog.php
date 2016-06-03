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
	
	public function index($page = 1)
	{
		$per_page=5;
		$this->page_fn($per_page);//分頁設定
		
		$page_data['per_page']=$per_page;
		$page_data['start']=$per_page*($page-1);
		
		$show_all=false;
		if (!empty($this->session_name))
		{
			$show_all=true;
		}
		
		$data['banner_archives']=$this->blog_model->get_banner_archives();
		$data['recent_archives']=$this->blog_model->get_recent_articles($show_all);
		$data['archives']=$this->blog_model->get_articles($page_data,$show_all);
		$data['author_name']='KenYeh';
		$data['blog_index_title']='Never give up on a dream';
		$data['blog_index_description']='Just because of the time it will take to accomplish it. The time will pass anyway.';
		$hand_data['web_site']=' - '.$data['blog_index_title'];

		$this->load->view('blog/header',$hand_data);
		$this->load->view('blog/index',$data);
		$this->load->view('blog/footer');
	}
	
	public function view($archive_url)
	{
		$archive_id_code = array_pop(explode("-",$archive_url));//取得id_code
	
		$archive_id=$this->blog_model->ntk_decrypt($archive_id_code);//轉為ID
		
		$hand_data['archive_id_code']=$archive_id_code;
		
		$data['archive']=$this->blog_model->get_id_article($archive_id);
	
		$hand_data['web_site']=" - ".$data['archive']['bac_title'];
		
		if(empty($data['archive']))
		{
			show_404();
		}
		
		$this->load->view('blog/header',$hand_data);
		$this->load->view('blog/view',$data);
		$this->load->view('blog/footer');
	}
	
	public function post($id=null)
	{
		if(empty($this->session_name))
		{
			redirect(base_url('blog'));
		}
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$hand_data['web_site']=" - ".'新增文章';
		
		
		//預設欄位空白
		$data['archive_data']=array(
			'bac_id'=>"",
			'bac_banner'=>"",
			'bac_title'=>"",
			'bac_content'=>"",
			'bac_show'=>"",
			'bac_ShowOnIndex'=>"",
			'bac_f_blog_category'=>""
		);
		if(!empty($id))
		{
			$sql_id=$this->blog_model->ntk_decrypt($id);//轉為ID
			$data['archive_data']=$this->blog_model->get_id_article($sql_id);
			$hand_data['web_site']=" - ".'編輯文章';
		}
		
		$hand_data['edit_id']=$id;
		$data['edit_id']=$id;
		
		$this->form_validation->set_rules('title','標題','required');
		$this->form_validation->set_rules('text','內文','required');
		
		
		//--文章分類
		$data['category'] = $this->blog_model->get_all_category();
		
		
		if($this->form_validation->run()===FALSE)
		{
			$this->load->view('blog/header',$hand_data);
			$this->load->view('blog/post',$data);
			$this->load->view('blog/footer');

		}else
		{
			$edit_id=$this->input->post('id');
			if(empty($edit_id))
			{
				//new post
				$this->add_archive();
				redirect(base_url('blog'));
				
			}else
			{
				//edit post
				$edit_sql_id=$this->blog_model->ntk_decrypt($edit_id);//轉為ID
				$this->modify_archive($edit_sql_id);
				redirect(base_url('blog/'.$edit_id));
			}
		}
		
	}
	
	public function add_archive()
	{
		$data=array(
			"bac_title"=>$this->input->post('title'),
			"bac_created_time"=>date('Y-m-d H:i:s'),
			"bac_created_user"=>$this->session_name,
			"bac_content"=>$this->input->post("text"),
			"bac_banner"=>$this->input->post('banner'),
			"bac_show"=>$this->input->post('show'),
			"bac_ShowOnIndex"=>$this->input->post('ShowOnIndex'),
			"bac_f_blog_category"=>$this->input->post('category')
		);
		
		return $this->db->insert('blog_archives',$data);
	}
	
	public function modify_archive($id)
	{
		$data = array(
        	"bac_title"=>$this->input->post('title'),
			"bac_modified_time"=>date('Y-m-d H:i:s'),
			"bac_modified_user"=>$this->session_name,
			"bac_content"=>$this->input->post("text"),
			"bac_banner"=>$this->input->post('banner'),
			"bac_show"=>$this->input->post('show'),
			"bac_ShowOnIndex"=>$this->input->post('ShowOnIndex'),
			"bac_f_blog_category"=>$this->input->post('category')
        );
		
		$this->db->where('bac_id', $id);
		return $this->db->update('blog_archives', $data); 
		
	}
	
	
	public function login()
	{
		$id=$this->input->post('id');
		$pw=$this->input->post('pw');
		
		if($id=='kenyeh' && $pw=='kenyeh123')
		{
			$this->session->set_userdata('session_name', $id);
			echo "success";
		}else
		{
			echo "false";
		}
		
	}
	public function logout()
	{
		$this->session->sess_destroy();//清空session
	}
	
	public function page_fn($per_page)
	{
		//--分頁
		$total_rows = $this->blog_model->get_all_articles();
		$this->load->library('pagination');
		
		$config['base_url'] = base_url('blog/page/');
		$config['display_pages'] = FALSE;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['use_page_numbers'] = TRUE;
		
		$config['full_tag_open'] = '<ul class="pager">';
		$config['full_tag_close'] = '</ul>';
		
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		
		$config['next_link'] = '下一頁';
		$config['next_tag_open'] = '<li class="next">'; //自訂下一頁標籤
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = '上一頁';
		$config['prev_tag_open'] = '<li class="previous">';
		$config['prev_tag_close'] = '</li>';
		
		$this->pagination->initialize($config); 
		//--分頁
	}
	
	
	
}
?>