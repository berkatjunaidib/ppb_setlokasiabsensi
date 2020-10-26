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


<section class="content">
	<div class="container-fluid">
		<?php $this->load->view('apps/v_pegawai/tab'); ?>
		<div class="card card-info card-outline">
			<div class="card-body">
				<form id="index2" class="form-search" name="form2" onsubmit="func_view();return false;">
					<input type="hidden" name="page">
					<input type="hidden" name="sidx">
					<input type="hidden" name="sord">
					<input type="hidden" name="limit">
					<table class="table tablecondensed">
						<tr>
							<th style="width: 150px">Item</th>
							<th>Value</th>
						</tr>
						<tr>
							<td>NIP</td>
							<td>
								<input type="text" name="nip_str" class="form-control form-control-sm" id="nip_str">
							</td>
						</tr>
						<tr>
							<td>Nama Pegawai</td>
							<td>
								<input type="text" name="nama_str" class="form-control form-control-sm" id="nama_str">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<a href="javascript:func_refresh()" class="btn btn-sm btn-primary">reset</a>
								<a href="javascript:func_view()" class="btn btn-sm btn-primary">tampilkan</a>
							</td>
						</tr>
					</table>
				</form>
				<br>
				<form id="index1" name="form1">
					<div class="table-responsive">
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="span1 text-center">no</th>
									<th class="span1 text-center" width="140">edit</th>
									<th class="span1 text-center">photo</th>
									<th class="span1" style="cursor: pointer;" onclick="func_sidx('nik')" id="nik">nik<span id="nik_sort" class="sort"></span></th>
									<th class="span1" style="cursor: pointer;" onclick="func_sidx('nip')" id="nip">nip<span id="nip_sort" class="sort"></span></th>
									<th class="span1" style="cursor: pointer;" onclick="func_sidx('nama_pegawai')" id="nama_pegawai">nama_pegawai<span id="nama_pegawai_sort" class="sort"></span></th>
									<th class="span1" style="cursor: pointer;" onclick="func_sidx('jenis_kelamin')" id="jenis_kelamin">jenis_kelamin<span id="jenis_kelamin_sort" class="sort"></span></th>
									<th class="span1 text-center">
										<input type="checkbox" name="btncheck" value="checkall" onclick="func_checkall()">
									</th>
								</tr>
							</thead>
							<tbody id="view_data">

							</tbody>
						</table>
					</div>
					<div class="row">
						<?php $this->load->view('apps/v_pegawai/tombol'); ?>
					</div>
				</form>

				<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Modal Label" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
								<h4 class="modal-title"></h4>
							</div>
							<div class="modal-body">
							</div>
							<div class="modal-footer">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">

	var main = "<?php echo base_url(); ?>apps/c_pegawai/views?mod=v";
	var row = "<?php echo base_url(); ?>apps/c_pegawai/views";
	func_view();

	function func_refresh(){
		document.form2.page.value="";
		document.form2.sidx.value="";
		document.form2.sord.value="";
		document.form2.limit.value="";
		document.form1.limit.value="<?php echo config_item('displayperpage') ?>";
		document.form2.nip_str.value="";
		document.form2.nama_str.value="";
		$("#page").val(1);
		func_view();
	}

	function delete_confirm(){
		if(confirm("Apakah anda yakin?")){
			var method = "<?php echo base_url(); ?>apps/c_pegawai/";
			var form_op = "delete";
			var string = $("#index1").serialize();
			eksekusi_post_notif(method+form_op,string,function(){
				eksekusi_get(method);
			});
		}
	}
</script>
