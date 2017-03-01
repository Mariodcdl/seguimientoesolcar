<?php

class Coordinator extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model(array("Coordinator_Model"));
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function profile(){
        if(isset($_SESSION['idCoordinator'])){
            $this->load->view('coordinator/mainview_coordinator');    
        }else{
            redirect('login/create');
        }
    }

    public function newalert(){
        
        $titleAlert = $this->input->post('title');
        $bodyAlert = $this->input->post('body');
        $arrayDataUser = $this->session->all_userdata();
        $id = $arrayDataUser['idCoordinator'];
        $objectAlert = array('title'=>$titleAlert,'body'=>$bodyAlert,'id'=>$id);
        if($this->Coordinator_Model->insertAlert($objectAlert))
        {
            $arr = array('success' => true);
        }else{
            $arr = array('success' => false);
        }
        echo json_encode($arr);

    }

    public function logout(){
        
        $this->session->sess_destroy();    
        redirect('login/create');
    
    }

    public function announcement(){
        
        $announcementArray = $this->Coordinator_Model->getAnnouncementsCoordinator();
        $data['announcements'] = $announcementArray;
        $this->load->view('coordinator/announcements_coordinator',$data);

    }

    public function removeannouncement($idAnnouncement){

        $this->Coordinator_Model->removeAnnouncementCoordinator($idAnnouncement);

    }

    public function editannouncement(){
        
        $titleAlert = $this->input->post('title');
        $bodyAlert = $this->input->post('body');
        $id = $_SESSION['idCoordinator'];
        $idAnnouncement = $this->input->post('idAnnouncement');
        $objectAlert = array('title'=>$titleAlert,'body'=>$bodyAlert,'id'=>$id,'idAnnouncement'=>$idAnnouncement);
        if($this->Coordinator_Model->editAlert($objectAlert))
        {
            $arr = array('success' => true);
        }else{
            $arr = array('success' => false);
        }
        echo json_encode($arr);

    }

}


?>
