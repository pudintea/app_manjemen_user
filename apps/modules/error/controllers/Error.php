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
class Error extends MX_Controller {
	protected $data 	= array();
	protected $simpan 	= array();
	function __construct(){
		parent::__construct();
		date_default_timezone_set ('Asia/Jakarta');
	}
	
	public function ActiveMenu()  { return 'error'; }
	public function ClassNama()   { return 'error'; }
	
	/* ============================================================*/
// Index	
	public function index() {
		$this->data[$this->ActiveMenu()] = 'active';
        //$this->template->load('themes/admin/front', '404', $this->data);
        $this->load->view('404', $this->data);
    }

}