<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	function views($limit,$offset,$sidx,$sord,$where){
		$q = "SELECT * ";
		$q.= "FROM tbl_pegawai ";
		$q.= "WHERE id_pegawai!='' ";
		
		if($where['nip_str']){
			$q.= "AND nip LIKE'".$where['nip_str']."%' ";
		}
		if($where['nama_str']){
			$q.= "AND nama_pegawai LIKE'%".$where['nama_str']."%' ";
		}

		if(!empty($limit)){
			$q.= "ORDER BY $sidx $sord ";
			$q.= "LIMIT $offset,$limit ";
		}
		//print_r($q);
		$sql = $this->db->query($q);
		return $sql;
	}

	function insert($data){
		$this->db->insert("tbl_pegawai",$data);
	}

	function update($id_pegawai,$data){
		$this->db->where("id_pegawai",$id_pegawai);
		$this->db->update("tbl_pegawai",$data);
	}


	function delete($id_pegawai){
		$sql = $this->db->query("DELETE	FROM tbl_pegawai
			WHERE id_pegawai='$id_pegawai'");
		return $sql;
	}

	function detail($id_pegawai){
		$sql = $this->db->query("SELECT *
			FROM tbl_pegawai
			WHERE id_pegawai='$id_pegawai'");
		return $sql;
	}

	function get_select($id_pegawai){
		$data="";
		$sql = $this->db->query("SELECT * FROM tbl_pegawai WHERE id_pegawai='$id_pegawai' LIMIT 0,1");
		foreach ($sql->result() as $row) {
			$data = array(
				'id_pegawai' =>  $row->id_pegawai,
				'created_by' =>  $row->created_by,
				'updated_by' =>  $row->updated_by
			);
		}
		return $data;
	}

	function pegawai_auto($term){
		$q = " SELECT * ";
		$q.= " FROM tbl_pegawai ";
		$q.= " WHERE id_pegawai !='' ";
		if($term!=""){
			$q.= " AND nama_pegawai LIKE '%$term%' ";
		}
		$q.= " LIMIT 0,10 ";

		//print_r($q);
		$query = $this->db->query($q);
		if($query->num_rows()>0){
			foreach ($query->result() as $obj1) {
				$row['id']=(int)$obj1->id_pegawai;
				$row['id_pegawai']=(int)$obj1->id_pegawai;
				$row['value']=htmlentities(stripslashes($obj1->nama_pegawai));
				$row['nip']=htmlentities(stripslashes($obj1->nip));
				$row['nama_pegawai']=htmlentities(stripslashes($obj1->nama_pegawai));
				$row_set[] = $row;
			}
		}else{
			$row['id']='';
			$row['id_pegawai']='';
			$row['nip']='';
			$row['value']='Data Tidak Ditemukan';
			$row['nama_pegawai']='';
			$row_set[] = $row;
		}

		return $row_set;
	}

	function jumlah_dashboard1(){
		$q = $this->db->query("
			SELECT a.*,b.*,c.*,d.*
			FROM (SELECT count(*) as jlh_pns FROM tbl_pegawai WHERE status_pegawai='A')a
			JOIN (SELECT count(*) as jlh_pns_laki_laki FROM tbl_pegawai WHERE jenis_kelamin='L' AND status_pegawai='A' )b
			JOIN (SELECT count(*) as jlh_pns_perempuan FROM tbl_pegawai WHERE jenis_kelamin='P' AND status_pegawai='A')c
			JOIN (SELECT count(*) as jlh_opd FROM tbl_pegawai)d
			");
		return $q->result();
	}


}
?>