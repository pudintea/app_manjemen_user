<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Aplikasi
				<small><?=$this->config->item('base_ngaran_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?=base_url($linkClass);?>">User Grup</a></li>
				<li class="active">Tambah</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Form Tambah User Grup</h3>
						</div>
						<?php echo form_open_multipart(base_url($linkClass.'/save'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" '); ?>
							<div class="box-body">
								<div class="form-group">
									<label for="user">User</label>
									<div class="input-group user">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select type="text" class="form-control" id="user" name="user" >
											<?php if (!empty($get_user)){
												foreach($get_user as $gu){
												?>
											<option value="<?=$gu->id_user;?>"><?=$gu->user_nama_depan .' '.$gu->user_nama_belakang;?> (<?=$gu->user_username;?>)</option>
												<?php }} ?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label for="grup">Grup</label>
									<div class="input-group grup">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select type="text" class="form-control" id="grup" name="grup" >
											<?php if (!empty($get_grup)){
												foreach($get_grup as $gg){
												?>
											<option value="<?=$gg->id_grup;?>"><?=$gg->grup_nama;?></option>
												<?php }} ?>
										</select>
									</div>
								</div>
								
							</div>
							<div class="box-footer text-right">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						<?=form_close();?>
					</div>
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
			</div>
		</section>
	</div>