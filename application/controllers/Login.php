<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {

			$page = "login";

			if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
				show_404();
			}

			$data['flashdata'] = $this->load->view('templates/flashdata', NULL, TRUE);

			$this->load->view('templates/header');
			$this->load->view('pages/' . $page, $data);
			$this->load->view('templates/footer');

		} else {
			$result = $this->Home_model->login();
			$this->session->set_flashdata('loggedIn', 'Logged In Successfully');

			// print_r($result);
			// exit;

			if ($result) {
				$newdata = array(
					'id' => $result['ID'],
					'usertype' => $result['User_Type'],
					'logged_in' => TRUE,
				);

				$this->session->set_userdata($newdata);

				redirect(base_url() . "index.php/i/profile");
			} else {
				$array_items = array('id', 'usertype', 'logged_in');
				$this->session->unset_userdata($array_items);
				$this->session->set_flashdata('WrongLogIn', 'Wrong email and password');

				redirect(base_url(). "index.php/");
			}		

		}

	}

}