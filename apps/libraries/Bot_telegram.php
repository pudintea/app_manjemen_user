<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

/* *****************************

Pudin Saepudin Ilham
najzmitea@gmail.com
Ciamis Asli

Blog : Anibar Studio
Link : https://anibarstudio.blogspot.com
Lokasi : /apps/libraries/
- Load dulu librarynya
$this->load->library('bot_telegram');
- Ini untuk mengirim pesanya
$this->bot_telegram->kirim_pesan('Kirim Pesan Ini');
******************************** */

class Bot_telegram {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {

		$this->CI =& get_instance();
	}

	// Kirim Pesan
	public function kirim_pesan($message_text) {
		$telegram_id = 'ID'; //Di isi dengan ID
		$secret_token = "TOKEN"; // Di isi dengan Token
		$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
		$url = $url . "&text=" . urlencode($message_text);
		$ch = curl_init();
		$optArray = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);
	}
	
}