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

	function export(){
		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$departemen_sekarang = $temp[0]->Departemen;
		$noticket = (int)$this->input->get('noticket');
		$name = $this->input->get('name');
		$from = $this->input->get('from');
		$case = $this->input->get('case');
		$status = $this->input->get('status');
		$page = $this->input->get('page');
		$data = $this->m_data->searchbox($noticket,$name,$from,$case,$status)->result();
		$kiw = "ajg";
		if($page != "normal"){
			if(($noticket == null && $name == null && $from == null && $case == null && $status == null) ||
				($noticket == "0" && $name == "" && $from == "" && $case == "" && $status == "")){
				if ($departemen_sekarang == "HRD"){
					$data = $this->m_data->tampil_data_HRD()->result();
					$kiw = "normal null hrd";
				}else if($departemen_sekarang == "Financial & Accounting"){
					$data = $this->m_data->tampil_data_FA()->result();
				} 
			} else {
				if ($departemen_sekarang == "HRD"){
					$data = $this->m_data->searchbox_HRD($noticket,$name,$from,$case,$status)->result();
					$kiw = "normal not null hrd";
				}else if($departemen_sekarang == "Financial & Accounting"){
					$data = $this->m_data->searchbox_FA($noticket,$name,$from,$case,$status)->result();
				}
			} 
		}
		//var_dump($status);

		include APPPATH.'third_party\PHPExcel.php';

		$excel = new PHPExcel();

		$excel->getProperties()->setCreator('Firman Budi Safrizal')
		->setLastModifiedBy('Firman Budi Safrizal')
		->setTitle("Data")
		->setSubject("Status");

		$style_col = array(
			'font' => array('bold' => true), 
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			)
		);

		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA STATUS"); 
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); 
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "No. Ticket");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Name"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "From");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "To");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Case"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Duty"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Date of Expectancy Completion"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "System Integrated"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Urgency"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Description"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Approval Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Status"); 

		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);

			//$data = $this->data;//$this->db->query("select * from form")->result();
		$no = 1; 
		$numrow = 4;
		foreach($data as $row){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row->noticket);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $row->dari);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $row->untuk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row->date);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $row->kasus);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $row->duty);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $row->dateoec);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $row->systemint);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $row->urgency);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $row->description);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $row->approvalstatus);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $row->process);

			$excel->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++;
		}

		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("File Data Status");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Status.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
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