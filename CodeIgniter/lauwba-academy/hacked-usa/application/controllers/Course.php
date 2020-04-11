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
        $data['titlepages'] = "Ringkasan Kursus";
        $data['breadcrumbs'] = "Kursus Anda/" . anchor("course-summary", "Ringkasan Kursus", "class='text-white'") . "/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['summary'] = $this->course->getCourseData($this->session->userdata('username'))->result();
        $data['cardtitle'] = "Ringkasan Kursus Anda";
        $data['main'] = $this->load->view('course/summary-course', $data, true);
        $this->load->view('template', $data);
    }

    function course_form($idCourse = null) {
        $data['navigation'] = $this->load->view('navigation/navigation', null, true);
        $data['titlepages'] = "Formulir Tambah Kursus";
        $data['breadcrumbs'] = "Kursus Anda/" . anchor("add-new-course", "Tambah Kursus Baru", "class='text-white'") . "/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['tutor'] = $this->course->getTrainer()->result();
        $data['training'] = $this->course->getTraining()->result();
        $data['cardtitle'] = "Buat Kursus Baru";
        $data['main'] = $this->load->view('course/form-course', $data, true);
        $this->load->view('template', $data);
    }

    function course_add_proc() {
        $courseName = $this->input->post("course-name", true);
        $courseDescriptions = $this->input->post('course-descriptions', true);
        $trainerId = $this->input->post('trainer-id', true);
        $trainingId = $this->input->post('training-id', true);
        $idCourse = $this->etc->gen_uuid();

        $mode = $this->input->get('mode');
        echo $mode;
        //edit part
        $selectedIdCourse = $this->input->post('selected-id-course');

        //prepare array for insert
//        $dataInsert = [];

        //prepare for uploading image
        if ($mode == 'add') {
            $seo = $this->etc->replaceAll("\s+\/&@#$%", $courseName);
            if (!is_dir('./assets/course/' . $seo . "/")) {
                mkdir('./assets/course/' . $seo . "/", 0755);
            }
        } else {
            $oldFolderName = $this->course->getCourseById($selectedIdCourse)->row()->location_folder;
            $oldFileName = $this->course->getCourseById($selectedIdCourse)->row()->course_cover;
            $seo = $this->etc->replaceAll("\s+\/&@#$%", $courseName);
            rename("./assets/course/$oldFolderName", "./assets/course/$seo");
            unlink("./assets/course/$seo/$oldFileName");
        }
        $config['upload_path'] = './assets/course/' . $seo . "/";
        $config['max_size'] = 0;
        $config['allowed_types'] = "jpg|jpeg|png";
        $config['file_name'] = $seo . "-cover";
        $config['overwrite'] = true;

        //load config to the library
        $this->load->library('upload', $config);

//        //doupload
        if ($this->upload->do_upload('course-cover')) {
            $metadata = $this->upload->data();

            //preparing data for insert
            $dataInsert = [
                'id_course' => $idCourse,
                'nama_course' => $courseName,
                'course_cover' => $metadata['file_name'],
                'trainer' => $this->session->userdata('id_tutor'),
                'deskripsi' => $courseDescriptions,
                'id_training' => $trainingId,
                'location_folder' => $this->etc->replaceAll("\s+\/&@#$%", $seo),
                'added_by' => $this->session->userdata('username')
            ];

            $dataUpdate = [
                'nama_course' => $courseName,
                'course_cover' => $metadata['file_name'],
                'trainer' => $this->session->userdata('id_tutor'),
                'deskripsi' => $courseDescriptions,
                'location_folder' => $this->etc->replaceAll("\s+\/&@#$%", $seo),
                'id_training' => $trainingId,
                'added_by' => $this->session->userdata('username')
            ];
            $where = ['id_course' => $selectedIdCourse];

            //preparing data for update
        } else {
            //preparing data for insert
            $dataInsert = [
                'id_course' => $idCourse,
                'nama_course' => $courseName,
                'trainer' => $this->session->userdata('id_tutor'),
                'deskripsi' => $courseDescriptions,
                'id_training' => $trainingId,
                'added_by' => $this->session->userdata('username')
            ];

            //preparing data for update
            $dataUpdate = [
                'nama_course' => $courseName,
                'trainer' => $this->session->userdata('id_tutor'),
                'deskripsi' => $courseDescriptions,
                'id_training' => $trainingId,
                'location_folder' => $this->etc->replaceAll("\s+\/&@#$%", $seo),
                'added_by' => $this->session->userdata('username')
            ];
            $where = ['id_course' => $selectedIdCourse];
        }
        print_r($dataInsert);
        if ($mode == 'add') {
            $this->crud->insertData('tb_course', $dataInsert);
        } else {
            $this->crud->updateData('tb_course', $dataUpdate, $where);
        }
    }

    function delete_course($idCourse) {
        $res = $this->course->getCourseById($idCourse)->row();
        $this->etc->rrmdir("./assets/course/" . $res->location_folder);
//        rmdir("./assets/course/".$res->location_folder);
        $deleteData = ['id_course' => $idCourse];
        $this->crud->deleteData('tb_course', $deleteData);
        redirect('course-summary');
    }

    function get_course_by_id($idCourse) {
        $res = $this->course->getCourseData($idCourse);
        echo json_encode($res->row());
    }

    function detail_course($idCourse) {
        $data['course'] = $this->course->getCourseById($idCourse)->row();
        $data['materi'] = $this->materi->getMateriListByUserAndCourse($idCourse)->result();
        $this->load->view('course/modal-content', $data);
    }

}
