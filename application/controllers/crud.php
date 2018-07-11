<?php 


class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');

	}
	
	function form_tambah(){
		$dari = $this->input->post('from');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dec');
		$systemint = $this->input->post('si');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('description');

		$data = array(
			'dari' => $dari,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description
			);

		$this->m_data->input_data($data,'form');
		redirect('web/home');
	}

	function form_tambah_requester(){
		$dari = $this->input->post('from');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dec');
		$systemint = $this->input->post('si');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('description');

		$data = array(
			'dari' => $dari,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description
			);
		$this->m_data->input_data($data,'form');
		redirect('web/home_requester');
	}

	function form_tambah_req_asm(){
		$dari = $this->input->post('from');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dec');
		$systemint = $this->input->post('si');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('description');

		$data = array(
			'dari' => $dari,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description
			);
		$this->m_data->input_data($data,'form');

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'catur.hutabarat@gmail.com',
			'smtp_pass' => 'qwepoi123098',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($this->session->userdata('email'));
			$this->email->subject('New Requisition Form Notification');
			/*$noticket = (int)$this->m_data->get_noticket($get_noticket)->row()->noticket;*/
			$this->email->message('You need to approve new Requisition Form with ticket number : ');
		
				if($this->email->send())
				{
					redirect('web/home_req_asm');
				}else
				{
					show_error($this->email->print_debugger());
				}

		redirect('web/home_req_asm');
	}

	function form_edit_process($id){
	$where = array('noticket' => $noticket);
	$data['form'] = $this->m_data->edit_status($where,'form')->result();
	$this->load->view('view_change',$data);
}

	function form_update_process(){
		$noticket = $this->input->post('noticket');
		$dari = $this->input->post('from');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dec');
		$systemint = $this->input->post('si');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('description');
		$process = $this->input->post('status');

		$data = array(
			'noticket' => $noticket,
			'dari' => $dari,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description,
			'process' => $process
			);

		$where = array(
			'noticket' => $noticket
			);

		$this->m_data->update_status($where,$data,'form');
		redirect('web/home');
	}

	function form_update_approval(){
		$noticket = $this->input->post('noticket');
		$dari = $this->input->post('from');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dec');
		$systemint = $this->input->post('si');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('description');
		$approvalstatus = $this->input->post('approvalstatus');

		$data = array(
			'noticket' => $noticket,
			'dari' => $dari,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description,
			'approvalstatus' => $approvalstatus
			);

		$where = array(
			'noticket' => $noticket
			);

		$this->m_data->update_status($where,$data,'form');

		if ($this->input->post('approvalstatus') == "Approved")
		{
			$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'catur.hutabarat@gmail.com',
			'smtp_pass' => 'qwepoi123098',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to('khairulrizal39@gmail.com');
			$this->email->subject('Requisition Form Approved');
			$this->email->message('Your Requisition Form is Approved.
								   Your ticket number : ');
		
				if($this->email->send())
				{
					redirect('web/home_req_asm');
				}else
				{
					show_error($this->email->print_debugger());
				}
		}
		else
		{
			$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'catur.hutabarat@gmail.com',
			'smtp_pass' => 'qwepoi123098',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Samuel Arthur');
			$this->email->to('khairulrizal39@gmail.com');
			$this->email->subject('Requisition Form Not Approved');
			$this->email->message('Your Requisition Form is not Approved.
								   Your ticket number : ');
		
				if($this->email->send())
				{
					redirect('web/home_req_asm');
				}else
				{
					show_error($this->email->print_debugger());
				}
		}
	}
}