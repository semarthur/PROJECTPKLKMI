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

	public function home_sort_urgency_normal(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->sort_data_urgency_normal()->result();	
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}

	public function home_sort_urgency_immedietly(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->sort_data_urgency_immedietly()->result();	
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}


	public function home_sort_approved_pending(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->sort_data_approved_pending()->result();	
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}

	public function home_sort_approved_asm(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->sort_data_approved_asm()->result();
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}

	public function home_sort_approved_dh(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->sort_data_approved_dh()->result();	
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}

	public function home_sort_process_np(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->sort_data_process_np()->result();	
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}

	public function home_sort_process_op(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->sort_data_process_op()->result();	
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}

	public function home_requester(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header_requester',$data);
		$data['form'] = $this->m_data->tampil_data()->result();
		$this->load->view('view_status_req',$data);
		$this->load->view('v_footer_requester',$data);
	}

	public function home_req_asm(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header_asm',$data);
		$data['form'] = $this->m_data->tampil_data()->result();
		$this->load->view('view_status_asm',$data);
		$this->load->view('v_footer_asm',$data);
	}

	public function home_req_asm_tampil_data_departemen(){	
		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

		if ($departemen_sekarang == "HRD"){
			$data['judul'] = "Status Check";
			$this->load->view('v_header_asm',$data);
			$data['form'] = $this->m_data->tampil_data_HRD()->result();
			$this->load->view('view_status_asm',$data);
			$this->load->view('v_footer_asm',$data);
		}else{
			echo "gagal maning";
		}
	}

	public function home_req_dh(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header_dh',$data);
		$data['form'] = $this->m_data->tampil_data()->result();
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
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}

	function search_req(){ 
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();
		$data['judul'] = "Status Check";
		$this->load->view('v_header_requester',$data);
		$this->load->view('view_status_req',$data);
		$this->load->view('v_footer_requester',$data);
	}

	function search_req_asm(){ 
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();
		$data['judul'] = "Status Check";
		$this->load->view('v_header_asm',$data);
		$this->load->view('view_status_asm',$data);
		$this->load->view('v_footer_asm',$data);
	}

	function search_req_dh(){ 
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();
		$data['judul'] = "Status Check";
		$this->load->view('v_header_dh',$data);
		$this->load->view('view_status_dh',$data);
		$this->load->view('v_footer_dh',$data);
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