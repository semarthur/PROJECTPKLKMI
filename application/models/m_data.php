<?php 

class M_data extends CI_Model{
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function tampil_data(){
		return $this->db->get('form');
	}
	function check_login($email,$password){		
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		return $this->db->get('account')->row();
	}

	function search_ticket($search){
		return $this->db->query("select * from form where noticket LIKE \"%$search%\"");
	}

	function edit_status($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_status($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	/*function get_noticket($get_noticket){
		return $this->db->query("select * from form where noticket = \"$get_noticket\"");
	}*/
}