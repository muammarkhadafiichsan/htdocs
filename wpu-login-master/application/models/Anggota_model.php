<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "anggota_puskeswan";

    public $id_puskeswan;
    public $nama_kepala;
    public $image = "default.jpg";
    public $deskripsi;

    public function rules()
    {
        return [
            [
                'field' => 'nama_kepala',
                'label' => 'Nama_kepala',
                'rules' => 'required'
            ],

            [
                'field' => 'TTL',
                'label' => 'TTL',
                'rules' => 'required'
            ],

            [
                'field' => 'deskripsi',
                'label' => 'Deskripsi',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_puskeswan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_puskeswan = uniqid();
        $this->nama_kepala = $post["nama_kepala"];
        $this->image = $this->_uploadImage();
        $this->deskripsi = $post["deskripsi"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_puskeswan = $post["id"];
        $this->nama_kepala = $post["nama_kepala"];
        if (!empty($_FILES["image"]["nama_kepala"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->deskripsi = $post["deskripsi"];
        $this->db->update($this->_table, $this, array('id_puskeswan' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_puskeswan" => $id));
    }
    private function _uploadImage()
    {
        $config['upload_path']          = './upload/anggota_puskeswan/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_puskeswan;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
