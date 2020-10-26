<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Data pegawai</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url();?>apps/home">Home</a></li>
					<li class="breadcrumb-item active">Data pegawai</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<?php

$id_pegawai= "";
$nik= "";
$nip= "";
$password= "";
$id_group_user= "";
$id_status_user= "";
$status_login= "";
$last_login= "";
$last_update= "";
$nama_pegawai= "";
$tempat_lahir= "";
$tanggal_lahir= "";
$jenis_kelamin= "";
$alamat= "";
$desa= "";
$kecamatan= "";
$kabupaten= "";
$provinsi= "";
$kode_pos= "";
$status_kawin= "";
$telepon= "";
$hp= "";
$email= "";
$no_bpjs= "";
$no_karis_karsu= "";
$no_npwp= "";
$jabatan= "";
$tmt_jabatan= "";
$pangkat= "";
$tmt_pangkat= "";
$status_pegawai= "";
$tmt_status_pegawai= "";
$tipe_pegawai= "";
$tmt_tipe_pegawai= "";
$id_opd= "";
$id_bidang= "";
$id_sub_bidang= "";
$id_pustu= "";
$id_upt= "";
$tmt_opd= "";
$tmt_unit= "";
$tmt_upt= "";
$golongan_darah= "";
$agama= "";
$no_karpeg= "";
$no_taperum= "";
$photo= "";
$id_jurusan= "";
$id_unit= "";
$id_pendidikan= "";
$id_klasifikasi_pendidikan= "";


if($form=="edit"){
	foreach ($sql1->result() as $row1) {
		$id_pegawai = $row1->id_pegawai;
		$nik = $row1->nik;
		$nip = $row1->nip;
		$password = $row1->password;
		$id_group_user = $row1->id_group_user;
		$id_status_user = $row1->id_status_user;
		$status_login = $row1->status_login;
		$last_login = $row1->last_login;
		$last_update = $row1->last_update;
		$nama_pegawai = $row1->nama_pegawai;
		$tempat_lahir = $row1->tempat_lahir;
		$tanggal_lahir = dmy1($row1->tanggal_lahir);
		$jenis_kelamin = $row1->jenis_kelamin;
		$alamat = $row1->alamat;
		$desa = $row1->desa;
		$kecamatan = $row1->kecamatan;
		$kabupaten = $row1->kabupaten;
		$provinsi = $row1->provinsi;
		$kode_pos = $row1->kode_pos;
		$status_kawin = $row1->status_kawin;
		$telepon = $row1->telepon;
		$hp = $row1->hp;
		$email = $row1->email;
		$no_bpjs = $row1->no_bpjs;
		$no_karis_karsu = $row1->no_karis_karsu;
		$no_npwp = $row1->no_npwp;
		$jabatan = $row1->jabatan;
		$tmt_jabatan = $row1->tmt_jabatan;
		$pangkat = $row1->pangkat;
		$tmt_pangkat = $row1->tmt_pangkat;
		$status_pegawai = $row1->status_pegawai;
		$tmt_status_pegawai = $row1->tmt_status_pegawai;
		$tipe_pegawai = $row1->tipe_pegawai;
		$tmt_tipe_pegawai = $row1->tmt_tipe_pegawai;
		$id_opd = $row1->id_opd;
		$id_bidang = $row1->id_bidang;
		$id_sub_bidang = $row1->id_sub_bidang;
		$id_pustu = $row1->id_pustu;
		$id_upt = $row1->id_upt;
		$tmt_opd = $row1->tmt_opd;
		$tmt_unit = $row1->tmt_unit;
		$tmt_upt = $row1->tmt_upt;
		$golongan_darah = $row1->golongan_darah;
		$agama = $row1->agama;
		$no_karpeg = $row1->no_karpeg;
		$no_taperum = $row1->no_taperum;
		$photo = $row1->photo;
		$id_jurusan = $row1->id_jurusan;
		$id_unit = $row1->id_unit;
		$id_pendidikan = $row1->id_pendidikan;
		$id_klasifikasi_pendidikan = $row1->id_klasifikasi_pendidikan;

	}
}
?>
<section class="content">
	<div class="container-fluid">
		<?php $this->load->view('apps/v_pegawai/tab'); ?>
		<div class="card card-info card-outline">
			<div class="card-body">
				<form id="pegawai_form" name="form3" method="POST" action="#" enctype="MULTIPART/FORM-DATA">
					<input type="hidden" name="op" value="<?php echo $op; ?>">
					<input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai; ?>">
					<table class="table table-condensed">
						<tr>
							<th colspan="4">
								Data akun
							</th>
						</tr>
						<tr>
							<td>id_group_user</td>
							<td>
								<select name="id_group_user"  class="form-control" required="1">
									<option value=""></option>
									<?php
									$arrayGroup =  $this->m_parameter->getParameter('user.group');
									foreach ($arrayGroup as $rowGroup) {
										?><option <?php echo cek_select_option($rowGroup['id'],$id_group_user); ?> value="<?php echo $rowGroup['id']; ?>"><?php echo $rowGroup['id']." - ".$rowGroup['description']; ?></option><?php
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>id_status_user</td>
							<td>
								<select name="id_status_user"  class="form-control" required="1">
									<option value=""></option>
									<?php
									$arrayStatus =  $this->m_parameter->getParameter('user.status');
									foreach ($arrayStatus as $rowStatus) {
										?><option <?php echo cek_select_option($rowStatus['id'],$id_status_user); ?> value="<?php echo $rowStatus['id']; ?>"><?php echo $rowStatus['id']." - ".$rowStatus['description']; ?></option><?php
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<th colspan="4">
								Data Pribadi
							</th>
						</tr>
						<tr>
							<td style="width: 20%">nik</td>
							<td style="width: 30%"><input type="text" name="nik" class='form-control' value="<?php echo $nik; ?>"></td>
							<td style="width: 20%">kode_pos</td>
							<td style="width: 30%"><input type="text" name="kode_pos" class='form-control' value="<?php echo $kode_pos; ?>"></td>
						</tr>
						<tr>
							<td>nip</td>
							<td><input type="text" name="nip" class='form-control' value="<?php echo $nip; ?>" required="1"></td>
							<td>telepon</td>
							<td><input type="text" name="telepon" class='form-control' value="<?php echo $telepon; ?>"></td>
						</tr>
						<tr>
							<td>nama_pegawai</td>
							<td><input type="text" name="nama_pegawai" class='form-control' value="<?php echo $nama_pegawai; ?>" required="1"></td>
							<td>hp</td>
							<td><input type="text" name="hp" class='form-control' value="<?php echo $hp; ?>"></td>
						</tr>
						<tr>
							<td>jenis_kelamin</td>
							<td>
								<select name="jenis_kelamin" class='form-control'>
									<option <?php echo cek_select_option('L',$jenis_kelamin); ?>>L</option>
									<option <?php echo cek_select_option('P',$jenis_kelamin); ?>>P</option>
								</select>
							</td>
							<td>email</td>
							<td><input type="text" name="email" class='form-control' value="<?php echo $email; ?>"></td>
						</tr>
						<tr>
							<td>tempat_lahir</td>
							<td><input type="text" name="tempat_lahir" class='form-control' value="<?php echo $tempat_lahir; ?>"></td>
							<td>no_npwp</td>
							<td><input type="text" name="no_npwp" class='form-control' value="<?php echo $no_npwp; ?>"></td>
						</tr>
						<tr>
							<td>tanggal_lahir</td>
							<td><input type="text" name="tanggal_lahir" class='form-control tanggal' value="<?php echo $tanggal_lahir; ?>" readonly="1"></td>
							<td>no_bpjs</td>
							<td><input type="text" name="no_bpjs" class='form-control' value="<?php echo $no_bpjs; ?>"></td>
						</tr>
						<tr>
							<td>status_kawin</td>
							<td>
								<select name="status_kawin"  class="form-control" required="1">
									<option value=""></option>
									<?php
									$arraystatus_kawin =  $this->m_parameter->getParameter('status.kawin');
									foreach ($arraystatus_kawin as $rowstatus_kawin) {
										?><option <?php echo cek_select_option($rowstatus_kawin['id'],$status_kawin); ?> value="<?php echo $rowstatus_kawin['id']; ?>"><?php echo $rowstatus_kawin['id']." - ".$rowstatus_kawin['description']; ?></option><?php
									}
									?>
								</select>
							</td>
							<td>no_karis_karsu</td>
							<td><input type="text" name="no_karis_karsu" class='form-control' value="<?php echo $no_karis_karsu; ?>"></td>
						</tr>
						<tr>
							<td>agama</td>
							<td>
								<select name="agama"  class="form-control" required="1">
									<option value=""></option>
									<?php
									$arrayagama =  $this->m_parameter->getParameter('pegawai.agama');
									foreach ($arrayagama as $rowagama) {
										?><option <?php echo cek_select_option($rowagama['id'],$agama); ?> value="<?php echo $rowagama['id']; ?>"><?php echo $rowagama['id']." - ".$rowagama['description']; ?></option><?php
									}
									?>
								</select>
							</td>
							<td>no_karpeg</td>
							<td><input type="text" name="no_karpeg" class='form-control' value="<?php echo $no_karpeg; ?>"></td>
						</tr>
						<tr>
							<td>golongan_darah</td>
							<td><input type="text" name="golongan_darah" class='form-control' value="<?php echo $golongan_darah; ?>"></td>
							<td>no_taperum</td>
							<td><input type="text" name="no_taperum" class='form-control' value="<?php echo $no_taperum; ?>"></td>
						</tr>
						<tr>
							<td>alamat</td>
							<td>
								<textarea name="alamat" class='form-control'>
									<?php echo $alamat; ?>
								</textarea>
							</td>
							<td>photo</td>
							<td>
								<input type="file" name="photo" class='form-control'>
								<input type="hidden" name="photo_edit" value="<?php echo $photo; ?>">
							</td>
						</tr>
					</table>
					<button class="btn btn-primary" id="save">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section> 
<script>
	function get_koordinat(){
		window.opener=self;
		window.open("<?php echo base_url();?>apps/c_pegawai/koordinat","","resizable=no,toolbar=no,menubar=no,scrollBars=yes,directories=no,location=no,status=no,width=1250,height=600,left=10,top=10");
	}

	function refreshFromPopup(koordinat){
		$("#koordinat").val(koordinat);	
	}

	$("#pegawai_form").submit(function(){
		if(confirm("Apakah anda yakin?")){
			var method = "<?php echo base_url(); ?><?php echo $url_link; ?>/";
			var form_op = "crud/<?php echo $form; ?>";

			$.ajax({
				url: method+form_op,
				type: "POST",
				contentType: false,
				processData:false,
				data:  new FormData(this),
				beforeSend: function(){
					eksekusi_loading();
				},
				success: function(e){
					var json = $.parseJSON(e);
					notify(json.tipe,json.msg);
					eksekusi_get(method);
				},
				error: function(){

				}           
			});
		}

		return false;
	})
</script>