<div class="container mt-n5">
    <div class="card">
        <div class="card-header">Create New Course</div>
        <div class="card-body">
            <div class="container">
                <form class="add-course-form">
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" class="form-control" name="course-name" required/>
                    </div>
                    <div class="form-group">
                        <label>Course Cover</label>
                        <input type="file" class="form-control-file" name="course-cover" accept=".jpg,.png" />
                        <div class="text-center">
                            <label>Preview goes here</label>
                            <img class="rounded mx-auto d-block" alt="200x200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1713efae743%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1713efae743%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2273.6328125%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" 
                                 data-holder-rendered="true" style="width: 200px; height: 200px;">
                        </div>
                    </div> 
                    <div class="form-group pt-3">
                        <label>Course Description</label>
                        <textarea class="summernote form-control shadow-none" name="course-descriptions" style="border: 0px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trainer Name</label>
                        <div class="text-right">
                            <span class="text-success" id="selected-id"></span>
                        </div>
                        <div style="overflow-y: auto; height: 250px" class="p-3">
                            <ul class="nav nav-pills mb-3 mx-auto justify-content-center" id="pills-tab" role="tablist">
                                <?php foreach ($tutor as $t) { ?>
                                    <li class="nav-item">
                                        <a onclick='return setTrainerId("<?php echo $t->id_tutor ?>", "<?php echo $t->nama ?>")' class="nav-link card shadow-none m-3  bg-light" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                            <div class="card-body mx-auto text-center">
                                                <img class="avatar-img img-fluid rounded-circle mb-2" style="height: 100px; width: 100px" src="https://www.lauwba.com/foto_banner/<?php echo $t->gambar ?>" />
                                                <h5><?php echo $t->nama ?></h5>
                                            </div>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <input type="text" readonly class="d-none d-md-none" name="trainer-id" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Training Class</label>
                        <div class="text-right">
                            <span class="text-success" id="selected-id-training"></span>
                        </div>
                        <div style="overflow-y: auto; height: 250px">
                            <div class="list-group " id="list-tab" role="tablist">
                                <?php foreach ($training as $tng) { ?>
                                    <a onclick="return setTrainingId('<?php echo $tng->id_jenis ?>', '<?php echo $tng->judul ?>')" 
                                       class="bg-light text-dark list-group-item list-group-item-action" data-toggle="list" role="tab">
                                           <?php echo $tng->judul ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <input type="text" class="d-none d-md-none" name="training-id" required/>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" class="shadow-none btn btn-primary" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setTrainerId(id, trainerName) {
        $('[name="trainer-id"]').val(id);
        $("#selected-id").html(trainerName + " terpilih");
    }

    function setTrainingId(id, trainingName) {
        $('[name="training-id"]').val(id);
        $('#selected-id-training').html(trainingName);
    }

    $(".add-course-form").submit(function (e) {
        e.preventDefault();

        //prepare data
        var conf = confirm("Apakah data yang dimasukan sudah benar?");
        if (conf) {
            showPopup()
            var dataSending = new FormData($(this)[0]);
            var url = "<?php echo site_url('course/course_add_proc') ?>";
            var redirectTo = "<?php echo site_url('course/course_summary') ?>";
            $.ajax({
                url: url,
                data: dataSending,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data, textStatus, jqXHR) {
                    alert(textStatus);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                }, 
                complete: function(jqXHR, status){
                    hidePopup();
                    location.assign(redirectTo);
                }
               
            });
        }
    });
</script>