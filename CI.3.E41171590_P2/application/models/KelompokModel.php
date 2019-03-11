<?php
	class KelompokModel extends CI_Model{
		public $jumlah_baris;
		public function getRuangan($start,$limit)
			{
				$this->db->select('tbl_master_ruangan.*,nama_gedung');
				$this->db->from('tbl_master_ruangan');
				$this->db->join('tbl_master_gedung', 'gedung=id_gedung','left');
				$this->db->limit($start,$limit);
				$query = $this->db->get();
				return $query->result();
			}	
		public function getKelompokQuery($start,$limit)
			{
				$subsektor=$this->uri->segment(3);
				$q=$this->uri->segment(4);
				$sql    =   "SELECT tbl_kelompok.*,nama_subsektor
								FROM tbl_kelompok LEFT JOIN tbl_subsektor ON subsektor=kode_subsektor
								WHERE nama_kelompok<>'xxxxxxxxxxxxx' ";
                if($subsektor>0)
					{
						$sql.=" AND subsektor='$subsektor' ";	
					}
				if($q!="" && $q!="all" )
					{
						$sql.=" AND (nama_subsektor LIKE '%$q%' OR nama_kelompok LIKE '%$q%') ";	
					}	
				$sql.=" ORDER BY subsektor,nama_kelompok ";
				$this->jumlah_baris= $this->db->query($sql)->num_rows();
				$sql.="	 LIMIT $start,$limit ";
				return $this->db->query($sql)->result();	
			}		
		public function countBQ()
			{
        		return $this->jumlah_baris;
    		}	
	}
?>