<?php

class AccountManagementModel extends CI_Model{

    function getActiveUserAccounts(){
        
        $this->db->select('*');
        $this->db->where("is_active", 1);
        
        $query = $this->db->get('employee');
        return $query->result();
    }


    function insertUserAccount($idnumber, $sname, $fname, $cat, $pw){
        $data = array(
                'employee_Id' => $idnumber,
                's_name' => $sname,
                'f_name' => $fname,
                'category' => $cat,
                'password' => $pw,
                'is_active' => 1
        );
    
        $this->db->insert('employee', $data);
        return "New User Account created";
    }
}