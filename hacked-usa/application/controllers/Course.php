<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course
 *
 * @author sigit
 */
class Course extends CI_Controller {

    function course_summary() {
        $data['navigation'] = $this->load->view('navigation/navigation', null, true);
        $data['titlepages'] = "Course Summary";
        $data['breadcrumbs'] = "Your Course/" . anchor("course-summary", "Course Summary", "class='text-white'") . "/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['main'] = $this->load->view('course/summary-course', null, true);
        $this->load->view('template', $data);
    }
    
    function course_form(){
        $data['navigation'] = $this->load->view('navigation/navigation', null, true);
        $data['titlepages'] = "Form Course";
        $data['breadcrumbs'] = "Your Course/" . anchor("add-new-course", "Add New Course", "class='text-white'") . "/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['tutor'] = $this->course->getTrainer()->result();
        $data['training'] = $this->course->getTraining()->result();
        $data['main'] = $this->load->view('course/form-course', $data, true);
        $this->load->view('template', $data);
    }

}
