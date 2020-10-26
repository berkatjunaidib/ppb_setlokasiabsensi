<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_lap_lokasi_opd extends CI_Controller {
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
			
			$url_opd = "https://sibahanpe.pakpakbharatkab.go.id/api/all_opd.php";
			$response = json_decode(curl_api($url_opd));
			$data['response1'] = $response;

			$menudata="apps/home, home, / |,user,";
			$data["breadcrumb"]= data_breadcrumb($menudata);
			$data["url_link"] = 'apps/c_lap_lokasi_opd/';
			$data['tab'] = "tab1";
			$this->load->view('apps/v_lap_lokasi_opd/index',$data);
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

			$id_opd = $this->input->post('id_opd') ? $this->input->post('id_opd') : '';
			$data['id_opd'] = $id_opd;

			$this->load->view("apps/v_lap_lokasi_opd/data",$data);
		}
	}
}