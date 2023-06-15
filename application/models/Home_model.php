<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_userData_single($email)
    {
        $this->db->where('Email_Address', $email);
        $query = $this->db->get('users');
        return $query->row_array();
    }
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->where('Email_Address', $email);
        $query = $this->db->get('users');;
            return $query->row_array();

        
    }
    public function get_userData_single_with_ID($ID)
    {
        $this->db->where('ID', $ID);
        $query = $this->db->get('users');
        return $query->row_array();
    }
    public function register()
    {
        $firstName = $this->input->post('firstName');
        $middleName = $this->input->post('middleName');
        $lastName = $this->input->post('lastName');
        $email = $this->input->post('email');
        $number = $this->input->post('number');
        $password = $this->input->post('password');
        $fullName = $firstName . " " . $lastName;
        $userType = 1;

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);    

        $data = array(

            'First_Name' => $firstName,
            'Middle_Name' => $middleName,
            'Last_Name' => $lastName,
            'Full_Name' => $fullName,
            'Contact_Number' => $number,
            'Email_Address' => $email,
            'Password' => $hashedPwd,
            'User_Type' => $userType,          
            
        );

        return $this->db->insert('users', $data);
    }
}

?>