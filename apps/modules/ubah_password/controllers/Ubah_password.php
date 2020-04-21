<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');
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
class Ubah_password extends MX_Controller {
	protected $data 	= array();
	protected $masukan 	= array();
	function __construct(){
		parent::__construct();
		$this->doa_masuk->cek_login();
		date_default_timezone_set ('Asia/Jakarta');
		$this->data['linkClass'] = $this->ClassNama();
	}
	
	public function MainModel()   { return 'Ubah_passwordModel'; }
	public function ActiveMenu()  { return 'ubah_password'; }
	public function ClassNama()   { return 'ubah_password'; }
	
	/* ============================================================*/
// Index	
	public function index() {
		$this->data[$this->ActiveMenu()] = 'active';
        $this->template->load('themes/admin/admin_tema', 'add', $this->data);
    }

	public function update()
	{

		
		$password_sebelumnya			= $this->input->post('password_sebelumnya');
		$password_baru					= $this->input->post('password_baru');
		$ulangi_password_baru			= $this->input->post('ulangi_password_baru');

		if ( empty($password_sebelumnya) || empty($password_baru) || empty($ulangi_password_baru)
		){
			$message = 'MAAF, Password gagal di ubah, mohon periksa form yang anda isi sebelum menyimpanya.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url($this->ClassNama()), 'refresh');
		}
		
		$this->load->model($this->MainModel(), 'M_najzmi');
		$cek_password_sebelumnya = $this->M_najzmi->edit($this->session->userdata('ses_id_user'));
		$psswd_sebelumnya = $cek_password_sebelumnya->user_password;
		$decrypt_pswd = $passwordnya = $this->encryption->decrypt($psswd_sebelumnya);
		
		if (md5($password_sebelumnya) != $decrypt_pswd){
			$message = 'MAAF, Password sebelumnya tidak sama, mohon masukan dengan teliti.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url($this->ClassNama()), 'refresh');
		}
		
		if ( $password_baru != $ulangi_password_baru){
			$message = 'MAAF, Password baru dan Ulangi password baru anda tidak sama.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url($this->ClassNama()), 'refresh');
		}
		
		$this->masukan['user_password'] = $this->encryption->encrypt(md5($password_baru));
		
		$input = $this->M_najzmi->update($this->masukan, $this->session->userdata('ses_id_user'));
		
		if ($input){
			$message = "TERIMAKASIH, Password berhasil diubah";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "MAAF, Password gagal diubah.";
            $this->session->set_flashdata('error', $message);
		}
        redirect(base_url($this->ClassNama()), 'refresh');
		
    }
}
