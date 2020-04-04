<div class="container-fluid mt-n5">
    <div class="row mb-4">
        <div class="col-md-6 mb-3" title="<?php echo site_url('add-new-course')?>" onclick='return location.replace("<?php echo site_url('add-new-course')?>")' style="cursor: pointer">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <i class="fa fa-2x fa-plus-circle text-secondary"></i>
                        </div>
                        <div class="col-md-9 mt-2 text-center ">
                            <h4>Add Course</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3"  style="cursor: pointer">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <i class="fa fa-2x fa-comment text-danger"></i>
                        </div>
                        <div class="col-md-9 mt-2 text-center ">
                            <h4>See Comments</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4>See Your Timelines</h4>
    <div class="row">
        <div class="col-md-12 mb-4"> 
            <div class="card">
                <div class="card-header">Top Six Latest Course you made </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($course->result() as $co) { ?>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img class="card-img-top" style="width: 100%; height: 250px;" src="<?php echo base_url('assets/course/' . $co->course_cover) ?>" alt="<?php echo $co->nama_course ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $co->nama_course?></h5>
                                        <small><?php echo $co->judul?></small>
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
                <div class="card-header">Your Latest Material </div>
                <div class="card-body">This is a blank page. You can use this page as a boilerplate for creating new pages!</div>
            </div>
        </div>
        <div class="col-md-6 mb-4 col-sm-12">
            <div class="card">
                <div class="card-header">Latest Comment On Your Materials </div>
                <div class="card-body">This is a blank page. You can use this page as a boilerplate for creating new pages!</div>
            </div>
        </div>
    </div>
</div>