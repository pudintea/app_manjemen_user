<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				APLIKASI
				<small><?=$this->config->item('base_ngaran_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Ubah Password</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Form Ubah Password</h3>
						</div>
						<?php echo form_open_multipart(base_url('Ubah_password/update'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" '); ?>
							<div class="box-body">
								<div class="form-group">
									<label for="password_sebelumnya">Password Sebelumnya</label>
									<div class="input-group password_sebelumnya">
										<div class="input-group-addon">
											<i class="fa fa-unlock"></i>
										</div>
										<input type="password" class="form-control" id="password_sebelumnya" name="password_sebelumnya" required/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="password_baru">Password baru</label>
									<div class="input-group password_baru">
										<div class="input-group-addon">
											<i class="fa fa-unlock-alt"></i>
										</div>
										<input type="password" class="form-control" id="password_baru" name="password_baru" required/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="ulangi_password_baru">Ulangi Password baru</label>
									<div class="input-group ulangi_password_baru">
										<div class="input-group-addon">
											<i class="fa fa-unlock-alt"></i>
										</div>
										<input type="password" class="form-control" id="ulangi_password_baru" name="ulangi_password_baru" required/>
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