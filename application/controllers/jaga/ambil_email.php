	/*function get_higher_jabatan(){
		//dummy email
		$email = $this->session->userdata('email');
		$temp = $this->m_data->get_jabatan_sekarang($email)->result();
		$id_jabatan_sekarang = $temp[0]->id_jabatan;
		$departemen_sekarang = $temp[0]->Departemen;
		//var_dump($temp);
		if($id_jabatan_sekarang <= 3){
			$id_jabatan_sekarang -= 1;//1 buat asm 2 buat dept head

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
	}*/