<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Task_model');
	}

	public function getProfile()
	{
		$user_id = $this->session->id;
		$data = $this->Task_model->getProfile($user_id);

		echo json_encode($data);
	}

    public function pendingTask()
    {
		// $user_id = $this->session->id;
		$data = $this->Task_model->pendingTask();
		echo json_encode($data);
    }

	public function acceptPT(){
		$id = $this->input->post('id');
		$data['User_ID'] = $this->session->id;
		$data['Status'] = 'OnGoing';
		$this->Task_model->updateStatus($id, $data);

		echo json_encode(1);
	}

	public function onGoingTask()
	{
		$user_id = $this->session->id;
		$data = $this->Task_model->onGoingTask($user_id);
		echo json_encode($data);
	}

	public function cancelOT(){
		$id = $this->input->post('id');
		$data['User_ID'] = $this->input->post('User_ID');
		$data['Status'] = 'Pending';
		$this->Task_model->updateStatus($id, $data);
	}
	public function completeOT(){
		$id = $this->input->post('id');
		$device_id = $this->input->post('device_id');
		$data['User_ID'] = $this->session->id;
		$status = array(
			'Status' => 'Completed'
		);
		$this->Task_model->updateStatus($id, $status);
		$this->Task_model->updateStatusDevice($device_id, $status);

		echo json_encode($data);
	}
	public function completedTask()
	{
		$user_id = $this->session->id;
		$data = $this->Task_model->completedTask($user_id);
		echo json_encode($data);
	}
	public function getChartDataTask()
	{
		// $data1['status'] = $this->input->post('Status');
		// $data1['name'] = $this->input->post('Full_Name');
		$data1['id'] = $this->input->post('task_ID');

		$completed_task = $this->Task_model->taskAnalytics($data1);

		echo json_encode($completed_task);
	}
	
}