<?php
	class SubsektorModel extends CI_Model{
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
		public function getSubsektorQuery($start,$limit)
			{
				$sektor=$this->uri->segment(3);
				$q=$this->uri->segment(4);
				$sql    =   "SELECT tbl_subsektor.*,nama_sektor
								FROM tbl_subsektor LEFT JOIN tbl_sektor ON sektor=kode_sektor
								WHERE nama_subsektor<>'xxxxxxxxxxxxx' ";
                if($sektor>0)
					{
						$sql.=" AND sektor='$sektor' ";	
					}
				if($q!="" && $q!="all" )
					{
						$sql.=" AND (nama_sektor LIKE '%$q%' OR nama_subsektor LIKE '%$q%') ";	
					}	
				$sql.=" ORDER BY sektor,nama_subsektor ";
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