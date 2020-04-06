<div class="container-fluid mt-n5">
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
                        <?php foreach ($materi->result() as $mat) { ?>
                            <a style="cursor: pointer" onclick="return getVideoList('<?php echo $mat->id_materi ?>')"
                               class="bg-light text-dark list-group-item list-group-item-action" data-toggle="list" role="tab">
                                   <?php echo $mat->nama_materi ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" style="height: 300px; overflow-y: auto">
                    <div class="list-group " id="list-tab" role="tablist">
                        <h4>Material List</h4>
                        <?php foreach ($materi->result() as $mat) { ?>
                            <a style="cursor: pointer" onclick="return getVideoList('<?php echo $mat->id_materi ?>')"
                               class="bg-light text-dark list-group-item list-group-item-action" data-toggle="list" role="tab">
                                   <?php echo $mat->nama_materi ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12" style="height: 300px; overflow-y: auto">
                    <h4>Video Available</h4>
                    <div class="list-group list-video" id="list-tab" role="tablist">
                        <img src="<?php echo base_url('assets/img/loader.gif') ?>" class="w-50 align-self-center loader-gif d-md-none d-none"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getVideoList(idMateri) {
        $(".loader-gif").removeClass('d-none d-md-none');
        var url = "<?php echo site_url('materi/get_video_list/') ?>" + idMateri;
        console.log(url);
        $.get(url, null, function (data) {
            var res = data.data;
            for (var i = 0; i < res.length; i++) {
                var idVideo = res[i].id_video;
                var videoLocation = res[i].file_name;
                var friendlyName = res[i].friendly_name;
                var innerData = '<a style="cursor: pointer" href="' + videoLocation + '" class="bg-light text-dark list-group-item list-group-item-action"'+
                        + ' data-toggle="list" role="tab" data-video="'
                        + idVideo + '">'
                        + friendlyName + '</a>';
                $(".list-video").html(innerData);
//
            }
//
            $(".loader-gif").addClass('d-none d-md-none');
        }, 'json');
    }
</script>