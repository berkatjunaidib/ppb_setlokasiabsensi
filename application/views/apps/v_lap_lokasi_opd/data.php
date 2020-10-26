<div class="table-responsive">
	<table class="table">
		<tr>
			<th>No</th>
			<th>id_opd</th>
			<th class="text-center">Tanggal</th>
			<th>Lokasi</th>
		</tr>
		<?php
		$q = "SELECT t1.*, t2.nama_lokasi FROM tbl_set_lokasi t1 ";
		$q.= "LEFT JOIN tbl_opd_lokasi t2 ";
		$q.= "ON t1.id_opd_lokasi=t2.id_opd_lokasi ";
		$q.= "WHERE t1.id_opd='".$id_opd."'";
		//print_r($q);
		$sql = $this->db->query($q);
		$no=0;
		if($sql->num_rows()>0){
			foreach ($sql->result() as $key => $value) {
				$no++;
				?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $value->id_opd;?></td>
					<td class="text-center"><?php echo dmy1($value->tgl_awal)."<br>s/d<br>".dmy1($value->tgl_akhir);?></td>
					<td><?php echo $value->id_opd_lokasi."-".$value->nama_lokasi;?></td>
				</tr>
				<?php
			}
		}else{
			?>
			<tr>
				<td>Data tidak ditemukan</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>
