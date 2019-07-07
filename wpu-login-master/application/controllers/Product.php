<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Product_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["products"] = $this->Product_model->getAll();
        $this->load->view("product/list", $data);
    }

    public function add()
    {
        $product = $this->Product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("user/new_form");
        redirect('Product');
    }

    public function sms()
    {
        $product = $this->Product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("user/sms");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('products');

        $product = $this->Product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();

        $this->load->view("user/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->product_model->delete($id)) {
            redirect(site_url('user'));
        }
    }

    public function tambah_data()
    {
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description')
        ];

        $this->Product_model->tambah_data($data);
        $this->session->set_flashdata('tambah', '<div class"alert alert-succes" role="alert">
        BERHASIL DITAMBAHKAN </div>');

        redirect('Product');
    }
}
