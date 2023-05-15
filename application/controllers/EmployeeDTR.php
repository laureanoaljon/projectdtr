<?php



class EmployeeDTR extends CI_Controller{


    function __construct(){
        parent::__construct();

        $this->load->helper('html');
         $this->load->model('EmployeeDTRModel', 'empdtr');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    // date_default_timezone_set('Asia/Manila');
    // $data['year'] = date("Y");
    //         $data['month'] = date("m"); 
    //         $data['days'] = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']);
    public function index(){
       
        //  session_destroy();
		if (isset($_SESSION['user']['employee_id'])) {
            $data['db_id'] = $_SESSION['user']['db_id'];
            $data['employee_id'] = $_SESSION['user']['employee_id'];
			$data['first_name'] = $_SESSION['user']['f_name'];
            $data['last_name'] = $_SESSION['user']['s_name'];
            $data['category'] = $_SESSION['user']['category'];

            
            $data['month'] = date("m"); 
            $data['employees_data'] = $this->empdtr->getEmployees();

            //echo date("g:i a", strtotime("13:30"));
            $this->load->view('employee_dtr', $data);
        } else {
            $data = array();

            $this->load->view('login', $data);
        }
    }



    public function insertTimeInData(){
        
        $time_in_24_hour_format  = date("H:i", strtotime($this->input->post('time_in')));

        $emp_dtr = $this->empdtr->insertTimeInData($this->input->post('emp_dbid'), $time_in_24_hour_format, $this->input->post('date_in'), $this->input->post('time_in_mode'));

        // $response1 = $chartmap2data->categ1;
        // $response2 =  $chartmap2data->map1data_jsonstring;
        // $ajaxresponse = array($response1, $response2);
        //$ajaxresponse = "time_in:".$data['test'];

        //$this->input->post('emp_dbid').",". $this->input->post('time_in').",". $this->input->post('date_in')
        echo json_encode($emp_dtr);

        //echo $response1;


    }

    public function insertTimeOutData(){
        
        $time_in_24_hour_format  = date("H:i", strtotime($this->input->post('time_out')));

        $emp_dtr = $this->empdtr->insertTimeOutData($this->input->post('emp_dbid'), $time_in_24_hour_format, $this->input->post('date_in'), $this->input->post('time_out_mode'));

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


    public function get_time_records(){
        date_default_timezone_set('Asia/Manila');

        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $data['year'] = $year;
        $data['month'] = $month;
        $data['days'] = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $employee_id = $this->input->post('emp_dbid');
        $selected_year_month = date("Y-m", strtotime(''.$year.'-'.$month.''));

        $data['time_records'] = $this->empdtr->get_time_records($employee_id, $selected_year_month);
        
        echo json_encode($data);
    }

    
    public function office_analytics(){
        date_default_timezone_set('Asia/Manila');

        // session_destroy();
		if (isset($_SESSION['user']['employee_id'])) {
            $data['db_id'] = $_SESSION['user']['db_id'];
            $data['employee_id'] = $_SESSION['user']['employee_id'];
			$data['first_name'] = $_SESSION['user']['f_name'];
            $data['last_name'] = $_SESSION['user']['s_name'];
            $data['category'] = $_SESSION['user']['category'];

            $data['year'] = date("Y");
            $data['month'] = date("m"); 
            $data['days'] = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']);
            
            $day_count = $data['days'];
            $year = $data['year'];
            $month = $data['month'];

            $employee_id = $data['db_id'];
            $current_date = date("Y-m");

            // $workdays_arr = array();

            // //loop through all days
            // for ($i = 1; $i <= $day_count; $i++) {
            //     $day_name = date('D', strtotime("{$year}-{$month}-{$i}"));

            //     //if not a weekend add day to array
            //     if($day_name != 'Sun' && $day_name != 'Sat'){
            //         array_push($workdays_arr, $day_name);
            //     }
            // }

            $data['workdays_count'] = 23;
            $data['present_days_count'] = 22;
            $data['absent_days_count'] = 1;

            $data['tardy_days_count'] = 4;
            $data['undertime_days_count'] = 4;
            $data['overtime_days_count'] = 5;
            $data['half_days_am_count'] = 2;
            $data['half_days_pm_count'] = 2;
            $data['half_days_count'] = $data['half_days_am_count'] + $data['half_days_pm_count'];
            
            // $data['time_records'] = $this->dtrmodel->get_time_records($employee_id, $current_date);
            // // print_r($data['time_records']);

            $this->load->view('office_dtr_analytics', $data);
        } else {
            $data = array();

            $this->load->view('login', $data);
        }
	}
}