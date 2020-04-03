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
class Course_mdl extends CI_Model{
    //put your code here
    function getTrainer(){
        return $this->db->query("SELECT * FROM lauwbaco_latest_lauwba.tutor WHERE id_tutor NOT IN('19') ORDER BY id_tutor DESC");
    }
    function getTraining(){
        return $this->db->query("SELECT * FROM lauwbaco_latest_lauwba.jenis ");
    }
}
