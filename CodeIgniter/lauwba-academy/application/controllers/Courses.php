<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Courses
 *
 * @author sigit
 */
class Courses extends CI_Controller {

    //put your code here

    public function index($namaSeo) {
        $data['category'] = $this->course->getListCategory()->result();
        $data['navigation'] = $this->load->view('navigation/navigation', $data, TRUE);
        $data['banner'] = null;
        $data['title'] = 'Lauwba Academy';
        $data['courses'] = $this->course->getListCourses($namaSeo);
        $data['kategori_tersedia'] = $this->load->view('home/kategori_tersedia', $data, TRUE);
        $data['kata_peserta'] = $this->load->view('home/kata_peserta_kami', $data, TRUE);
        $data['dipercayai'] = $this->load->view('home/dipercayai', $data, TRUE);
        
        $data['random'] = $this->course->getRandomCourse()->result();
        $data['random'] = $this->load->view('home/random-courses', $data, true);
        $data['content'] = $this->load->view('courses/courses-by-category', $data, TRUE);
        $this->load->view('template/home', $data);
    }

    function get_detail_course() {
        $hash = $this->input->get('hash', true);
        $data['category'] = $this->course->getListCategory()->result();
        $data['navigation'] = $this->load->view('navigation/navigation', $data, TRUE);
        $data['banner'] = null;
        $data['title'] = 'Lauwba Academy';
        $data['courses'] = $this->course->getCoursesById($hash)->row();
        $data['materi'] = $this->course->getMateriList($hash)->row();
        $data['random_data'] = $this->course->getRandomCourseByCategory($this->input->get('cat', true))->result();
        $data['random'] = $this->load->view('courses/random-course-by-cat', $data, true);
        $data['content'] = $this->load->view('courses/courses-detail', $data, TRUE);
        $this->load->view('template/home', $data);
    }

    function get_video_duration() {
        $location = $this->input->get('loc');
        require_once('../../getID3-master/getid3/getid3.php');
//        require_once('./getid3/getid3.php');
        $getID3 = new getID3();
//$filename = "../hacked-usa/assets/course/android-news-portal-apps-based-using-androidx/introduction/introduction.mp4";
        $fileinfo = $getID3->analyze($location);

        $playString = $fileinfo['playtime_string'];


        return $playString;
    }

}
