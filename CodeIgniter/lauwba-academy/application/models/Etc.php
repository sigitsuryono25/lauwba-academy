<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Etc
 *
 * @author sigit
 */
class Etc extends CI_Model {

    function replaceAll($charToReplace, $string) {
        $result = strtolower(preg_replace("/[$charToReplace]/", '-', $string));
        return $result;
    }

    function get_video_duration($location) {
//        require_once('../../getID3-master/getid3/getid3.php');
        require_once('./getID3-master/getid3/getid3.php');
        $getID3 = new getID3();
        $filename ="hacked-usa/$location";
        $fileinfo = $getID3->analyze($filename);

        $playString = $fileinfo['playtime_string'];


        return $playString;
    }

    function gen_uuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,
                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}
