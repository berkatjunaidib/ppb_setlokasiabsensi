<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_set_lokasi extends CI_Controller {
	var $cekLog;
	public function __construct(){
		parent::__construct(); 
		$this->cekLog = $this->m_security->cekArrayLogin();
	}

	function cekAccess($action){
		return $this->m_security->cekAkses(6,$action);
	}

	function index(){
		if($this->cekLog){
			$data['access_view'] = $this->cekAccess('view');
			$data['access_add'] = $this->cekAccess('add');
			$data['access_edit'] = $this->cekAccess('edit');
			$data['access_delete'] = $this->cekAccess('delete');
			$data_set['id_opd_lokasi'] = "";
			$data_set['nama_lokasi'] = "";
/*
			$tanggal = $this->input->post('tanggal') ? $this->input->post('tanggal') : '';
			$data_set['tanggal'] = ymd1($tanggal);*/

			$url_jenis_jabatan = "http://ujicoba.pakpakbharatkab.go.id/simpeg01/api_absensi/jenis_jabatan";
			$response = json_decode(curl_api($url_jenis_jabatan));
			$data['response'] = $response;
			$data['sql_lokasi'] = $this->m_opd_lokasi->views("","","","",$data_set);

			$menudata="apps/home, home, / |,user,";
			$data["breadcrumb"]= data_breadcrumb($menudata);
			$data["url_link"] = 'apps/c_set_lokasi/';
			$data['tab'] = "tab1";
			$this->load->view('apps/v_set_lokasi/index',$data);
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
			
			$mod = $this->input->get('mod') ? $this->input->get('mod') : '';

			$page = $this->input->post("page") ? $this->input->post("page") : 1;
			$sidx = $this->input->post('sidx') ? $this->input->post('sidx') : 'id_set_lokasi';
			$sord = $this->input->post("sord") ? $this->input->post("sord") : "asc";
			$limit = $this->input->post("limit") ? $this->input->post("limit") : config_item('displayperpage');

			$id_jenis_jabatan = $this->input->post('id_jenis_jabatan') ? $this->input->post('id_jenis_jabatan') : '';
			$tanggal = $this->input->post('tanggal') ? $this->input->post('tanggal') : '';
			$data['id_jenis_jabatan'] = $id_jenis_jabatan;
			$data['tanggal'] = ymd1($tanggal);

			$url_jenis_jabatan = "http://ujicoba.pakpakbharatkab.go.id/simpeg01/api_absensi/pegawai/?id_jenis_jabatan=".$id_jenis_jabatan;
			$response = json_decode(curl_api($url_jenis_jabatan));
			$data['response1'] = $response;
			if($mod=="v"){
				$this->load->view("apps/v_set_lokasi/data",$data);
			}else{
				$jlh = $tot_row->num_rows();
				echo ceil( $jlh/$limit );
			}
		}
	}

	function proses(){
		$pilih = $this->input->post("pilih");
		$id_opd_lokasi = $this->input->post("id_opd_lokasi");
		$tanggal = $this->input->post("tanggal");
		$id_jenis_jabatan = $this->input->post("id_jenis_jabatan");

		$ket_log = "";
		if($pilih!=""){
			$i=0;
			foreach ($pilih as $key) {
				$data = array(
					'id_opd_lokasi' =>$id_opd_lokasi, 
					'nip' =>$pilih[$i] , 
					'id_jenis_jabatan' =>$id_jenis_jabatan, 
					'tanggal' =>$tanggal, 
					'created_by' =>$pilih[$i] , 
					'created_on' =>date("Y-m-d H:i:s") , 
				);
				$this->m_set_lokasi->proses($data);
				$ket_log ="Hapus Konten<br>";
				$ket_log .="id_set_lokasi : ".$id_opd_lokasi."<br>";
				$log = datalog(
					'UPDATE',
					'apps/c_set_lokasi/proses',
					''.$ket_log.''
				);
				$this->m_log->insert($log);
				$i++;
			}
		}
		$ket_log .= "z";
		$data_set = array(
			'tipe' => 'danger',
			'msg' => $ket_log,
		);
		echo json_encode($data_set);
	}
}