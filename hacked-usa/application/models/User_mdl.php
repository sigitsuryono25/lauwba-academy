<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_mdl
 *
 * @author sigit
 */
class User_mdl extends CI_Model {

    //put your code here

    function getUser($username, $password) {
        return $this->db->query("SELECT * FROM lauwbaco_presensi_kar.tb_user "
                . "WHERE username IN ('$username') AND passwords IN(md5('$password'))");
    }

}
