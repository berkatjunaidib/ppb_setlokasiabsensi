<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_pegawai extends CI_Controller {
	var $cekLog;
	public function __construct(){
		parent::__construct(); 
		$this->cekLog = $this->m_security->cekArrayLogin();
	}

	function cekAccess($action){
		return $this->m_security->cekAkses(23,$action);
	}

	function index(){
		if($this->cekLog){
			$data['access_view'] = $this->cekAccess('view');
			$data['access_add'] = $this->cekAccess('add');
			$data['access_edit'] = $this->cekAccess('edit');
			$data['access_delete'] = $this->cekAccess('delete');

			$menudata="apps/home, home, / |,user,";
			$data["breadcrumb"]= data_breadcrumb($menudata);
			$data["url_link"] = 'apps/c_pegawai/';
			$data['tab'] = "tab1";
			$this->load->view('apps/v_pegawai/index',$data);
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
			$sidx = $this->input->post('sidx') ? $this->input->post('sidx') : 'id_pegawai';
			$sord = $this->input->post("sord") ? $this->input->post("sord") : "desc";
			$limit = $this->input->post("limit") ? $this->input->post("limit") : config_item('displayperpage');

			$nip_str = $this->input->post('nip_str') ? $this->input->post('nip_str') : '';
			$nama_str = $this->input->post('nama_str') ? $this->input->post('nama_str') : '';

			if($page<=0){
				$offset=0;
			}
			else{
				$offset=($page-1) * $limit;
			}

			$where["nip_str"] = $nip_str;
			$where["nama_str"] = $nama_str;

			$data["sql1"] = $this->m_pegawai->views($limit,$offset,$sidx,$sord,$where);
			$tot_row = $this->m_pegawai->views("","",$sidx,$sord,$where);

			$data["offset"] = $offset;
			$data["total"] = $tot_row->num_rows();

			if($mod=="v"){
				$this->load->view("apps/v_pegawai/data",$data);
			}else{
				$jlh = $tot_row->num_rows();
				echo ceil( $jlh/$limit );
			}
		}
	}

	function add(){
		if($this->cekAccess('add')){
			$menudata="apps/home, home, / |,user,";
			$data["breadcrumb"]= data_breadcrumb($menudata);
			$data["url_link"] = 'apps/c_pegawai';
			$data["tab"] = "tab1";
			$data["form"] = "add";
			$data["op"] = "add";
			$this->load->view('apps/v_pegawai/form',$data);

		}
	}

	function edit(){
		if($this->cekAccess('edit')){
			$data['tab'] = "tab1";
			$id_pegawai = $this->input->get('id_pegawai') ? $this->input->get('id_pegawai') : '';
			$data["sql1"] = $this->m_pegawai->detail($id_pegawai);
			$data["form"] = "edit";
			$data["url_link"] = 'apps/c_pegawai';
			$menudata="apps/home, home, / |,pegawai,";
			$data["breadcrumb"]= data_breadcrumb($menudata);
			$data["op"] = "edit";
			$this->load->view('apps/v_pegawai/form',$data);
		}
	}

	function crud(){
		$op = $this->input->post("op");
		$id_pegawai = $this->input->post('id_pegawai');
		$nik = $this->input->post('nik') ? $this->input->post('nik') :'';
		$nip = $this->input->post('nip') ? $this->input->post('nip') :'';
		$id_group_user = $this->input->post('id_group_user') ? $this->input->post('id_group_user') :'';
		$id_status_user = $this->input->post('id_status_user') ? $this->input->post('id_status_user') :'';
		$status_login = $this->input->post('status_login') ? $this->input->post('status_login') :'';
		$last_login = $this->input->post('last_login') ? $this->input->post('last_login') :'';
		$last_update = $this->input->post('last_update') ? $this->input->post('last_update') :'';
		$nama_pegawai = $this->input->post('nama_pegawai') ? $this->input->post('nama_pegawai') :'';
		$tempat_lahir = $this->input->post('tempat_lahir') ? $this->input->post('tempat_lahir') :'';
		$tanggal_lahir = $this->input->post('tanggal_lahir') ? $this->input->post('tanggal_lahir') :'';
		$jenis_kelamin = $this->input->post('jenis_kelamin') ? $this->input->post('jenis_kelamin') :'';
		$alamat = $this->input->post('alamat') ? $this->input->post('alamat') :'';
		$desa = $this->input->post('desa') ? $this->input->post('desa') :'';
		$kecamatan = $this->input->post('kecamatan') ? $this->input->post('kecamatan') :'';
		$kabupaten = $this->input->post('kabupaten') ? $this->input->post('kabupaten') :'';
		$provinsi = $this->input->post('provinsi') ? $this->input->post('provinsi') :'';
		$kode_pos = $this->input->post('kode_pos') ? $this->input->post('kode_pos') :'';
		$status_kawin = $this->input->post('status_kawin') ? $this->input->post('status_kawin') :'';
		$telepon = $this->input->post('telepon') ? $this->input->post('telepon') :'';
		$hp = $this->input->post('hp') ? $this->input->post('hp') :'';
		$email = $this->input->post('email') ? $this->input->post('email') :'';
		$no_bpjs = $this->input->post('no_bpjs') ? $this->input->post('no_bpjs') :'';
		$no_karis_karsu = $this->input->post('no_karis_karsu') ? $this->input->post('no_karis_karsu') :'';
		$no_npwp = $this->input->post('no_npwp') ? $this->input->post('no_npwp') :'';
		$jabatan = $this->input->post('jabatan') ? $this->input->post('jabatan') :'';
		$tmt_jabatan = $this->input->post('tmt_jabatan') ? $this->input->post('tmt_jabatan') :'';
		$pangkat = $this->input->post('pangkat') ? $this->input->post('pangkat') :'';
		$tmt_pangkat = $this->input->post('tmt_pangkat') ? $this->input->post('tmt_pangkat') :'';
		$status_pegawai = $this->input->post('status_pegawai') ? $this->input->post('status_pegawai') :'';
		$tmt_status_pegawai = $this->input->post('tmt_status_pegawai') ? $this->input->post('tmt_status_pegawai') :'';
		$tipe_pegawai = $this->input->post('tipe_pegawai') ? $this->input->post('tipe_pegawai') :'';
		$tmt_tipe_pegawai = $this->input->post('tmt_tipe_pegawai') ? $this->input->post('tmt_tipe_pegawai') :'';
		$id_opd = $this->input->post('id_opd') ? $this->input->post('id_opd') :'';
		$id_bidang = $this->input->post('id_bidang') ? $this->input->post('id_bidang') :'';
		$id_sub_bidang = $this->input->post('id_sub_bidang') ? $this->input->post('id_sub_bidang') :'';
		$id_pustu = $this->input->post('id_pustu') ? $this->input->post('id_pustu') :'';
		$id_upt = $this->input->post('id_upt') ? $this->input->post('id_upt') :'';
		$tmt_opd = $this->input->post('tmt_opd') ? $this->input->post('tmt_opd') :'';
		$tmt_unit = $this->input->post('tmt_unit') ? $this->input->post('tmt_unit') :'';
		$tmt_upt = $this->input->post('tmt_upt') ? $this->input->post('tmt_upt') :'';
		$golongan_darah = $this->input->post('golongan_darah') ? $this->input->post('golongan_darah') :'';
		$agama = $this->input->post('agama') ? $this->input->post('agama') :'';
		$no_karpeg = $this->input->post('no_karpeg') ? $this->input->post('no_karpeg') :'';
		$no_taperum = $this->input->post('no_taperum') ? $this->input->post('no_taperum') :'';
		$photo = upload_file("photo");
		$photo_edit = $this->input->post("photo_edit") ? $this->input->post("photo_edit") :'';
		$id_jurusan = $this->input->post('id_jurusan') ? $this->input->post('id_jurusan') :'';
		$id_unit = $this->input->post('id_unit') ? $this->input->post('id_unit') :'';
		$id_pendidikan = $this->input->post('id_pendidikan') ? $this->input->post('id_pendidikan') :'';
		$id_klasifikasi_pendidikan = $this->input->post('id_klasifikasi_pendidikan') ? $this->input->post('id_klasifikasi_pendidikan') :'';

		$created_by = $this->session->userdata('arrayLogin')['id_pegawai'];
		$created_on = date("Y-m-d H-i-s");
		$updated_by = $this->session->userdata('arrayLogin')['id_pegawai'];
		$updated_on = date("Y-m-d H-i-s");

		if($photo==""){
			$photo = $photo_edit;
		}

		$data = array(
			'nik' => $nik,
			'nip' => $nip,
			'id_group_user' => $id_group_user,
			'id_status_user' => $id_status_user,
			'status_login' => "Log off",
			'last_login' => $last_login,
			'last_update' => $last_update,
			'nama_pegawai' => $nama_pegawai,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => ymd1($tanggal_lahir),
			'jenis_kelamin' => $jenis_kelamin,
			'alamat' => $alamat,
			'desa' => $desa,
			'kecamatan' => $kecamatan,
			'kabupaten' => $kabupaten,
			'provinsi' => $provinsi,
			'kode_pos' => $kode_pos,
			'status_kawin' => $status_kawin,
			'telepon' => $telepon,
			'hp' => $hp,
			'email' => $email,
			'no_bpjs' => $no_bpjs,
			'no_karis_karsu' => $no_karis_karsu,
			'no_npwp' => $no_npwp,
			'jabatan' => $jabatan,
			'tmt_jabatan' => $tmt_jabatan,
			'pangkat' => $pangkat,
			'tmt_pangkat' => $tmt_pangkat,
			'status_pegawai' => $status_pegawai,
			'tmt_status_pegawai' => $tmt_status_pegawai,
			'tipe_pegawai' => $tipe_pegawai,
			'tmt_tipe_pegawai' => $tmt_tipe_pegawai,
			'id_opd' => $id_opd,
			'id_bidang' => $id_bidang,
			'id_sub_bidang' => $id_sub_bidang,
			'id_pustu' => $id_pustu,
			'id_upt' => $id_upt,
			'tmt_opd' => $tmt_opd,
			'tmt_unit' => $tmt_unit,
			'tmt_upt' => $tmt_upt,
			'golongan_darah' => $golongan_darah,
			'agama' => $agama,
			'no_karpeg' => $no_karpeg,
			'no_taperum' => $no_taperum,
			'photo' => $photo,
			'id_jurusan' => $id_jurusan,
			'id_unit' => $id_unit,
			'id_pendidikan' => $id_pendidikan,
			'id_klasifikasi_pendidikan' => $id_klasifikasi_pendidikan,
			'created_by' => $created_by,
			'created_on' => $created_on,
			'updated_by' => $updated_by,
			'updated_on' => $updated_on,
		);

		if($op=="add"){
			$this->m_pegawai->insert($data);
		}else{
			$this->m_pegawai->update($id_pegawai,$data);
		}
		$ket_log ="Ubah Konten: <br>";
		$ket_log .="id_pegawai : ".$id_pegawai."<br>";
		$log = datalog(
			'UPDATE',
			'apps/c_pegawai/update',
			''.$ket_log.''
		);
		$this->m_log->insert($log);

		$ket_log .= "z";
		$data_set = array(
			'tipe' => 'success',
			'msg' => $ket_log,
		);
		echo json_encode($data_set);
	}

	function detail(){
		$data['tab'] = "tab1";
		$id_pegawai = $this->input->get('id_pegawai') ? $this->input->get('id_pegawai') : '';
		$data["sql1"] = $this->m_pegawai->edit($id_pegawai);
		$data["form"] = "edit";
		$data["url_link"] = 'apps/c_pegawai';
		$menudata="apps/home, home, / |,pegawai,";
		$data["breadcrumb"]= data_breadcrumb($menudata);
		$data["op"] = "edit";
		$this->load->view('apps/v_pegawai/detail',$data);
	}

	function delete(){
		$pilih = $this->input->post("pilih");
		$ket_log = "";
		if($pilih!=""){
			$i=0;
			foreach ($pilih as $key) {
				$data_a = $this->m_pegawai->get_select($pilih[$i]);
				$this->m_pegawai->delete($pilih[$i]);
				$ket_log ="Hapus Konten<br>";
				$ket_log .="ID : ".$data_a['id_pegawai']."<br>";
				$log = datalog(
					'DELETE',
					'apps/c_pegawai/delete',
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

	function pegawai_auto(){
		$term = $this->input->get('term');
		$x = $this->m_pegawai->pegawai_auto(trim($term));
		echo json_encode($x);
	}
}