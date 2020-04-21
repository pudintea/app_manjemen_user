<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>404 Error Page</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/Ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="hold-transition lockscreen">
		<div class="lockscreen-wrapper">
    		<section class="content">
      			<div class="error-page">
        			<h2 class="headline text-yellow"> 404</h2>

        			<div class="error-content">
          				<h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
          				<p>The page you requested was not found.</p>
          				<form class="search-form">
            				<div class="input-group">
              					<input type="text" name="search" class="form-control" placeholder="Search">

              					<div class="input-group-btn">
                					<button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                					</button>
              					</div>
            				</div>
          				</form>
        			</div>
      			</div>
    		</section>
  			<div class="lockscreen-footer text-center">
    			Copyright &copy; 2019-<?=date('Y')?> <b><a href="https://www.pudintea.web.id" class="text-black">Anibar Studio</a></b><br>
    			All rights reserved
  			</div>
		</div>
	<script src="<?=base_url('wp-content');?>/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url('wp-content');?>/bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>
