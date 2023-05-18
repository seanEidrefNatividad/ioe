<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index($path)
    {
        if ($this->session->has_userdata('logged_in')) {

            $page = $path;

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php') && $path != "logout") {
                show_404();
            }

            switch($page) {
                case "profile":
                    //do something
                    break;
                case "analytics":
                    //do something, get database
                    break;
                case "task":
                    //do something, get database
                    // $data['result'] = $this->Home_model->login();


                    break;
                case "logout":
                    $this->logout();
                    break;
            }

            $data['page'] = $page;
            // if usertype = "1". then enduser, else Admin
            $data['usertype'] = $this->session->usertype;
            $data['headerNav'] = $this->load->view('templates/headerNav', NULL, TRUE);
            $data['sidebarNav'] = $this->load->view('templates/sidebarNav', $data, TRUE);

            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {
            redirect(base_url(). "index.php/");
        }
    }
    private function logout()
    {   
        $array_items = array('id', 'usertype', 'logged_in');
        $this->session->unset_userdata($array_items);
        redirect(base_url(). "index.php/");  
    }
       
}