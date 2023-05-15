<?php

class api_model extends CI_Model
{
    function updateValue($data){
        $this->db->where('sensor', $data['sensor']);
        $this->db->update('sensor_value', $data);
    }
}
