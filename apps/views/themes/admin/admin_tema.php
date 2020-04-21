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
	<body class="skin-blue sidebar-mini layout-boxed">
		<div class="wrapper">
			<header class="main-header">
				<a href="<?=base_url('Judul_rapat');?>" class="logo">
					<span class="logo-mini"><b>A</b>TI</span>
					<span class="logo-lg"><b>Admin</b>TI</span>
				</a>
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>

					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								  <img src="<?=base_url('wp-content');?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
								  <span class="hidden-xs"><?=$this->session->userdata('ses_user_nama');?></span>
								</a>
								<ul class="dropdown-menu">
									<li class="user-header">
										<img src="<?=base_url('wp-content');?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
										<p>
											<?=$this->session->userdata('ses_user_nama');?> - <?=$this->session->userdata('ses_user_username');?>
											<small>Member since Nov. 2012</small>
										</p>
									</li>
									<li class="user-footer">
										<div class="pull-left">
											<a href="#" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											<a href="<?=base_url('login/logout');?>" class="btn btn-default btn-flat">Sign out</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<aside class="main-sidebar">
				<section class="sidebar">
					<div class="user-panel">
						<div class="pull-left image">
							<img src="<?=base_url('wp-content');?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
							<p><?=$this->session->userdata('ses_user_nama');?></p>
							<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>
					</div>
					<form action="#" method="get" class="sidebar-form">
						<div class="input-group">
							<input type="text" name="q" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
					<ul class="sidebar-menu" data-widget="tree">
						<li class="header">MAIN NAVIGATION</li>
						<li class="<?php echo isset($beranda) ? $beranda	: ''; ?>">
							<a href="<?=base_url('beranda');?>">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						<li class="<?php echo isset($user) ? $user	: ''; ?>">
							<a href="<?=base_url('user');?>">
								<i class="fa fa-user-o"></i> <span>User</span>
							</a>
						</li>
						<li class="<?php echo isset($grup) ? $grup	: ''; ?>">
							<a href="<?=base_url('grup');?>">
								<i class="fa fa-users"></i> <span>Grup</span>
							</a>
						</li>
						<li class="<?php echo isset($usergrup) ? $usergrup	: ''; ?>">
							<a href="<?=base_url('usergrup');?>">
								<i class="fa fa-arrows"></i> <span>User Grup</span>
							</a>
						</li>
						<li class="<?php echo isset($loguser) ? $loguser	: ''; ?>">
							<a href="<?=base_url('loguser');?>">
								<i class="fa fa-th-list"></i> <span>Log User</span>
							</a>
						</li>
						<li class="<?php echo isset($ubah_password) ? $ubah_password	: ''; ?>">
							<a href="<?=base_url('ubah_password');?>">
								<i class="fa fa-unlock"></i> <span>Ubah Password</span>
							</a>
						</li>
						<li class="">
							<a href="<?=base_url('login/logout');?>">
								<i class="fa fa-sign-out"></i> <span>Logout</span>
							</a>
						</li>
					</ul>
				</section>
			</aside>
				<?=$contents;?>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					Page rendered in <strong>{elapsed_time}</strong>
				</div>
				<strong>Copyright <a href="https://www.pudintea.web.id">Sub Bagian Teknologi Informasi</a></strong>
			</footer>
		</div>
	</body>
</html>
