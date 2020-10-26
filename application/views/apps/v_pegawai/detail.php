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

$id_pegawai = "";
$koordinat = "";
$file_gambar = "";
$nama = "";
$alamat_pegawai = "";
$ukuran = "";
$harga = "";
$spesifikasi = "";
$posisi_jalan = "";


if($form=="edit"){
	foreach ($sql1->result() as $row1) {
		$id_pegawai = $row1->id_pegawai;
		$koordinat = $row1->koordinat;
		$file_gambar = $row1->file_gambar;
		$nama = $row1->nama;
		$alamat_pegawai = $row1->alamat_pegawai;
		$ukuran = $row1->ukuran;
		$harga = $row1->harga;
		$spesifikasi = $row1->spesifikasi;
		$posisi_jalan = $row1->posisi_jalan;

	}
}
?>
<section class="content">
	<div class="container-fluid">
		<?php $this->load->view('apps/v_pegawai/tab'); ?>
		<div class="card card-info card-outline">
			<div class="card-body">
				<form id="pegawai_form" name="form3" method="POST" action="#">
					<input type="hidden" name="op" value="<?php echo $op; ?>">
					<table class="table table-condensed table-striped table-line">
						<tr>
							<td>id_pegawai</td>
							<td><?php echo $id_pegawai;?></td>
						</tr>
						<tr>
							<td>koordinat</td>
							<td><?php echo $koordinat;?></td>
						</tr>
						<tr>
							<td>file_gambar</td>
							<td>
								<?php echo $file_gambar;?>
								<img src="<?php echo base_url()."uploads/".$file_gambar;?>" style='max-width: 200px;'>
							</td>
						</tr>
						<tr>
							<td>nama</td>
							<td><?php echo $nama;?></td>
						</tr>
						<tr>
							<td>alamat_pegawai</td>
							<td><?php echo $alamat_pegawai;?></td>
						</tr>
						<tr>
							<td>ukuran</td>
							<td><?php echo $ukuran;?></td>
						</tr>
						<tr>
							<td>harga</td>
							<td><?php echo $harga;?></td>
						</tr>
						<tr>
							<td>spesifikasi</td>
							<td><?php echo $spesifikasi;?></td>
						</tr>
						<tr>
							<td>posisi_jalan</td>
							<td><?php echo $posisi_jalan;?></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</section>