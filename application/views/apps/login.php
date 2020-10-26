<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title><?php echo config_item('app_name1'); ?> | <?php echo config_item('app_client2'); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="//www.pakpakbharatkab.go.id/favicon.ico" />
	<link href="<?php echo config_item('asset_url'); ?>assets/apps/login/semantic.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo config_item('asset_url'); ?>assets/apps/login/login.css" rel="stylesheet" type="text/css">
	<script src="<?php echo config_item('asset_url'); ?>assets/apps/login/jquery-2.1.4.min.js" lang="javascript"></script>
	<script src="<?php echo config_item('asset_url'); ?>assets/apps/login/semantic.min.js" lang="javascript"></script>
	<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo config_item('asset_url'); ?>assets/apps/plugins/pace/pace.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo config_item('asset_url'); ?>assets/apps/plugins/pace/css/flash.css">
	<script type="text/javascript" src="<?php echo config_item('asset_url'); ?>assets/apps/plugins/pace/js/pace.js"></script>
</head>
<style type="text/css">
.alert{
	margin: 15px 0;
	padding: 2px;
	text-align: center;
}
.t4_cek_em,.page_info2{
	margin: 15px 0;
}
.box_shadow {
	width: 100px;
	height: 100px;
	margin: 100px;
	box-shadow:
	-52px -52px 0px 0px #f65314,
	52px -52px 0px 0px #7cbb00,
	-52px 52px 0px 0px #00a1f1,
	52px 52px 0px 0px #ffbb00;
}
</style>
<body>
	<div class="ui page grid">
		<div class="sixteen wide mobile two wide tablet two wide computer column"></div>
		<div class="sixteen wide mobile twelve wide tablet twelve wide computer column">
			<div class="ui segment">
				<div class="ui stackable two column grid">
					<div class="grecen center aligned column" style="background-color: #28a745">
						<h2 class="ui blue inverted center aligned icon header">
							<img src="<?php echo config_item('asset_url'); ?>assets/apps/dist/img/logo-dairi.png" class="ui image">
							<div class="content">
								<?php echo config_item('app_name2'); ?>
								<div class="sub header" style="color: #fff;">
									(<?php echo config_item('app_name1'); ?>)<br>
									<strong><?php echo config_item('app_client2'); ?></strong>
								</div>
							</div>
						</h2>
					</div>
					<div class="column">
						<a class="ui red right ribbon label">
							<h3>Login User</h3>
						</a>
						<div class="ui basic segment">
							<form action="#" method="POST" id="form1" class="ui form">
								<div class="field">
									<label>NIP</label>
									<div class="ui icon input">
										<input type="text" name="nip" placeholder="NIP" autocomplete="off" required="required" value="">
									</div>
								</div>
								<div class="field">
									<label>Password</label>
									<div class="ui icon input">
										<input type="password" name="password" placeholder="Password" autocomplete="off" required="required" value="">
									</div>
								</div>
								<div class="inline field">
									<p class="page_info text-center"><?php echo @$error; ?></p>
								</div>
								<div class="ui one column grid">
									<div class="right aligned column">
										<button type="submit" class="ui green small icon labeled button">Login</button>
										<div id="reset_password"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="ui secondary right aligned segment">
				<div align="left">
					<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tentang">Tentang</a> <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#panduan">Panduan</a> <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#faq">FAQ</a> <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#kontak">Kontak</a>
				</div>
				<strong>© 2019 - <?php echo config_item('app_client1'); ?></strong><br><small><?php echo config_item('app_client1'); ?> <?php echo config_item('app_client2'); ?></small>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="tentang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tentang Aplikasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo config_item('app_name2'); ?>
				</div>
				<div class="modal-footer">
					&nbsp;
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="panduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Panduan Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Untuk memulai aplikasi:<br>
				</div>
				<div class="modal-footer">
					&nbsp;
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="kontak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Kontak</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<i class="fa fa-phone"> </i> (0627) 743047<br>
					<i class="fa fa-envelope"> </i> diskominfo@pakpakbharatkab.go.id<br>
					<i class="fa fa-globe"></i> <a href="http://diskominfo.pakpakbharatkab.go.id/" target="_blank">diskominfo.pakpakbharatkab.go.id</a><br>
					<i class="fa fa-twitter"></i> <a href="https://twitter.com/diskominfo_pb" target="_blank"> twitter/diskominfo_pb</a><br>
					<i class="fa fa-facebook"></i><a href="https://www.facebook.com/diskominfo.pakpakbharat/" target="_blank"> facebook.com/diskominfo.pakpakbharat/</a>
				</div>
				<div class="modal-footer">
					&nbsp;
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">FAQ (Frequently Asked Questions)</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<!--       =============   Membuat Collapse ========== -->
					<div id="accordion">
						<div class="card">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Bagaimana jika saya tidak bisa login?
									</button>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									Silahkan menghubungi user pada kontak yang disediakan
								</div>
							</div>
						</div>
						<!--       =============  Akhir Membuat Collapse ========== -->
					</div>
					<div class="modal-footer">
						&nbsp;
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_reset">
						<input type="email" name="email" id="email" class="form-control input-sm" required="required" placeholder="Email">
						<div class="t4_cek_em"></div>
						<input type="submit" class="btn btn-primary btn-sm btn-block" value="Reset">
						<p class="page_info2 text-center text-success"><?php echo @$error; ?></p>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- jQuery 2.2.3 -->
<script src="<?php echo config_item('asset_url'); ?>assets/apps/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo config_item('asset_url'); ?>assets/apps/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	var klik = 0;
	$("#form1").submit(function(){
		$("#reset_password").html("");
		if($("#nip").val()==""){
			$("#nip").focus();
		}
		else if($("#password").val()==""){
			$("#password").focus();
		}else{
			$(".page_info").addClass("text-info");
			$(".page_info").html("Loading...");
			$(".page_info").removeClass("text-success");
			$(".page_info").removeClass("text-warning");
			$(".page_info").removeClass("text-danger");
			var url_login = $("#url_login").val();
			var method = "<?php echo base_url();?>apps/login/proses";
			var string = $("#form1").serialize();
			$.ajax({
				url: method,
				type: "POST",
				data: string,
				success: function(e){
					var json = $.parseJSON(e);
					$(".page_info").addClass(json.type);
					$(".page_info").html(json.msg);
					if(json.status==1){
						window.location="<?php echo base_url()?>apps/home";
					}else{
						klik+=1;
						if(klik>0){
							$("#reset_password").html("<div class='alert alert-warning'>Anda ingin <a href='#' data-toggle='modal' data-target='#myModal'>Reset Password</a>?</div>");
						}
					}
				},
				error: function (jqXHR, exception) {
					var msg = getErrorMessage(jqXHR, exception);
					$(".page_info").addClass("text-info");
					$(".page_info").html(msg);
				}
			});
		}
		return false;
	});
	$("#form_reset").submit(function(){
		$(".page_info2").addClass("text-info");
		$(".page_info2").html('Loading...');
		$(".page_info2").removeClass("text-success");
		$(".page_info2").removeClass("text-danger");
		if($("#email").val()==""){
			$("#email").focus();
		}else{
			var method = "<?php echo base_url();?>apps/login/reset_password";
			var string = $("#form_reset").serialize();
			$.ajax({
				url: method,
				type: "POST",
				data: string,
				success: function(e){
					var json = $.parseJSON(e);
					$(".page_info2").addClass(json.type);
					$(".page_info2").html(json.msg);
				},
				error: function (jqXHR, exception) {
					var msg = getErrorMessage(jqXHR, exception);
					$(".page_info2").addClass("text-info");
					$(".page_info2").html(msg);
				}
			});
		}
		return false;
	});
	function getErrorMessage(jqXHR, exception) {
		var msg = '';
		if (jqXHR.status === 0) {
			msg = 'Not connect.\n Verify Network.';
		} else if (jqXHR.status == 404) {
			msg = 'Requested page not found. [404]';
		} else if (jqXHR.status == 500) {
			msg = 'Internal Server Error [500].';
		} else if (exception === 'parsererror') {
			msg = 'Requested JSON parse failed.';
		} else if (exception === 'timeout') {
			msg = 'Time out error.';
		} else if (exception === 'abort') {
			msg = 'Ajax request aborted.';
		} else {
			msg = 'Uncaught Error.\n' + jqXHR.responseText;
		}
		return msg;
	}
	function getErrorMessage(jqXHR, exception) {
		var msg = '';
		if (jqXHR.status === 0) {
			msg = 'Not connect.\n Verify Network.';
		} else if (jqXHR.status == 404) {
			msg = 'Requested page not found. [404]';
		} else if (jqXHR.status == 500) {
			msg = 'Internal Server Error [500].';
		} else if (exception === 'parsererror') {
			msg = 'Requested JSON parse failed.';
		} else if (exception === 'timeout') {
			msg = 'Time out error.';
		} else if (exception === 'abort') {
			msg = 'Ajax request aborted.';
		} else {
			msg = 'Uncaught Error.\n' + jqXHR.responseText;
		}
		$(".page_info").addClass("text-info");
		$(".page_info").html(msg);
	}
</script>
</body>
</html>