<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Task_model');
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
		$data['User_ID'] = $this->input->post('User_ID');
		$data['Status'] = 'Completed';
		$this->Task_model->updateStatus($id, $data);

		echo json_encode(1);
	}
	public function completedTask()
	{
		$user_id = $this->session->id;
		$data = $this->Task_model->completedTask($user_id);
		echo json_encode($data);
	}
}