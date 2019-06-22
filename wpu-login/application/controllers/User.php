<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Admin Dinas Peternakan';
        $data['user'] = $this->db->get_where('user', ['email'
        => $this->session->userdata('email')])->row_array();
        //echo 'selamat datang ' . $data['user']['name'];

        $this->load->view('user/index', $data);
    }
}
