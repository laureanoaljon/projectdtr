<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class DtrModel extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_time_records($employee_id, $current_date){
        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $employee_id);
        $this->db->like('date', $current_date);
        
        $query = $this->db->get();
        $records = $query->result_array();

        return $records;
    }

    public function save_time_in_out($employee_db_id, $current_time, $current_date, $type, $image = NULL){

        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $employee_db_id);
        $this->db->like('date', $current_date);
        $query = $this->db->get();

        $record = $query->result_array();

        $row = $query->num_rows();
        
        if ($row) {
            // Pagmay record na
            if ($type == "timeIn"){
                // Time in
                if ($current_time < date('H:i:s', strtotime('11:00'))){
                    if (!empty($record[0]['am_time_in'])){
                        $message = "Already time in (AM)";
                    } else {
                        $this->db->query("insert into time_records set employee_db_id='$employee_db_id', am_time_in ='$current_time', date='$current_date', image='$image'");  
                        $message = "Time in successfully (AM)";

                        $this->compute_total_hours($employee_db_id, $current_date);
                    }
                } else if ($current_time > date('H:i:s', strtotime('11:00')) && $current_time < date('H:i:s', strtotime('16:00'))){
                    if (!empty($record[0]['pm_time_in'])){
                        $message = "Already time in (PM)";
                    } else {
                        $this->db->set('pm_time_in', $current_time);
                        $this->db->where('employee_db_id', $employee_db_id);
                        $this->db->like('date', $current_date);
                        $this->db->update('time_records');

                        $message = "Time in successfully (PM)";

                        $this->compute_total_hours($employee_db_id, $current_date);
                    }
                } else {
                    $message = nl2br("Unable to punch time record!\r\n &emsp;&#8226; AM time-in is before 11am only \r\n &emsp;&#8226; PM time-in is between 11AM to 4PM only");
                } 
            } else {
                // Time out
                if ($current_time > date('H:i:s', strtotime('9:00')) && $current_time < date('H:i:s', strtotime('13:00'))){
                    if (empty($record[0]['am_time_out'])){
                        if (!empty($record[0]['am_time_in'])){    
                            $this->db->set('am_time_out', $current_time);
                            $this->db->where('employee_db_id', $employee_db_id);
                            $this->db->like('date', $current_date);
                            $this->db->update('time_records');

                            $message = "Time out successfully (AM)";

                            $this->compute_total_hours($employee_db_id, $current_date);
                        } else {
                            $message = "There must be morning time in";
                        }
                    } else {
                        $message = "Already time out (AM)";
                    }
                } else if ($current_time > date('H:i:s', strtotime('14:00'))){ 
                    if (empty($record[0]['pm_time_out'])){
                        if (empty($record[0]['am_time_in']) && empty($record[0]['pm_time_in'])){  
                            $message = 'There must be morning or afternoon time in';
                        } else {
                            $this->db->set('pm_time_out', $current_time);
                            $this->db->where('employee_db_id', $employee_db_id);
                            $this->db->like('date', $current_date);
                            $this->db->update('time_records');

                            $message = "Time out successfully (PM)";

                            $this->compute_total_hours($employee_db_id, $current_date);
                        }
                    } else {
                        $message = "Already time out (PM)";
                    }
                } else if ($current_time < date('H:i:s', strtotime('09:00'))){ 
                    $message = nl2br("Unable to punch time record!\r\n &emsp;&#8226; AM time-out is between 9AM to 1PM only \r\n &emsp;&#8226; PM time-out is 2PM onwards");
                } else if ($current_time > date('H:i:s', strtotime('13:00')) && $current_time < date('H:i:s', strtotime('14:00'))){ 
                    $message = nl2br("Unable to punch time record!\r\n &emsp;&#8226; AM time-out is between 9AM to 1PM only \r\n &emsp;&#8226; PM time-out is 2PM onwards");
                }
            }
        } else {
            // Wala pang record
            if ($type == "timeIn"){
                if ($current_time > date('H:i:s', strtotime('11:00'))){
                    if ($current_time > date('H:i:s', strtotime('11:00')) && $current_time < date('H:i:s', strtotime('16:00'))){
                        $this->db->query("insert into time_records set employee_db_id='$employee_db_id', pm_time_in ='$current_time', date='$current_date', image='$image'");  
                        $message = "Time in successfully (PM)";

                        $this->compute_total_hours($employee_db_id, $current_date);
                    } else {
                        $message = nl2br("Unable to punch time record!\r\n &emsp;&#8226; AM time-in is before 11am only \r\n &emsp;&#8226; PM time-in is between 11AM to 4PM only");
                    }
                } else if ($current_time < date('H:i:s', strtotime('11:00'))){
                    $this->db->query("insert into time_records set employee_db_id='$employee_db_id', am_time_in ='$current_time', date='$current_date', image='$image'");  
                    $message = "Time in successfully (AM)";

                    $this->compute_total_hours($employee_db_id, $current_date);
                } else {
                    $message = nl2br("Unable to punch time record!\r\n &emsp;&#8226; Lunch break hours");
                }
            } else {
                if ($current_time > date('H:i:s', strtotime('9:00')) && $current_time < date('H:i:s', strtotime('13:00'))){
                    $message = "There must be morning time in!";
                } else if ($current_time > date('H:i:s', strtotime('14:00'))){
                    $this->db->query("insert into time_records set employee_db_id='$employee_db_id', pm_time_out ='$current_time', date='$current_date', image='$image'");  
                    $message = "Time out successfully (PM)";

                    $this->compute_total_hours($employee_db_id, $current_date);
                } else {
                    if ($current_time > date('H:i:s', strtotime('11:00')) && $current_time < date('H:i:s', strtotime('16:00'))){
                        $message = "Time in first (PM)!";
                    } else {
                        $message = "There must be morning or afternoon time in";
                    }
                }
            }
        }

        return $message;
    }

    public function compute_total_hours($employee_db_id, $current_date){
        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $employee_db_id);
        $this->db->like('date', $current_date);
        
        $query = $this->db->get();
        $rec = $query->result_array();

        if (!empty($rec[0]['am_time_in']) && !empty($rec[0]['pm_time_out'])){ 
            $time1 = new DateTime(date("H:i:s", strtotime($rec[0]['am_time_in'])));
            $time2 = new DateTime(date("H:i:s", strtotime($rec[0]['pm_time_out'])));
            $interval = $time1->diff($time2); 
            $total_hours = $interval->format('%h') - 1;
            $total_minutes = $interval->format('%i');

            // $total_hours = ($rec[0]['pm_time_out'] - $rec[0]['am_time_in']) - 1;

            $this->db->set('total_hours', $total_hours);
            $this->db->set('total_minutes', $total_minutes);
            $this->db->where('employee_db_id', $employee_db_id);
            $this->db->like('date', $current_date);
            $this->db->update('time_records');
        } else if (!empty($rec[0]['am_time_in']) && !empty($rec[0]['am_time_out']) && empty($rec[0]['pm_time_in'])){
            $time1 = new DateTime(date("H:i:s", strtotime($rec[0]['am_time_in'])));
            $time2 = new DateTime(date("H:i:s", strtotime($rec[0]['am_time_out'])));
            $interval = $time1->diff($time2); 
            $total_hours = $interval->format('%h');
            $total_minutes = $interval->format('%i');

            // $total_hours = $rec[0]['am_time_out'] - $rec[0]['am_time_in'];

            $this->db->set('total_hours', $total_hours);
            $this->db->set('total_minutes', $total_minutes);
            $this->db->where('employee_db_id', $employee_db_id);
            $this->db->like('date', $current_date);
            $this->db->update('time_records');
        } else if (!empty($rec[0]['am_time_in']) && !empty($rec[0]['pm_time_in'])){
            $time1 = new DateTime(date("H:i:s", strtotime($rec[0]['am_time_in'])));
            $time2 = new DateTime(date("H:i:s", strtotime($rec[0]['pm_time_in'])));
            $interval = $time1->diff($time2); 
            $total_hours = $interval->format('%h') - 1;
            $total_minutes = $interval->format('%i');

            // $total_hours = ($rec[0]['pm_time_in'] - $rec[0]['am_time_in']) - 1;

            $this->db->set('total_hours', $total_hours);
            $this->db->set('total_minutes', $total_minutes);
            $this->db->where('employee_db_id', $employee_db_id);
            $this->db->like('date', $current_date);
            $this->db->update('time_records');
        } else if (!empty($rec[0]['am_time_in']) && empty($rec[0]['am_time_out']) && empty($rec[0]['pm_time_in']) && empty($rec[0]['pm_time_out'])){
            $total_hours = 0;
            $total_minutes = 0;

            $this->db->set('total_hours', $total_hours);
            $this->db->set('total_minutes', $total_minutes);
            $this->db->where('employee_db_id', $employee_db_id);
            $this->db->like('date', $current_date);
            $this->db->update('time_records');
        }
    }

    public function get_present_days($employee_db_id, $current_date){
        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $employee_db_id);
        $this->db->like('date', $current_date);
        $this->db->where('total_hours >', 0);

        $query = $this->db->count_all_results();
        return $query;
    }


    public function get_tardy_days($employee_db_id, $current_date){
        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $employee_db_id);
        $this->db->like('date', $current_date);
        $this->db->where('total_hours <', 7);

        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_undertime_days($employee_db_id, $current_date){
        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $employee_db_id);
        $this->db->like('date', $current_date);
        $this->db->where('total_hours <', 8);

        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_overtime_days($employee_db_id, $current_date){
        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $employee_db_id);
        $this->db->like('date', $current_date);
        $this->db->where('total_hours >', 8);
        $this->db->where('total_minutes >=', 0);

        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_half_days($employee_db_id, $current_date){
        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $employee_db_id);
        $this->db->like('date', $current_date);
        $this->db->where('am_time_in !=', 'NULL');
        $this->db->where('am_time_out !=', 'NULL');
        $this->db->where('total_hours <', 7);

        $query = $this->db->count_all_results();
        return $query;
    }

}