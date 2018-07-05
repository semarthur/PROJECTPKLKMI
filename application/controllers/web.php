<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends CI_Controller {
	
	function __construct(){
		parent::__construct();
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

	public function change_status(){		
		$data['judul'] = "Change Status";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->tampil_data()->result();
		$this->load->view('view_change',$data);
		$this->load->view('v_footer',$data);
	}


	public function history(){		
		$data['judul'] = "History";
		$this->load->view('v_header',$data);
		$this->load->view('view_history',$data);
		$this->load->view('v_footer',$data);
	}

	public function form(){		
		$data['judul'] = "Create New Form";
		$this->load->view('v_header',$data);
		$this->load->view('view_form',$data);
		$this->load->view('v_footer',$data);
	}

	public function approval(){		
		$data['judul'] = "Approval";
		$this->load->view('v_header_asm',$data);
		$this->load->view('view_status_asm',$data);
		$this->load->view('v_footer_asm',$data);
	}

	public function logout(){		
		$this->load->view('view_login');
	}

	public function login(){		
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$where = array(
			'email' => $email,
			'password' => $password
			);
		redirect(base_url("web/home"));

	}

	function search(){ 
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();
		$data['judul'] = "Status Check";
		$this->load->view('v_header',$data);
		$data['form'] = $this->m_data->tampil_data()->result();
		$this->load->view('view_status',$data);
		$this->load->view('v_footer',$data);
	}
}