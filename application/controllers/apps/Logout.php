<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function index(){
		$ket_log ="Logout |";
		$ket_log .="id_pegawai : ".$this->session->userdata('arrayLogin')['id_pegawai']." |";
		$ket_log .="nip : ".$this->session->userdata('arrayLogin')['nip']." |";
		$ket_log .="Logout Berhasil";
		$log = datalog(
			'LOGOUT',
			''.$ket_log.''
		);
		$this->m_log->insert($log);
	    $this->session->sess_destroy();
		$page = base_url();
		refresh($page);
	}
}