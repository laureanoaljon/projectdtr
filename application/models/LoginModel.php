<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class LoginModel extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function login($id_number, $password){
        $data = array();

        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('employee_id', $id_number);
        $this->db->where('password', $password);
        $this->db->where('is_active', 1);
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            $user = $query->result_array();

            $data['message'] = 'Successfully login!';
            $data['result'] = $query->row_array();
        } else {
            $data['result'] = array();
            $data['message'] = 'Employee not found!';
        }

        return $data;
    }

    public function change_password($employee_id, $current_password, $new_password, $confirm_password){
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('employee_id', $employee_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            $user = $query->result_array();

            if ($new_password != $confirm_password){
                $data['message'] = 'New and Re-enter does not match.';
            } else if ($user[0]['password'] != $current_password){
                $data['message'] = "Current Password did not match the user's password.";
            } else if ($user[0]['password'] == $new_password){
                $data['message'] = 'Current and New are the same.';
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('employee_id', $employee_id);
                $this->db->update('employee');

                $data['message'] = 'Successfully change password.';
            }
        } else {
            $data['message'] = 'Employee not found!';
        }

        return $data;
    }
}