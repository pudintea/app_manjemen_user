<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Aplikasi
				<small><?=$this->config->item('base_ngaran_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?=base_url($linkClass);?>">Grup</a></li>
				<li class="active">Edit</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Form Edit Grup</h3>
						</div>
						<?php echo form_open_multipart(base_url($linkClass.'/update'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" '); 
						echo form_hidden('kode_grup', base64_encode($edit_grup->id_grup));
						echo form_hidden('asal', base64_encode($edit_grup->grup_nama));
						?>
							<div class="box-body">
								<div class="form-group">
									<label for="nama_grup">Nama Grup</label>
									<div class="input-group nama_grup">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<input type="text" class="form-control" id="nama_grup" name="nama_grup" value="<?=$edit_grup->grup_nama;?>" required />
									</div>
								</div>
								
								<div class="form-group">
									<label for="deskripsi">Deskripsi</label>
									<div class="input-group deskripsi">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?=$edit_grup->grup_deskripsi;?>" />
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