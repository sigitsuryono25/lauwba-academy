<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('username')) {
            redirect('login');
        }
    }

    public function index() {
        $data['navigation'] = $this->load->view('navigation/navigation', null, true);
        $data['titlepages'] = "Dashboard";
        $data['breadcrumbs'] = anchor("main", "Dashboard", "class='text-white'") . "/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['course'] = $this->course->getLatestCourse("LIMIT 6");
        $data['main'] = $this->load->view('dashboard/dashboard', $data, true);
        $this->load->view('template', $data);
    }

}
