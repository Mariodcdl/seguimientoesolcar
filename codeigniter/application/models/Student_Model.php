<?php

class Student_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    public function getStudentExistsById($id)
    {
        $query = $this->db->get_where('STUDENT', array('id' => $id));
        $resArray = $query->result_array();
        if ($resArray) {
            return true;
        } else {
            return false;
        }
    }

    public function insertStudent()
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', true);
        $data = array(
                'id' => $this->input->post('idStudent'),
                'name' => $this->input->post('nameStudent'),
                'email' => $this->input->post('emailStudent'),
                'cellphone' => $this->input->post('phoneStudent'),
                'educative_program' => $this->input->post('programEducStudent'),
                'password' => $this->input->post('passwordStudent')
            );

        return $this->db->insert('STUDENT', $data);
    }

    public function getStudentByIdPassword($id,$password){

        $query = $this->db->get_where('STUDENT', array('id' => $id,'password' => $password));
        $resArray = $query->result_array();
        if ($resArray) {
            return true;
        } else {
            return false;
        }

    }
}
