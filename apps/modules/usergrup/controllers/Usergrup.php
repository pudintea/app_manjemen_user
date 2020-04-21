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
class Usergrup extends CI_Controller {
	protected $data 	= array();
	protected $simpan 	= array();
	function __construct(){
		parent::__construct();
		$this->doa_masuk->cek_login();
		$this->doa_masuk->is_admin();
		date_default_timezone_set ('Asia/Jakarta');
		$this->data['linkClass'] = $this->ClassNama();
	}
	
	public function MainModel()   { return 'UsergrupModel'; }
	public function ActiveMenu()  { return 'usergrup'; }
	public function ClassNama()   { return 'usergrup'; }
	
	function index()
	{
		$this->data[$this->ActiveMenu()] = 'active';
		$this->template->load('themes/admin/admin_tema', 'table', $this->data);
	}
	
	function add()
	{
		$this->load->model($this->MainModel(), 'M_najzmi');
		$this->data['get_user'] = $this->M_najzmi->getUser();
		$this->data['get_grup'] = $this->M_najzmi->getGrup();
		$this->data[$this->ActiveMenu()] = 'active';
		$this->template->load('themes/admin/admin_tema', 'add', $this->data);
	}
	
	function save()
	{
		$this->simpan['user_grup_id_user'] 	= $this->input->post('user');
		$this->simpan['user_grup_id_grup'] 	= $this->input->post('grup');
		$this->simpan['user_grup_tgl_input'] 	= date('Y-m-d H:i:s');
		
		if (empty($this->simpan['user_grup_id_user']) && empty($this->simpan['user_grup_id_grup'])) {
			$message = "Tidak boleh kosong";
            $this->session->set_flashdata('error', $message);
			redirect(base_url($this->ClassNama().'/add'), 'refresh');
		}
		
		$this->load->model($this->MainModel(), 'M_najzmi');
		
		$input = $this->M_najzmi->save($this->simpan);
		
		if ($input){
			$message = "BERHASIL, data sudah ditambahkan";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "MAAF, data GAGAL ditambahkan";
            $this->session->set_flashdata('error', $message);
		}
		
        redirect(base_url($this->ClassNama()), 'refresh');
	}
	
	function edit()
	{
		$kode = $this->uri->segment(3);
		$_id_ = base64_decode($kode);
		
		$this->data[$this->ActiveMenu()] = 'active';
		$this->load->model($this->MainModel(), 'M_najzmi');
		$this->data['edit_grup'] = $this->M_najzmi->edit($_id_);
		
		$this->template->load('themes/admin/admin_tema', 'edit', $this->data);

	}
	
	function update()
	{	
		$kode = $this->input->post('kode_grup');
		$_id_ = base64_decode($kode);
		
		$asal_nama = base64_decode($this->input->post('asal'));
		
		$this->simpan['grup_nama'] 			= str_replace(' ', '', $this->input->post('nama_grup'));
		$this->simpan['grup_deskripsi'] 	= $this->input->post('deskripsi');
		
		if (empty($this->simpan['grup_nama'])){
			$message = "Tidak boleh kosong";
            $this->session->set_flashdata('error', $message);
            redirect(base_url($this->ClassNama().'/edit/'.$kode), 'refresh');
		}
		
		$this->load->model($this->MainModel(), 'M_najzmi');
		
		if ($this->simpan['grup_nama'] != $asal_nama){
			$ada_gak = $this->M_najzmi->periksa('grup_nama', $this->simpan['grup_nama']);
			if ($ada_gak > 0) {
				$message = "MAAF, Grup Sudah Ada";
				$this->session->set_flashdata('error', $message);
				redirect(base_url($this->ClassNama().'/edit/'.$kode), 'refresh');
			}
		}
		
		$input = $this->M_najzmi->update($this->simpan, $_id_);
		
		if ($input){
			$message = "BERHASIL, data sudah diupdate";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "MAAF data GAGAL diupdate";
            $this->session->set_flashdata('error', $message);
		}
        redirect(base_url($this->ClassNama()), 'refresh');
        
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
		$tabel = 'v_usergrup';
		$column_order = array(null,'user_nama_depan', 'user_username', 'grup_nama');
		$column_search = array('user_nama_depan', 'user_username', 'grup_nama');
		$order = array('user_nama_depan' => 'DESC'); // default order
			
			$this->load->model('DatatablesModel' ,'M_najzmi');
			$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
			$data = array();
			$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
			foreach ($list as $pDn) {

				
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $pDn->user_nama_depan.' '.$pDn->user_nama_belakang;
				$row[] = $pDn->user_username;
				$row[] = $pDn->grup_nama;
				$row[] = anchor($this->ClassNama().'/delete/'.base64_encode($pDn->id_user_grup),' ',array("title"=>"Hapus", "class"=>"glyphicon glyphicon-trash", "onclick" =>"if( ! confirm('Apakah anda yakin akan menghapus data ini..??')) return false")) ;

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