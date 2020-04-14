<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

    function proc_login() {
        if ($_POST) {
            $username = $this->input->post('email');
            $password = $this->input->post('passwords');
            $md5Password = md5($password);

            $res = $this->user->getUserDetail($username, $md5Password);
            if ($res->num_rows() > 0) {

                echo json_encode(['message' => 'Welcome, ' . $res->row()->nama_lengkap, 'code' => 200]);
            } else {
                echo json_encode(['message' => 'tidak ada data ditemukan', 'code' => 404]);
            }
        } else {
            echo json_encode(['message' => 'no data send', 'code' => 300]);
        }
    }

}
