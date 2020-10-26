<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_lap_lokasi_rekap extends CI_Controller {
	var $cekLog;
	public function __construct(){
		parent::__construct(); 
		$this->cekLog = $this->m_security->cekArrayLogin();
	}

	function cekAccess($action){
		return $this->m_security->cekAkses(9,$action);
	}

	function index(){
		if($this->cekLog){
			$data['access_view'] = $this->cekAccess('view');
			$data['access_add'] = $this->cekAccess('add');
			$data['access_edit'] = $this->cekAccess('edit');
			$data['access_delete'] = $this->cekAccess('delete');
			
			$menudata="apps/home, home, / |,user,";
			$data["breadcrumb"]= data_breadcrumb($menudata);
			$data["url_link"] = 'apps/c_lap_lokasi_rekap/';
			$data['tab'] = "tab1";
			$this->load->view('apps/v_lap_lokasi_rekap/index',$data);
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

			$tgl_awal = $this->input->post('tgl_awal') ? $this->input->post('tgl_awal') : '';
			$tgl_akhir = $this->input->post('tgl_akhir') ? $this->input->post('tgl_akhir') : '';
			$data['tgl_akhir'] = $tgl_akhir;
			$data['tgl_awal'] = $tgl_awal;

			$this->load->view("apps/v_lap_lokasi_rekap/data",$data);
		}
	}
}