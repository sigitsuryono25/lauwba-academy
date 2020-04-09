<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course_mdl
 *
 * @author sigit
 */
class Course_mdl extends CI_Model {

    //put your code here
    function getTrainer() {
        return $this->db->query("SELECT * FROM lauwbaco_latest_lauwba.tutor WHERE id_tutor NOT IN('19') ORDER BY id_tutor DESC");
    }

    function getLatestCourse($limit = null) {
        $username = $this->session->userdata('username');
        return $this->db->query("SELECT * FROM tb_course LEFT JOIN lauwbaco_latest_lauwba.tutor on tb_course.trainer=tutor.id_tutor "
                        . "LEFT JOIN lauwbaco_latest_lauwba.jenis on tb_course.id_training=jenis.id_jenis WHERE tb_course.added_by IN ('$username') ORDER BY tb_course.created_on DESC $limit");
    }

    function getTraining() {
        return $this->db->query("SELECT * FROM lauwbaco_latest_lauwba.jenis ");
    }

    function getCourseData($userid = null) {
        $username = $this->session->userdata('username');
        return $this->db->query("SELECT * FROM tb_course LEFT JOIN lauwbaco_latest_lauwba.tutor on tb_course.trainer=tutor.id_tutor "
                        . "LEFT JOIN lauwbaco_latest_lauwba.jenis on tb_course.id_training=jenis.id_jenis WHERE tb_course.added_by IN ('$username')");
    }

    function getCourseById($idCourse) {

        $username = $this->session->userdata('username');
        return $this->db->query("SELECT * FROM tb_course LEFT JOIN lauwbaco_latest_lauwba.tutor on tb_course.trainer=tutor.id_tutor "
                        . "LEFT JOIN lauwbaco_latest_lauwba.jenis on tb_course.id_training=jenis.id_jenis WHERE tb_course.id_course IN('$idCourse') AND tb_course.added_by IN ('$username')");
//        return $this->db->query("SELECT * FROM tb_course WHERE id_course IN ('$idCourse')");
    }

}
