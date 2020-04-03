<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $data['navigation'] = $this->load->view('navigation/navigation', null, true);
        $data['titlepages'] = "Dashboard";
        $data['breadcrumbs'] = anchor("main", "Dashboard", "class='text-white'")."/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['main'] = $this->load->view('dashboard/dashboard', null, true); 
        $this->load->view('template', $data);
    }

}
