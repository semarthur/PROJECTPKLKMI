<?php 


class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');

	}

	function get_higher_jabatan(){
		//dummy email
		$email = "requester6@gmail.com";
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$id_jabatan_sekarang = $temp[0]->id_jabatan;
		$departemen_sekarang = $temp[0]->Departemen;
		//var_dump($temp);
		if($id_jabatan_sekarang < 3){
			$id_jabatan_sekarang += 1;

			$result = $this->m_data->get_higher_jabatan($id_jabatan_sekarang,$departemen_sekarang)->result();
			//var_dump($result);

			$jabatan_atasan = $result[0]->Jabatan;
			$email_atasan = $result[0]->email;
			$departemen_atasan = $result[0]->Departemen;

			echo "Atasannya    : $jabatan_atasan<br>";
			echo "Email Atasan : $email_atasan<br>" ;
			echo "Departemen   : $departemen_atasan";
		} else {
			echo "Jabatan Tertinggi";
		}
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
		$temp = $this->m_data->tampil_data()->result();
		$last_noticket = $temp[count($temp) - 1]->noticket;
		$noticket = (int)$this->m_data->get_noticket($data)->row()->noticket;

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
		$this->email->message('You are from Information System. You just need to change the status.
			Your ticket number : '.$noticket);

		if($this->email->send())
		{
			redirect('web/home');
		}else
		{
			show_error($this->email->print_debugger());
		}

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

		$temp = $this->m_data->tampil_data()->result();
		$last_noticket = $temp[count($temp) - 1]->noticket;
		$noticket = (int)$this->m_data->get_noticket($data)->row()->noticket;

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
		$this->email->message('You have submitted new Requisition Form
			Check the status of your Requisition Form frequently in http://localhost/belajar/
			Your ticket number : '.$noticket);

		if($this->email->send())
		{
			$this->email->clear(TRUE);
			$last_noticket = $temp[count($temp) - 1]->noticket;
			$noticket = (int)$this->m_data->get_noticket($data)->row()->noticket;

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
			$this->email->to('viceheadexternal@gmail.com');
			$this->email->subject('New Requisition Form Notification');
			$this->email->message('You need to approve new Requisition Form with ticket number : '.$noticket);

			redirect('web/home_requester');

		}else
		{
			show_error($this->email->print_debugger());
		}

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
		$temp = $this->m_data->tampil_data()->result();
		$last_noticket = $temp[count($temp) - 1]->noticket;
		$noticket = (int)$this->m_data->get_noticket($data)->row()->noticket;

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
		$this->email->message('You need to approve new Requisition Form with ticket number : '.$noticket);

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
		$this->m_data->get_noticket($data,'form');
		$temp = $this->m_data->tampil_data()->result();
		$noticket = (int)$this->m_data->get_noticket($data)->row()->noticket;

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
				Your ticket number : '.$noticket);

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
				Your ticket number : '.$noticket);

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