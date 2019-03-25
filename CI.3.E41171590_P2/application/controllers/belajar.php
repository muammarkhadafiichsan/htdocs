<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class belajar extends CI_Controller {
    function__construct() {
        parent::_construct();
        $this->load->model('m_data');
    }

    function useer() {
        $data['useer'] = $this ->m_data->ambil_data()->result();
        $this->load->view('v_user.php', $data);
    }
}