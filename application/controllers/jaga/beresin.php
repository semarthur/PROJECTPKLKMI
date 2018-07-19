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

		this->m_data->update_status($where,$data,'form');
		$this->m_data->get_noticket($data,'form');
		$temp = $this->m_data->tampil_data()->result();
		$noticket = (int)$this->m_data->get_noticket($data)->row()->noticket;

		if ($this->input->post('approvalstatus') == "Approved by A. Manager"){
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

			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$id_jabatan_sekarang = $temp[0]->id_jabatan;
			$departemen_sekarang = $temp[0]->Departemen;

			if($id_jabatan_sekarang < 3){
				$id_jabatan_sekarang += 1;

				$result = $this->m_data->get_higher_jabatan($id_jabatan_sekarang,$departemen_sekarang)->result();

				$jabatan_atasan = $result[0]->Jabatan;
				$email_atasan = $result[0]->email;
				$departemen_atasan = $result[0]->Departemen;
			} else {
				echo "cek jabatan";
			}

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($email_atasan);
			$this->email->subject('Requisition Form Approval');
			$this->email->message('Requisition Form is approved by Ast Manager.
								   You also need to approve this.
								   Your ticket number : '.$noticket);

			if($this->email->send()){
				redirect('web/home_req_asm');
			} else {
				show_error($this->email->print_debugger());
			}
		} else {
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

			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$id_jabatan_sekarang = $temp[0]->id_jabatan;
			$departemen_sekarang = $temp[0]->Departemen;

			if($id_jabatan_sekarang < 3){
				$id_jabatan_sekarang -= 1;

				$result = $this->m_data->get_higher_jabatan($id_jabatan_sekarang,$departemen_sekarang)->result();

				$jabatan_atasan = $result[0]->Jabatan;
				$email_atasan = $result[0]->email;
				$departemen_atasan = $result[0]->Departemen;
			} else {
				echo "cek jabatan";
			}

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Samuel Arthur');
			$this->email->to($email_atasan);
			$this->email->subject('Requisition Form Not Approved');
			$this->email->message('Your Requisition Form is not Approved.
								   Your ticket number : '.$noticket);

			if($this->email->send()){
				redirect('web/home_req_asm');
			} else {
				show_error($this->email->print_debugger());
			}
		}
	}