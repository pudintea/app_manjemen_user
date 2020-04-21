<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');
/*
 * ***************************************************************
 *  Script 		: Belajar Codeigniter
 *  Version 	: 3.1.11
 *  Date 		: 01 Maret 2020
 *  Author 		: Pudin Saepudin Ilham Development Ciamis
 *  Email 		: najzmitea@gmail.com
 *  Description : Seorang Petani yang suka dengan teknologi.
 *  Blog 		: https://www.pudintea.web.id / https://anibarstudio.blogspot.com.
 *  Github 		: https://github.com/pudintea.
 * ***************************************************************
 */
 
 /* Tabel Master */
$config['_tbm']['_user']          	= 'm_user';
$config['_tbm']['_grup']          	= 'm_grup';
$config['_tbm']['_loguser']  		= 'm_loguser';


/* Tabel Transaksi */
$config['_tbt']['_user_grup']    	= 't_user_grup';


/* Tabel View */
$config['_tbv']['_usergrup']  		= 'v_usergrup';


/* LOG USER */
$config['_loguser_token']			= md5(date('Y-m-d H'));
$config['_keys_login']				= md5('_@@_N4JM1_PUD1NT34_@@_1234567890_$$_najzmitea@gmail(dot)com-01-03-2020'.date('Y-m-d').'_'.base_url());
$config['_max_error_loguser']		= '5';


/* PASSWORD */
$config['hash_method']				= 'bcrypt';	// bcrypt or argon2
$config['bcrypt_default_cost']		= 10;		// Set cost according to your server benchmark - but no lower than 10 (default PHP value)
$config['bcrypt_admin_cost']		= 12;		// Cost for user in admin group
$config['argon2_default_params']	= [
	'memory_cost'	=> 1 << 12,	// 4MB
	'time_cost'		=> 2,
	'threads'		=> 2
];
$config['argon2_admin_params']		= [
	'memory_cost'	=> 1 << 14,	// 16MB
	'time_cost'		=> 4,
	'threads'		=> 2
];



$config['default_group']              = 'members';
$config['admin_group']                = 'Administrator';
$config['min_password_length']        = 8;
$config['user_expire']                = 86500;
		

/* End of file Pudintea.php */
/* Location: ./apps/config/Pudintea.php */