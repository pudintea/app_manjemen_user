<?php defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Aplikasi <?=$this->config->item('base_ngaran_aplikasi');?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?=base_url('wp-content/');?>bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content/');?>font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/datatables.net-bs/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content/');?>Ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content/');?>dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content/');?>dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="hold-transition skin-blue layout-top-nav">
		<div class="wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<a href="<?=base_url('Frontend');?>" class="navbar-brand"><b>APP</b><?=$this->config->item('base_ngaran_aplikasi');?></a>
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
								<i class="fa fa-bars"></i>
							</button>
						</div>

						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
							<ul class="nav navbar-nav">
								<li class="<?php echo isset($kampus) ? $kampus	: ''; ?>"><a href="<?=base_url('Frontend');?>">Kampus <span class="sr-only">(current)</span></a></li>
								<li class="<?php echo isset($permohonan) ? $permohonan	: ''; ?>"><a href="#">Form Permohonan <span class="sr-only">(current)</span></a></li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
			<div class="content-wrapper">
				<div class="container">
					<section class="content-header">
						<h1>
							Aplikasi
							<small><?=$this->config->item('base_ngaran_aplikasi');?></small>
						</h1>
						<ol class="breadcrumb">
							<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
							<li><a href="#">Kampus</a></li>
							<li class="active">Form Permohonan</li>
						</ol>
					</section>
					<!-- CONTENT -->
					<?=$contents;?>
					<!-- END CONTENT -->
				</div>
			</div>
			
			<footer class="main-footer">
				<div class="container">
					<div class="pull-right hidden-xs">
						<b>Version</b> 2.4.13
					</div>
					<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
					reserved.
				</div>
			</footer>
		</div>
	<script src="<?=base_url('wp-content/');?>jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url('wp-content/');?>bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url('wp-content');?>/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('wp-content');?>/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?=base_url('wp-content/');?>jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url('wp-content/');?>fastclick/lib/fastclick.js"></script>
	<script src="<?=base_url('wp-content/');?>dist/js/adminlte.min.js"></script>
	<script src="<?=base_url('wp-content/');?>dist/js/demo.js"></script>
	</body>
</html>
