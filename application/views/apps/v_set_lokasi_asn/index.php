<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Data set_lokasi</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url();?>apps/home">Home</a></li>
					<li class="breadcrumb-item active">Data set_lokasi</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<?php $this->load->view('apps/v_set_lokasi_asn/tab'); ?>
		<div class="card card-info card-outline">
			<div class="card-body">
				<form name="form1" id="index1" action="#" class="form-search" onsubmit="return false;">
					<input type="hidden" name="page">
					<input type="hidden" name="sidx">
					<input type="hidden" name="sord">
					<input type="hidden" name="limit">
					<table class="table tablecondensed">
						<tr>
							<th width="150">Item</th>
							<th>Value</th>
						</tr>
						<tr>
							<td>NIP</td>
							<td>
								<input type="text" name="nip" class="form-control">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<a href="javascript:func_refresh()" class="btn btn-sm btn-primary">reset</a>
								<a href="javascript:func_tampil()" class="btn btn-sm btn-primary">tampilkan</a>
							</td>
						</tr>
					</table>
					<br>
					<div id="view_data"></div>
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
	var main = "<?php echo base_url(); ?>apps/c_set_lokasi_asn/views?mod=v";
	var row = "<?php echo base_url(); ?>apps/c_set_lokasi_asn/views";
	//func_view();

	function func_tampil(){
		Pace.restart();
		//alert('s');
		$("#view_data").html(loading_tabel);
		$("#total_row").val("load...");
		var string = $("#index1").serialize();
		$.ajax({
			type	: 'POST',
			url		: main,
			data	: string,
			cache	: false,
			success	: function(data){
				$("#view_data").html(data);
				func_all();
			}
		});
		return false;
	}
	function func_refresh(){
		eksekusi_get('<?php echo base_url(); ?>apps/c_set_lokasi_asn');
	}
	function proses_confirm(){
		if(confirm("Apakah anda yakin?")){
			var method = "<?php echo base_url(); ?>apps/c_set_lokasi_asn/";
			var form_op = "proses";
			var string = $("#index1").serialize();
			eksekusi_post_notif(method+form_op,string,function(){
				eksekusi_get(method);
			});
		}
		return false;
	}
	$('#nip').autocomplete({
		source: function(request, response) {
			$.getJSON("<?php echo base_url().'apps/c_set_lokasi_asn/set_lokasi_auto';?>",{term: request.term},response);
		},
		minLength:1,	
		select: function(event,ui){
			$("#id_pegawai").val(ui.item.id_pegawai);
		}
	});

	function func_checkall() {
		var cbtotal = document.form1.cbtotal.value;
		if (cbtotal>0){
			if (cbtotal==1){
				if(document.form1.btncheck.checked == true){
					document.form1.pilih.checked = true;
				}
				else{
					document.form1.pilih.checked = false;
				}
			}
			else{
				for(var i=0;i<document.form1.pilih.length;i++){
					if(document.form1.btncheck.checked == true){
						document.form1.pilih[i].checked = true;
					}
					else{
						document.form1.pilih[i].checked = false;
					}
				}
			}
		}
	}


</script>
