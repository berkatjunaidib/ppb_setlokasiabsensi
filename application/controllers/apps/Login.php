<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() { 
		parent::__construct(); 
	}
	function index(){
		$this->load->view('apps/login');
	}
	function anti_injection($data){
		$filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		//$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}
	function proses(){
		$nip = $this->anti_injection($this->input->post('nip'));
		$password = $this->anti_injection(md5($this->input->post('password')));
		$arrCek = $this->m_security->login($nip,$password);

		if($arrCek['id_status_user']==1){
			$arrUser = $this->m_user->detailUser($arrCek['id_pegawai']);
			$a = $this->m_parameter->getParameterArray($arrCek['id_group_user'],"user.group");
			$theme=config_item('theme');
			$arrayLogin = array(
				'id_pegawai' => $arrUser['id_pegawai'], 
				'nama_pegawai' => $arrUser['nama_pegawai'], 
				'nip' => $arrUser['nip'], 
				'password' => $password, 
				'id_group_user' => $arrUser['id_group_user'],
				'group_user_str' => $a['description'],
				'last_login' => $arrUser['last_login'],
				'theme' => $theme
			);

			$arrList = $this->m_akses_group->getfunctionID($arrUser['id_group_user']);
			
			$sess_data['arrayLogin'] = $arrayLogin;
			$sess_data['arrList'] = $arrList;
			
			$this->session->set_userdata($sess_data);
			
			$ket_log ="Login |";
			$ket_log .="nip : ".$nip." |";
			$ket_log .="Login Berhasil";
			$log = datalog(
				'LOGIN',
				''.$ket_log.''
			);
			$this->m_log->insert($log);
			$data_set = array(
				'status' => 1,
				'type' => 'text-success',
				'msg' => 'Login berhasil, Mohon tunggu...',
			);
		}else if($arrCek['id_status_user']==2){
			$ket_log ="Login |";
			$ket_log .="nip : ".$nip." |";
			$ket_log .="Login Gagal";
			$log = datalog(
				'LOGIN',
				''.$ket_log.''
			);
			$this->m_log->insert($log);
			$data_info="nip Masih Pending Hubungi administrator";
			$data_set = array(
				'status' => 2,
				'type' => 'text-warning',
				'msg' => $data_info,
			);
		}else if($arrCek['id_status_user']==3){
			$ket_log ="Login |";
			$ket_log .="nip : ".$nip." |";
			$ket_log .="Login Gagal";
			$log = datalog(
				'LOGIN',
				''.$ket_log.''
			);
			$this->m_log->insert($log);
			
			$data_info="nip Sudah Di Blocked Hubungi administrator";
			$data_set = array(
				'status' => 3,
				'type' => 'text-warning',
				'msg' => $data_info,
			);
			$this->session->sess_destroy();
		}else{
			$ket_log ="Login |";
			$ket_log .="nip : ".$nip." |";
			$ket_log .="Login Gagal";
			$log = datalog(
				'LOGIN',
				''.$ket_log.''
			);
			$data_info="Kombinasi nip Atau Pessword Salah";
			$data_set = array(
				'status' => 4,
				'type' => 'text-danger',
				'msg' => $data_info,
			);
			$this->session->sess_destroy();
		}
		echo json_encode($data_set);
	}

	function reset_password(){
		$email = $this->anti_injection($this->input->post('email'));
		$data = $this->m_security->cek_email($email);
		if($data !=0){
			$data_set = $this->send_email($email);
		}else{
			$data_info="Email tidak ditemukan";
			$data_set = array(
				'status' => 4,
				'type' => 'text-danger',
				'msg' => $data_info,
			);
		}
		echo json_encode($data_set);
	}


	function send_email($email){
		$data_info="Email reset sudah dikirim ke email anda";
		$pass_new = generateRandomString(5);
		$message = "Password baru anda adalah <b>".$pass_new."</b>";
		$this->emailSend($message,$email);
		$this->m_security->reset_password(md5($pass_new),$email);
		$data_set = array(
			'status' => 4,
			'type' => 'text-success',
			'msg' => $data_info,
		);
		return $data_set;
	}

	function emailSend($message,$email){
		$fields = array(
			"Username"=>"diskominfo.pb@gmail.com",
			"Password"=>"Diskominfo1234",
			"Subject"=>"Reset Password - Simpeg - Kabupaten Pakpak Bharat",
			"Body"=>$message,
			"AddAddress"=>$email
		);
		curl_post("https://sibahanpe.pakpakbharatkab.go.id/email/index.php",$fields);
	}
}