<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Login extends CI_Controller {
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
	protected $data 	= array();
	protected $_tbm 	= array();
	protected $simpan 	= array();
	protected $masukan 	= array();
    function __construct()
    {
        parent::__construct();
		date_default_timezone_set ('Asia/Jakarta');
		$this->data['linkClass'] = $this->ClassNama();
		$this->config->load('pudintea', TRUE);
		$this->_tbm = $this->config->item('_tbm', 'pudintea');
    }
	
	public function MainModel()   	 { return 'LoginModel';}
	public function ActiveMenu()  	 { return 'login';}
	public function ClassNama()   	 { return 'login';}
	public function ClassBeranda()   { return 'beranda';}
	public function Keys_login()     { return '_@@_N4JM1_PUD1NT34_@@_1234567890_$$_najzmitea@gmail(dot)com-01-03-2020'.date('Y-m-d').'_'.base_url();}
	
	function index(){

		if ($this->session->userdata('ses_pDn_kode_masuk') == md5($this->Keys_login())){
			redirect(base_url($this->ClassBeranda()), 'refresh');
		}
		
		$this->load->view('login');
		
	}
	
	function masuk(){
		$_u = str_replace(' ', '', $this->input->post('username', TRUE));
		$_p = str_replace(' ', '', $this->input->post('password', TRUE));

		if (empty($_u) and empty($_p) ){
			// kalau KOSONG
			$message = 'Form tidak boleh kosong';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('login'), 'refresh');
		}
		
		$this->load->model($this->mainModel(),'M_najzmi');

		$brp_salah = $this->M_najzmi->cek_salah_login($this->_tbm['_loguser'], $_u);
		if ($brp_salah >= $this->config->item('_max_error_loguser', 'pudintea')){
			$message = 'MAAF, Anda sudah melebihi batas salah login sebanyak '.$this->config->item('_max_error_loguser', 'pudintea').' Kali, Silahkan Hubungi Administrator';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('login'), 'refresh');
		}
		$periksa_username = $this->M_najzmi->periksa_identitas($this->_tbm['_user'], 'user_username', $_u);
		if($periksa_username == FALSE){
			
			$periksa_email = $this->M_najzmi->periksa_identitas($this->_tbm['_user'], 'user_email', $_u);
			if ($periksa_email == FALSE){
				
				$this->salah_login($_u);
				$message = 'MAAF, Username/Email yang kamu masukan tidak ada';
				$this->session->set_flashdata('error', $message);
				redirect(base_url('login'), 'refresh');
				
			}else{
				
				$tampil_user = $this->M_najzmi->tampilUser($this->_tbm['_user'], 'user_email', $_u);
				$passwordnya = $this->encryption->decrypt($tampil_user->user_password);
				if ($passwordnya != md5($_p)){
					$this->salah_login($_u);
					$message = 'MAAF, Password yang anda masukan salah';
					$this->session->set_flashdata('error', $message);
					redirect(base_url('login'), 'refresh');
				}
				
				$this->masukan_session($tampil_user);
				$this->benar_login($_u);
				redirect(base_url($this->ClassBeranda()), 'refresh');
				
			}
		}else{
			$tampil_user = $this->M_najzmi->tampilUser($this->_tbm['_user'], 'user_username', $_u);
			$passwordnya = $this->encryption->decrypt($tampil_user->user_password);
			if ($passwordnya != md5($_p)){
				//die();
				$this->salah_login($_u);
				$message = 'MAAF, Password yang anda masukan salah';
				$this->session->set_flashdata('error', $message);
				redirect(base_url('login'), 'refresh');
			}
			//die();
			$this->masukan_session($tampil_user);
			$this->benar_login($_u);
			redirect(base_url($this->ClassBeranda()), 'refresh');
		}
	}
	
function masukan_session($_isinya)
	{
		if(!empty($_isinya)){
			$sess_data['ses_id_user'] 			= $_isinya->id_user;
			$sess_data['ses_user_nama'] 		= $_isinya->user_nama_depan.' '.$_isinya->user_nama_belakang;
			$sess_data['ses_user_username'] 	= $_isinya->user_username;
			$sess_data['ses_user_email'] 		= $_isinya->user_email;
			$sess_data['ses_user_status'] 		= $_isinya->user_status;
			$sess_data['ses_pDn_kode_masuk'] 	= md5($this->Keys_login());
			$this->session->set_userdata($sess_data);
		}
	}

function benar_login($_username)
	{
		if(empty($_username)){
			return FALSE;
		}
		$this->M_najzmi->delete_login($this->_tbm['_loguser'], 'loguser_username', $_username, '0');
		$this->M_najzmi->delete_login($this->_tbm['_loguser'], 'loguser_username', $_username, '1');
		$this->M_najzmi->delete_login($this->_tbm['_loguser'], 'loguser_username', $_username, '2');
		
		$this->masukan['loguser_tgl'] 		= date('Y-m-d');
		$this->masukan['loguser_username'] 	= $_username;
		$this->masukan['loguser_ip'] 		= $this->input->ip_address();
		$this->masukan['loguser_jml'] 		= '1';
		$this->masukan['loguser_status'] 	= '1';
		$this->masukan['loguser_time'] 		= time();
		$this->masukan['loguser_token'] 	= $this->config->item('_loguser_token', 'pudintea');
		$this->masukan['loguser_tgl_input'] = date('Y-m-d H:i:s');
						
		$_save = $this->M_najzmi->save($this->_tbm['_loguser'], $this->masukan);
		if ($_save){
			return TRUE;
		}else{
			return FALSE;
		}
	}

function salah_login($_username)
	{
		$this->load->model($this->mainModel(),'M_najzmi');
		if ($this->M_najzmi->cek_salah_login($this->_tbm['_loguser'], $_username) >= $this->config->item('_max_error_loguser', 'pudintea')){
			$message = 'MAAF, Anda sudah melebihi batas salah login sebanyak '.$this->config->item('_max_error_loguser', 'pudintea').' Kali';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('login'), 'refresh');

		}elseif($this->M_najzmi->cek_salah_login($this->_tbm['_loguser'], $_username) == 0){

			$this->M_najzmi->delete_login($this->_tbm['_loguser'], 'loguser_username', $_username, '0');
			
			$this->masukan['loguser_tgl'] 		= date('Y-m-d');
			$this->masukan['loguser_username'] 	= $_username;
			$this->masukan['loguser_ip'] 		= $this->input->ip_address();
			$this->masukan['loguser_jml'] 		= '1';
			$this->masukan['loguser_status'] 	= '0';
			$this->masukan['loguser_time'] 		= time();
			$this->masukan['loguser_token'] 	= $this->config->item('_loguser_token', 'pudintea');
			$this->masukan['loguser_tgl_input'] = date('Y-m-d H:i:s');
						
			$_save = $this->M_najzmi->save($this->_tbm['_loguser'], $this->masukan);
			if ($_save){
				return TRUE;
			}else{
				return FALSE;
			}	
		}else{
			$tampil_salah 					= $this->M_najzmi->tampilkan_salah_login($this->_tbm['_loguser'], $_username);
			$jml_log 						= $tampil_salah->loguser_jml;
			$this->masukan['loguser_jml'] 	= $jml_log + 1;
			$where							= array('loguser_username' => $_username, 'loguser_status' => '0');
			$update							= $this->M_najzmi->update($this->_tbm['_loguser'], $where, $this->masukan);
					
			if ($update){
				return TRUE;
			}else{
				return FALSE;
			}
		}

	}
	
function simpan_logout($_username)
	{
		$this->load->model($this->mainModel(),'M_najzmi');
		$this->masukan['loguser_status'] 	= '2';
		$where								= array('loguser_username' => $_username, 'loguser_status' => '1');
		$update								= $this->M_najzmi->update($this->_tbm['_loguser'], $where, $this->masukan);
					
		if ($update){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
function logout()
    {
			$this->simpan_logout($this->session->userdata('ses_user_username'));
			$this->session->sess_destroy();
			redirect(base_url('login'), 'refresh');
    }

}
