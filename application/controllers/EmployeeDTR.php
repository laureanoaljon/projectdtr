<?php



class EmployeeDTR extends CI_Controller{


    function __construct(){
        parent::__construct();

        $this->load->helper('html');
         $this->load->model('EmployeeDTRModel', 'empdtr');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index(){
        //  session_destroy();
		if (isset($_SESSION['user']['employee_id'])) {
            $data['db_id'] = $_SESSION['user']['db_id'];
            $data['employee_id'] = $_SESSION['user']['employee_id'];
			$data['first_name'] = $_SESSION['user']['f_name'];
            $data['last_name'] = $_SESSION['user']['s_name'];
            $data['category'] = $_SESSION['user']['category'];



            $data['employees_data'] = $this->empdtr->getEmployees();


            $this->load->view('employee_dtr', $data);
        } else {
            $data = array();

            $this->load->view('login', $data);
        }
    }



    public function insertTimeInData(){
        
        $emp_dtr = $this->empdtr->insertTimeInData($this->input->post('emp_dbid'), $this->input->post('time_in'), $this->input->post('date_in'));

        // $response1 = $chartmap2data->categ1;
        // $response2 =  $chartmap2data->map1data_jsonstring;
        // $ajaxresponse = array($response1, $response2);
        //$ajaxresponse = "time_in:".$data['test'];

        //$this->input->post('emp_dbid').",". $this->input->post('time_in').",". $this->input->post('date_in')
        echo json_encode($emp_dtr);

        //echo $response1;


    }

    public function getEmployeeDtr(){

        $emp_dtr = $this->empdtr->getEmployeeDtr($this->input->post('emp_dbid'));

        echo json_encode($emp_dtr);

    }

}