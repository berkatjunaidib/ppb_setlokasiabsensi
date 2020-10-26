<?php
$tot=0;
foreach ($sql1->result() as $obj1){	
	if($offset==""){$offset=0;}
	$offset++;
	$tot++;
	$photo = $obj1->photo;
	if($photo==""){
		echo $photo = 'nofoto.jpg';
	}
	?>
	<tr>
		<td class="text-center"><?php echo $offset; ?></td>
		<td class="text-center">
			<!-- <a href="javascript:eksekusi_get('<?php echo base_url(); ?>apps/c_pegawai/detail?id_pegawai=<?php echo $obj1->id_pegawai;?>')" class="btn btn-success btn-sm"><span class="fa fa-eye"></span> lihat</a>
			-->		
			<?php 
			if($access_edit){
				?>
				<a href="javascript:eksekusi_get('<?php echo base_url(); ?>apps/c_pegawai/edit?id_pegawai=<?php echo $obj1->id_pegawai;?>')" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> ubah</a>
				<?php
			}
			?>
		</td>
		<td class="text-center">
			<img width="80" src="<?php echo base_url().'uploads/'.$photo; ?>">
		</td>
		<td><?php echo $obj1->nik; ?></td>
		<td><?php echo $obj1->nip; ?></td>
		<td><?php echo $obj1->nama_pegawai; ?></td>
		<td><?php echo $obj1->jenis_kelamin;?></td>
		<td>
			<p class="text-center">
				<input type="checkbox" id="pilih" name="pilih[]" value="<?php echo $obj1->id_pegawai;?>">
			</p>
		</td>
	</tr>
	<?php
}
?>
<input type="hidden" name="cbtotal" value="<?php echo $tot;?>">