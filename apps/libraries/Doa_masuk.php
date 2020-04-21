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
class Doa_masuk {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->model($this->mainModel());
	}

	public function MainModel()   { return 'Pudintea_model'; }

	// Cek login
	public function cek_login() {
		$keys = md5('_@@_N4JM1_PUD1NT34_@@_1234567890_$$_najzmitea@gmail(dot)com-01-03-2020'.date('Y-m-d').'_'.base_url());
		if($this->CI->session->userdata('ses_pDn_kode_masuk') != $keys) {
			$this->CI->session->set_flashdata('sukses','Oops...silakan login dulu');
			redirect(base_url('login'));
		}
	}

	public function is_admin()
	{
		$this->CI->load->model($this->mainModel() , 'M_pudin');
		$_where = array(
			'user_username'=>$this->CI->session->userdata('ses_user_username'), 
			'id_user'=>$this->CI->session->userdata('ses_id_user')
			);

		$cek = $this->CI->M_pudin->is_admin($_where);
		if($cek == false){
			
			redirect(base_url('login/logout'), 'refresh');
		}
	}
	
}