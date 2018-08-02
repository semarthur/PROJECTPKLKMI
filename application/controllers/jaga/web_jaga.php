<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, OPTIONS");
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
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}

	public function home_sort(){
		$sort = $this->input->get('sort');
		if($sort == "Urgency Normal"){
			$data['judul'] = "Status Check";
			$this->load->view('v_header',$data);
			$data['form'] = $this->m_data->sort_data_urgency_normal()->result();
			$data_urgency_normal = $this->m_data->sort_data_urgency_normal()->result();
			$data_urgency_immedietly = $this->m_data->sort_data_urgency_immedietly()->result();
			$data_approved_pending = $this->m_data->sort_data_approved_pending()->result();
			$data_approved_asm = $this->m_data->sort_data_approved_asm()->result();
			$data_approved_dh = $this->m_data->sort_data_approved_dh()->result();
			$data_process_np = $this->m_data->sort_data_process_np()->result();
			$data_process_op = $this->m_data->sort_data_process_op()->result();
			$data['count_urgency_normal'] = count($data_urgency_normal);
			$data['count_urgency_immedietly'] = count($data_urgency_immedietly);
			$data['count_approved_pending'] = count($data_approved_pending);
			$data['count_approved_asm'] = count($data_approved_asm);
			$data['count_approved_dh'] = count($data_approved_dh);
			$data['count_process_np'] = count($data_process_np);
			$data['count_process_op'] = count($data_process_op);
			$this->load->view('view_status',$data);
			$this->load->view('v_footer',$data);
		}else if($sort == "Urgency Immedietly"){
			$data['judul'] = "Status Check";
			$this->load->view('v_header',$data);
			$data['form'] = $this->m_data->sort_data_urgency_immedietly()->result();
			$data_urgency_normal = $this->m_data->sort_data_urgency_normal()->result();
			$data_urgency_immedietly = $this->m_data->sort_data_urgency_immedietly()->result();
			$data_approved_pending = $this->m_data->sort_data_approved_pending()->result();
			$data_approved_asm = $this->m_data->sort_data_approved_asm()->result();
			$data_approved_dh = $this->m_data->sort_data_approved_dh()->result();
			$data_process_np = $this->m_data->sort_data_process_np()->result();
			$data_process_op = $this->m_data->sort_data_process_op()->result();
			$data['count_urgency_normal'] = count($data_urgency_normal);
			$data['count_urgency_immedietly'] = count($data_urgency_immedietly);
			$data['count_approved_pending'] = count($data_approved_pending);
			$data['count_approved_asm'] = count($data_approved_asm);
			$data['count_approved_dh'] = count($data_approved_dh);
			$data['count_process_np'] = count($data_process_np);
			$data['count_process_op'] = count($data_process_op);	
			$this->load->view('view_status',$data);
			$this->load->view('v_footer',$data);
		}else if ($sort == "Approved Pending"){
			$data['judul'] = "Status Check";
			$this->load->view('v_header',$data);
			$data['form'] = $this->m_data->sort_data_approved_pending()->result();
			$data_urgency_normal = $this->m_data->sort_data_urgency_normal()->result();
			$data_urgency_immedietly = $this->m_data->sort_data_urgency_immedietly()->result();
			$data_approved_pending = $this->m_data->sort_data_approved_pending()->result();
			$data_approved_asm = $this->m_data->sort_data_approved_asm()->result();
			$data_approved_dh = $this->m_data->sort_data_approved_dh()->result();
			$data_process_np = $this->m_data->sort_data_process_np()->result();
			$data_process_op = $this->m_data->sort_data_process_op()->result();
			$data['count_urgency_normal'] = count($data_urgency_normal);
			$data['count_urgency_immedietly'] = count($data_urgency_immedietly);
			$data['count_approved_pending'] = count($data_approved_pending);
			$data['count_approved_asm'] = count($data_approved_asm);
			$data['count_approved_dh'] = count($data_approved_dh);
			$data['count_process_np'] = count($data_process_np);
			$data['count_process_op'] = count($data_process_op);
			$this->load->view('view_status',$data);
			$this->load->view('v_footer',$data);
		}else if($sort == "Approved by A. Manager"){
			$data['judul'] = "Status Check";
			$this->load->view('v_header',$data);
			$data['form'] = $this->m_data->sort_data_approved_asm()->result();
			$data_urgency_normal = $this->m_data->sort_data_urgency_normal()->result();
			$data_urgency_immedietly = $this->m_data->sort_data_urgency_immedietly()->result();
			$data_approved_pending = $this->m_data->sort_data_approved_pending()->result();
			$data_approved_asm = $this->m_data->sort_data_approved_asm()->result();
			$data_approved_dh = $this->m_data->sort_data_approved_dh()->result();
			$data_process_np = $this->m_data->sort_data_process_np()->result();
			$data_process_op = $this->m_data->sort_data_process_op()->result();
			$data['count_urgency_normal'] = count($data_urgency_normal);
			$data['count_urgency_immedietly'] = count($data_urgency_immedietly);
			$data['count_approved_pending'] = count($data_approved_pending);
			$data['count_approved_asm'] = count($data_approved_asm);
			$data['count_approved_dh'] = count($data_approved_dh);
			$data['count_process_np'] = count($data_process_np);
			$data['count_process_op'] = count($data_process_op);
			$this->load->view('view_status',$data);
			$this->load->view('v_footer',$data);
		}else if($sort == "Approved by Dept. Head"){
			$data['judul'] = "Status Check";
			$this->load->view('v_header',$data);
			$data['form'] = $this->m_data->sort_data_approved_dh()->result();
			$data_urgency_normal = $this->m_data->sort_data_urgency_normal()->result();
			$data_urgency_immedietly = $this->m_data->sort_data_urgency_immedietly()->result();
			$data_approved_pending = $this->m_data->sort_data_approved_pending()->result();
			$data_approved_asm = $this->m_data->sort_data_approved_asm()->result();
			$data_approved_dh = $this->m_data->sort_data_approved_dh()->result();
			$data_process_np = $this->m_data->sort_data_process_np()->result();
			$data_process_op = $this->m_data->sort_data_process_op()->result();
			$data['count_urgency_normal'] = count($data_urgency_normal);
			$data['count_urgency_immedietly'] = count($data_urgency_immedietly);
			$data['count_approved_pending'] = count($data_approved_pending);
			$data['count_approved_asm'] = count($data_approved_asm);
			$data['count_approved_dh'] = count($data_approved_dh);
			$data['count_process_np'] = count($data_process_np);
			$data['count_process_op'] = count($data_process_op);
			$this->load->view('view_status',$data);
			$this->load->view('v_footer',$data);
		}else if($sort == "Not Processed"){
			$data['judul'] = "Status Check";
			$this->load->view('v_header',$data);
			$data['form'] = $this->m_data->sort_data_process_np()->result();
			$data_urgency_normal = $this->m_data->sort_data_urgency_normal()->result();
			$data_urgency_immedietly = $this->m_data->sort_data_urgency_immedietly()->result();
			$data_approved_pending = $this->m_data->sort_data_approved_pending()->result();
			$data_approved_asm = $this->m_data->sort_data_approved_asm()->result();
			$data_approved_dh = $this->m_data->sort_data_approved_dh()->result();
			$data_process_np = $this->m_data->sort_data_process_np()->result();
			$data_process_op = $this->m_data->sort_data_process_op()->result();
			$data['count_urgency_normal'] = count($data_urgency_normal);
			$data['count_urgency_immedietly'] = count($data_urgency_immedietly);
			$data['count_approved_pending'] = count($data_approved_pending);
			$data['count_approved_asm'] = count($data_approved_asm);
			$data['count_approved_dh'] = count($data_approved_dh);
			$data['count_process_np'] = count($data_process_np);
			$data['count_process_op'] = count($data_process_op);
			$this->load->view('view_status',$data);
			$this->load->view('v_footer',$data);
		}else if($sort == "On Process"){
			$data['judul'] = "Status Check";
			$this->load->view('v_header',$data);
			$data['form'] = $this->m_data->sort_data_process_op()->result();
			$data_urgency_normal = $this->m_data->sort_data_urgency_normal()->result();
			$data_urgency_immedietly = $this->m_data->sort_data_urgency_immedietly()->result();
			$data_approved_pending = $this->m_data->sort_data_approved_pending()->result();
			$data_approved_asm = $this->m_data->sort_data_approved_asm()->result();
			$data_approved_dh = $this->m_data->sort_data_approved_dh()->result();
			$data_process_np = $this->m_data->sort_data_process_np()->result();
			$data_process_op = $this->m_data->sort_data_process_op()->result();
			$data['count_urgency_normal'] = count($data_urgency_normal);
			$data['count_urgency_immedietly'] = count($data_urgency_immedietly);
			$data['count_approved_pending'] = count($data_approved_pending);
			$data['count_approved_asm'] = count($data_approved_asm);
			$data['count_approved_dh'] = count($data_approved_dh);
			$data['count_process_np'] = count($data_process_np);
			$data['count_process_op'] = count($data_process_op);
			$this->load->view('view_status',$data);
			$this->load->view('v_footer',$data);
		}else{
			echo "404";
		}
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
			}else{
				echo "404";
			}

		$this->load->view('view_status_req',$data);
		$this->load->view('v_footer_requester',$data);
	}

	public function home_req_asm(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header_asm',$data);
		$data['form'] = $this->m_data->tampil_data()->result();

		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
			}else{
				echo "404";
			}
		
		$this->load->view('view_status_asm',$data);
		$this->load->view('v_footer_asm',$data);
	}

	public function home_sort_asm(){
		$sort = $this->input->get('sort');
		if($sort == "Your Departement"){
			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_asm',$data);
				$data['form'] = $this->m_data->tampil_data_HRD()->result();
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_asm',$data);
				$data['form'] = $this->m_data->tampil_data_FA()->result();
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
			}else{
				echo "404";
			}
		}else if($sort == "Approval Pending"){
			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_asm',$data);
				$data['form'] = $this->m_data->approved_pending_HRD()->result();
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_asm',$data);
				$data['form'] = $this->m_data->approved_pending_FA()->result();
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
			}else{
				echo "404";
			}
		}else if($sort == "Approved by You"){
			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_asm',$data);
				$data['form'] = $this->m_data->approved_asm_HRD()->result();
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_asm',$data);
				$data['form'] = $this->m_data->approved_asm_FA()->result();
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
			}else{
				echo "404";
			}
		}else if($sort == "Approved by Dept. Head"){
			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_asm',$data);
				$data['form'] = $this->m_data->approved_dh_HRD()->result();
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_asm',$data);
				$data['form'] = $this->m_data->approved_dh_FA()->result();
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_asm',$data);
				$this->load->view('v_footer_asm',$data);
			}else{
				echo "404";
			}
		}else{
			echo "404";
		}
	}

	public function home_req_dh(){		
		$data['judul'] = "Status Check";
		$this->load->view('v_header_dh',$data);
		$data['form'] = $this->m_data->tampil_data()->result();

		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
			}else{
				echo "404";
			}

		$this->load->view('view_status_dh',$data);
		$this->load->view('v_footer_dh',$data);
	}

	public function home_sort_dh(){
		$sort = $this->input->get('sort');
		if($sort == "Your Departement"){
			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_dh',$data);
				$data['form'] = $this->m_data->tampil_data_HRD()->result();
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_dh',$data);
				$data['form'] = $this->m_data->tampil_data_FA()->result();
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
			}else{
				echo "404";
			}
		}else if($sort == "Approval Pending"){
			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_dh',$data);
				$data['form'] = $this->m_data->approved_pending_HRD()->result();
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_dh',$data);
				$data['form'] = $this->m_data->approved_pending_FA()->result();
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
			}else{
				echo "404";
			}
		}else if($sort == "Approved by A. Manager"){
			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_dh',$data);
				$data['form'] = $this->m_data->approved_asm_HRD()->result();
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_dh',$data);
				$data['form'] = $this->m_data->approved_asm_FA()->result();
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
			}else{
				echo "404";
			}
		}else if($sort == "Approved by You"){
			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_dh',$data);
				$data['form'] = $this->m_data->approved_dh_HRD()->result();
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data['judul'] = "Status Check";
				$this->load->view('v_header_dh',$data);
				$data['form'] = $this->m_data->approved_dh_FA()->result();
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
				$this->load->view('view_status_dh',$data);
				$this->load->view('v_footer_dh',$data);
			}else{
				echo "404";
			}
		}
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

	function fetch_home(){
		$output = '';
  		$query = '';
  		if($this->input->post('query')){
   			$query = $this->input->post('query');
  		}
  		$data = $this->m_data->fetch_data_search($query);
  		$output .= '
  			<style>
  			table {
      			border-collapse: collapse;
      			width: 100%;
  			}

    		th, td {
      			text-align: left;
      			padding: 8px;
  			}

  			tr:nth-child(even){background-color: #f2f2f2}

  			th {
      			background-color: #4CAF50;
      			color: white;
  			}
  			</style>
  			<table>
      			<tr>
      			  <th>No. Ticket</th>
      			  <th>Name</th>
      			  <th>From</th>
      			  <th>To</th>
      			  <th>Date</th>
      			  <th>Case</th>
      			  <th>Duty</th>
      			  <th>Date of Expectancy Completion</th>
      			  <th>System Integrated</th>
      			  <th>Urgency</th>
      			  <th>Description</th>
      			  <th>Approval Status</th>
      			  <th>Status</th>
      			</tr>
  		';
  		if($data->num_rows() > 0){
   			foreach($data->result() as $row){
    			$output .= '
      					<tr>
      					 <td>'.$row->noticket.'</td>
      					 <td>'.$row->nama.'</td>
      					 <td>'.$row->dari.'</td>
      					 <td>'.$row->untuk.'</td>
      					 <td>'.$row->date.'</td>
      					 <td>'.$row->kasus.'</td>
      					 <td>'.$row->duty.'</td>
      					 <td>'.$row->dateoec.'</td>
      					 <td>'.$row->systemint.'</td>
      					 <td>'.$row->urgency.'</td>
      					 <td>'.$row->description.'</td>
      					 <td>'.$row->approvalstatus.'</td>
      					 <td>'.$row->process.'</td>
      					</tr>
    			';
   			}
  		}else{
   			$output .= '<tr>
       			<td colspan="13">No Data Found</td>
      		</tr>';
  		}
  		$output .= '</table>';
  		echo $output;
	}

	function fetch_home_specify(){
		$output = '';
  		$query = '';
  		if($this->input->post('query')){
   			$query = $this->input->post('query');
  		}
  		$data = $this->m_data->fetch_data_search_specify($query);
  		$output .= '
  			<style>
  			table {
      			border-collapse: collapse;
      			width: 100%;
  			}

    		th, td {
      			text-align: left;
      			padding: 8px;
  			}

  			tr:nth-child(even){background-color: #f2f2f2}

  			th {
      			background-color: #4CAF50;
      			color: white;
  			}
  			</style>
  			<table>
      			<tr>
      			  <th>No. Ticket</th>
      			  <th>Name</th>
      			  <th>From</th>
      			  <th>To</th>
      			  <th>Date</th>
      			  <th>Case</th>
      			  <th>Duty</th>
      			  <th>Date of Expectancy Completion</th>
      			  <th>System Integrated</th>
      			  <th>Urgency</th>
      			  <th>Description</th>
      			  <th>Approval Status</th>
      			  <th>Status</th>
      			</tr>
  		';
  		if($data->num_rows() > 0){
   			foreach($data->result() as $row){
    			$output .= '
      					<tr>
      					 <td>'.$row->noticket.'</td>
      					 <td>'.$row->nama.'</td>
      					 <td>'.$row->dari.'</td>
      					 <td>'.$row->untuk.'</td>
      					 <td>'.$row->date.'</td>
      					 <td>'.$row->kasus.'</td>
      					 <td>'.$row->duty.'</td>
      					 <td>'.$row->dateoec.'</td>
      					 <td>'.$row->systemint.'</td>
      					 <td>'.$row->urgency.'</td>
      					 <td>'.$row->description.'</td>
      					 <td>'.$row->approvalstatus.'</td>
      					 <td>'.$row->process.'</td>
      					</tr>
    			';
   			}
  		}else{
   			$output .= '<tr>
       			<td colspan="13">No Data Found</td>
      		</tr>';
  		}
  		$output .= '</table>';
  		echo $output;
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

		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
			}else{
				echo "404";
			}

		$data['judul'] = "Status Check";
		$this->load->view('v_header_asm',$data);
		$this->load->view('view_status_asm',$data);
		$this->load->view('v_footer_asm',$data);
	}

	function search_req_dh(){ 
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();

		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;

			if ($departemen_sekarang == "HRD"){
				$data_your_departement = $this->m_data->tampil_data_HRD()->result();
				$data_approval_pending = $this->m_data->approved_pending_HRD()->result();
				$data_approved_asm = $this->m_data->approved_asm_HRD()->result();
				$data_approved_dh = $this->m_data->approved_dh_HRD()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
			}else if($departemen_sekarang == "Financial & Accounting"){
				$data_your_departement = $this->m_data->tampil_data_FA()->result();
				$data_approval_pending = $this->m_data->approved_pending_FA()->result();
				$data_approved_asm = $this->m_data->approved_asm_FA()->result();
				$data_approved_dh = $this->m_data->approved_dh_FA()->result();
				$data['count_your_departement'] = count($data_your_departement);
				$data['count_approval_pending'] = count($data_approval_pending);
				$data['count_approved_asm'] = count($data_approved_asm);
				$data['count_approved_dh'] = count($data_approved_dh);
			}else{
				echo "404";
			}
		
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