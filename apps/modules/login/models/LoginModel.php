<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');
/**
* Name:  Aplikasi Humas dan IT
*
* Author	:  	Pudin Saepudin Ilham
* 		   		najzmitea@gmail.com
* Facebook 	: 	Najzmi Al Zailani
*
*
*
*/

class LoginModel extends CI_Model
{
	/* nama databases */
	//protected 
	private $_dtable = 'm_user';
	/**
     * return _retval
     *
     * @var Boolean
     **/
    private $_retval = NULL;

    /**
     * return _result
     *
     * @var Boolean
     **/
    private $_result = FALSE;

    /**
     * return _retarr
     *
     * @var Array
     **/
    private $_retarr = array();
	
function periksa_identitas($_tb, $_where, $_id)
	{

		$this->db->where($_where, $_id);
		$this->_result = $this->db->get($_tb)->num_rows();
		
		if($this->_result == 1) {
            return TRUE;
        }else{
			return FALSE;
		}
	}
	
function tampilUser($_tb, $_where, $_id)
	{

		$this->db->where($_where, $_id);
		$this->_result = $this->db->get($_tb)->row();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
function periksa($_tb, $data){
	
		if (empty ($data['user_username'])) {
            return false;
        }
		if (empty ($data['user_password'])) {
            return false;
        }
		
		$this->db->where('user_username',$data['user_username']);
		$this->db->where('user_password',$data['user_password']);
		
		$this->_result = $this->db->get('$_tb');
		
		if ($this->_result) {
            return $this->_result;
        }
	}

function cek_salah_login($_tb, $_username)
	{
		if (empty($_username)|| empty ($_tb)) {
            return false;
        }
        $this->db->select('loguser_username, loguser_status, loguser_token, loguser_jml');
		$this->db->where('loguser_username', $_username);
		$this->db->where('loguser_status', '0');
		$this->db->where('loguser_token', $this->config->item('_loguser_token', 'pudintea'));
		$this->_result = $this->db->get($_tb)->row();
		if ($this->_result) {
            return $this->_result->loguser_jml;
        }
	}
	
function tampilkan_salah_login($_tb, $_username)
	{
		if (empty($_username) || empty ($_tb)) {
            return false;
        }
		$this->db->where('loguser_username', $_username);
		$this->db->where('loguser_status', '0');
		$this->db->where('loguser_token', $this->config->item('_loguser_token', 'pudintea'));
		$this->_result = $this->db->get($_tb)->row();
		if ($this->_result) {
            return $this->_result;
        }
	}
	
function save($_tb, $data)
    {


        $this->_result = $this->db->insert($_tb, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }
	
function edit($id)
	{
		if (empty ($id)) {
            return false;
        }

		$this->db->where('id_level',$id);
		$this->_result = $this->db->get($this->_dtable)->result();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
function update($_tb, $_where, $data)
    {
        if (empty ($_tb) || empty ($_where) || empty ($data)) {
            return false;
        }

        $this->db->where($_where);
        $this->_result = $this->db->update($_tb, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }
	
	function delete_login($_tb, $_where, $_id, $status ='0')
    {
        if (empty ($_id)) {
            return false;
        }
		$this->db->where('loguser_status', $status);
        $this->db->where($_where, $_id);
        $this->_result = $this->db->delete($_tb);

        if ($this->_result) {
            return $this->_result;
        }
    }
}