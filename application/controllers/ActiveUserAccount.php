<?php

class ActiveUserAccount extends CI_Controller{

   
    function __construct(){
        parent::__construct();

        $this->load->helper('html');
        //$this->load->model('EmployeeDTRModel', 'empdtr');
        $this->load->model('AccountManagementModel', 'acctman');
        $this->load->helper('url');
        $this->load->library('session');

        $this->load->helper('form');
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


            // if(isset($_FILES["image_file"]["name"]))  
            // {  
            //      $config['upload_path'] = './uploads/';  
            //      $config['allowed_types'] = 'jpg|jpeg|png|gif';  
            //      $this->load->library('upload', $config);  
            //      if(!$this->upload->do_upload('image_file'))  
            //      {  
            //          $error =  $this->upload->display_errors(); 
            //          echo json_encode(array('msg' => $error, 'success' => false));
            //      }  
            //      else 
            //      {  
            //           $data = $this->upload->data(); 
            //           $insert['name'] = $data['file_name'];
            //           //$this->db->insert('images',$insert);
            //           //$getId = $this->db->insert_id();
    
            //           //$arr = array('msg' => 'Image has not uploaded successfully', 'success' => false);
    
            //         //   if($getId){
            //         //    $arr = array('msg' => 'Image has been uploaded successfully', 'success' => true);
            //         //   }
            //           echo json_encode("Image has been uploaded successfully");
            //      }  
            // } 


            // $config = array(
			// 'upload_path' => "./uploads/",
			// 'allowed_types' => "jpg|png|jpeg|gif",
			// 'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
            // );
            // $this->load->library('upload', $config);

            // if ($this->upload->do_upload('image_file')) {

            //     $image_path = $this->upload->data('file_name');
                
            //     //$result = $this->acctman->insertUserAccount($this->input->post('idnumber'),$this->input->post('sname'),$this->input->post('fname'),$this->input->post('cat'),$this->input->post('pw'), $image_path);
            //     $this->session->set_flashdata('message', '<div class="alert alert-success">Image has been changed successfully.</div>');			
            // }else{
            //     $error = array('error' => $this->upload->display_errors());
            //     //$result = $this->acctman->insertUserAccount($this->input->post('idnumber'),$this->input->post('sname'),$this->input->post('fname'),$this->input->post('cat'),$this->input->post('pw'), "error uploading photo");
            //     $this->session->set_flashdata('message', '<div class="alert alert-danger">'.implode("",$error).'</div>');
            // }

		    // redirect(base_url());
            
            $result = $this->acctman->insertUserAccount($this->input->post('idnumber'),$this->input->post('sname'),$this->input->post('fname'),$this->input->post('cat'),$this->input->post('pw'), "");
            echo json_encode($result);
        }

        public function getActiveUserAccounts(){

            $active_accounts = $this->acctman->getActiveUserAccounts();
            echo json_encode($active_accounts);
    
        }

        public function getAccountData(){
            $account_data = $this->acctman->getAccountData($this->input->post('emp_dbid'));
            echo json_encode($account_data);
        }


        public function editUserAccount(){
            
            $result = $this->acctman->editUserAccount($this->input->post('db_id'),$this->input->post('idnumber'),$this->input->post('sname'),$this->input->post('fname'),$this->input->post('cat'));
            echo json_encode($result);
        }

        public function archiveUserAccount(){
            
            $result = $this->acctman->archiveUserAccount($this->input->post('db_id'));
            echo json_encode($result);
        }


    // public function storeDp()
	// {
	// 	$config = array(
	// 		'upload_path' => "./uploads/",
	// 		'allowed_types' => "jpg|png|jpeg|gif",
	// 		'max_size' => "3000000", // file size , here it is 1 MB(1024 Kb)
	// 	);
	// 	$this->load->library('upload', $config);

	// 	if ($this->upload->do_upload('image')) {

	// 		$image_path = $this->upload->data('file_name');
	// 		$this->acctman->insertAccountDp($image_path, $this->input->post('db_id'));
	// 		$this->session->set_flashdata('message', '<div class="alert alert-success">Image has been changed successfully.</div>');			
	// 	}else{
	// 		$error = array('error' => $this->upload->display_errors());
	// 		$this->session->set_flashdata('message', '<div class="alert alert-danger">'.implode("",$error).'</div>');
	// 	}

	// 	redirect(base_url());
	// }
    
}