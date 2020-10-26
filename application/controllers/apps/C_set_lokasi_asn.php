<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_set_lokasi_asn extends CI_Controller {
	var $cekLog;
	public function __construct(){
		parent::__construct(); 
		$this->cekLog = $this->m_security->cekArrayLogin();
	}

	function cekAccess($action){
		return $this->m_security->cekAkses(5,$action);
	}

	function index(){
		if($this->cekLog){
			$data['access_view'] = $this->cekAccess('view');
			$data['access_add'] = $this->cekAccess('add');
			$data['access_edit'] = $this->cekAccess('edit');
			$data['access_delete'] = $this->cekAccess('delete');
			
			$menudata="apps/home, home, / |,user,";
			$data["breadcrumb"]= data_breadcrumb($menudata);
			$data["url_link"] = 'apps/c_set_lokasi_asn/';
			$data['tab'] = "tab1";
			$this->load->view('apps/v_set_lokasi_asn/index',$data);
		}
		else{
			$data["CekLogin"] = $this->cekLogin;
			$this->load->view("apps/home/msg_confirm",$data);
		}
	}

	function views(){
		if($this->cekAccess('view')){
			$data['access_view'] = $this->cekAccess('view');
			$data['access_add'] = $this->cekAccess('add');
			$data['access_edit'] = $this->cekAccess('edit');
			$data['access_delete'] = $this->cekAccess('delete');

			$nip = $this->input->post('nip') ? $this->input->post('nip') : '';
			$data['nip'] = $nip;

			$url_asn = "https://epresensi.dairikab.go.id/api/staff.php?NIP=".$nip;
			$response = json_decode(curl_api($url_asn));
			$data['response1'] = $response;

			$data_set['id_opd_lokasi'] = "";
			$data_set['nama_lokasi'] = "";
			$data['sql_lokasi'] = $this->m_opd_lokasi->views("","","","",$data_set);

			$this->load->view("apps/v_set_lokasi_asn/data",$data);
		}
	}

	function proses(){
		$nip = $this->input->post("nip");
		$tgl_awal = $this->input->post("tgl_awal");
		$tgl_akhir = $this->input->post("tgl_akhir");
		$id_opd_lokasi = $this->input->post("id_opd_lokasi");

		$_by = $this->session->userdata('arrayLogin')['id_pegawai'];
		$_on = date("Y-m-d H-i-s");

		$ket_log = "";
		if($nip!=""){
			$i=0;
			$data = array(
				'id_opd_lokasi' =>$id_opd_lokasi, 
				'nip' =>$nip , 
				'tgl_awal' =>ymd1($tgl_awal), 
				'tgl_akhir' =>ymd1($tgl_akhir), 
				'created_by' =>$_by, 
				'created_on' =>$_on, 
			);
			$this->m_set_lokasi->proses($data);
			$ket_log ="Set lokasi absensi<br>";
			$ket_log .="id_set_lokasi : ".$id_opd_lokasi."<br>";
			$log = datalog(
				'UPDATE',
				'apps/c_set_lokasi_asn/proses',
				''.$ket_log.''
			);
			$this->m_log->insert($log);
		}
		$ket_log .= "";
		$data_set = array(
			'tipe' => 'info',
			'msg' => $ket_log,
		);
		echo json_encode($data_set);
	}
}