<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Master extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Master_model', 'master', TRUE);
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index(){
      
      $totalDA = $this->master->totalDA();

      $daftarDU = $this->master->allDU();
      $totalDU = $this->master->totalDU();

      $daftarJK = $this->master->allJK();
      $totalJK = $this->master->totalJK();

      $main_view = 'app/master';
      $this->load->view('template', compact('main_view', 'totalDA', 'daftarDU', 'totalDU', 'daftarJK', 'totalJK'));
    }


  }
