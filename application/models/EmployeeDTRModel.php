<?php

class EmployeeDTRModel extends CI_Model{

    function getEmployees(){
        
        $this->db->select('db_id,employee_id,s_name,f_name');
        $this->db->where("category != 'office_head' AND category != 'hr_personnel'");
        
        $query = $this->db->get('employee');
        return $query->result();
    }

    function insertTimeInData($emp_dbid, $time_in, $date_in){
        $data = array(
                'employee_db_id' => $emp_dbid,
                'am_time_in' => $time_in,
                'date' => $date_in
        );
    
        $this->db->insert('time_records', $data);
        return "time in successful";
    }

}