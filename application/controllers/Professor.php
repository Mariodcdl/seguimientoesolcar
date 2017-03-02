<?php

class Professor extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model(array("Professor_Model","Coordinator_Model"));
        $this->load->helper('url_helper');
        $this->load->library('session');
        
    }

     public function profile(){

     	$idProfessor =  $_SESSION['idProfessor'];
        if($idProfessor){ 
            $professor = $this->Professor_Model->getProfessorObject($idProfessor);
            $announcements = $this->Coordinator_Model->getAnnouncementsCoordinator();
            $data['professor'] = $professor;
            $data['announcements'] = $announcements;
            $this->load->view('professor/mainview_professor',$data);        
        }
        else{
            $this->session->sess_destroy();    
            redirect('login/create'); 
        }
    }

     public function logout(){
        
        $this->session->sess_destroy();    
        redirect('login/create');
    
    }

    public function signature(){

        $idProfessor =  $_SESSION['idProfessor'];
        $data['signatures'] = $this->Professor_Model->getSignaturesByProfesor($idProfessor);
        $this->load->view('professor/signature',$data);

    }

    public function registersignature(){
        
        //signature
        $idSignature = $this->input->post('idSignature');
        $nrc = $this->input->post('nrc');
        $numberPeriod = $this->input->post('numberPeriod');
        $roomNumber = $this->input->post('roomNumber');
        $dateinit = $this->input->post('dateinit');
        $dateend = $this->input->post('dateend');
        $timeinit = $this->input->post('timeinit');
        $timeend = $this->input->post('timeend');
        
        $data = array(
                'id_signature_prev' => $idSignature,
                'nrc' => $nrc,
                'period' => $numberPeriod,
                'date_init' => $dateinit,
                'date_end' => $dateend,
                'room' => $roomNumber,
                'time_init' => $timeinit,
                'time_end' => $timeend
            );

        $idRowAfected = $this->Professor_Model->insertSignature($data);
        $idProfessor = $_SESSION['idProfessor'];
        $result = $this->Professor_Model->insertSignatureActiveProfessor($idRowAfected,$idProfessor);

        if($idRowAfected && $result){
            $arr = array('success' => true);
        }else{
            $arr = array('success' => false);
        }

        echo json_encode($arr);
    
    }

    public function removesignature($idSignatureActive){

        $this->Professor_Model->removeSignatureProfessor($idSignatureActive);

    }

    public function editsignature(){
 
        $idSignature = $this->input->post('id');
        $idSignatureName =  $this->input->post('idSignature');
        $nrc =  $this->input->post('nrc');
        $numberPeriod =  $this->input->post('numberPeriod');
        $roomNumber =  $this->input->post('roomNumber');            
        $dateinit =  $this->input->post('dateinit');
        $dateend =  $this->input->post('dateend');
        $timeinit =  $this->input->post('timeinit');
        $timeend =  $this->input->post('timeend');

        $objectSignature = array('id_signature_active'=>$idSignature,'id_signature_prev'=>$idSignatureName,'nrc'=>$nrc,'period'=>$numberPeriod,'date_init'=>$dateinit,'date_end'=>$dateend,'room'=>$roomNumber,'time_init'=>$timeinit,'time_end'=>$timeend);

        if($this->Professor_Model->editSignature($idSignature,$objectSignature))
        {
            $arr = array('success' => true);
        }else{
            $arr = array('success' => false);
        }
        echo json_encode($arr);
    }


}


?>
