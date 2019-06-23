<?php

/**
 * 
 */
class m_ambilstatus extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_pesan_by_id($id_pesan)
	{
		$this->db->where('id_pesan', $id_pesan);
		$data = $this->db->get('pesanan')->row_array();
		return $data;
	}
}
