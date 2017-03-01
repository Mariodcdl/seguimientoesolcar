
<?php

    class Login extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model(array("Professor_Model","Student_Model","Coordinator_Model"));
            $this->load->helper('url_helper');
            $this->load->library('session');
        }

        public function create(){
            $this->load->view('log_in');
        }

        public function init(){

            $this->load->helper('form');
            $this->load->library('form_validation');
            $id = $this->input->post('id');
            $password = $this->input->post('password');

            if($this->Student_Model->getStudentByIdPassword($id,$password)){
                
                $this->load->view('success');
            
            }else if($this->Professor_Model->getProfessorByIdPassword($id,$password)){
                
                $professor = $this->Professor_Model->getProfessorObject($id);
                $this->session->set_userdata('idProfessor', $professor->id);
                redirect('professor/profile');

            }else if($this->Coordinator_Model->getCoordinatorByIdPassword($id,$password)){
                $coordinator = $this->Coordinator_Model->getCoordinatorObject($id);
                $this->session->set_userdata('idCoordinator', $coordinator->id);
                redirect('coordinator/profile');
            }else{
                $this->load->view('fail');
            }

        }

    }

?>
