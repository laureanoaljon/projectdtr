<?php

class EmployeeDTRModel extends CI_Model{

    function getEmployees(){
        
        $this->db->select('db_id,employee_id,s_name,f_name');
        $this->db->where("category != 'office_head' AND category != 'hr_personnel'");
        
        $query = $this->db->get('employee');
        return $query->result();
    }

    function getEmployeeDtr($emp_dbid){
        
        $this->db->select('*');
        $this->db->where('employee_db_id', $emp_dbid);
        $this->db->order_by('date', 'ASC');
        
        $query = $this->db->get('time_records');
        return $query->result();
    }

    function insertTimeInData($emp_dbid, $time_in, $date_in, $time_in_mode){
        
        //if morning time in ,if may time in record na, return "already timed in"

        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $emp_dbid);
        $this->db->where('date', $date_in);
        $query = $this->db->get();
        
        $row = $query->row();
        $num_row = $query->num_rows();

        if($time_in_mode == "morning time-in" && $num_row > 0)
            return "Already has time-in record for this date";
        else if($time_in_mode == "morning time-in" && $num_row == 0){
            $data = array(
                'employee_db_id' => $emp_dbid,
                'am_time_in' => $time_in,
                'date' => $date_in
            );
        
            $this->db->insert('time_records', $data);
            return "time in successful";
        }else if($time_in_mode == "afternoon time-in" && $num_row > 0){
            $this->db->set('pm_time_in', $time_in);
            $this->db->where('db_id', $row->db_id);
            $this->db->update('time_records');
            return "time in successful";
        }else if($time_in_mode == "afternoon time-in" && $num_row == 0){
            $data = array(
                'employee_db_id' => $emp_dbid,
                'pm_time_in' => $time_in,
                'date' => $date_in
            );
        
            $this->db->insert('time_records', $data);
            return "time in successful";
        }
        // $record = $query->result_array();
        
        
       
    }





    function insertTimeOutData($emp_dbid, $time_out, $date_in, $time_out_mode){
        
        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $emp_dbid);
        $this->db->where('date', $date_in);
        $query = $this->db->get();
        
        $row = $query->row();
        $num_row = $query->num_rows();

        if($time_out_mode == "morning time-out" && $num_row == 0)
            return "There must be morning time-in for this date";
        else if($time_out_mode == "morning time-out" && $num_row > 0){
            if(empty($row->am_time_in)){
                return "There must be morning time-in for this date";
            }else{
                $this->db->set('am_time_out', $time_out);
                $this->db->where('db_id', $row->db_id);
                $this->db->update('time_records');

                return "time out successful";
            }
           
        }else if($time_out_mode == "afternoon time-out" && $num_row == 0){
            return "There must be morning time-in or afternoon time-in for this date";
        }else if($time_out_mode == "afternoon time-out" && $num_row > 0){
            
                $this->db->set('pm_time_out', $time_out);
                $this->db->where('db_id', $row->db_id);
                $this->db->update('time_records');

                //compute total hours
                $this->compute_total_hours($emp_dbid, $date_in);
                return "time out successful";
            
        }
        // $record = $query->result_array();
        
        
       
    }


    public function compute_total_hours($employee_db_id, $current_date){
        $this->db->select('*');
        $this->db->from('time_records');
        $this->db->where('employee_db_id', $employee_db_id);
        $this->db->like('date', $current_date);
        $query = $this->db->get();
        $rec = $query->result_array();

        if (!empty($rec[0]['am_time_in']) && !empty($rec[0]['pm_time_out'])){  
            $total_hours = $rec[0]['pm_time_out'] - $rec[0]['am_time_in'];

            $this->db->set('total_hours', $total_hours);
            $this->db->where('employee_db_id', $employee_db_id);
            $this->db->like('date', $current_date);
            $this->db->update('time_records');
        }
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

}