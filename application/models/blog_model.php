<?php
class Blog_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_articles($page_data,$show_all)
	{
		
		
		if(!$show_all)
		{
			$this->db->where('bac_show', 1);
		}
		
		$this->db->order_by("bac_created_time", "desc")
		->limit($page_data['per_page'], $page_data['start']);
		
		$this->db->join('blog_category', 'bac_f_blog_category = bcg_id','left');
		
		$query=$this->db->get('blog_archives');
		return $query->result_array();
	}
	
	public function get_recent_articles($show_all)
	{
		if(!$show_all)
		{
			$this->db->where('bac_show', 1);
		}
		
		$this->db
		->select('bac_id, bac_created_time, bac_title,bac_banner')
		->order_by("bac_created_time", "desc")
		->limit(10, 0);
		
		$query=$this->db->get('blog_archives');
		return $query->result_array();
	}
	
	public function get_banner_archives()
	{
		$this->db->where('bac_show', 1);
		$this->db->where('bac_ShowOnIndex', 1);
		
		$this->db
		->select('bac_id, bac_title,bac_banner,bac_content')
		->order_by("bac_created_time", "desc");
		
		$query=$this->db->get('blog_archives');
		return $query->result_array();
	}
	
	public function get_all_articles()
	{
		$query=$this->db->get('blog_archives');
		return $query->num_rows();
	}
	
	
	//取得所有分類
	public function get_all_category()
	{
		$query=$this->db->select('bcg_id, bcg_name')->get('blog_category');
		return $query->result_array();
	}
	
	public function get_id_article($id = FALSE)
	{
		
		if($id === FALSE)
		{
			return array();
		}

		$query = $this->db->join('blog_category', 'bac_f_blog_category = bcg_id','left')->get_where('blog_archives',array('bac_id'=>$id));
		return $query->row_array();
	}
	
	
	
	//流水號加密
	public function ntk_encrypt($txt, $key='key') 
	{ 
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$chars_len=strlen($chars)-1;
		//$nh = rand(0,$chars_len);//隨機要素
		$nh='26';
		$ch = $chars[$nh]; 
		$mdKey = md5($key.$ch); 
		$mdKey = substr($mdKey,$nh%8, $nh%8+7); 
		$txt = base64_encode($txt); 
		$tmp = ''; 
		$i=0;$j=0;$k = 0; 
		
		for ($i=0; $i<strlen($txt); $i++)
		{ 
			$k = $k == strlen($mdKey) ? 0 : $k; 
			$j = ($nh+strpos($chars,$txt[$i])+ord($mdKey[$k++]))%$chars_len; 
			$tmp .= $chars[$j]; 
		} 
		
		return $ch.$tmp; 
	} 
	//流水號解密
	public function ntk_decrypt($txt, $key='key') 
	{ 
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; 
		$chars_len=strlen($chars)-1;
		$ch = $txt[0]; 
		$nh = strpos($chars,$ch); 
		$mdKey = md5($key.$ch); 
		$mdKey = substr($mdKey,$nh%8, $nh%8+7); 
		$txt = substr($txt,1); 
		$tmp = ''; 
		$i=0;$j=0; $k = 0; 
		
		for ($i=0; $i<strlen($txt); $i++)
		{ 
			$k = $k == strlen($mdKey) ? 0 : $k; 
			$j = strpos($chars,$txt[$i])-$nh - ord($mdKey[$k++]); 
			while ($j<0) $j+=$chars_len; 
			$tmp .= $chars[$j]; 
		} 
		
		return base64_decode($tmp); 
	}
	
	public function show_first_part($Str)
	{
		$StaKey="<p>";
		$EndKey="</p>";

		$StaPos = mb_strpos($Str, $StaKey);
		$EndPos = mb_strpos($Str, $EndKey);
		$StaLen = mb_strlen($StaKey);
		$EndLen = mb_strlen($EndKey);

		$Catchstr = mb_substr($Str, $StaPos + $StaLen , ($EndPos - $StaPos - $EndLen)+1);
		$OtherKeyA = mb_substr($Str, 0, $StaPos);
		$OtherKeyB = mb_substr($Str, $EndPos + $EndLen);
		
		return $StaKey.$Catchstr.$EndKey;
	}
	
	
	
	
}
?>