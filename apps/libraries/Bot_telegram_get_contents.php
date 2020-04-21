<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

/* *****************************

Pudin Saepudin Ilham
najzmitea@gmail.com
Ciamis Asli

Blog : Anibar Studio
Link : https://anibarstudio.blogspot.com
Lokasi : /apps/libraries/
- Load dulu librarynya
$this->load->library('Bot_telegram_get_contents');
- Ini untuk mengirim pesanya
$this->bot_telegram_get_contents->kirim_pesan('Kirim Pesan Ini');
******************************** */

class Bot_telegram_get_contents {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {

		$this->CI =& get_instance();
	}

	// Kirim Pesan
	public function kirim_pesan($message_text) {
		$token_bot 			= "TOKEN";
		$data['chat_id']	= 'ID';
		$data['text']		= $message_text;
		$url	 ="https://api.telegram.org/bot".$token_bot."/";
		$url	.="sendMessage?";
		foreach ($data as $k => $v) {
			$url.=$k."=".$v."&";
		}
		$url=rtrim($url,"&");
		$result=file_get_contents($url);
	}
}