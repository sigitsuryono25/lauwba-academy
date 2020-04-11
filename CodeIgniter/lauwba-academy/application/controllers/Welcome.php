<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {        
        $data['category'] = $this->course->getListCategory()->result();
        $data['navigation'] = $this->load->view('navigation/navigation', $data, TRUE);
        $data['banner'] = $this->load->view('headfoot/banner', null, TRUE);
        $data['title'] = 'Lauwba Academy';
        
        //random courses
        $data['random'] = $this->course->getRandomCourse()->result();
        
        //pages
        $data['kategori_tersedia'] = $this->load->view('home/kategori_tersedia', $data, TRUE);
        $data['kata_peserta'] = $this->load->view('home/kata_peserta_kami', $data, TRUE);
        $data['dipercayai'] = $this->load->view('home/dipercayai', $data, TRUE);
        $data['random'] = $this->load->view('home/random-courses', $data, true);
        //template
        $data['content'] = $this->load->view('home/infront', $data, TRUE);
        $this->load->view('template/home', $data);
    }

}
