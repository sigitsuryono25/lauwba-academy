<div class="container mt-n5">
    <div class="card">
        <div class="card-header">Add New Materials</div>
        <div class="card-body">
            <div class="container">
                <div class="alert alert-primary" role="alert">
                    You have <?php echo $materi->num_rows() ?> Material(s)
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4"> 
                        <div class="card">
                            <div class="card-header">Course You Made</div>
                            <div class="card-body">
                                <div class="list-group " id="list-tab" role="tablist">
                                    <?php foreach ($course->result() as $co) { ?>
                                        <a href="#section-input" onclick="showForm('<?php echo $co->id_course ?>', '<?php echo $co->nama_course ?>')" style="cursor: pointer"
                                           class="bg-light text-dark list-group-item list-group-item-action" data-toggle="list" role="tab">
                                               <?php echo $co->nama_course ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-input-materi d-none d-md-none" id="section-input">
                    <h4 class="selected-course text-success text-right"></h4>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-new-material" role="tab" aria-controls="pills-home" aria-selected="true">New</a>
                        </li>
                        <li class="nav-item">
                            <span id="selected-id-course" class="d-none d-md-none"></span>
                            <a class="nav-link" onclick="return getMateriByCourse()" id="pills-profile-tab" data-toggle="pill" href="#pills-exist-material" role="tab" aria-controls="pills-profile" aria-selected="false">From Exist Material List</a>
                        </li>
                    </ul>
                    <div class="container">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-new-material" role="tabpanel" aria-labelledby="pills-home-tab">

                                <form method="post" enctype="multipart/form-data" class="myForm">
                                    <input type="hidden" name="id-course"/>
                                    <div class="form-group">
                                        <label for="materialname">Material Name</label>
                                        <input type="text" name="nama-materi" id="materialname" class="form-control" required>
                                    </div>
                                    <div class="form-group pt-3 table-responsive">
                                        <label>Material Description</label>
                                        <textarea class="summernote form-control shadow-none" name="deskripsi-materi" style="border: 0px;" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="videomaterials">Video Files</label>
                                        <div class="dropzone border-0 bg-light" id="videomaterials"> 
                                            <div class="fallback">    
                                                <input type="file" name="file[]" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Simpan" class="btn btn-primary" id="submitb" />
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-exist-material" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <ul class="list-group list-materi" role="tablist">
                                </ul>

                                <form method="post" enctype="multipart/form-data" class="myFormExist d-none d-md-none mt-3">
                                    <h4>Form Input</h4>
                                    <input type="hidden" name="id-course"/>
                                    <input type="hidden" name="id-materi"/>
                                    <div class="form-group">
                                        <label for="materialname">Material Name</label>
                                        <input type="text" readonly name="nama-materi" id="materialname" class="form-control-plaintext" required>
                                    </div>
                                    <div class="form-group pt-3 table-responsive">
                                        <label>Material Description</label>
                                        <textarea class="summernote form-control shadow-none" name="deskripsi-materi" style="border: 0px;" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="videofromexist">Video Files</label>
                                        <div class="dropzone border-0 bg-light" id="videofromexist"> 
                                            <div class="fallback">    
                                                <input type="file" name="file[]" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Simpan" class="btn btn-primary" id="submitb" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showForm(idCourse, namaCourse) {
        $('[name="id-course"]').val(idCourse);
        $("#selected-id-course").html(idCourse);
        $(".selected-course").html(namaCourse + " terpilih");
        $(".form-input-materi").addClass("d-block d-md-block").removeClass("d-none d-md-none");
        $('html, body').animate({
            scrollTop: $("#section-input").offset().top
        }, 800, function () {

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = "#section-input";
        });
    }
    $("#videomaterials").dropzone({
        url: "<?php echo site_url('materi/new_add_material_proc') ?>",
        autoProcessQueue: false,
//        parallelUploads: 100,
        maxFilesize: 2048,
        timeout: 3600000,
//        uploadMultiple: true,
        acceptedFiles: ".zip",
        init: function () {
            var dz = this;
            $(".myForm").submit(function (e) {
                e.preventDefault();
                e.stopPropagation();
                dz.processQueue();
            });

            this.on("sending", function (data, xhr, formdata) {
                formdata.append('nama-materi', $('[name="nama-materi"]').val());
                formdata.append('deskripsi-materi', $('[name="deskripsi-materi"]').val());
                formdata.append('id-course', $('[name="id-course"]').val());
            });

            this.on('success', function (file, responseText) {
                alert(responseText);
                location.assign("<?php echo site_url('materials-summary')?>")
            });
        }
    });
    $("#videofromexist").dropzone({
        url: "<?php echo site_url('materi/add_material_proc') ?>",
        autoProcessQueue: false,
        parallelUploads: 100,
        maxFilesize: 2048,
        timeout: 3600000,
        uploadMultiple: true,
        acceptedFiles: ".mp4,.mkv",
        init: function () {
            var dz = this;
            $(".myForm").submit(function (e) {
                e.preventDefault();
                e.stopPropagation();
                dz.processQueue();
            });

            this.on("sendingmultiple", function (data, xhr, formdata) {
                formdata.append('nama-materi', $('[name="nama-materi"]').val());
                formdata.append('deskripsi-materi', $('[name="deskripsi-materi"]').val());
                formdata.append('id-course', $('[name="id-course"]').val());
            });

            this.on('success', function (file, responseText) {
                alert(responseText);
                location.assign('<?php echo site_url("materials-summary")?>');
            });
        }
    });
    $(".dz-button").html("Jatuhkan File anda kesini untuk upload atau klik disini");

    function getMateriByCourse() {
        var idCourse = $("#selected-id-course").html();
        if (idCourse !== "") {
            var url = "<?php echo site_url('materi/getmateribycourse/') ?>" + idCourse;
            $.get(url, null, function (res, textStatus, jqXHR) {
                var data = res.data;
                for (var i = 0; i < data.length; i++) {
//                    console.log(data[i].nama_materi);
                    var innerData = '<a style="cursor: pointer" onclick="return showFormInputExist(`' + data[i].id_materi + '`, `' + data[i].nama_materi + '`)" class="bg-light text-dark list-group-item list-group-item-action"'+
                            +' data-toggle="list" role="tab" data-materi="'
                            + data[i].id_materi + '">'
                            + data[i].nama_materi + '</a>';
                    console.log(innerData);
                    $(".list-materi").html(innerData);
                }
            }, 'json');
        }
    }

    function showFormInputExist(idMateri, namamateri) {
        $('[name="id-materi"]').val(idMateri);
        $('[name="nama-materi"]').val(namamateri);
        $(".myFormExist").removeClass("d-none d-md-none");
    }
</script>