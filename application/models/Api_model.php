<?php

class api_model extends CI_Model
{
    function updateValue($data){
        $this->db->where('Sensor_Name', $data['Sensor_Name']);
        $this->db->update('device', $data);
    }
    function getVal() {
        $this->db->select('*');
        $query = $this->db->get('device');
        return $query->row_array();
    }
    function updateStatusModel($id, $status) {
        $this->db->where('ID', $id);
        $this->db->update('device', $status);
    }
    function createTask($data) {
        $this->db->insert('tasks', $data);
    }
    
}
