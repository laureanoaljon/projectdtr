<?php

class ActiveUserAccount extends CI_Controller{


    function __construct(){
        parent::__construct();

        $this->load->helper('html');
        //$this->load->model('EmployeeDTRModel', 'empdtr');
        $this->load->model('AccountManagementModel', 'acctman');
    
        $this->load->helper('url');
        $this->load->library('session');
    }



    public function index(){
        //  session_destroy();
		if (isset($_SESSION['user']['employee_id'])) {

            if($_SESSION['user']['category'] == "hr-personnel"){
                $data['db_id'] = $_SESSION['user']['db_id'];
                $data['employee_id'] = $_SESSION['user']['employee_id'];
                $data['first_name'] = $_SESSION['user']['f_name'];
                $data['last_name'] = $_SESSION['user']['s_name'];
                $data['category'] = $_SESSION['user']['category'];

                $data['activeAccounts_data'] = $this->acctman->getActiveUserAccounts(); 
                $this->load->view('active_useraccount', $data);
            }else{
                $data = array();
                $this->load->view('login', $data);
            }
           
           
                
        } else {
            $data = array();
            $this->load->view('login', $data);
        }
    }



        public function insertUserAccount(){
            
            $result = $this->acctman->insertUserAccount($this->input->post('idnumber'),$this->input->post('sname'),$this->input->post('fname'),$this->input->post('cat'),$this->input->post('pw'));
            echo json_encode($result);
        }

        public function getActiveUserAccounts(){

            $active_accounts = $this->acctman->getActiveUserAccounts();
    
            echo json_encode($active_accounts);
    
        }

}