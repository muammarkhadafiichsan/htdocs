<?php
	class StockModel extends CI_Model{
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
		public function getStockQuery($start,$limit)
			{
				$sektor=$this->uri->segment(3);
				$subsektor=$this->uri->segment(4);
				$kelompok=$this->uri->segment(5);
				$q=$this->uri->segment(6);
				$sql    =   "SELECT tbl_stock.*,nama_kelompok,kode_subsektor,nama_subsektor,kode_sektor,nama_sektor
								FROM ((tbl_stock LEFT JOIN tbl_kelompok ON kelompok=kode_kelompok)
								LEFT JOIN tbl_subsektor ON subsektor=kode_subsektor)
								LEFT JOIN tbl_sektor ON sektor=kode_sektor
								WHERE nama_stock<>'xxxxxxxxxxxxx' ";
                if($sektor>0)
					{
						$sql.=" AND sektor='$sektor' ";	
					}
				if($subsektor>0)
					{
						$sql.=" AND subsektor='$subsektor' ";	
					}
				if($kelompok>0)
					{
						$sql.=" AND kelompok='$kelompok' ";	
					}	
				if($q!="" && $q!="all" )
					{
						$sql.=" AND (nama_subsektor LIKE '%$q%' OR nama_kelompok LIKE '%$q%') ";	
					}	
				$sql.=" ORDER BY sektor,subsektor,kelompok ";
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