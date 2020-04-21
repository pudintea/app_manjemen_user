<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<?=$this->config->item('base_title_aplikasi');?>
				<small><?=$this->config->item('base_deskripsi_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<a href="<?=base_url('User/add');?>" class="btn btn-primary">Tambah</a>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table id="mytable" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th width="5%"class="text-center" >No</th>
											<th >Nama</th>
											<th class="text-center" >Username</th>
											<th class="text-center" >Email</th>
											<th class="text-center" >Level</th>
											<th class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="">
						<p>Password defaultnya adalah : <b>akubahagia</b></p>
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
<script type="text/javascript">
/* Datatables */
	  var humas_it = $("#mytable").DataTable({
	  "order" 			: [], //Initial no order.
      "ordering" 		: true,
      "info"			: true,
      "scrollX"			: false,
      "searching"		: true,
	  "bLengthChange"   : true,
      "processing"		: true,
      "serverSide"		: true,
	  "Filter"          : true,
      "Sort"            : true,
	  "AutoWidth"       : false,
      "paging"          : true,
	  "serverSide"		: true,
      "Sorting"         : [],
      "ajax" 			: {
        "url": "<?=base_url('User/data_json');?>",
        "type":'POST',
      },
	  "oLanguage"        : {
            "sProcessing":   "Sedang memproses...",
			"sLengthMenu":   "Tampilkan _MENU_ entri data",
			"sZeroRecords":  "Tidak ditemukan data yang sesuai",
			"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri data",
			"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
			"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
			"sInfoPostFix":  "",
			"sSearch":       "Cari:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst":    "Pertama",
				"sPrevious": "Sebelumnya",
				"sNext":     "Selanjutnya",
				"sLast":     "Terakhir"
			}
        },
	  
	  "columnDefs"	: [{
            "sClass": "text-center",
			"targets": [ 0, 5 ],
            "orderable": false
        }
		],
  });
</script>