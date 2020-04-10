<div class="col-md-12 col-sm-12 text-center">
    <h4><span class="font-weight-bold"><?php echo $course->nama_course ?></span><br>
        <small>dibuat by: <?php echo $course->nama ?></small>
    </h4>
</div>
<h5 class="text-center font-weight-bold mb-3">Material List</h5>
<div class="col-md-12 col-sm-12 overflow-auto px-4 ">
    <div id="accordion">
        <?php foreach ($materi as $i => $co) { ?>
            <div class="card shadow-sm">
                <div class="card-header" id="heading-<?php echo $co->id_materi ?>">
                    <a href="javascript:void(0)" data-toggle="collapse" data-target="#collapse-<?php echo $co->id_materi ?>" aria-expanded="true" aria-controls="collapse-<?php echo $co->id_materi ?>">
                        <?php echo $co->nama_materi ?>
                    </a>
                </div>
                <div id="collapse-<?php echo $co->id_materi ?>" class="collapse <?php echo ($i == 0) ? 'show' : '' ?>" aria-labelledby="heading-<?php echo $co->id_materi ?>" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            <li class="font-weight-bold">Deskripsi Materi</li>
                            <div class="text-justify small">
                                <?php echo $co->deskripsi_materi ?>
                            </div>
                            <li class="font-weight-bold">Dibuat pada</li>
                            <div class="text-justify small mb-3">
                                <?php echo date_format(date_create($co->created_on), 'd-m-Y') ?>
                            </div>
                            <li class="font-weight-bold mb-2">Daftar Video</li>
                            <ol>
                                <?php
                                $res = $this->materi->getListVideoByIdMateri($co->id_materi)->result();
                                foreach ($res as $key => $r) {
                                    ?>
                                    <li><?php echo $r->file_name ?></li>
                                <?php } ?>
                            </ol>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>