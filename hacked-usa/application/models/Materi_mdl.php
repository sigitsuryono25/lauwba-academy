<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Materi_mdl
 *
 * @author sigit
 */
class Materi_mdl extends CI_Model {

    //put your code here

    function getMateriListByUserAndCourse($idCourse) {
        $username = $this->session->userdata('username');
        return $this->db->query("SELECT * FROM tb_materi WHERE added_by IN ('$username') AND id_course IN('$idCourse')");
    }

    function getMaterial() {
        $username = $this->session->userdata('username');
        return $this->db->query("SELECT * FROM tb_materi WHERE added_by IN ('$username')");
    }

    function getListVideoByIdMateri($idMateri) {
        $username = $this->session->userdata('username');
        return $this->db->query("SELECT * FROM tb_video WHERE added_by IN ('$username') AND id_materi IN ('$idMateri')");
    }

}
