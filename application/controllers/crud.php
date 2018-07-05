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

	
}