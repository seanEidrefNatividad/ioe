<?php

class api_model extends CI_Model
{
    function updateValue($data){
        $this->db->where('Sensor_Name', $data['Sensor_Name']);
        $this->db->update('device', $data);
    }
    function getVal() {
        $this->db->select('ID, Sensor_value');
        $query = $this->db->get('device');
        return $query->row_array();
    }
    
}
