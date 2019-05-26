<?php

    class Mahasiswa extends CI_controller{

       /* public function __contstruct()
        {
            parent ::__contstruct();
            $this->load->database();
        }
        */
        public function index()
        {
            
            $data['judul']='Daftar mahasiswa';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/footer');
            $this->load->view('mahasiswa/index' );

            
        }

    }