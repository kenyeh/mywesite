<?php
class Admin_center extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('menu_model');
		//已載入helper('url')
    }
	
	public function index($file_name='member',$class_name='dashboard'){
		
		$data['menu']=$this->menu_data();
		
		
		
		$data['fn']=$file_name;
		$data['cn']=$class_name;
		$this->load->view('template/layout',$data);
       
    }
	
	public function menu_data()
	{
		$query_data = $this->menu_model->get_menu();
		
		$menu_ary=array();
		
		
		//先分層級
		foreach($query_data as $v)
		{

			if($v['amb_parent_f_amb']==0)
			{
				$menu_ary[$v['amb_id']]=array(
				'name'=>$v['amb_name'],
				'link'=>$v['amb_link'],
				'action'=>array()
				);
			}else
			{
				$menu_ary[$v['amb_parent_f_amb']]['action'][$v['amb_id']]=array(
				'name'=>$v['amb_name'],
				'link'=>$v['amb_link']
				);
			}
		}
		
		
		
		return $menu_ary;
	}
}
?>