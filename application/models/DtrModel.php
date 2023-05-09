<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class DtrModel extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function save_time_in($employee_db_id, $current_time, $current_date, $type){
        
        // if (isset($employee_db_id) && isset($current_date) && isset($current_time)){
        //     $query = $this->db->query("select * from time_records where (employee_db_id='".$employee_db_id.", date='".$current_date."')");
        //     $row = $query->num_rows();
            
            // if ($row) {
                $query = $this->db->query("insert into time_records set employee_db_id='$employee_db_id', am_time_in ='$current_time', date='$current_date'");  
                $message = "Time in successfully!";
            // }
        // }

        return $message;
    }
}