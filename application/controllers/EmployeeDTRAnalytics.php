<?php



class EmployeeDTRAnalytics extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->helper('html');
         $this->load->model('EmployeeDTRModel', 'empdtr');
        $this->load->helper('url');
        $this->load->library('session');

        $this->load->model('loginmodel');
        $this->load->model('dtrmodel');
        
        $this->load->helper('date');
        $this->load->helper('security');
        $this->load->library("pagination"); 
        $this->load->library('zip');
        $this->load->helper('file');
    }

    public function index(){
       
         
        $this->analytics();
    }

    public function analytics(){
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

            $workdays_arr = array();

            //loop through all days
            for ($i = 1; $i <= $day_count; $i++) {
                $day_name = date('D', strtotime("{$year}-{$month}-{$i}"));

                //if not a weekend add day to array
                if($day_name != 'Sun' && $day_name != 'Sat'){
                    array_push($workdays_arr, $day_name);
                }
            }

            $data['workdays_count'] = count($workdays_arr);
            $data['present_days_count'] = $this->dtrmodel->get_present_days($employee_id, $current_date);
            
            if ($data['present_days_count'] == 0){
                $data['absent_days_count'] = $data['workdays_count'];
            } else {
                $data['absent_days_count'] = $data['workdays_count'] - $data['present_days_count'];
            }

            $data['tardy_days_count'] = $this->dtrmodel->get_tardy_days($employee_id, $current_date);
            $data['undertime_days_count'] = $this->dtrmodel->get_undertime_days($employee_id, $current_date);
            $data['overtime_days_count'] = $this->dtrmodel->get_overtime_days($employee_id, $current_date);
            $data['half_days_am_count'] = $this->dtrmodel->get_am_half_days($employee_id, $current_date);
            $data['half_days_pm_count'] = $this->dtrmodel->get_pm_half_days($employee_id, $current_date);
            $data['half_days_count'] = $data['half_days_am_count'] + $data['half_days_pm_count'];
            
            $data['time_records'] = $this->dtrmodel->get_time_records($employee_id, $current_date);
            // print_r($data['time_records']);

            $data['employees_data'] = $this->empdtr->getEmployees();
            $this->load->view('empdtr_analytics', $data);

            //$this->load->view('dashboard_analytics', $data);
        } else {
            $data = array();

            $this->load->view('login', $data);
        }
	}

    public function get_analytics(){
        date_default_timezone_set('Asia/Manila');

        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $data['year'] = $year;
        $data['month'] = $month;
        $data['days'] = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        
        $day_count = $data['days'];
        $year = $data['year'];
        $month = $data['month'];

        $employee_id = $_SESSION['user']['db_id'];
        $current_date = date("Y-m", strtotime(''.$year.'-'.$month.''));

        $workdays_arr = array();

        //loop through all days
        for ($i = 1; $i <= $day_count; $i++) {
            $day_name = date('D', strtotime("{$year}-{$month}-{$i}"));

            //if not a weekend add day to array
            if($day_name != 'Sun' && $day_name != 'Sat'){
                array_push($workdays_arr, $day_name);
            }
        }

        $data['workdays_count'] = count($workdays_arr);
        $data['present_days_count'] = $this->dtrmodel->get_present_days($employee_id, $current_date);

        if ($data['present_days_count'] == 0){
            $data['absent_days_count'] = $data['workdays_count'];
        } else {
            $data['absent_days_count'] = $data['workdays_count'] - $data['present_days_count'];
        }

        $data['tardy_days_count'] = $this->dtrmodel->get_tardy_days($employee_id, $current_date);
        $data['undertime_days_count'] = $this->dtrmodel->get_undertime_days($employee_id, $current_date);
        $data['overtime_days_count'] = $this->dtrmodel->get_overtime_days($employee_id, $current_date);
        $data['half_days_am_count'] = $this->dtrmodel->get_am_half_days($employee_id, $current_date);
        $data['half_days_pm_count'] = $this->dtrmodel->get_pm_half_days($employee_id, $current_date);
        $data['half_days_count'] = $data['half_days_am_count'] + $data['half_days_pm_count'];

        echo json_encode($data);
	}
}