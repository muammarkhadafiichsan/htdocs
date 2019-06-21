<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class kunjungan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id_kunjungan');
        if ($id_kunjungan == '') {
            $peternak = $this->db->get('kunjungan')->result();
        } else {
            $this->db->where('id', $id);
            $peternak = $this->db->get('kunjungan')->result();
        }
        $this->response(array("result"=>$peternak, 200));
    }
}
?>