<style>
    ol li {
        margin-bottom: .125em;
    }
</style>
<div class="bg-white pt-4" style="margin-top: 60px">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-md-12 col-sm-12 bg-dark">
                <div class="row">
                    <div class="col-md-8 col-sm-12 py-5 pl-5 ">
                        <h4 class="text-white"><?php echo $courses->nama_course ?></h4>
                        <p class="lead text-white "><?php echo strip_tags($courses->deskripsi) ?></p>
                        <p class="font-weight-300 text-white">Dibuat oleh <?php echo strip_tags($courses->nama) ?></p>
                    </div>
                    <div class="col-md-4 col-sm-12 bg-dark">
                        <div class="card mt-5" style="position: absolute; left: 15%;right: 15%;">
                            <div class="content">
                                <div class="image" style="height: 250px; background: url(<?php echo base_url('hacked-usa/assets/course/' . $courses->location_folder . '/' . $courses->course_cover) ?>); background-repeat: no-repeat; background-position: center">
                                    &nbsp;
                                </div>

                                <div class="middle">
                                    <a href="<?php echo site_url('detail?courses=' . $this->etc->replaceAll("\s+\/&@#$%", $courses->nama_course) . '&hash=' . $courses->id_course) ?>" class="btn btn-primary text-white"><i class="fa fa-eye"></i> Lihat Detail</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <small><?php echo $courses->deskripsi ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 px-4 ml-4 my-4">
                <div class="bg-light card p-3">
                    <h4 class="mb-2">Apa yang akan dipelajari</h4>
                    <?php echo $courses->yang_dipelajari ?>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 px-4 ml-4 mt-3 mb-4">
                <div class="p-3">
                    <h4 class="mb-2">Deskripsi </h4>
                    <?php echo $courses->deskripsi ?>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 px-4 ml-4 mt-3 mb-4">
                <div class="p-3">
                    <h4 class="mb-3">Course Content</h4>
                    <div id="accordion">
                        <?php
                        $materi = $this->course->getMateriList(filter_input(INPUT_GET, 'hash'))->result();
                        foreach ($materi as $i => $co) {
                            ?>
                            <div class="card shadow-sm">
                                <div class="card-header" id="heading-<?php echo $co->id_materi ?>">
                                    <a href="javascript:void(0)" class="text-dark" data-toggle="collapse" data-target="#collapse-<?php echo $co->id_materi ?>" aria-expanded="true" aria-controls="collapse-<?php echo $co->id_materi ?>">
                                        <?php echo $co->nama_materi ?>
                                    </a>
                                </div>
                                <div id="collapse-<?php echo $co->id_materi ?>" class="collapse <?php echo ($i == 0) ? 'show' : '' ?>" aria-labelledby="heading-<?php echo $co->id_materi ?>" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul>
                                            <ol>
                                                <?php
                                                $res = $this->course->getListVideoByIdMateri($co->id_materi)->result();
                                                foreach ($res as $key => $r) {
                                                    ?>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <span><?php echo $r->video_title ?></span>
                                                    </li>
                                                <?php } ?>
                                            </ol>
                                        </ul>
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

