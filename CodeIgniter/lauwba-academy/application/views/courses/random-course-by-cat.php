<div class="container bg-white p-4 mx-auto my-4">
    <h4 class="pb-3 ">Courses from <span class="text-capitalize"><?php echo $this->input->get('cat') ?></span> for You</h4>
    <div class="row">
        <?php foreach ($random_data as $key => $cat) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="content">
                        <!--                        <div class="image" style="
                                                     background: url(<?php echo base_url('hacked-usa/assets/course/' . $cat->location_folder . '/' . $cat->course_cover) ?>);
                                                     background-position: center; background-repeat: no-repeat; width: 100%; height: 250px;">
                                                    &nbsp;
                                                </div>-->
                        <img class="card-img-top" src="<?php echo base_url('hacked-usa/assets/course/' . $cat->location_folder . '/' . $cat->course_cover) ?>">
                        <div class="middle">
                            <a href="<?php echo site_url('detail?cat=' . $cat->nama_seo . '&courses=' . $this->etc->replaceAll("\s+\/&@#$%", $cat->nama_course) . '&hash=' . $cat->id_course) ?>" class="btn btn-primary text-white"><i class="fa fa-eye"></i> Lihat Detail</a>
                        </div>
                    </div>
                    <label class="p-2" style="position: absolute; top: 0; left: 0;">
                        <i class="fa fa-2x <?php echo $cat->icon_on_academy ?> text-<?php echo $cat->bagde_class ?>"></i>    
                        <!--&nbsp;Android-->
                    </label>
                    <div class="card-body">
                        <span style="max-width: 200px;" class="card-title d-inline-block text-truncate"><?php echo $cat->nama_course ?></span><br>
                        <small class="lead" style="font-size: 14px;"><?php echo $cat->nama ?></small>
                        <div class="container-fluid p-0">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star-half text-warning"></i>&nbsp;&nbsp;
                            <label>4.5</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <small class="badge badge-success">40%</small>
                                <small class=""><del>Rp. 1.250.999</del></small>
                            </div>
                            <div class="col-md-6 text-right">
                                <small class="font-weight-bold">Rp. 599.000</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>