<div class="modal fade" id="add-video-preview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Video Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body response-detail">
                <form class="form-add-video">
                    <input type="hidden" name="id-courses" />
                    <div class="form-group">
                        <label>Video Preview Kursus <span class="text-danger">*)</span></label>
                        <input type="file" class="form-control-file" name="course-video-preview" accept=".mp4" required/>
                    </div> 
                    <div class="form-group">
                        <div class="lds-facebook text-primary"><div></div><div></div><div></div></div>
                        <input type="submit" class="btn btn-primary" value="Simpan Video" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(".form-add-video").submit(function (e) {
        e.preventDefault();
        let selectedIdCourse = $('[name="id-courses"]').val();
        var conf = confirm("Apakah data yang dimasukan sudah benar?");
        if (conf) {
            showPopup();
            var dataSending = new FormData($(this)[0]);
            var url = "<?php echo site_url('course/add_video_prev/') ?>" + selectedIdCourse;
            console.log(url);
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
                    console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    console.log(JSON.stringify(jqXHR));
                },
                complete: function (jqXHR, status) {
                    hidePopup();
//                    location.assign(redirectTo);
                }

            });
        }
    });
</script>