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
class Beranda extends MX_Controller {
	protected $data 	= array();
	protected $simpan 	= array();
	function __construct(){
		parent::__construct();
		$this->doa_masuk->cek_login();
		$this->doa_masuk->is_admin();
		date_default_timezone_set ('Asia/Jakarta');
		$this->data['linkClass'] = $this->ClassNama();
	}
	
	public function MainModel()   { return 'BerandaModel'; }
	public function ActiveMenu()  { return 'beranda'; }
	public function ClassNama()   { return 'beranda'; }
	
	/* ============================================================*/
// Index	
	public function index() {
		$this->data[$this->ActiveMenu()] = 'active';
        $this->template->load('themes/admin/admin_tema', 'content', $this->data);
    }

}