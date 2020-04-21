<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<?=$this->config->item('base_title_aplikasi');?>
				<small><?=$this->config->item('base_deskripsi_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?=base_url('User');?>">Data User</a></li>
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
						<?php echo form_open_multipart(base_url('User/update'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" '); 
							echo form_hidden('kode_user', base64_encode($edit_user->id_user));
							echo form_hidden('kode_username', $edit_user->user_username);
						?>
							<div class="box-body">
								<div class="form-group">
									<label for="nama">Nama</label>
									<div class="input-group nama">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input type="text" class="form-control" id="nama" name="nama" value="<?=$edit_user->user_nama?>" required/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="username">Username</label>
									<div class="input-group username">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input type="text" class="form-control" id="username" name="username" value="<?=$edit_user->user_username?>" required/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="email">Email</label>
									<div class="input-group email">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input type="email" class="form-control" id="email" name="email" value="<?=$edit_user->user_email?>" required/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="jk">Jenis Kelamin</label>
									<div class="input-group jk">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<select type="text" class="form-control" id="jk" name="jk">
											<option value="value="<?=$edit_user->user_jk?>"">- <?=$edit_user->user_jk?> -</option>
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label for="level">Level</label>
									<div class="input-group level">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<select type="text" class="form-control" id="level" name="level">
											<option value="<?=$edit_user->user_level?>">- <?=$edit_user->user_level?> -</option>
											<option value="admin">admin</option>
											<option value="guest">guest</option>
										</select>
									</div>
								</div>
					  
							</div>
							<div class="box-footer text-right">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
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