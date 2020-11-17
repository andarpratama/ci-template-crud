<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TemplateModel extends CI_Model
{
    public static $table = 'template';

    public function All()
    {
        return $this->db->get(self::$table);
    }

    public function ById($id)
    {
        return $this->db->get_where(self::$table, array('id' => $id));
    }

    public function validation()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run()) {
            return true;
        } else {
            return false;
        }
    }

    public function doSave()
    {
        $data = array(
            "name" => $this->input->post('name'),
        );

        $this->db->insert('template', $data);
        $this->session->set_flashdata('success', 'Successfull');
    }

    public function doUpdate($id)
    {
        $data = array(
            "name" => $this->input->post('name'),
        );

        $this->db->where('id', $id);
        $this->db->update('template', $data);
        $this->session->set_flashdata('success', 'Successfull');
    }

    public function doDelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('siswa');
        $this->session->set_flashdata('success', 'Successfull');
    }
}
