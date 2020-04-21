<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');
/**
* Name:  Aplikasi Humas dan IT
*
* Author:  Pudin Saepudin Ilham
* 		   najzmitea@gmail.com
*
*/

class UsergrupModel extends CI_Model
{
	/* nama databases */
	//protected 
	private $_dtable 	= 't_user_grup';
	private $_id_table 	= 'id_user_grup';
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
	
	function periksa($where1, $where2){
		$this->db->select('id_grup, grup_nama');
		$this->db->where($where1 , $where2);
		return $this->db->get($this->_dtable)->num_rows();
	}
	
	function getUser()
	{
		$this->db->select('id_user, user_nama_depan, user_nama_belakang, user_username');
		$this->_result = $this->db->get('m_user')->result();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
	function getGrup()
	{
		$this->db->select('id_grup, grup_nama, grup_deskripsi');
		$this->_result = $this->db->get('m_grup')->result();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	/**
     * Simpan
     *
     * 
     **/
	
	function save($data)
    {
        if (empty ($data['user_grup_id_user']) && empty ($data['user_grup_id_grup'])) {
            return false;
        }

        $this->_result = $this->db->insert($this->_dtable, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }
	

    /**
     * Edit
     *
     * 
     **/
	
	function edit($id)
	{
		if (empty ($id)) {
            return false;
        }

		$this->db->where($this->_id_table ,$id);
		$this->_result = $this->db->get($this->_dtable)->row();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
	/**
     * Update ( Prosess Edit )
     *
     * 
     **/

    function update($data, $_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where($this->_id_table, $_id_);
        $this->_result = $this->db->update($this->_dtable, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }


    /**
     * Delete
     *
     * 
     **/
	
	function delete($_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where($this->_id_table, $_id_);
        $this->_result = $this->db->delete($this->_dtable);

        if ($this->_result) {
            return $this->_result;
        }
    }
}