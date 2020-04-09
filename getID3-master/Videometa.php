<?php
error_reporting(0);
$location = filter_input(INPUT_GET, 'loc');

require_once('./getid3/getid3.php');
$getID3 = new getID3();
//$filename = "../hacked-usa/assets/course/android-news-portal-apps-based-using-androidx/introduction/introduction.mp4";
$fileinfo = $getID3->analyze($location);

$width = $fileinfo['video']['resolution_x'];
$height = $fileinfo['video']['resolution_y'];
$playString = $fileinfo['playtime_string'];


echo $playString;
//echo json_encode([
////    'data'=> $fileinfo,
//    'width' => $width,
//    'height' => $height,
//    'duration' => $playString,
//]);
