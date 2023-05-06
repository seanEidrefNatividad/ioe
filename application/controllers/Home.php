<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        if ($this->session->has_userdata('logged_in')) {
            $page = "home";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['headerNav'] = $this->load->view('templates/headerNav', NULL, TRUE);
            $data['sidebarNav'] = $this->load->view('templates/sidebarNav', NULL, TRUE);

            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {
            redirect(base_url());
        }
    }
    public function profile()
    {
        if ($this->session->has_userdata('logged_in')) {
            $page = "home";
            $page = "profile";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['headerNav'] = $this->load->view('templates/headerNav', NULL, TRUE);
            $data['sidebarNav'] = $this->load->view('templates/sidebarNav', NULL, TRUE);

            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {
            redirect(base_url());
        }
    }
    public function logout()
    {
        $array_items = array('email', 'logged_in', 'username');
        $this->session->unset_userdata($array_items);
        redirect(base_url());
    }
}