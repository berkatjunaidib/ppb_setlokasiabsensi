<div class="table-responsive">
	<table class="table">
		<?php
		if($response1->count>0){	
			?>
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
			<?php $this->load->view('apps/v_set_lokasi_asn/tombol'); ?>
			<?php
		}else{
			echo "Data tidak ditemukan";
		}
		?>
	</table>
</div>
