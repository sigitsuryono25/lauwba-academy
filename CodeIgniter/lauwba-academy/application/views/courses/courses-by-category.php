<div class="bg-dark pt-5" style="margin-top: 80px">
    <div class="mb-5 mt-2" style="background: linear-gradient(220deg,#EC5252 -10%,#6E1A52 70%)">
        <div class="container py-3">        
            <h1 class="text-white font-weight-100"><?php echo $this->course->getCoursesNameByNamaSeo($this->uri->segment(2))->row()->nama_kategori ?></h1>
        </div>
    </div>
    <div class="container pb-4">
        <div class="row">
            <?php
            if ($courses->num_rows() > 0) {
                foreach ($courses->result() as $key => $cat) {
                    ?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="content">
                                <div class="image" style="
                                     background: url(<?php echo base_url('hacked-usa/assets/course/' . $cat->location_folder . '/' . $cat->course_cover) ?>);
                                     background-position: center; background-repeat: no-repeat; width: 100%; height: 250px;">
                                    &nbsp;
                                </div>
                                <div class="middle">
                                    <a href="<?php echo site_url('detail?cat=' . $this->uri->segment(2) . '&courses=' . $this->etc->replaceAll("\s+\/&@#$%", $cat->nama_course) . '&hash=' . $cat->id_course) ?>" class="btn btn-primary text-white"><i class="fa fa-eye"></i> Lihat Detail</a>
                                </div>
                            </div>
                            <label class="p-2" style="position: absolute; top: 0; left: 0;">
                                <i class="fa fa-2x <?php echo $cat->icon_on_academy ?> text-<?php echo $cat->bagde_class ?>"></i>    
                                <!--&nbsp;Android-->
                            </label>
                            <div class="card-body">
                                <span style="max-width: 200px;" class="card-title d-inline-block text-truncate"><?php echo $cat->nama_course ?></span><br>
                                <small class="lead" style="font-size: 14px;"><?php echo $cat->nama ?></small>
                            </div>
                            <div class="card-footer">
                                <div class="container text-center">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star-half text-warning"></i>&nbsp;&nbsp;
                                    <label>4.5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="bg-light pt-4">
    <?php echo $random?>
</div>
<?php echo $kategori_tersedia ?>
<?php echo $kata_peserta ?>
<?php echo $dipercayai ?>
