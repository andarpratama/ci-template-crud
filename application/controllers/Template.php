<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TemplateModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['template'] = $this->TemplateModel->All();
        $this->load->view('template', $data);
    }

    public function show($id)
    {
        $data['template'] = $this->TemplateModel->ById($id);
        $this->load->view('template', $data);
    }


    public function save()
    {
        if ($this->TemplateModel->validation() == false) {
            $this->load->view('index');
        } else {
            $this->TemplateModel->doSave($_POST);
            redirect('template');
        }
    }

    public function update()
    {
        if ($this->TemplateModel->validation() == false) {
            $this->load->view('index');
        } else {
            $this->TemplateModel->doUpdate($_POST);
            redirect('template');
        }
    }

    public function delete($id)
    {
        $this->TemplateModel->doDelte($id);
        redirect('template');
    }
}
