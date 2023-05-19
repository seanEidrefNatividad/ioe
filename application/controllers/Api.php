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
		// $data['Sensor_Name'] = $this->input->post('Sensor_Name');
		// $data['Sensor_Location'] = $this->input->post('Sensor_Location');
		// $data['Building'] = $this->input->post('Building');
		// $data['Floor'] = $this->input->post('Floor');
		// $data['Restroom'] = $this->input->post('Restroom');
		// $data['Building'] = "GD3";
		// $data['Floor'] = "4th";
		// $data['Restroom'] = "Men";
		// $data['Sensor_Value'] = $this->input->post('Sensor_Value');
		// $data['Timestamp'] = date("Y-m-d h:i:s");

		$result = $this->api_model->getVal();

		$data = array(
			'Sensor_Name' => $this->input->post('Sensor_Name'),
			'Building' => "GD3",
			'Floor' => "4th",
			'Restroom' => "Men",
			'Status' => $result['Status'],
			'Sensor_Value' => $this->input->post('Sensor_Value'),
			'Timestamp' => date("Y-m-d h:i:s")
		);
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

		$result = $this->api_model->getVal();	
		// echo $result["Sensor_value"];
		echo json_encode($result);
	}	
	public function createTask() {

		$data['Device_ID'] = $this->input->post('Device_ID');
		$data['Building'] = $this->input->post('Building');
		$data['Floor'] = $this->input->post('Floor');
		$data['Restroom'] = $this->input->post('Restroom');
		$data['Status'] = $this->input->post('Status');
		$data['User_ID'] = $this->input->post('User_ID');

		$result = $this->api_model->createTask($data);

		echo json_encode($result);
	}

	public function updateStatus() {
		//$this->api_model->updateStatus($data);

		$id = $this->input->post('ID');
		// $data['Status'] = $this->input->post('Status');
		$status = array(
			'Status' => $this->input->post('Status')
		);

		$result = $this->api_model->updateStatusModel($id, $status);

		echo json_encode($result);
	}

	public function send_sms(){
		$message = $this->input->post('message');
		$numbers = array('09186194512', '09177864991', '09951047040', '09288596766');
		foreach ($numbers as $key => $value) {
			$this->build_sms($value, $message);
		}
	}

	public function build_sms($number, $message)
	{
		// $destination = "09177864991";
		// $text = "message";
		

		$fields = array(

			'mobile_number'=>urlencode($number),

			'message'=>urlencode($message)

		);
		
		$fields_string = http_build_query($fields);

		$fieldsString = "";

		

		// Create the fields string 

		foreach($fields as $key=>$value) {

			if (!empty($value))
			{

				$fieldsString .= $key.'='.$value.'&';

			}

		}

		
		$fieldsString = rtrim($fieldsString,'&');

		echo $fieldsString."<br>";

		//$url .= "?$fieldsString";

		

		$url = "https://stdominiccollege.edu.ph/smart_sms_evams/index.php/main/sms_send_api";

		// Creates a CURL GET HTTP request

		$ch = curl_init();

		curl_setopt ($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, 1);

		//curl_setopt($ch, CURLOPT_POSTFIELDSIZE, 2);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsString);

		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);

		$response = curl_exec($ch);

		curl_close($ch);

		

		echo "<strong>GET REQUEST URL:</strong><br/>";

		echo $url;

		echo "<br/><br/>";

		

		echo "<strong>RESPONSE:</strong><br/>";

		$response = str_replace("\r\n", "<br/>", $response);

		echo $response;
	}
	public function analytics()
	{
		$data1['yearlevel'] = $this->input->post('yearlevel');
		// $data1['yearlevel'] = 1;
		$total_enrollees = $this->Analytics_model->total_enrollees($data1);
		echo json_encode($total_enrollees);
	}

	
}

