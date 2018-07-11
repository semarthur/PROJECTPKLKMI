<?php

class Email extends CI_Controller
{
	function __contruct(){
		parent::Controller();
	}

	function index ()
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
		$this->email->to('sem.hutabarat@gmail.com');
		$this->email->subject('test');
		$this->email->message('Kappa123');

		if($this->email->send())
		{
			echo "kekirim cuy";
		}else
		{
			show_error($this->email->print_debugger());
		}
	}
}