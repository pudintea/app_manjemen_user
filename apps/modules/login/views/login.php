<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Aplikasi | <?=$this->config->item('base_ngaran_aplikasi');?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/Ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/plugins/iCheck/square/blue.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="<?=base_url();?>"><b>Aplikasi</b><?=$this->config->item('base_ngaran_aplikasi');?></a>
			</div>
			<div class="login-box-body">
				<p class="login-box-msg">Silahkan login dengan username dan password</p>

				<form role="form" action="<?=base_url('login/masuk');?>" method="post" id="FormNajzmi" onsubmit="return validateForm()" >
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Username" name="username">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8">

						</div>
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
						</div>
					</div>
				</form>
			</div>
			<br/>
				<div class="">
					<?php
					if ($this->session->flashdata('success')) {
						echo '<div class="alert alert-dismissable alert-success">'
							.'  <button type="button" class="close" data-dismiss="alert">×</button>'
							.   $this->session->flashdata('success')
							.'</div>';
					}
					if ($this->session->flashdata('error')) {
						echo '<div class="alert alert-dismissable alert-danger">'
							.'  <button type="button" class="close" data-dismiss="alert">×</button>'
							.   $this->session->flashdata('error')
							.'</div>';
					}
					?>
				</div>
		</div>
	<script src="<?=base_url('wp-content');?>/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url('wp-content');?>/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url('wp-content');?>/plugins/iCheck/icheck.min.js"></script>
	</body>
</html>
