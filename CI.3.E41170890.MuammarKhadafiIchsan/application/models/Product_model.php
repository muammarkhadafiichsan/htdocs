<?php defined('BASEPATH') OR exit('No direct script acces allowed');

class Product_model extend CI_Model
{
    private $_table = "umkm";
    
    public $id;
    public $nama;
    public $alamat;
    public $nama_usaha;

    public function rules ()
   {
    return [
        ['field' => 'nama',
        'label' => 'Nama',
        'rules' => 'required'],

        ['field' => 'alamat',
        'label' => 'Alamat',
        'rules' => 'numeric'],
        
        ['field' => 'nama_usaha',
        'label' => 'Nama_usaha',
        'rules' => 'required']
    ];

    }

    public function getall()
    {
        return $this->db->get($this->umkm)->result();

    }

    public function getById($id)

    {
        return $this->db->get_where($this->umkm,["id"=>$id])->row();
        
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id= uniqid();
        $this->nama = $post["nama"];
        $this->alamat= $post["alamat"];
        $this->nama_usaha= $post["nama_usaha"];
        $this->db->insert($this->umkm, $this);

    }

    public function update()
    {
        $post = $this->input->post();
        $this->id= uniqid();
        $this->nama = $post["nama"];
        $this->alamat= $post["alamat"];
        $this->nama_usaha= $post["nama_usaha"];
        $this->db->update($this->umkm, $this, array('id' => $post['id']));
    }
     
    public function delete($id)
    {
        return $this->db->delete($this->umkm, array("id" => $id));
    }

}






    