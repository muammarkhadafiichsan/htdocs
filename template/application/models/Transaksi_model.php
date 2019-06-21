<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Transaksi_model extends CI_Model{

    public function allKegiatan($perPage = 25, $offset = 0){
      return $this->db->select('*')->from('kegiatan')->join('jenis_perjalanan','kegiatan.kode_jp = jenis_perjalanan.kode_jp')->join('jenis_kegiatan','kegiatan.kode_jk = jenis_kegiatan.kode_jk')->join('data_anggota','kegiatan.kode_da = data_anggota.kode_da')->limit($perPage, $offset)->get()->result();
    }

    public function totalKegiatan(){
      return $this->db->select('*')->from('kegiatan')->join('jenis_perjalanan','kegiatan.kode_jp = jenis_perjalanan.kode_jp')->join('jenis_kegiatan','kegiatan.kode_jk = jenis_kegiatan.kode_jk')->join('data_anggota','kegiatan.kode_da = data_anggota.kode_da')->get()->num_rows();
    }

  }
