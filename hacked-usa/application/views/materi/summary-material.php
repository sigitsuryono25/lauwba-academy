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
    function getVideoList(idMateri) {
        $(".loader-gif").removeClass('d-none d-md-none');
        var url = "<?php echo site_url('materi/get_video_list/') ?>" + idMateri;
        console.log(url);
        $.get(url, null, function (data) {
            if (data.code !== 404) {
                var res = data.data;
                for (var i = 0; i < res.length; i++) {
                    var idVideo = res[i].id_video;
                    var videoLocation = res[i].file_name;
                    var friendlyName = res[i].friendly_name;
                    var innerData = '<a oncontextmenu="return false;" target="_blank" style="cursor: pointer" href="' + videoLocation + '" class="bg-light text-dark list-group-item list-group-item-action"' +
                            +' data-toggle="list" role="tab" data-video="'
                            + idVideo + '">'
                            + friendlyName + '</a>';
                    $(".list-video").html(innerData);
                }
            } else {
                $(".list-video").html(data.message);
            }
        }, 'json');
        $(".loader-gif").addClass('d-none d-md-none');
    }
    function getMateriList(idCourse) {
        $(".loader-gif").removeClass('d-none d-md-none');
        var appenData = '<div class="dropdown no-caret">' +
                '<span class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                ' <i class="fa fa-ellipsis-v text-primary"></i>' +
                ' </span>' +
                '<div class="dropdown-menu dropdown-menu-right animated--fade-in-up" aria-labelledby="dropdownMenuButton">' +
                '    <a class="dropdown-item" href="">Edit Materi</a>' +
                '     <a class="dropdown-item" href="">Delete Materi</a>' +
                ' </div>' +
                '</div>';
        var url = "<?php echo site_url('materi/get_materi_list/') ?>" + idCourse;
        console.log(url);
        $.get(url, null, function (data) {
            $(".materi-list-group").html(null);
            if (data.code !== 404) {
                var res = data.data;
                for (var x = 0; x < res.length; x++) {
                    var idMateri = res[x].id_materi;
                    console.log(idMateri);
                    var namaMateri = res[x].nama_materi;
                    var descMateri = res[x].deskripsi_materi;
                    var innerData = '<li class="bg-light text-dark list-group-item d-flex justify-content-between align-items-center materi-item" data-toggle="list" role="tab">'
                            + '<span style="cursor: pointer"  onclick="return getVideoList(`' + idMateri + '`)">'
                            + namaMateri +
                            '</span><div>' +
                            '    <a href=""><i class="fa fa-edit text-warning"></i></a>' +
                            '    <a onclick="return deleteMateri(`' + idMateri + '`, `' + idCourse + '`)"><i class="fa fa-trash text-danger"></i></a>' +
                            ' </div>' +
                            '</li>';
                    $(".materi-list-group").append(innerData);
                }
            } else {
                $(".materi-list-group").html(data.message);
            }
        }, 'json');
        $(".loader-gif").addClass('d-none d-md-none');
    }

    function deleteMateri(idMateri, idCourse) {
        var con = confirm("Hapus data ini?");
        if (con) {
            var url = "<?php echo site_url('materi/delete_materi/') ?>" + idMateri;
            $.get(url, null, function (data) {
                console.log(data);
            });
            $(".materi-list-group").html(null);
            getMateriList(idCourse);
        }
    }
</script>