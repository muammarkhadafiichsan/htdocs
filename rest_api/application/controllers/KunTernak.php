<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class KunTernak extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() { 
        $peternak = $this->db->get('k_ternak')->result();
        $this->response(array("result"=>$peternak, 200));
    }

}
?>