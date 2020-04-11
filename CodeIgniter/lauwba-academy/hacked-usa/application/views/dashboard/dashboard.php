<div class="container-fluid mt-n5">
    <div class="row mb-4 align-content-center justify-content-center">
        <div class="col-md-3 mb-3" title="<?php echo site_url('course-summary') ?>" onclick='return location.assign("<?php echo site_url('course-summary') ?>")' style="cursor: pointer">
            <div class="card border-">
                <?php $username = $this->session->userdata('username'); ?>
                <div class="card-body bg-warning">
                    <div class="row">
                        <div class="col-md-4 mx-auto my-auto text-center">
                            <?php
                            $countcourse = $this->db->query("SELECT * FROM tb_course WHERE added_by IN ('$username')")->num_rows();
                            ?>
                            <h4 class="text-white font-weight-bolder">
                                <?php
                                echo $countcourse;
                                ?>
                                <br>
                            </h4>
                            <label class="text-white font-weight-bold">Materi</label>
                        </div>
                        <div class="col-md-3 mx-auto my-auto text-left" style="opacity: 0.6">
                            <i class="fa fa-3x fa-graduation-cap "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3" title="<?php echo site_url('summary-course') ?>" onclick='return location.replace("<?php echo site_url('add-new-course') ?>")' style="cursor: pointer">
            <div class="card">
                <div class="card-body bg-success">
                    <div class="row">
                        <div class="col-md-4 mx-auto my-auto text-center">
                            <?php
                            $materi = $this->db->query("SELECT * FROM tb_materi WHERE added_by IN ('$username')")->num_rows();
                            ?>
                            <h4 class="text-white font-weight-bolder">
                                <?php
                                echo $materi;
                                ?>
                                <br>
                            </h4>
                            <label class="text-white font-weight-bold">Materi</label>
                        </div>
                        <div class="col-md-3 mx-auto my-auto text-left" style="opacity: 0.6">
                            <i class="fa fa-3x fa-book "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3"  style="cursor: pointer">
            <div class="card">
                <div class="card-body bg-danger">
                    <div class="row">
                        <div class="col-md-4 mx-auto my-auto text-center">
                            <h4 class="text-white font-weight-bolder">
                                150
                                <br>
                            </h4>
                            <label class="text-white font-weight-bold">Komentar</label>
                        </div>
                        <div class="col-md-3 mx-auto my-auto text-left" style="opacity: 0.6">
                            <i class="fa fa-3x fa-comment "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4>Lihat timeline anda</h4>
    <div class="row">
        <div class="col-md-12 mb-4"> 
            <div class="card">
                <div class="card-header">6 Kursus terbaru yang anda buat</div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($course->result() as $co) { ?>
                            <div class="col-md-3 mb-3" onclick="return shownDetailCourse('<?php echo $co->id_course ?>')" style="cursor: pointer">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo base_url('assets/course/' . $co->location_folder . '/' . $co->course_cover) ?>" alt="<?php echo $co->nama_course ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $co->nama_course ?></h5>
                                        <small><?php echo $co->judul ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4 col-sm-12">
            <div class="card">
                <div class="card-header">Materi terbaru anda</div>
                <div class="card-body">This is a blank page. You can use this page as a boilerplate for creating new pages!</div>
            </div>
        </div>
        <div class="col-md-6 mb-4 col-sm-12">
            <div class="card">
                <div class="card-header">Komentar terbaru pada materi anda</div>
                <div class="card-body">This is a blank page. You can use this page as a boilerplate for creating new pages!</div>
            </div>
        </div>
    </div>
</div>