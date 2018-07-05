<?php 

class M_data extends CI_Model{
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function tampil_data(){
		return $this->db->get('form');
	}
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function search_ticket($search){
		return $this->db->query("select * from form where noticket LIKE \"%$search%\"");
	}
}