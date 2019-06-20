<?php if (!defined('BASEPATH')) exit('No direct script access allowed')

require APPATH. '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;
class Login extends REST_Controller
{
    
    function __construct($config = 'rest')
    {
        parent::__construct();
        $this->load->database();
    }

    function index_get() {
        $id = $this->get('id_user');
        if ($id == '') {
            $kontak = $this->db->get('user')->result();
        } else {
            $this->db->where('id_user', $id);
            $kontak = $this->db->get('user')->result();
        }
        $this->response($kontak, 200);
    }


function index_post(){
    $username=$this- >input- >post('username');
    $password=$this- >input- >post('password');
    $where=array(
'username'=>$username,
'password'=.$password
    );

    $cek=$this- >M_login- >cek_login($username,$password);

    if($cek){
        $output['username']= $username;
        $output['no_telepon']= $cek ['no_telepon'];
        $output['id_user']= $cek ['id_user'];
        $this- >response($output,200);

        
    }
    else {
        $this- >response(array('status' => 'fail', 502))
    }
}
?>