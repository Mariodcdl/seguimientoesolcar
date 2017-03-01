<?php

class Coordinator_Model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function getLimitCountCoordinatorToRegister(){
        $query = $this->db->query('SELECT * FROM COORDINATOR');
        $count = $query->num_rows();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insertCoordinator()
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', true);
        $data = array(
                'id' => $this->input->post('idCoordinator'),
                'password' => $this->input->post('passwordCoordinator')
            );

        return $this->db->insert('COORDINATOR', $data);
    }

    public function insertAlert($alertObject){
        $data = array('title'=>$alertObject['title'],'description'=>$alertObject['body'],'idCoordinator'=>$alertObject['id']);
        return $this->db->insert('ANNOUNCEMENT_COORDINATOR', $data);
    }

    public function getCoordinatorByIdPassword($id,$password){

        $query = $this->db->get_where('COORDINATOR', array('id' => $id,'password' => $password));
        $resArray = $query->result_array();
        if ($resArray) {
            return true;
        } else {
            return false;
        }
    }

    public function getCoordinatorObject($id){
        $query = $this->db->get_where('COORDINATOR', array('id' => $id));
        $data = $query->result();
        $objetCoordinator = $data[0];
        return $objetCoordinator;
    }

    public function getAnnouncementsCoordinator(){
        
        $query = $this->db->query('SELECT * FROM ANNOUNCEMENT_COORDINATOR');
        $resArray = $query->result_array();
        return $resArray;
        
    }

    public function removeAnnouncementCoordinator($id){

        $query = $this->db->query('DELETE FROM ANNOUNCEMENT_COORDINATOR WHERE idAnnouncement = '.$id);

    }

    public function editAlert($alertObject){

        $data = array('idAnnouncement' => $alertObject['idAnnouncement'],'title'=>$alertObject['title'],'description'=>$alertObject['body'],'idCoordinator'=>$alertObject['id']);

        $this->db->where('idAnnouncement',$data['idAnnouncement']);
        return $this->db->update('ANNOUNCEMENT_COORDINATOR', $data); 
    
    }

}


?>
