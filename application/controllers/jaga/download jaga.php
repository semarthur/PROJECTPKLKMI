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