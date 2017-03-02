<?php

class Professor_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getProfessorExistsById($id)
    {
        $query = $this->db->get_where('PROFESOR', array('id' => $id));
        $resArray = $query->result_array();
        if ($resArray) {
            return true;
        } else {
            return false;
        }
    }

    public function insertProfessor()
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', true);
        $data = array(
                'id' => $this->input->post('idProfessor'),
                'name' => $this->input->post('nameProfessor'),
                'email' => $this->input->post('emailProfessor'),
                'cubicle' => $this->input->post('cubicleProfessor'),
                'telephone' => $this->input->post('phoneProfessor'),
                'password' => $this->input->post('passwordProfessor')
            );

        return $this->db->insert('PROFESOR', $data);
    }

    public function getProfessorByIdPassword($id,$password){

        $query = $this->db->get_where('PROFESOR', array('id' => $id,'password' => $password));
        $resArray = $query->result_array();
        if ($resArray) {
            return true;
        } else {
            return false;
        }

    }

    public function getProfessorObject($id){
        $query = $this->db->get_where('PROFESOR', array('id' => $id));
        $data = $query->result();
        $objectProfessor = $data[0];
        return $objectProfessor;
    }

    public function getExistentProfessorWithPreviousRegister($id){

        $query = $this->db->get_where('PROFESOR_PREV', array('id' => $id));
        $resArray = $query->result_array();
        if ($resArray) {
            return true;
        } else {
            return false;
        }

    }

    public function insertSignature($objectSignature){
        $this->db->insert('SIGNATURE_ACTIVE', $objectSignature);
        return $this->db->insert_id();
    }

    public function insertSignatureActiveProfessor($idSignature,$idProfessor){
        $data = array(
                'id_profesor' => $idProfessor,
                'id_signature_active' => $idSignature
            );
        return $this->db->insert('PROFESOR_SIGNATURE', $data);
    }

    public function getSignaturesByProfesor($id){
        $query = $this->db->query('SELECT * FROM (PROFESOR_SIGNATURE,SIGNATURE_ACTIVE,SIGNATURE_PREV) WHERE id_profesor='.$id.' AND PROFESOR_SIGNATURE.id_signature_active = SIGNATURE_ACTIVE.id_signature_active and SIGNATURE_PREV.id_signature=SIGNATURE_ACTIVE.id_signature_prev;');
        $resArray = $query->result_array();
        return $resArray;
    }

    public function removeSignatureProfessor($idSignature){
        $query = $this->db->query('DELETE FROM SIGNATURE_ACTIVE WHERE id_signature_active = '.$idSignature);
    }

    public function editSignature($id,$object){
        $this->db->where('id_signature_active',$id);
        return $this->db->update('SIGNATURE_ACTIVE', $object); 
    }

}
