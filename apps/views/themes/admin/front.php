<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Aplikasi <?=$this->config->item('base_ngaran_aplikasi');?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/Ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/datatables.net-bs/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/dist/css/skins/_all-skins.min.css">

		<script src="<?=base_url('wp-content');?>/jquery/dist/jquery.min.js"></script>
		<script src="<?=base_url('wp-content');?>/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?=base_url('wp-content');?>/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?=base_url('wp-content');?>/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="<?=base_url('wp-content');?>/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="<?=base_url('wp-content');?>/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="<?=base_url('wp-content');?>/fastclick/lib/fastclick.js"></script>
		<script src="<?=base_url('wp-content');?>/dist/js/adminlte.min.js"></script>
		<script src="<?=base_url('wp-content');?>/dist/js/demo.js"></script>

	  <!-- Google Font -->
		<link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body>
		<?=$contents;?>
	</body>
</html>
