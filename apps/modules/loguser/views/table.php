<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				APLIKASI
				<small><?=$this->config->item('base_ngaran_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Log User Login</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-body">
							<div class="table-responsive">
								<table id="mytable" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th width="5%" class="text-center" >No</th>
											<th >Tanggal</th>
											<th >IP</th>
											<th >Username</th>
											<th >Status</th>
											<th >Jml</th>
											<th width="10%" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
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
        "url": "<?=base_url($linkClass.'/data_json');?>",
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
			"targets": [ 0, 6 ],
            "orderable": false
        },{
            "sClass": "text-center",
			"targets": [ 4, 5 ],
        }
		],
  });
</script>
