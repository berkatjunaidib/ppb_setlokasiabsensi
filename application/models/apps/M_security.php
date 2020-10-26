<?php
Class M_security extends CI_Model{

	function login($nip, $password){
		$data = array();
		$time = time();
		$this->db->from('tbl_pegawai');
		$this->db->where('nip', $nip);
		$this->db->where('password', $password);
		$sql = $this->db->get();
		$row = $sql->row();
		if($sql->num_rows()){
			if($row->id_status_user==1){
				$q =" UPDATE tbl_pegawai SET ";
				$q.=" status_login='Log On', ";
				$q.=" last_login='$time', ";
				$q.=" last_update='$time' ";
				$q.=" WHERE nip='$nip' AND password='$password'";
				$this->db->query($q);
			}
			$data = array(
				'status' =>1,
				'id_pegawai' =>$row->id_pegawai,
				'id_group_user' =>$row->id_group_user,
				'id_status_user' =>$row->id_status_user
			);
			return $data;
		}
		else{
			$data = array(
				'status' =>0,
				'id_pegawai' =>'',
				'id_group_user' =>'',
				'id_status_user' =>'',
			);
			return $data;
		}
	}

	function cekArrayLogin(){
		$str=0;

		$id_pegawai = $this->session->userdata('arrayLogin')['id_pegawai'];
		$nip = $this->session->userdata('arrayLogin')['nip'];
		$password = $this->session->userdata('arrayLogin')['password'];

		if($id_pegawai AND $nip AND $password){
			$str = $this->cekSesi($id_pegawai,$nip,$password);
			if($str==1){
				return 1;
			}
			else if($str==2){
				$msg['type'] = "msg_confirm";
				$msg['color'] = "card-warning";
				$msg['caption'] = "Sesi Anda Sudah Habis";
				$msg_title  = "Sesi anda sudah habis silahkan login";
				$msg['title'] = "";
				$msg['message'] = "";
				$msg['info'] = "Silahkan Login Kembali";
				$msg['url'] = "apps/login";
				$_SESSION['arrMsg'] = $msg;

				$data_log = $msg_title;
				$log = datalog(
					'ERROR',
					''.$data_log.''
				);
				$this->m_log->insert($log);	
				$page = base_url().'apps/c_msg';
				refresh($page);
			}
			else if($str==3){
				$msg['type'] = "msg_confirm";
				$msg['color'] = "card-warning";
				$msg['caption'] = "Status User Log Off";
				$msg_title  = "Status anda Log Off silahkan login";
				$msg['title'] = "";
				$msg['message'] = "";
				$msg['info'] = "Silahkan Login";
				$msg['url'] = "apps/login";
				$_SESSION['arrMsg'] = $msg;

				$data_log = $msg_title;
				$log = datalog(
					'ERROR',
					''.$data_log.''
				);
				$this->m_log->insert($log);	
				$page = base_url().'apps/c_msg';
				refresh($page);

			}

		}
		else{
			$msg['type'] = "msg_confirm";
			$msg['color'] = "card-warning";
			$msg['caption'] = "Anda Sudah Logout";
			$msg_title  = "Anda sudah logout silahkan login";
			$msg['title'] = "";
			$msg['message'] = "";
			$msg['info'] = "Silahkan Login";
			$msg['url'] = "apps/login";
			$_SESSION['arrMsg'] = $msg;

			$data_log = $msg_title;
			$log = datalog(
				'ERROR',
				''.$data_log.''
			);
			$this->m_log->insert($log);	
			$page = base_url().'apps/c_msg';
			refresh($page);
		}
	}

	function cekSesi($id_pegawai,$nip,$password){
		$str = 0;
		$sessionTimeout = config_item('sessionTimeout');
		$sessionTimeoutSecond = 60 * $sessionTimeout;
		$time = time();

		$q = " SELECT status_login, last_update FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai' AND nip='$nip' AND password='$password' ";

		$sql = $this->db->query($q);
		$row = $sql->row();

		if($sql->num_rows()) {
			$lastAction = $row->last_update;
			if($row->status_login=="Log Off"){
				$str = 3;
			}else{
				if ($time-$lastAction >= $sessionTimeoutSecond){
					$str = 2;
				}
				else{
					$this->last_update($id_pegawai);
					$str = 1;
				}

			}
		}
		return $str;
	}

	function cekAkses($functionID,$action){
		$id_group_user = $this->session->userdata('arrayLogin')['id_group_user'];
		if($_SESSION['arrList'][$functionID][$action]==1){
			return true;
		}else{
			return false;
		}
	}

	function last_update($id_pegawai){
		$time = time();
		$q = " UPDATE tbl_pegawai SET last_update='$time' WHERE id_pegawai='$id_pegawai'";
		$sql = $this->db->query($q);
		return $sql;
	}

	function cek_email($email){
		$q = $this->db->query("SELECT email	 FROM tbl_pegawai WHERE email	='$email'");
		return $q->num_rows();
	}
	function reset_password($pass_new,$email){
		$q =" UPDATE tbl_pegawai SET ";
		$q .=" password='$pass_new' ";
		$q .=" WHERE email	='$email'";
		$this->db->query($q);
	}
}
?>
