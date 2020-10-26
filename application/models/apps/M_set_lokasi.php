<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_set_lokasi extends CI_Model {
	function proses($data){
		$this->db->insert("tbl_set_lokasi",$data);
	}
	function detail($nip,$tgl_awal){
		$q = "SELECT * ";
		$q.= "FROM tbl_set_lokasi ";
		$q.= "WHERE nip='$nip' ";
		$q.= "AND tgl_awal='$tgl_awal' ";
		$sql = $this->db->query($q);
		return $sql;
	}
	function detail2($id_opd,$tgl_awal){
		$q = "SELECT * ";
		$q.= "FROM tbl_set_lokasi ";
		$q.= "WHERE id_opd='$id_opd' ";
		$q.= "AND tgl_awal='$tgl_awal' ";
		$sql = $this->db->query($q);
		return $sql;
	}
}
?>