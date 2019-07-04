<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pulsa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pulsa_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pulsa"] = $this->pulsa_model->getView();
        $this->load->view("admin/pulsa/list", $data);
    }

    public function add()
    {
        $pulsa = $this->pulsa_model;
        $validation = $this->form_validation;
        $validation->set_rules($pulsa->rules());

        if ($validation->run()) {
            $pulsa->save();
        }

        $this->load->view("admin/pulsa/new_form");
    }
}
