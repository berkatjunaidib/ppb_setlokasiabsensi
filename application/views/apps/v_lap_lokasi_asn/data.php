<?php
if($response1->count>0){	
	?>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>NIP</td>
				<td><b><?php echo $response1->NIP; ?></b></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td><b><?php echo $response1->NAMA; ?></b></td>
			</tr>
			<tr>
				<td>OPD</td>
				<td><b><?php echo $response1->ID_OPD."-".$response1->OPD; ?></b></td>
			</tr>
		</table>
	</div>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>No</th>
				<th width="100">nip</th>
				<th class="text-center">Tanggal</th>
				<th>Lokasi</th>
			</tr>
			<?php
			$q = "SELECT t1.*, t2.nama_lokasi FROM tbl_set_lokasi t1 ";
			$q.= "LEFT JOIN tbl_opd_lokasi t2 ";
			$q.= "ON t1.id_opd_lokasi=t2.id_opd_lokasi ";
			$q.= "WHERE t1.nip='".$response1->NIP."'";
			$sql = $this->db->query($q);
			$no=0;
			if($sql->num_rows()>0){
				foreach ($sql->result() as $key => $value) {
					$no++;
					?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $value->nip;?></td>
						<td class="text-center"><?php echo dmy1($value->tgl_awal)."<br>s/d<br>".dmy1($value->tgl_akhir);?></td>
						<td><?php echo $value->id_opd_lokasi."-".$value->nama_lokasi;?></td>
					</tr>
					<?php
				}
			}
			else{
				?>
				<tr>
					<td>Data tidak ditemukan</td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
	<?php
}else{
	echo "Data tidak ditemukan";
}
?>