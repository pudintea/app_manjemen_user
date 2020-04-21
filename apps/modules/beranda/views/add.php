<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Aplikasi
				<small>Raport k13</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?=base_url('Admin_data_ekstra');?>">Data Ekstrakurikuler</a></li>
				<li class="active">Tambah</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Form Tambah Ekstrakurikuler</h3>
						</div>
						<?php echo form_open_multipart(base_url('Admin_data_ekstra/save'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" '); ?>
							<div class="box-body">
								<div class="form-group">
									<label for="nama">Nama</label>
									<div class="input-group nama">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input type="text" class="form-control" id="nama" name="nama">
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