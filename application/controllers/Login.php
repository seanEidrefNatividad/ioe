<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$page = "login";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

		$data['flashdata'] = $this->load->view('templates/flashdata', NULL, TRUE);

        $this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
	}
	public function login() {
		// $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		// $this->form_validation->set_rules('email', 'Email', 'required');
		// $this->form_validation->set_rules('password', 'Password', 'required');

		redirect(base_url()."success");


		// if ($this->form_validation->run() == FALSE) {

		// 	$page = "login";

		// 	if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
		// 		show_404();
		// 	}

		// 	redirect(base_url());

		// 	// $this->load->view('templates/header');
		// 	// $this->load->view('pages/' . $page);
		// 	// $this->load->view('templates/footer');

		// } else {
		// 	$result = $this->Home_model->login();
		// 	//$this->session->set_flashdata('loggedIn', 'Logged In Successfully');

		// 	// if ($result) {
		// 	//     $newdata = array(
		// 	//         'email' => $result['email'],
		// 	//         'logged_in' => TRUE,
		// 	//         'username' => $result['username']
		// 	//     );

		// 	//     $this->session->set_userdata($newdata);
		// 	// } else {
		// 	//     $array_items = array('email', 'logged_in', 'username');
		// 	//     $this->session->unset_userdata($array_items);

		// 	//     $this->session->set_flashdata('WrongLogIn', 'Wrong email and password');
		// 	// }
		// 	redirect(base_url()."success");


		// }

	}
	public function success() {
		redirect(base_url()."home");
	}
}
