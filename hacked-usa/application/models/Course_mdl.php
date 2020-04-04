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

    function getLatestCourse() {
        $username = $this->session->userdata('username');
        return $this->db->query("SELECT * FROM tb_course LEFT JOIN lauwbaco_latest_lauwba.tutor on tb_course.trainer=tutor.id_tutor "
                        . "LEFT JOIN lauwbaco_latest_lauwba.jenis on tb_course.id_training=jenis.id_jenis WHERE tb_course.added_by IN ('$username') ORDER BY tb_course.created_on DESC LIMIT 6");
    }

    function getTraining() {
        return $this->db->query("SELECT * FROM lauwbaco_latest_lauwba.jenis ");
    }

    function getCourseData($userid) {
        return $this->db->query("SELECT * FROM tb_course LEFT JOIN lauwbaco_latest_lauwba.tutor on tb_course.trainer=tutor.id_tutor "
                        . "LEFT JOIN lauwbaco_latest_lauwba.jenis on tb_course.id_training=jenis.id_jenis WHERE tb_course.added_by IN ('$userid')");
    }

    function insertData($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    function updateData($table, $data, $where) {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    function deleteData($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

}
