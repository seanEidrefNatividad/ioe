<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('firstName', 'First name', 'required');
        $this->form_validation->set_rules('middleName', 'Middle name', 'required');
        $this->form_validation->set_rules('lastName', 'Last name', 'required');
        $this->form_validation->set_rules('number', 'Mobile number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "register";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $this->load->view('templates/header');
            $this->load->view('pages/' . $page);
            $this->load->view('templates/footer');

        } else {
            $this->Home_model->register();
            $this->session->set_flashdata('registered', 'Successfully registered');
            redirect(base_url(). "index.php/");
        }
	}
    public function email_check($str)
    {
        $userExist = $this->Home_model->get_userData_single($str);

        if ($userExist) {
            $this->form_validation->set_message('email_check', 'Email already in use');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
