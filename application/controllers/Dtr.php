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
                $image = $this->input->post('image');

                $employee_db_id = $_SESSION['user']['db_id'];

                $current_time = date('H:i:s', strtotime($current_time));
                $current_date = date('Y-m-d');
                $current_time_formatted = date('HiA', strtotime($current_time));

                $image_title = $employee_db_id . '_' . $current_time_formatted;

                $image = str_replace('data:image/png;base64,', '', $image);
                // $image = str_replace(' ', '+', $image);
                $data = base64_decode($image);
                file_put_contents('./assets/'.$image_title.'.png', $data);

                $image_data = base64_encode(file_get_contents('./assets/'.$image_title.'.png'));
                $src = 'data:image/png;base64,'.$image_data;

                // Pagkuha ng image using path, para masave sa database
                $imagessss = addslashes(file_get_contents('./assets/'.$image_title.'.png'));

                $result = $this->dtrmodel->save_time_in_out($employee_db_id, date('H:i:s', strtotime('17:26')), $current_date, $type, $imagessss);

                echo json_encode($result);
	}

        public function get_time_records(){
                date_default_timezone_set('Asia/Manila');

                $month = $this->input->post('month');
                $year = $this->input->post('year');

                $data['year'] = $year;
                $data['month'] = $month;
                $data['days'] = cal_days_in_month(CAL_GREGORIAN, $month, $year);

                $employee_id = $_SESSION['user']['db_id'];
                $selected_year_month = date("Y-m", strtotime(''.$year.'-'.$month.''));

                $data['time_records'] = $this->dtrmodel->get_time_records($employee_id, $selected_year_month);
                
                echo json_encode($data);
	}
}
