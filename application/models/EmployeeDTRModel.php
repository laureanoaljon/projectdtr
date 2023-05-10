<?php

class EmployeeDTRModel extends CI_Model{

    function getEmployees(){
        
        $this->db->select('db_id,employee_id,s_name,f_name');
        $this->db->where("category != 'office_head' AND category != 'hr_personnel'");
        
        $query = $this->db->get('employee');
        return $query->result();
    }

}