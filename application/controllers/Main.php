<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('loginmodel');
        $this->load->model('dtrmodel');
        
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper('security');
        $this->load->library('session');  
        $this->load->library('form_validation');
        $this->load->library("pagination"); 
        $this->load->library('zip');
        $this->load->helper('file');
    }

	public function index(){
        date_default_timezone_set('Asia/Manila');

        // session_destroy();
		if (isset($_SESSION['user']['employee_id'])) {
            $data['db_id'] = $_SESSION['user']['db_id'];
            $data['employee_id'] = $_SESSION['user']['employee_id'];
			$data['first_name'] = $_SESSION['user']['f_name'];
            $data['last_name'] = $_SESSION['user']['s_name'];
            $data['category'] = $_SESSION['user']['category'];
            $data['full_name'] = $data['first_name']." ".$data['last_name'];

            $data['year'] = date("Y");
            $data['month'] = date("m"); 
            $data['days'] = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']);

            $employee_id = $data['db_id'];
            $current_date = date("Y-m");

            $data['time_records'] = $this->dtrmodel->get_time_records($employee_id, $current_date);
            // print_r($data['time_records']);

            $this->load->view('dashboard', $data);
        } else {
            $data = array();

            $this->load->view('login', $data);
        }
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

            $employee_id = $data['db_id'];
            $current_date = date("Y-m");

            $data['time_records'] = $this->dtrmodel->get_time_records($employee_id, $current_date);
            // print_r($data['time_records']);

            $this->load->view('dashboard_analytics', $data);
        } else {
            $data = array();

            $this->load->view('login', $data);
        }
	}

	public function login(){
        /*Data that we receive from ajax*/
        $id_number = $this->input->post('id_number');
        $password = $this->input->post('password');

        $output = array('error' => false);

        // $this->form_validation->set_rules('email', 'Username:', 'required|trim|xss_clean|callback_validation');  
        // $this->form_validation->set_rules('password', 'Password:', 'required|trim');  

        $data = $this->loginmodel->login($id_number, $password);
 
		if($data['result']){
			$this->session->set_userdata('user', $data['result']);
            $output['error'] = false;
            $output['message'] = $data['message']; 
        } else {
			$output['error'] = true;
			$output['message'] = $data['message']; 
		}
 
		echo json_encode($output);
    }

    public function logout(){  
        $this->session->sess_destroy();  
        redirect('main/index');  
    }

    public function change_password(){
        /*Data that we receive from ajax*/
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        $employee_id = $_SESSION['user']['employee_id'];

        // $this->form_validation->set_rules('email', 'Username:', 'required|trim|xss_clean|callback_validation');  
        // $this->form_validation->set_rules('password', 'Password:', 'required|trim');  

        $respose = $this->loginmodel->change_password($employee_id, $current_password, $new_password, $confirm_password);
 
		echo json_encode($respose);
    }

    public function print_dtr_table(){
        date_default_timezone_set('Asia/Manila');

        // $month = $this->input->post('month');
        // $year = $this->input->post('year');

        $month = $this->uri->segment(3);
        $year = $this->uri->segment(4);

        $year = date("Y", strtotime(''.$year.'-'.$month.''));
        $month = date("m", strtotime(''.$year.'-'.$month.''));
        
        $data['year'] = $year;
        $data['month'] = $month;
        $data['days'] = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $employee_id = $_SESSION['user']['db_id'];
        $data['employee_id'] = $_SESSION['user']['employee_id'];
        $data['first_name'] = $_SESSION['user']['f_name'];
        $data['last_name'] = $_SESSION['user']['s_name'];

        $selected_year_month = date("Y-m", strtotime(''.$year.'-'.$month.''));

        $data['time_records'] = $this->dtrmodel->get_time_records($employee_id, $selected_year_month);

        $this->load->view('dtr_table_pdf', $data);

        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('A4', 'landscape');

        $this->dompdf->render();

        $this->dompdf->stream('dtr_table.pdf', array('Attachment'=>0));

        echo json_encode("Success!");
	}

    public function print_dtr_form(){
        date_default_timezone_set('Asia/Manila');

        // $month = $this->input->post('month');
        // $year = $this->input->post('year');

        $month = $this->uri->segment(3);
        $year = $this->uri->segment(4);

        $year = date("Y", strtotime(''.$year.'-'.$month.''));
        $month = date("m", strtotime(''.$year.'-'.$month.''));
        
        $data['year'] = $year;
        $data['month'] = $month;
        $data['days'] = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $employee_id = $_SESSION['user']['db_id'];
        $data['employee_id'] = $_SESSION['user']['employee_id'];
        $data['first_name'] = $_SESSION['user']['f_name'];
        $data['last_name'] = $_SESSION['user']['s_name'];

        $selected_year_month = date("Y-m", strtotime(''.$year.'-'.$month.''));

        $data['time_records'] = $this->dtrmodel->get_time_records($employee_id, $selected_year_month);

        $this->load->view('dtr_form_pdf', $data);

        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('A4', 'portrait');

        $this->dompdf->render();

        $this->dompdf->stream('dtr_form.pdf', array('Attachment'=>0));

        echo json_encode("Success!");
	}
}
