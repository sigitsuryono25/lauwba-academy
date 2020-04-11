<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course_m
 *
 * @author sigit
 */
class Course_m extends CI_Model {

    //put your code here

    function getListCategory() {
        return $this->db->query("SELECT * FROM lauwbaco_latest_lauwba.kategori1 WHERE is_active_on_academy IN ('Y') ORDER BY nama_kategori ASC");
    }

    function getCoursesNameByNamaSeo($namaSeo) {
        return $this->db->query("SELECT * FROM lauwbaco_latest_lauwba.kategori1 WHERE lauwbaco_latest_lauwba.kategori1.nama_seo IN('$namaSeo')");
    }

    function getRandomCourse() {
        return $this->db->query("SELECT * "
                        . "FROM lauwbaco_latest_lauwba.kategori1 "
                        . "INNER JOIN lauwbaco_latest_lauwba.jenis "
                        . "ON lauwbaco_latest_lauwba.kategori1.id_kategori=lauwbaco_latest_lauwba.jenis.id_kategori "
                        . "INNER JOIN db_lauwba_academy.tb_course "
                        . "ON db_lauwba_academy.tb_course.id_training=jenis.id_jenis "
                        . "INNER JOIN lauwbaco_latest_lauwba.tutor "
                        . "ON db_lauwba_academy.tb_course.trainer=lauwbaco_latest_lauwba.tutor.id_tutor ORDER BY RAND() LIMIT 15");
    }

    function getRandomCourseByCategory($namaSeo) {
        return $this->db->query("SELECT * "
                        . "FROM lauwbaco_latest_lauwba.kategori1 "
                        . "INNER JOIN lauwbaco_latest_lauwba.jenis "
                        . "ON lauwbaco_latest_lauwba.kategori1.id_kategori=lauwbaco_latest_lauwba.jenis.id_kategori "
                        . "INNER JOIN db_lauwba_academy.tb_course "
                        . "ON db_lauwba_academy.tb_course.id_training=jenis.id_jenis "
                        . "INNER JOIN lauwbaco_latest_lauwba.tutor "
                        . "ON db_lauwba_academy.tb_course.trainer=lauwbaco_latest_lauwba.tutor.id_tutor "
                        . "WHERE lauwbaco_latest_lauwba.kategori1.nama_seo IN('$namaSeo') "
                        . "ORDER BY RAND() LIMIT 10");
    }

    function getListCourses($namaSeo) {
        return $this->db->query("SELECT * "
                        . "FROM lauwbaco_latest_lauwba.kategori1 "
                        . "INNER JOIN lauwbaco_latest_lauwba.jenis "
                        . "ON lauwbaco_latest_lauwba.kategori1.id_kategori=lauwbaco_latest_lauwba.jenis.id_kategori "
                        . "INNER JOIN db_lauwba_academy.tb_course "
                        . "ON db_lauwba_academy.tb_course.id_training=jenis.id_jenis "
                        . "INNER JOIN lauwbaco_latest_lauwba.tutor "
                        . "ON db_lauwba_academy.tb_course.trainer=lauwbaco_latest_lauwba.tutor.id_tutor "
                        . "WHERE lauwbaco_latest_lauwba.kategori1.nama_seo IN('$namaSeo')");
    }

    function getMateriList($idCourse) {
        return $this->db->query("SELECT * FROM tb_materi WHERE id_course IN ('$idCourse') ORDER BY created_on ASC");
    }

    function getCoursesById($idCourses) {
        return $this->db->query("SELECT * FROM tb_course INNER JOIN lauwbaco_presensi_kar.tb_user "
                        . "ON tb_course.added_by=lauwbaco_presensi_kar.tb_user.username WHERE id_course IN ('$idCourses')");
    }

    function getListVideoByIdMateri($idMateri) {
        return $this->db->query("SELECT * FROM tb_video WHERE id_materi IN ('$idMateri') ORDER BY created_on ASC");
    }

}
