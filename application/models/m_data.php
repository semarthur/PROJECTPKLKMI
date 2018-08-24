<?php 

class M_data extends CI_Model{
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function tampil_data(){
		return $this->db->query("select * from form UNION select * from form_na");
	}

	function tampil_data_HRD(){
		return $this->db->query("select * from form where dari LIKE 'HRD' UNION select * from form_na where dari LIKE 'HRD' UNION select * from form_done where dari LIKE 'HRD'");
	}

	function tampil_data_FA(){
		return $this->db->query("select * from form where dari LIKE 'Financial & Accounting' UNION select * from form_na where dari LIKE 'Financial & Accounting' UNION select * from form_done where dari LIKE 'Financial & Accounting'");
	}

	function tampil_data_done(){
		return $this->db->query("select * from form_done");
	}

	function check_login($email,$password){		
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		return $this->db->get('account')->row();
	}

	function searchbox($noticket,$name,$from,$case,$status){
		if($noticket != 0){
			return $query = $this->db->query("select * from form WHERE noticket LIKE \"%$noticket%\" AND nama LIKE \"%$name%\" AND dari LIKE \"%$from%\" AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_na WHERE noticket LIKE \"%$noticket%\" AND nama LIKE \"%$name%\" AND dari LIKE \"%$from%\" AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\"");
		} else {
			return $query = $this->db->query("select * from form WHERE nama LIKE \"%$name%\" AND dari LIKE \"%$from%\" AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_na WHERE nama LIKE \"%$name%\" AND dari LIKE \"%$from%\" AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\"");			
		}
	}

	function searchbox_HRD($noticket,$name,$from,$case,$status){
		if($noticket != 0){
			return $query = $this->db->query("select * from form WHERE noticket LIKE \"%$noticket%\" AND nama LIKE \"%$name%\" AND dari LIKE 'HRD' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_na WHERE noticket LIKE \"%$noticket%\" AND nama LIKE \"%$name%\" AND dari LIKE 'HRD' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_done WHERE noticket LIKE \"%$noticket%\" AND nama LIKE \"%$name%\" AND dari LIKE 'HRD' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\"");
		} else {
			return $query = $this->db->query("select * from form WHERE nama LIKE \"%$name%\" AND dari LIKE 'HRD' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_na WHERE nama LIKE \"%$name%\" AND dari LIKE 'HRD' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_done WHERE nama LIKE \"%$name%\" AND dari LIKE 'HRD' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\"");			
		}
	}

	function searchbox_FA($noticket,$name,$from,$case,$status){
		if($noticket != 0){
			return $query = $this->db->query("select * from form WHERE noticket LIKE \"%$noticket%\" AND nama LIKE \"%$name%\" AND dari LIKE 'Financial & Accounting' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_na WHERE noticket LIKE \"%$noticket%\" AND nama LIKE \"%$name%\" AND dari LIKE 'Financial & Accounting' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_done WHERE noticket LIKE \"%$noticket%\" AND nama LIKE \"%$name%\" AND dari LIKE 'Financial & Accounting' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\"");
		} else {
			return $query = $this->db->query("select * from form WHERE nama LIKE \"%$name%\" AND dari LIKE 'Financial & Accounting' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_na WHERE nama LIKE \"%$name%\" AND dari LIKE 'Financial & Accounting' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\" UNION select * from form_done WHERE nama LIKE \"%$name%\" AND dari LIKE 'Financial & Accounting' AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\"");			
		}
	}

	function search_ticket($search){
		return $this->db->query("select * from form where noticket LIKE \"%$search%\"");
	}

	function searchbox_history($noticket,$name,$from,$case,$status){
		if($noticket != 0){
			return $query = $this->db->query("select * from form_done WHERE noticket LIKE \"%$noticket%\" AND nama LIKE \"%$name%\" AND dari LIKE \"%$from%\" AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\"");
		} else {
			return $query = $this->db->query("select * from form_done WHERE nama LIKE \"%$name%\" AND dari LIKE \"%$from%\" AND kasus LIKE \"%$case%\" AND process LIKE \"%$status%\"");			
		}
	}

	function edit_status($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_status($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function get_noticket($where){		
		return $this->db->get_where('form',$where);
	}

	function get_e_mail($where){		
		return $this->db->get_where('form',$where);
	} 

	function get($table){
		return $this->db->get($table);
	}

	function get_jabatan_sekarang($email){
		return $this->db->query("select id_jabatan,Departemen from account where email LIKE \"%$email%\"");
	}

	function get_higher_jabatan($id_jabatan, $departemen){
		return $this->db->query("select * from account where id_jabatan LIKE \"%$id_jabatan%\" AND Departemen LIKE \"%$departemen%\"");
	}

	function pindah_table($where,$data,$table){
		$this->db->where($where);
		$q = $this->db->get('form')->result();
		foreach ($q as $r) { 
        	$this->db->insert('form_done', $r); 
    	}
    	$this->db->where($where);
    	$this->db->delete('form');
	}

	function pindah_table_na($where,$data,$table){
		$this->db->where($where);
		$q = $this->db->get('form')->result();
		foreach ($q as $r) { 
        	$this->db->insert('form_na', $r);
    	}
    	$this->db->where($where);
    	$this->db->delete('form');
	}

}