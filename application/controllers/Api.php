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
		$data['Sensor_Value'] = $this->input->post('Sensor_Value');
		$data['Timestamp'] = date("Y-m-d h:i:s");
		$this->api_model->updateValue($data);

		echo json_encode($data);

		// return $data;
	}

    public function setVal(){
        $value = $this->get_sensor_val();

        echo json_encode($value);
    }

	public function newTask() {

		$page = 'newTask';
		// $result = $this->api_model->getVal();		
		// $data['result'] = $result["Sensor_value"];

		// echo $result["Sensor_value"];
		// exit;

		$this->load->view('templates/header');
		$this->load->view('pages/' . $page);
		$this->load->view('templates/footer');	
	}	

	public function newTask2() {

		$page = 'newTask';
		$result = $this->api_model->getVal();	
		echo $result["Sensor_value"];
		return json_encode($result["Sensor_value"]);
	}	
	
}

