<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Santri_model");
        $this->load->library('form_validation');
        $this->load->model("Admin_model");
		if($this->Admin_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["santri"] = $this->Santri_model->getAll();
        $this->load->view("admin/santri/list", $data);
    }

    public function add()
    {
        $santri = $this->Santri_model;
        $validation = $this->form_validation;
        $validation->set_rules($santri->rules());

        if ($validation->run()) {
            $santri->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/santri/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/santri');
       
        $santri = $this->Santri_model;
        $validation = $this->form_validation;
        $validation->set_rules($santri->rules());

        if ($validation->run()) {
            $santri->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["santri"] = $santri->getById($id);
        if (!$data["santri"]) show_404();
        
        $this->load->view("admin/santri/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Santri_model->delete($id)) {
            redirect(site_url('admin/santri'));
        }
    }
}