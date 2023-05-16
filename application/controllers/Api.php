<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('api_model');
	}
	public function index()
	{
        $data['body'] = 'api';
        $this->load->view('templates/api_layout', $data);       
	}

    public function home()
    {
        $data['body'] = 'api';
        $this->load->view('templates/api_layout', $data); 
    }

    // public function get_sensor_val()
    // {
    //     $sensorVal = $this->input->get('temperature');

    //     return $sensorVal;
    // }

	public function get_sensor_val()
	{
		$check = $this->input->post('data');
		if(isset($check)){
			$temperature = $this->getVal();
		}
		echo json_encode($temperature);
		// return $temperature;
		// echo json_encode($value);
	}

	function getVal(){
		$api_key_value = 'tPmAT5Ab3j7F9';
		$api_key = $this->input->post('api_key');
		// if ($api_key_value == $api_key){
		// }
		$data['Sensor_Name'] = $this->input->post('Sensor_Name');
		$data['Sensor_Location'] = $this->input->post('Sensor_Location');
		$data['valuSensor_Valuee'] = $this->input->post('Sensor_Value');
		$this->api_model->updateValue($data);
		echo json_encode($data);
		// return $data;
	}

    public function setVal(){
        $value = $this->get_sensor_val();

        echo json_encode($value);
    }

	// public function viewSensor()
	// {

	// }
	
}
