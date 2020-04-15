<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Materi
 *
 * @author sigit
 */
class Materi extends CI_Controller {

    //put your code here

    function index() {
        $data['navigation'] = $this->load->view('navigation/navigation', null, true);
        $data['titlepages'] = "Course Summary";
        $data['breadcrumbs'] = "Your Course/" . anchor("#", "Add New Materials", "class='text-white'") . "/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['materi'] = $this->materi->getMaterial();
        $data['course'] = $this->course->getLatestCourse();
        $data['main'] = $this->load->view('materi/form-materi', $data, true);
        $this->load->view('template', $data);
    }

    function getmateribycourse($idCourse) {
        $res = $this->materi->getMateriListByUserAndCourse($idCourse);
        $data['data'] = [];
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $tmp = [];
                $tmp['id_materi'] = $r->id_materi;
                $tmp['nama_materi'] = $r->nama_materi;
                $tmp['deskripsi_materi'] = $r->deskripsi_materi;
                $tmp['pdf_materi'] = $r->pdf_materi;
                $tmp['id_course'] = $r->id_course;

                array_push($data['data'], $tmp);
            }
            $data['message'] = 'data found';
            $data['code'] = 200;
            echo json_encode($data);
        } else {
            echo json_encode(['message' => 'no data found', 'code' => 404]);
        }
    }

    function new_add_material_proc() {
        $namaMateri = $this->input->post('nama-materi');
        $descMateri = $this->input->post('deskripsi-materi');
        $idMateri = empty($this->input->post('id-materi')) ? $this->etc->gen_uuid() : $this->input->post('id-materi');
        $judulVideo = $this->input->post('judul-video');
        $mode = $this->input->post('mode');

        $idCourse = $this->input->post('id-course');

        $dataInsert = [
            'id_materi' => $idMateri,
            'nama_materi' => $namaMateri,
            'deskripsi_materi' => $descMateri,
            'id_course' => $idCourse,
            'added_by' => $this->session->userdata('username')
        ];


        $locationFolder = $this->course->getCourseById($idCourse)->row()->location_folder;
        $destFolder = $this->etc->replaceAll("\s+\/&@#$%", $namaMateri);
        $uploadPath = './assets/course/' . $locationFolder . "/" . $destFolder . '/';
        $this->etc->createHtaccess($uploadPath);
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755);
        }
        $config['upload_path'] = $uploadPath;
        $config['max_size'] = 0;
//        $config['allowed_types'] = "zip";
        $config['allowed_types'] = "mp4";
//        $config['file_name'] = $destFolder . "-pakced";
        $config['file_name'] = $judulVideo;
        $config['overwrite'] = true;

        //load config to the library
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $metadata = $this->upload->data();
//            $this->extractZip($dataInsert, $metadata, $uploadPath);

            $dataVideo = [
                'id_video' => $this->etc->gen_uuid(),
                'upload_path' => $uploadPath,
                'file_name' => $metadata['file_name'],
                'id_materi' => $idMateri,
                'video_title' => $judulVideo,
                'added_by' => $this->session->userdata('username')
            ];


            if ($mode == 'add') {
                $this->crud->insertData('tb_materi', $dataInsert);
            }
            $this->crud->insertData('tb_video', $dataVideo);
        } else {
            
        }
    }

    private function extractZip($data, $metadata, $uploadPath) {
        $path = $metadata['full_path'];

        $this->etc->createHtaccess($metadata['file_path']);
        $zip = new ZipArchive();
        if ($zip->open($path)) {
            $zip->extractTo($metadata['file_path']);
            $zip->close();
        }

        //insert to materi

        $this->crud->insertData('tb_materi', $data);

        $files = scandir($metadata['file_path']);
        foreach ($files as $file) {
            $file_ext = explode(".", $file);
            $allowed_show = ['mp4'];
            if (in_array($file_ext[1], $allowed_show)) {
                $dataVideo = [
                    'id_video' => $this->etc->gen_uuid(),
                    'upload_path' => $uploadPath,
                    'file_name' => $file,
                    'id_materi' => $data['id_materi'],
                    'added_by' => $this->session->userdata('username')
                ];

                $this->crud->insertData('tb_video', $dataVideo);
                sleep(1);
            }
        }

        unlink($path);
        echo "Data berhasil ditambahkan";
    }

    function list_materi() {
        $data['navigation'] = $this->load->view('navigation/navigation', null, true);
        $data['titlepages'] = "Material Summary";
        $data['breadcrumbs'] = "Your Course/" . anchor("#", "Material Summary", "class='text-white'") . "/";
        $data['top'] = $this->load->view('titles/titles-pages', $data, true);
        $data['course'] = $this->course->getCourseData();
        $data['main'] = $this->load->view('materi/summary-material', $data, true);
        $this->load->view('template', $data);
    }

    function get_video_list($idMateri) {
        $res = $this->materi->getListVideoByIdMateri($idMateri);
        $data['data'] = [];
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $tmp = [];
                $tmp['id_video'] = $r->id_video;
                $tmp['file_name'] = base_url($r->upload_path . $r->file_name);
                $tmp['friendly_name'] = $this->etc->getLastPath($r->upload_path . $r->file_name, sizeof(explode('/', $r->upload_path . $r->file_name)) - 1);
                $tmp['id_materi'] = $r->id_materi;

                array_push($data['data'], $tmp);
            }
            $data['message'] = 'data found';
            $data['code'] = 200;
            echo json_encode($data);
        } else {
            echo json_encode(['message' => 'no data found', 'code' => 404]);
        }
    }

    function get_materi_list($idCourse) {
        $res = $this->materi->getMateriListByUserAndCourse($idCourse);
        $data['data'] = [];
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $tmp = [];
                $tmp['id_materi'] = $r->id_materi;
                $tmp['nama_materi'] = $r->nama_materi;
                $tmp['deskripsi_materi'] = $r->deskripsi_materi;

                array_push($data['data'], $tmp);
            }
            $data['message'] = 'data found';
            $data['code'] = 200;
            echo json_encode($data);
        } else {
            echo json_encode(['message' => 'no data found', 'code' => 404]);
        }
    }

    function delete_materi($idMateri) {
        $videoList = $this->materi->getListVideoByIdMateri($idMateri)->result();
//        print_r($videoList);
        foreach ($videoList as $v) {
            unlink($v->upload_path . $v->file_name);
            unlink($v->upload_path . '.htaccess');
            rmdir($v->upload_path);
        }
        $dataDelete = ['id_materi' => $idMateri];
        $this->crud->deleteData('tb_materi', $dataDelete);
        echo "hapus data success";
    }

}
