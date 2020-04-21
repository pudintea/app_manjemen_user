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
class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/apps/libraries/Template.php */