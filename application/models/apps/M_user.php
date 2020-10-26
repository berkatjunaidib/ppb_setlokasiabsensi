<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	function views($limit,$offset,$sidx,$sord,$where){
		$where = $this->userWhere($where);
		$sql = $this->db->query("SELECT *
			FROM tbl_pegawai
			$where
			ORDER BY $sidx $sord LIMIT $offset,$limit");
		return $sql;
	}

	function rows($where){
		$where = $this->userWhere($where);
		$sql = $this->db->query("SELECT *
			FROM tbl_pegawai
			$where
			");
		return $sql;
	}

	function insert($data){
		$this->db->insert("tbl_pegawai",$data);
	}

	function update($id_pegawai,$data){
		$this->db->where("id_pegawai",$id_pegawai);
		$this->db->update("tbl_pegawai",$data);
	}

	function update2($data){
		$this->db->update("tbl_pegawai",$data);
	}

	function detail($id_pegawai){
		$sql = $this->db->query("SELECT *
			FROM tbl_pegawai
			WHERE id_pegawai='$id_pegawai'");
		return $sql;
	}

	function delete($id_pegawai){
		$sql = $this->db->query("DELETE	FROM tbl_pegawai
			WHERE id_pegawai='$id_pegawai'");
		return $sql;
	}

	function group_views($sidx,$sord,$where){
		$where = $this->parameterWhere($where);
		$sql = $this->db->query("SELECT *
			FROM tbl_parameter
			$where
			ORDER BY $sidx $sord");
		return $sql;
	}

	function akses_tgl_views($limit,$offset,$sidx,$sord,$where){
		$where = $this->userWhere($where);
		$sql = $this->db->query("SELECT *
			FROM tbl_pegawai
			$where
			ORDER BY $sidx $sord LIMIT $offset,$limit");
		return $sql;
	}

	function akses_tgl_rows($where){
		$where = $this->userWhere($where);
		$sql = $this->db->query("SELECT *
			FROM tbl_pegawai
			$where
			");
		return $sql;
	}


	function cek_logon($id_pegawai){
		$status_login = "Log On";
		$sessionTimeout = config_item('sessionTimeout');
		$sessionTimeoutSecond = 60 * $sessionTimeout;
		$time = time();
 		
 		$q = "SELECT statusLogin, userLastUpdate FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'";


		$sql = $this->db->query($q);
		$row = $sql->row();
		if (isset($row)) {
			$statusLogin = $row->statusLogin;
			$lastAction = $row->userLastUpdate;
			if ($statusLogin=="Log Off" || $time-$lastAction >= $sessionTimeoutSecond){
				$status_login = "Log Off";
			}
		}
		return $status_login;
	}

	function parameterWhere($where){
		$str = " WHERE id!='' AND groups='USER' AND name='user.group'";
		foreach ($where as $key => $value) {
			if($key=="id_pegawai" AND $value!=""){
				$str .= " AND ".$key. "='".$value."'";
			}
			if($key=="nip" AND $value!=""){
				$str .= " AND ".$key. " LIKE '%".$value."%' ";
			}
			if($key=="nama_pegawai" AND $value!=""){
				$str .= " AND ".$key. " LIKE '%".$value."%' ";
			}
		}
		return $str;
	}

	function userWhere($where){
		$str = " WHERE id_pegawai!='' ";
		foreach ($where as $key => $value) {
			if($key=="kecamatan_id" AND $value!=""){
				$str .= " AND ".$key. "='".$value."'";
			}
			if($key=="desa_id" AND $value!=""){
				$str .= " AND ".$key. "='".$value."'";
			}
			if($key=="nama_pegawai" AND $value!=""){
				$str .= " AND ".$key. " LIKE '%".$value."%' ";
			}
		}
		return $str;
	}


	function detailUser($id_pegawai){
		$q = " SELECT * ";
		$q .= " FROM tbl_pegawai ";
		$q .= " WHERE id_pegawai='$id_pegawai' ";
		$sql = $this->db->query($q);
		$row = $sql->row();
		if (isset($row)) {
			$data = array(
				'id_pegawai' => $row->id_pegawai,
				'nama_pegawai' => $row->nama_pegawai,
				'nip' => $row->nip,
				'id_group_user' => $row->id_group_user,
				'last_login' => $row->last_login
			);
		}
		return $data;
	}

	function cekIdTransaksi($id){
		$sql = $this->db->query("SELECT * FROM tbl_transaksi
			WHERE created_by='$id' OR updated_by='$id'");
		return $sql->num_rows();
	}

}
?>