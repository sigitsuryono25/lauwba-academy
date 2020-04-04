<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author sigit
 */
class Login extends CI_Controller {

    //put your code here

    function index() {
        $this->load->view('login');
    }

    function login_proc() {
        if (!$_POST) {
            return "No data send";
        } else {
            $username = $this->input->post('username', true);
            $passwrd = $this->input->post('password', true);

            $res = $this->user->getUser($username, $passwrd);
            if ($res->num_rows() > 0) {
                $data = $res->row();
                $sessionData = [
                    'nama' => $data->nama,
                    'username' => $data->username,
                    'foto' => $data->foto
                ];

                $this->session->set_userdata($sessionData);
            } else {
                echo json_encode(['message' => 'Tidak ada data']);
            }
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}
