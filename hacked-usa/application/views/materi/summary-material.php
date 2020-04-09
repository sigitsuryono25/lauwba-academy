<div class="container-fluid mt-n5" >
    <div class="card card-header-actions">
        <div class="card-header">
            Your Material Summary
            <div class="dropdown no-caret">
                <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-primary"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo site_url('add-new-course') ?>">Add Course</a>
                    <a class="dropdown-item" href="<?php echo site_url('add-new-material') ?>">Add Materials</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12" style="height: 300px; overflow-y: auto">
                    <div class="list-group " id="list-tab" role="tablist">
                        <h4>Course List</h4>
                        <?php foreach ($course->result() as $co) { ?>
                            <li style="cursor: pointer" onclick="return getMateriList('<?php echo $co->id_course ?>')"
                                class="bg-light text-dark list-group-item" data-toggle="list" role="tab">
                                    <?php echo $co->nama_course ?>
                            </li>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" style="height: 300px; overflow-y: auto">
                    <h4>Material List</h4>
                    <div class="list-group materi-list-group" id="list-tab" role="tablist">
                        <img src="<?php echo base_url('assets/img/loader.gif') ?>" class="w-50 align-self-center loader-gif d-md-none d-none"/>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12" style="height: 300px; overflow-y: auto">
                    <h4>Video Available</h4>
                    <div class="list-group list-video" id="list-tab" role="tablist" oncontextmenu="return false;">
                        <img src="<?php echo base_url('assets/img/loader.gif') ?>" class="w-50 align-self-center loader-gif d-md-none d-none"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   

</script>