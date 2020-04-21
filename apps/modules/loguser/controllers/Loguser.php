<?php
defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed');
/*
 * ***************************************************************
 *  Script 		: Belajar Codeigniter
 *  Version 	: 3.1.11
 *  Date 		: 01 Maret 2020
 *  Author 		: Pudin Saepudin Ilham Development Ciamis
 *  Email 		: najzmitea@@gmail.com
 *  Description : Seorang Petani yang suka dengan teknologi.
 *  Blog 		: https://www.pudintea.web.id / https://anibarstudio.blogspot.com.
 *  Github 		: https://github.com/pudintea.
 * ***************************************************************
 */
class Loguser extends CI_Controller {
	protected $data 	= array();
	protected $simpan 	= array();
	function __construct(){
		parent::__construct();
		$this->doa_masuk->cek_login();
		$this->doa_masuk->is_admin();
		date_default_timezone_set ('Asia/Jakarta');
		$this->data['linkClass'] = $this->ClassNama();
	}
	
	public function MainModel()   { return 'LoguserModel'; }
	public function ActiveMenu()  { return 'loguser'; }
	public function ClassNama()   { return 'loguser'; }
	
	function index()
	{
		$this->data[$this->ActiveMenu()] = 'active';
		$this->template->load('themes/admin/admin_tema', 'table', $this->data);
	}
	
	// Hapus
	function delete(){
		$kode = $this->uri->segment(3);
		$_id_ = base64_decode($kode);

		$this->load->model($this->mainModel() ,'M_najzmi');
		
		$_result = $this->M_najzmi->delete($_id_);
			
			if ($_result) {
				$message = 'BERHASIL, data sudah dihapus';
				$this->session->set_flashdata('success', $message);
			} else {
				$message = 'MAAF data GAGAL dihapus';
				$this->session->set_flashdata('error', $message);
			}
			
			redirect(base_url($this->ClassNama()), 'refresh');
	}
	
	function data_json()
	{
		$tabel = 'm_loguser';
		$column_order = array(null, 'loguser_tgl_input', 'loguser_ip','loguser_username','loguser_status','loguser_jml');
		$column_search = array('loguser_tgl_input', 'loguser_ip','loguser_username','loguser_status','loguser_jml');
		$order = array('id_loguser' => 'DESC'); // default order
			
			$this->load->model('DatatablesModel' ,'M_najzmi');
			$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
			$data = array();
			$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
			foreach ($list as $pDn) {

				switch($pDn->loguser_status){
					case 0:
							$status = 'Gagal';
					break;
					case 1:
							$status = 'Login';
					break;
					case 2:
							$status = 'Logout';
					break;
					default:
							$status = 'Ada Masalah';
				}

				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $pDn->loguser_tgl_input;
				$row[] = $pDn->loguser_ip;
				$row[] = $pDn->loguser_username;
				$row[] = $status;
				$row[] = $pDn->loguser_jml;
				$row[] = anchor($this->ClassNama().'/delete/'.base64_encode($pDn->id_loguser),' ',array("title"=>"Hapus", "class"=>"glyphicon glyphicon-trash", "onclick" =>"if( ! confirm('Apakah anda yakin akan menghapus data ini..??')) return false")) ;

				$data[] = $row;
			}

			$output = array(
							"draw" => isset($_POST['draw']) 	? $_POST['draw'] 	: 'null',
							"recordsTotal" => $this->M_najzmi->count_all($tabel,$column_order,$column_search,$order),
							"recordsFiltered" => $this->M_najzmi->count_filtered($tabel,$column_order,$column_search,$order),
							"data" => $data,
					);
			//output to json format
			header('Content-type: application/json');
			echo json_encode($output);
		// End Json
	}
	
}