
<?php

    class Register extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model(array("Professor_Model", "Student_Model", "Coordinator_Model"));
            $this->load->helper('url_helper');
        }

        public function create()
        {
            $this->load->view('sign_up');
        }

        public function registerProfessor()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            if($this->Professor_Model->getExistentProfessorWithPreviousRegister($this->input->post('idProfessor'))){
                if (!$this->Professor_Model->getProfessorExistsById($this->input->post('idProfessor'))) {
                    $this->Professor_Model->insertProfessor();
                    $this->load->view('success');
                } else {
                    $this->load->view('fail');
                }
            }else{
                $this->load->view('fail');
            }

        }

        public function registerStudent()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            if (!$this->Student_Model->getStudentExistsById($this->input->post('idStudent'))) {
                $this->Student_Model->insertStudent();
                $this->load->view('success');
            } else {
                $this->load->view('fail');
            }
        }

        public function registerCoordinator(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            if (!$this->Coordinator_Model->getLimitCountCoordinatorToRegister()) {
                if($this->Professor_Model->getProfessorExistsById($this->input->post('idCoordinator'))){
                    $this->Coordinator_Model->insertCoordinator();
                    $this->load->view('success');
                }else{
                    $this->load->view('fail');
                }
            } else {
                $this->load->view('fail');
            }
        }
    }
