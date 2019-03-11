<?php
	class SektorModel extends CI_Model{
		public function getData()
			{
				$query=$this->db->get('tbl_sektor');	
				return $query->result();
			}	
	}
?>