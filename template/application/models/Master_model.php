<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Master_model extends CI_Model{

    public function allJK($perPage = 25, $offset = 0){
      return $this->db->limit($perPage, $offset)->get('jenis_kegiatan')->result();
    }

    public function totalJK(){
      return $this->db->get('jenis_kegiatan')->num_rows();
    }

    public function totalDA(){
      return $this->db->select('*')->from('data_anggota')->join('jenis_anggota','data_anggota.kode_ja = jenis_anggota.kode_ja')->get()->num_rows();
    }

    public function allDU($perPage = 25, $offset = 0){
      return $this->db->limit($perPage, $offset)->get('data_user')->result();
    }

    public function totalDU(){
      return $this->db->get('data_user')->num_rows();
    }

  }
