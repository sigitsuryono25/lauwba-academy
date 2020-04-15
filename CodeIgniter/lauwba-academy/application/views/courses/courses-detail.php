<style>
    ol li {
        margin-bottom: .125em;
    }
</style>
<div class="bg-dark pt-4" style="margin-top: 60px">
    <div class="bg-white">

        <div class="container-fluid p-0 ">
            <div class="bg-dark">
                <div class="px-5">
                    <div class="row pt-5 d-flex justify-content-center">
                        <div class="col-md-4 col-sm-12 pt-5 pb-3 pl-5 ">
                            <h4 class="text-white font-weight-bold"><?php echo $courses->nama_course ?></h4>
                            <!--<p class="lead text-white "><?php echo strip_tags($courses->deskripsi) ?></p>-->
                            <p class="lead text-white">Dibuat oleh: <?php echo strip_tags($courses->nama) ?></p>
                            <div class="row my-4">
                                <div class="col-md-6 border-right">
                                    <span class="text-uppercase text-white ">rating</span>
                                    <div class="container-fluid p-0 text-warning mt-2">
                                        <i class="fa fa-star" style="font-size: 24px;"></i>
                                        <i class="fa fa-star" style="font-size: 24px;"></i>
                                        <i class="fa fa-star" style="font-size: 24px;"></i>
                                        <i class="fa fa-star" style="font-size: 24px;"></i>
                                        <i class="fa fa-star-half" style="font-size: 24px;"></i>&nbsp;&nbsp;
                                        <label class="text-white" style="font-size: 24px;">4.5</label>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-5">
                                    <span class="text-uppercase text-white ">kategori</span>
                                    <div class="container-fluid p-0 text-white mt-2">
                                        <label class="text-white font-weight-bold text-uppercase"><?php echo filter_input(INPUT_GET, 'cat') ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">

                        </div>
                        <div class="col-md-3 col-sm-12 bg-dark p">
                            <div class="card mt-4 d-none d-md-block" style="position: absolute; left: 15%;right: 15%;">
                                <div class="content" oncontextmenu="return false">
                                    <div class="content">
                                        <?php
                                        $idCourse = $this->input->get('hash');
                                        $video = $this->course->getCoursesById($idCourse)->row();
                                        ?>
                                        <video width="100%">
                                            <source src="<?php echo base_url('hacked-usa/assets/course/' . $video->location_folder . '/preview-courses/' . $video->video_preview) ?>"/>
                                        </video>
                                        <div class="middle" style="cursor: pointer" onclick="return videoPreview('<?php echo base_url('hacked-usa/assets/course/' . $video->location_folder . '/preview-courses/' . $video->video_preview) ?> ?>')">
                                            <i class="fa fa-4x fa-play-circle-o text-white" ></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label class="font-weight-bold text-dark" style="font-size: 1.5em">Rp. 560.999</label>
                                    <br/>
                                    <label><del>Rp. 1.287.000</del> <span class="badge badge-success" style="font-size: 1.2em">40% off</span></label>
                                    <div class="container-fluid p-0">
                                        <button class="btn btn-block btn-danger">Daftar Sekarang</button>
                                    </div>
                                    <div class="container-fluid p-0">
                                        <span>Kursus ini sudah termasuk</span>
                                        <label></label>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-2 mb-2 d-block d-md-none ">
                                <div class="content">
                                    <video width="100%">
                                        <source src="<?php echo base_url('hacked-usa/assets/course/' . $video->location_folder . '/preview-courses/' . $video->video_preview) ?>"/>

                                    </video>
                                    <div class="middle" style="cursor: pointer" onclick="return videoPreview('<?php echo base_url('hacked-usa/assets/course/' . $video->location_folder . '/preview-courses/' . $video->video_preview) ?>')">
                                        <i class="fa fa-4x fa-play-circle-o text-white" ></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label class="font-weight-bold text-dark" style="font-size: 1.5em">Rp. 560.999</label>
                                    <br/>
                                    <label><del>Rp. 1.287.000</del> <span class="badge badge-success" style="font-size: 1.2em">40% off</span></label>
                                    <div class="container-fluid p-0">
                                        <button class="btn btn-block btn-danger">Daftar Sekarang</button>
                                    </div>
                                    <div class="container-fluid p-0">
                                        <span>Kursus ini sudah termasuk</span>
                                        <label></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="row px-5 ">
                <div class="col-md-8 px-4 ml-4 mt-3 mb-4">
                    <div class="p-3">
                        <h4 class="mb-2">Deskripsi </h4>
                        <?php echo $courses->deskripsi ?>
                    </div>
                </div>
                <div class="col-md-8 px-4 ml-4 my-4">
                    <div class="p-3">
                        <div class="card bg-light p-3">
                            <h4 class="mb-2">Apa yang akan dipelajari</h4>
                            <?php echo $courses->yang_dipelajari ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 px-4 ml-4 mt-3 mb-4">
                    <div class="p-3">
                        <h4 class="mb-3">Topik Yang Dibahas</h4>
                        <div id="accordion">
                            <?php
                            $materi = $this->course->getMateriList(filter_input(INPUT_GET, 'hash'))->result();
                            foreach ($materi as $i => $co) {
                                ?>
                                <div class="card shadow-sm mb-1">
                                    <div style="cursor: pointer" class="card-header" data-toggle="collapse" data-target="#collapse-<?php echo $co->id_materi ?>" aria-expanded="true" aria-controls="collapse-<?php echo $co->id_materi ?>">
                                        <a href="javascript:void(0)" class="text-dark" >
                                            <?php echo $co->nama_materi ?>
                                        </a>
                                    </div>
                                    <div id="collapse-<?php echo $co->id_materi ?>" class="collapse <?php echo ($i == 0) ? 'show' : '' ?>" aria-labelledby="heading-<?php echo $co->id_materi ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-0">Topik</th>
                                                            <th class="border-0 text-center">Materi</th>
                                                            <th class="border-0 text-center">Durasi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $res = $this->course->getListVideoByIdMateri($co->id_materi)->result();
                                                        foreach ($res as $key => $r) {
                                                            ?>
                                                            <tr>
                                                                <td class="border-0"><?php echo $r->video_title ?></td>
                                                                <td class="border-0 text-center">Video</td>
                                                                <td class="border-0 text-center"><?php echo $this->etc->get_video_duration($r->upload_path . '/' . $r->file_name) ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $random; ?>
    <?php $this->load->view('courses/modal-video-view'); ?>
</div>
<script>



    function videoPreview(path) {
        $(".video-preview source").each(function (e) {
            $(this).attr('src', path);
        });
        $('.video-preview').get(0).load();
        $(".trainer-name").html('<?php echo strip_tags($courses->nama) ?>');
        $(".trainer-image").attr('src', '<?php echo strip_tags($courses->foto)?>');

        $("#video-preview").modal('show');
        $('.video-preview').get(0).play();

    }

    $('#video-preview').on('hide.bs.modal', function () {
        $('.video-preview').get(0).pause();
    });

</script>

