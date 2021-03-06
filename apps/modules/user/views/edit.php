<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Aplikasi
				<small><?=$this->config->item('base_ngaran_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?=base_url($linkClass);?>">User</a></li>
				<li class="active">Edit</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Form Edit User</h3>
						</div>
						<?php echo form_open_multipart(base_url($linkClass.'/update'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" ');
						echo form_hidden('kode_user',base64_encode($edit_user->id_user));
						echo form_hidden('asal',base64_encode($edit_user->user_email));
						?>
							<div class="box-body">
								<div class="form-group">
									<label for="nama_depan">Nama Depan</label>
									<div class="input-group nama_depan">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?=$edit_user->user_nama_depan;?>" required />
									</div>
								</div>
								
								<div class="form-group">
									<label for="nama_belakang">Nama Belakang</label>
									<div class="input-group nama_belakang">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?=$edit_user->user_nama_belakang;?>" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="email">Email</label>
									<div class="input-group email">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<input type="email" class="form-control" id="email" name="email" value="<?=$edit_user->user_email;?>" required />
									</div>
								</div>
								
								<div class="form-group">
									<label for="telpon">Telpon</label>
									<div class="input-group telpon">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<input type="text" class="form-control" id="telpon" name="telpon" value="<?=$edit_user->user_telpon;?>" />
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