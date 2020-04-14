<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_m
 *
 * @author sigit
 */
class User_m extends CI_Model{
    //put your code here
    
    function getUserDetail($username, $password){
        return $this->db->query("SELECT * FROM lauwbaco_latest_lauwba.pendaftar WHERE email IN ('$username') AND passwords IN ('$password')");
        
    }
}
