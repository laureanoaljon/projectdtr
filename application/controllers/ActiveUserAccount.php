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

            if(isset($_FILES["image_file"]["name"]))  
            {  
                 $config['upload_path'] = './uploads/';  
                 $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                 $this->load->library('upload', $config);  
                 if(!$this->upload->do_upload('image_file'))  
                 {  
                     $error =  $this->upload->display_errors(); 
                    //  array('msg' => $error, 'success' => false)
                    if($error == "<p>You did not select a file to upload.</p>"){
                        $result = $this->acctman->insertUserAccount($_POST["newuser_idnumber"],$_POST["newuser_surname"],$_POST["newuser_fname"],$_POST["newuser_category"], "");
                        echo json_encode($result);
                    }
                    else
                        echo json_encode($error);
                 }  
                 else 
                 {  
                      $data = $this->upload->data(); 
                      $insert['name'] = $data['file_name'];
      
                     $result = $this->acctman->insertUserAccount($_POST["newuser_idnumber"],$_POST["newuser_surname"],$_POST["newuser_fname"],$_POST["newuser_category"], $insert['name']);
                     echo json_encode($result);
                 }  
            }else{
                $result = $this->acctman->insertUserAccount($_POST["newuser_idnumber"],$_POST["newuser_surname"],$_POST["newuser_fname"],$_POST["newuser_category"],"");
                echo json_encode($result);
            }     
            
        }



        public function insertNewFaceData(){

            if(isset($_FILES["image_file"]["name"]))  
            {  
                 $config['upload_path'] = './uploads/facerecognition/';  
                 $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                 $this->load->library('upload', $config);  
                 if(!$this->upload->do_upload('image_file'))  
                 {  
                     $error =  $this->upload->display_errors(); 
                    //  array('msg' => $error, 'success' => false)
                         echo json_encode($error);
                 }  
                 else 
                 {  
                      $data = $this->upload->data(); 
                      $insert['name'] = $data['file_name'];
      
                     $result = $this->acctman->insertNewFaceData($_POST["accid_tobeedited_recog"], $insert['name']);
                     echo json_encode($result);
                 }  
            }else{
                echo json_encode("error uploading photo");
            }     
            
           // echo json_encode("error uploading photo");
        }

        public function deleteRecoImage(){
            
            $result = $this->acctman->deleteRecoImage($this->input->post('dbid'));
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

        public function getAccountDataRecoImages(){
            $account_data = $this->acctman->getAccountDataRecoImages($this->input->post('emp_dbid'));
            echo json_encode($account_data);
        }


        public function editUserAccount(){

            if(isset($_FILES["image_file"]["name"]))  
            {  
                 $config['upload_path'] = './uploads/';  
                 $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                 $this->load->library('upload', $config);  
                 if(!$this->upload->do_upload('image_file'))  
                 {  
                     $error =  $this->upload->display_errors(); 
                    //  array('msg' => $error, 'success' => false)
                    if($error == "<p>You did not select a file to upload.</p>"){
                        $result = $this->acctman->editUserAccount($_POST["accid_tobeedited"],$_POST["edituser_idnumber"],$_POST["edituser_surname"],$_POST["edituser_fname"],$_POST["edituser_category"], "");
                        echo json_encode($result);
                    }
                    else
                        echo json_encode($error);
                 }  
                 else 
                 {  
                      $data = $this->upload->data(); 
                      $insert['name'] = $data['file_name'];
      
                      $result = $this->acctman->editUserAccount($_POST["accid_tobeedited"],$_POST["edituser_idnumber"],$_POST["edituser_surname"],$_POST["edituser_fname"],$_POST["edituser_category"], $insert['name']);
                     echo json_encode($result);
                 }  
            }else{
                $result = $this->acctman->editUserAccount($_POST["accid_tobeedited"],$_POST["edituser_idnumber"],$_POST["edituser_surname"],$_POST["edituser_fname"],$_POST["edituser_category"], "");
                echo json_encode($result);
            }  
            
            // $result = $this->acctman->editUserAccount($this->input->post('db_id'),$this->input->post('idnumber'),$this->input->post('sname'),$this->input->post('fname'),$this->input->post('cat'));
            // echo json_encode($result);
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


                   //$this->db->insert('images',$insert);
                      //$getId = $this->db->insert_id();
    
                      //$arr = array('msg' => 'Image has not uploaded successfully', 'success' => false);
    
                    //   if($getId){
                    //    $arr = array('msg' => 'Image has been uploaded successfully', 'success' => true);
                    //   }