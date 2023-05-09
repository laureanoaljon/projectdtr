<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtr extends CI_Controller {

	function __construct(){
        parent::__construct();
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

	public function time_in_out(){
                date_default_timezone_set('Asia/Manila');
                $type = $this->input->post('type');
                $current_time = $this->input->post('current_time');
                $employee_db_id = $_SESSION['user']['db_id'];

                $current_time = date('Y-m-d H:i:s', strtotime($current_time));
                $current_date = date('Y-m-d H:i:s');

                $result = $this->dtrmodel->save_time_in_out($employee_db_id, $current_time, $current_date, $type);

                echo json_encode("Success!");
	}
}
