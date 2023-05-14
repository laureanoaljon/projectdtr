<?php

class AccountManagementModel extends CI_Model{

    function getActiveUserAccounts(){
        
        $this->db->select('*');
        $this->db->where("is_active", 1);
        
        $query = $this->db->get('employee');
        return $query->result();
    }

    function getAccountData($emp_dbid){
        
        $this->db->select('*');
        $this->db->where("db_id", $emp_dbid);
        
        $query = $this->db->get('employee');
        return $query->row();
    }


    function insertUserAccount($idnumber, $sname, $fname, $cat, $pw,$image_path){
        $data = array(
                'employee_Id' => $idnumber,
                's_name' => $sname,
                'f_name' => $fname,
                'category' => $cat,
                'password' => $pw,
                'is_active' => 1,
                'dp' => $image_path
        );
    
        $this->db->insert('employee', $data);
        return "New User Account created";
    }



    function editUserAccount($db_id, $idnumber, $sname, $fname, $cat){
       
        $this->db->set('employee_id', $idnumber);
        $this->db->set('s_name', $sname);
        $this->db->set('f_name', $fname);
        $this->db->set('category', $cat);
        $this->db->where('db_id', $db_id);
        $this->db->update('employee'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

        
        return "User Account edited";

    }

    function archiveUserAccount($db_id){
       
        $this->db->set('is_active', 0);
        $this->db->where('db_id', $db_id);
        $this->db->update('employee'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

        
        return "User Account archived";

    }

    function getArchivedUserAccounts(){
        $this->db->select('*');
        $this->db->where("is_active", 0);
        
        $query = $this->db->get('employee');
        return $query->result();
    }

    function reviveUserAccount($db_id){
       
        $this->db->set('is_active', 1);
        $this->db->where('db_id', $db_id);
        $this->db->update('employee'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

        
        return "User Account revived";

    }

    function deleteUserAccount($db_id){

        $this->db->delete('employee', array('db_id' => $db_id));
       

        return "User Account deleted";

    }

    // public function insertAccountDp($image_path, $db_id)
	// {
	// 	$this->db->set('dp', $image_path);
    //     $this->db->where('db_id', $db_id);
    //     $this->db->update('employee'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

    //     return "Image uploaded";
	// }


}