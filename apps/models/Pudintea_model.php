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
class Pudintea_model extends CI_Model
	{

	private $_result 	= FALSE;
	private $_data 		= [];

	public function is_admin($_where)
		{
			$this->db->select('id_user, user_username, grup_nama');
			$_admin = $this->config->item('base_ngaran_admin');
			$this->db->where($_where);
			$listdt = $this->db->get('v_usergrup')->result();
			foreach ($listdt as $pDn){
				if ($pDn->grup_nama == $_admin){
					return true;
				}else{
					return false;
				}
			}
		}
	}

	