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

    function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);

            foreach ($objects as $object) {
                if ($object != '.' && $object != '..') {
                    if (filetype($dir . '/' . $object) == 'dir') {
                        $this->rrmdir($dir . '/' . $object);
                    } else {
                        unlink($dir . '/' . $object);
                    }
                }
            }

            reset($objects);
            rmdir($dir);
        }
    }

    function replaceAll($charToReplace, $string) {
        $result = strtolower(preg_replace("/[$charToReplace]/", '-', $string));
        return $result;
    }

    function createHtaccess($path) {
        error_reporting(0);
        $files = fopen($path . '.htaccess', 'w');
        $txt = "#Contents of .htaccess
RewriteEngine on
RewriteCond %{HTTP_REFERER} !^http://localhost/.*$ [NC]
RewriteCond %{HTTP_REFERER} !^http://localhost/.*$ [NC]
RewriteRule .(mp4|mp3|avi|jpg|png)$ - [F]";
        fwrite($files, $txt);
    }

    function getLastPath($path, $pathToGet) {
        $paths = explode('/', $path);
        return $paths[$pathToGet];
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
