<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('m_data');
	}

	public function index(){		
		$this->load->view('view_login');
	}

	public function home(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->tampil_data()->result();
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}

	public function home_requester(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header_requester',$data);

		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['form'] = $this->m_data->tampil_data_HRD()->result();
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['form'] = $this->m_data->tampil_data_FA()->result();
			}else {
				echo "404";
			}

		$this->load->view('view_status_req',$data);
		$this->load->view('v_footer_requester',$data);
	}

	public function home_req_asm(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header_asm',$data);

		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['form'] = $this->m_data->tampil_data_HRD()->result();
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['form'] = $this->m_data->tampil_data_FA()->result();
			}else {
				echo "404";
			}
		
		$this->load->view('view_status_asm',$data);
		$this->load->view('v_footer_asm',$data);
	}

	public function home_req_dh(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header_dh',$data);

		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['form'] = $this->m_data->tampil_data_HRD()->result();
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['form'] = $this->m_data->tampil_data_FA()->result();
			}else {
				echo "404";
			}

		$this->load->view('view_status_dh',$data);
		$this->load->view('v_footer_dh',$data);
	}

	public function change_status(){
		$noticket = $this->input->get('search');
		$data['judul'] = "Change Status";
		$this->load->view('v_header',$data);
		if(is_null($noticket)){
			$data['form'] = $this->m_data->search_ticket("kosong")->result();
		} else {
			$data['form'] = $this->m_data->search_ticket($noticket)->result();
		}
		$this->load->view('view_change',$data);
		$this->load->view('v_footer',$data);
	}

	public function change_approval_asm(){
		$noticket = $this->input->get('search');
		$data['judul'] = "Change Status Approval";
		$this->load->view('v_header_asm',$data);
		if(is_null($noticket)){
			$data['form'] = $this->m_data->search_ticket("kosong")->result();
		} else {
			$data['form'] = $this->m_data->search_ticket($noticket)->result();
		}
		$this->load->view('view_approval_asm',$data);
		$this->load->view('v_footer_asm',$data);
	}

	public function change_approval_dh(){
		$noticket = $this->input->get('search');
		$data['judul'] = "Change Status Approval";
		$this->load->view('v_header_dh',$data);
		if(is_null($noticket)){
			$data['form'] = $this->m_data->search_ticket("kosong")->result();
		} else {
			$data['form'] = $this->m_data->search_ticket($noticket)->result();
		}
		$this->load->view('view_approval_dh',$data);
		$this->load->view('v_footer_dh',$data);
	}

	public function history(){		
		$data['judul'] = "History";
		$this->load->view('v_header',$data);
		$data['form_done'] = $this->m_data->tampil_data_done()->result();
		$this->load->view('view_history',$data);
		$this->load->view('v_footer',$data);
	}

	public function form(){		
		$data['judul'] = "Create New Form";
		$this->load->view('v_header',$data);
		$this->load->view('view_form',$data);
		$this->load->view('v_footer',$data);
	}

	public function form_requester(){		
		$data['judul'] = "Create New Form";
		$this->load->view('v_header_requester',$data);
		$this->load->view('view_form_requester',$data);
		$this->load->view('v_footer_requester',$data);
	}

	public function form_req_asm(){		
		$data['judul'] = "Create New Form";
		$this->load->view('v_header_asm',$data);
		$this->load->view('view_form_asm',$data);
		$this->load->view('v_footer_asm',$data);
	}

	public function form_req_dh(){		
		$data['judul'] = "Create New Form";
		$this->load->view('v_header_dh',$data);
		$this->load->view('view_form_dh',$data);
		$this->load->view('v_footer_dh',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('view_login');
	}

	public function check_login(){
		if(isset($_POST['Login'])){
			$email = $this->input->post('email',true);
			$password = $this->input->post('password',true);
			$check = $this->m_data->check_login($email,$password);
			if($check > 0){
			$data_session = array(
				'email' => $email
				);
			$this->session->set_userdata($data_session);
			}
			$result = count($check);
			if($result > 0){
				$pelogin = $this->db->get_where('account',array('email' => $email, 'password' => $password))->row();
				if($pelogin->Jabatan == 'Staff' && $pelogin->Departemen == 'Information System'){
					redirect('web/home');
				}elseif($pelogin->Jabatan == 'Assistant Manager' && $pelogin->Departemen == 'Information System'){
					redirect('web/home');
				}elseif($pelogin->Jabatan == 'Dept Head' && $pelogin->Departemen == 'Information System'){
					redirect('web/home');
				}elseif($pelogin->Jabatan == 'Staff'){
					redirect('web/home_requester');
				}elseif($pelogin->Jabatan == 'Assistant Manager'){
					redirect('web/home_req_asm');
				}elseif($pelogin->Jabatan == 'Dept Head'){
					redirect('web/home_req_dh');
				}
			}else{
				redirect('web/index');
			}
		}else{
			echo "KAMU TIDAK TERDAFTAR";
		}
	}

	function search(){
		$noticket = (int)$this->input->get('noticket');
		$name = $this->input->get('name');
		$from = $this->input->get('from');
		$case = $this->input->get('case');
		$status = $this->input->get('status');
		$data['form'] = $this->m_data->searchbox($noticket,$name,$from,$case,$status)->result();
		$data['judul'] = "Status Check";
		$searchbox = array(
			'noticket' => $noticket,
			'from' => $from,
			'name' => $name,
			'case' => $case,
			'status' => $status
		);
		$this->session->set_userdata($searchbox);
		if($noticket == 0) {
    		$this->session->set_userdata('noticket',null);
		} else {
			$this->session->set_userdata('noticket',$noticket);
		}
		$this->load->view('v_header',$data);
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
		$this->session->sess_destroy();
	}

	function download(){
		$query = $this->db->query("select * from form");
			$this->load->dbutil();
			$this->load->helper('file');
			$this->load->helper('download');
			$delimiter = ",";
			$newline = "\r\n";
			$filename = "REQ_FORM".date("Y_m_d").'.csv';

			header('Content-type:text/csv');
			header('Content-Disposition: attachment;filename='.$filename);
			header('Cache-Control: no-store, no-cache, must-revalidate');
			header('Cache-Control: post-check=0, pre-check=0');
			header('Pragma: no-cache');
			header('Expires:0');

			$handle = fopen('php://output','w');

			fputcsv($handle, array(
				'noticket',
				'nama',
				'dari',
				'e_mail',
				'untuk',
				'date',
				'kasus',
				'duty',
				'dateoec',
				'systemint',
				'urgency',
				'description',
				'approvalstatus',
				'process'));

			$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			foreach ($data as $key => $row){
				fputcsv($handle, $row);
			} fclose($handle);
			exit;
	}

	function search_req(){ 
		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$noticket = (int)$this->input->get('noticket');
				$name = $this->input->get('name');
				$from = $this->input->get('from');
				$case = $this->input->get('case');
				$status = $this->input->get('status');
				$data['form'] = $this->m_data->searchbox_HRD($noticket,$name,$from,$case,$status)->result();
				$data['judul'] = "Status Check";
				$searchbox = array(
					'noticket' => $noticket,
					'from' => $from,
					'name' => $name,
					'case' => $case,
					'status' => $status
				);
				$this->session->set_userdata($searchbox);
				if($noticket == 0) {
    				$this->session->set_userdata('noticket',null);
				} else {
					$this->session->set_userdata('noticket',$noticket);
				}
				$this->load->view('v_header_requester',$data);
				$this->load->view('view_status_req',$data);
				$this->load->view('v_footer_requester',$data);
				$this->session->sess_destroy();
			}else if($departemen_sekarang == "Financial & Accounting"){
				$noticket = (int)$this->input->get('noticket');
				$name = $this->input->get('name');
				$from = $this->input->get('from');
				$case = $this->input->get('case');
				$status = $this->input->get('status');
				$data['form'] = $this->m_data->searchbox_FA($noticket,$name,$from,$case,$status)->result();
				$data['judul'] = "Status Check";
				$searchbox = array(
					'noticket' => $noticket,
					'from' => $from,
					'name' => $name,
					'case' => $case,
					'status' => $status
				);
				$this->session->set_userdata($searchbox);
				if($noticket == 0) {
    				$this->session->set_userdata('noticket',null);
				} else {
					$this->session->set_userdata('noticket',$noticket);
				}
				$this->load->view('v_header_requester',$data);
				$this->load->view('view_status_req',$data);
				$this->load->view('v_footer_requester',$data);
				$this->session->sess_destroy();
			}else{
				echo "404";
			}
	}

	function search_req_asm(){ 
		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$noticket = (int)$this->input->get('noticket');
				$name = $this->input->get('name');
				$from = $this->input->get('from');
				$case = $this->input->get('case');
				$status = $this->input->get('status');
				$data['form'] = $this->m_data->searchbox_HRD($noticket,$name,$from,$case,$status)->result();
				$data['judul'] = "Status Check";
				$searchbox = array(
					'noticket' => $noticket,
					'from' => $from,
					'name' => $name,
					'case' => $case,
					'status' => $status
				);
				$this->session->set_userdata($searchbox);
				if($noticket == 0) {
    				$this->session->set_userdata('noticket',null);
				} else {
					$this->session->set_userdata('noticket',$noticket);
				}
				$this->load->view('v_header_asm',$data);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
				$this->session->sess_destroy();
			}else if($departemen_sekarang == "Financial & Accounting"){
				$noticket = (int)$this->input->get('noticket');
				$name = $this->input->get('name');
				$from = $this->input->get('from');
				$case = $this->input->get('case');
				$status = $this->input->get('status');
				$data['form'] = $this->m_data->searchbox_FA($noticket,$name,$from,$case,$status)->result();
				$data['judul'] = "Status Check";
				$searchbox = array(
					'noticket' => $noticket,
					'from' => $from,
					'name' => $name,
					'case' => $case,
					'status' => $status
				);
				$this->session->set_userdata($searchbox);
				if($noticket == 0) {
    				$this->session->set_userdata('noticket',null);
				} else {
					$this->session->set_userdata('noticket',$noticket);
				}
				$this->load->view('v_header_asm',$data);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
				$this->session->sess_destroy();
			}else{
				echo "404";
			}
	}

	function search_req_dh(){ 
		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$noticket = (int)$this->input->get('noticket');
				$name = $this->input->get('name');
				$from = $this->input->get('from');
				$case = $this->input->get('case');
				$status = $this->input->get('status');
				$data['form'] = $this->m_data->searchbox_HRD($noticket,$name,$from,$case,$status)->result();
				$data['judul'] = "Status Check";
				$searchbox = array(
					'noticket' => $noticket,
					'from' => $from,
					'name' => $name,
					'case' => $case,
					'status' => $status
				);
				$this->session->set_userdata($searchbox);
				if($noticket == 0) {
    				$this->session->set_userdata('noticket',null);
				} else {
					$this->session->set_userdata('noticket',$noticket);
				}
				$this->load->view('v_header_dh',$data);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
				$this->session->sess_destroy();
			}else if($departemen_sekarang == "Financial & Accounting"){
				$noticket = (int)$this->input->get('noticket');
				$name = $this->input->get('name');
				$from = $this->input->get('from');
				$case = $this->input->get('case');
				$status = $this->input->get('status');
				$data['form'] = $this->m_data->searchbox_FA($noticket,$name,$from,$case,$status)->result();
				$data['judul'] = "Status Check";
				$searchbox = array(
					'noticket' => $noticket,
					'from' => $from,
					'name' => $name,
					'case' => $case,
					'status' => $status
				);
				$this->session->set_userdata($searchbox);
				if($noticket == 0) {
    				$this->session->set_userdata('noticket',null);
				} else {
					$this->session->set_userdata('noticket',$noticket);
				}
				$this->load->view('v_header_dh',$data);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
				$this->session->sess_destroy();
			}else{
				echo "404";
			}
	}

	function search_change(){ 
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();
		$data['judul'] = "Change Status";
		$this->load->view('v_header',$data);
		$this->load->view('view_change',$data);
		$this->load->view('v_footer',$data);
	}

	function search_change_approval(){ 
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();
		$data['judul'] = "Change Status Approval";
		$this->load->view('v_header_asm',$data);
		$this->load->view('view_approval_asm',$data);
		$this->load->view('v_footer_asm',$data);
	}

	function search_change_approval_dh(){ 
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();
		$data['judul'] = "Change Status Approval";
		$this->load->view('v_header_dh',$data);
		$this->load->view('view_approval_dh',$data);
		$this->load->view('v_footer_dh',$data);
	}

	function search_history(){ 
		$search = $this->input->get('search');
		$data['form_done'] = $this->m_data->search_ticket_done($search)->result();
		$data['judul'] = "History";
		$this->load->view('v_header',$data);
		$this->load->view('view_history',$data);
		$this->load->view('v_footer',$data);
	}

}