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

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('username')) {
            redirect('login');
        }
    }

    function course_summary() {
        $data['navigation'] = $this->load->view('navigation/navigation', null, true);
        $data['titlepages'] = "Course Summary";
        $data['breadcrumbs'] = "Your Course/" . anchor("course-summary", "Course Summary", "class='text-white'") . "/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['summary'] = $this->course->getCourseData("sigitsuryono25")->result();
        $data['main'] = $this->load->view('course/summary-course', $data, true);
        $this->load->view('template', $data);
    }

    function course_form() {
        $data['navigation'] = $this->load->view('navigation/navigation', null, true);
        $data['titlepages'] = "Form Course";
        $data['breadcrumbs'] = "Your Course/" . anchor("add-new-course", "Add New Course", "class='text-white'") . "/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['tutor'] = $this->course->getTrainer()->result();
        $data['training'] = $this->course->getTraining()->result();
        $data['main'] = $this->load->view('course/form-course', $data, true);
        $this->load->view('template', $data);
    }

    function course_add_proc() {
        $courseName = $this->input->post("course-name", true);
        $courseDescriptions = $this->input->post('course-descriptions', true);
        $trainerId = $this->input->post('trainer-id', true);
        $trainingId = $this->input->post('training-id', true);
        $seo = $this->etc->replaceAll("\/&@#$%", $courseName);
        $idCourse = $this->etc->gen_uuid();

        //prepare array for insert
        $dataInsert = [];

        //prepare for uploading image
        $config['upload_path'] = './assets/course/';
        $config['max_size'] = 0;
        $config['allowed_types'] = "jpg|jpeg|png";
        $config['file_name'] = $seo;
        $config['overwrite'] = true;

        //load config to the library
        $this->load->library('upload', $config);

        //doupload
        if ($this->upload->do_upload('course-cover')) {
            $metadata = $this->upload->data();

            //preparing data for insert
            $dataInsert = [
                'id_course' => $idCourse,
                'nama_course' => $courseName,
                'course_cover' => $metadata['file_name'],
                'trainer' => $trainerId,
                'deskripsi' => $courseDescriptions,
                'id_training' => $trainingId,
                'added_by' => $this->session->userdata('username')
            ];
        } else {
            //preparing data for insert
            $dataInsert = [
                'id_course' => $idCourse,
                'nama_course' => $courseName,
                'trainer' => $trainerId,
                'deskripsi' => $courseDescriptions,
                'id_training' => $trainingId,
                'added_by' => $this->session->userdata('username')
            ];
        }

        $this->course->insertData('tb_course', $dataInsert);
    }

}
