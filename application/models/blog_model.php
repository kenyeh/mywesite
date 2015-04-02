<?php
class Blog_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_archives($id = FALSE)
	{
		
		if($id === FALSE)
		{
			$this->db->order_by("bac_created_time", "desc");
			$query=$this->db->get('blog_archives');
			return $query->result_array();
		}

		$query = $this->db->get_where('blog_archives',array('bac_id'=>$id));
		return $query->row_array();
	}
	
	//流水號加密
	public function ntk_encrypt($txt, $key='key') 
	{ 
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$chars_len=strlen($chars)-1;
		$nh = rand(0,$chars_len); 
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

		$StaPos = strpos($Str, $StaKey);
		$EndPos = strpos($Str, $EndKey);
		$StaLen = strlen($StaKey);
		$EndLen = strlen($EndKey);

		$Catchstr = substr($Str, $StaPos + $StaLen , $EndPos - $StaPos - $EndLen);
		//$OtherKeyA = substr($Str, 0, $StaPos);
		//$OtherKeyB = substr($Str, $EndPos + $EndLen);
	
		return $StaKey.$Catchstr.$EndKey;
	}
}
?>