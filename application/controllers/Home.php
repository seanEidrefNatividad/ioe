<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
        $page = "home";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['headerNav'] = $this->load->view('templates/headerNav', NULL, TRUE);
        $data['sidebarNav'] = $this->load->view('templates/sidebarNav', NULL, TRUE);

        $this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
	}
}
