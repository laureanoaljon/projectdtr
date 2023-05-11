<?php

class ArchiveUserAccount extends CI_Controller{


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

                $data['archivedAccounts_data'] = $this->acctman->getArchivedUserAccounts(); 
                $this->load->view('archived_useraccount', $data);
            }else{
                $data = array();
                $this->load->view('login', $data);
            }
           
           
                
        } else {
            $data = array();
            $this->load->view('login', $data);
        }
    }



        // public function insertUserAccount(){
            
        //     $result = $this->acctman->insertUserAccount($this->input->post('idnumber'),$this->input->post('sname'),$this->input->post('fname'),$this->input->post('cat'),$this->input->post('pw'));
        //     echo json_encode($result);
        // }

        // public function getActiveUserAccounts(){

        //     $active_accounts = $this->acctman->getActiveUserAccounts();
        //     echo json_encode($active_accounts);
    
        // }

        // public function getAccountData(){
        //     $account_data = $this->acctman->getAccountData($this->input->post('emp_dbid'));
        //     echo json_encode($account_data);
        // }


        // public function editUserAccount(){
            
        //     $result = $this->acctman->editUserAccount($this->input->post('db_id'),$this->input->post('idnumber'),$this->input->post('sname'),$this->input->post('fname'),$this->input->post('cat'));
        //     echo json_encode($result);
        // }

        // public function archiveUserAccount(){
            
        //     $result = $this->acctman->archiveUserAccount($this->input->post('db_id'));
        //     echo json_encode($result);
        // }

    
}