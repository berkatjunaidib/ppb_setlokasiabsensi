	<tr>
		<td colspan="12">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2">Tanggal</td>
		<td colspan="10">
			<div class="col-sm-12">
				<div class="row">
					<div>
						<input type="text" name="tgl_awal" class="form-control tanggal" id="tgl_awal" value="<?php echo date("d-m-Y");?>" readonly="1">
					</div>
					s/d 
					<div>
						<input type="text" name="tgl_akhir" class="form-control tanggal" id="tgl_akhir" value="<?php echo date("d-m-Y");?>" readonly="1">
					</div>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">Lokasi</td>
		<td colspan="10">
			<select name="id_opd_lokasi" class="form-control form-control-sm">
				<?php
				foreach ($sql_lokasi->result() as $key => $value) {
					?>
					<option value="<?php echo $value->id_opd_lokasi;?>"><?php echo $value->id_opd_lokasi;?>-<?php echo $value->nama_lokasi;?></option>
					<?php
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<?php 
			if($access_add){
				?><a href="javascript:proses_confirm()" class="btn btn-primary btn-sm"><i class="fa fa-cog"></i> Simpan</a><?php
			}
			?>
		</td>
	</tr>
