/*
 * Dashboard Function start here 
 */
function shownDetailCourse(idCourse) {
    var url = "course/detail_course/" + idCourse;
//        $.get(url, null, function (data) {
    $(".response-detail").load(url);
//        });
    $("#detail-course").modal('toggle');
}
$('.summernote').summernote({
    tabsize: 2,
    height: 250
});
function showPopup() {
    // $("#popupimage").modal('show');
    $('#progressModal').modal({
        backdrop: 'static'
    });
}
function hidePopup() {
    // $("#popupimage").modal('show');
    $('#progressModal').modal('hide');
}
/*
 * Dashboard Function End here 
 */

/*
 * add new course start here 
 */
function setTrainerId(id, trainerName) {
    $('[name="trainer-id"]').val(id);
    $("#selected-id").html(trainerName + " terpilih");
}

function setTrainingId(id, trainingName) {
    $('[name="training-id"]').val(id);
    $('.selected-training-container').removeClass('d-none d-md-none');
    $('#selected-id-training').html(trainingName);
}
var _URL = window.URL || window.webkitURL;
$("#file").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
//                alert(this.width + " " + this.height);
            if (this.width !== 300 || this.height !== 300) {
                $(".message-cover").addClass('alert').addClass('alert-danger').removeClass('alert-success').html("Invalid Size. Your image have a size " + this.width + "x" + this.height);
                $("#preview-imag").prop('src', "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1713efae743%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1713efae743%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2273.6328125%22%20y%3D%22104.5%22%3E300x300%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E");
                $(".btn-submit").prop('disabled', 'disabled');
            } else {
                $(".message-cover").addClass('alert').addClass('alert-success').removeClass('alert-danger').html("Valid size for cover image");
                $("#preview-imag").prop('src', _URL.createObjectURL(file));
                $(".btn-submit").prop('disabled', false);
            }
        };
        img.onerror = function () {
            alert("not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);
    }

});
/*
 * add new course end here 
 */

/*
 * Add Materi Function start here 
 */
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
function showFormInputExist(idMateri, namamateri) {
    $('[name="id-materi"]').val(idMateri);
    $('[name="nama-materi"]').val(namamateri);
    $(".myFormExist").removeClass("d-none d-md-none");
}
function getMateriByCourse() {
    var idCourse = $("#selected-id-course").html();
    $(".list-materi").html("");
    if (idCourse !== "") {
        var url = "materi/getmateribycourse/" + idCourse;
        $.get(url, null, function (res, textStatus, jqXHR) {
            var data = res.data;
            for (var i = 0; i < data.length; i++) {
                var innerData = '<a style="cursor: pointer" onclick="return showFormInputExist(`' + data[i].id_materi + '`, `' + data[i].nama_materi + '`)" class="bg-light text-dark list-group-item list-group-item-action"' +
                        +' data-toggle="list" role="tab" data-materi="'
                        + data[i].id_materi + '">'
                        + data[i].nama_materi + '</a>';
                $(".list-materi").append(innerData);
            }
        }, 'json');
    }
}
$("#videomaterials").dropzone({
    url: "materi/new_add_material_proc",
    autoProcessQueue: false,
//        parallelUploads: 100,
    maxFilesize: 2048,
    timeout: 3600000,
//        uploadMultiple: true,
    acceptedFiles: ".mp4",
    init: function () {
        var dz = this;
        $(".myForm").submit(function (e) {
            e.preventDefault();
            e.stopPropagation();
            dz.processQueue();
        });

        this.on("sending", function (data, xhr, formdata) {
            showPopup();
            formdata.append('nama-materi', $('[name="nama-materi"]').val());
            formdata.append('deskripsi-materi', $('[name="deskripsi-materi"]').val());
            formdata.append('id-course', $('[name="id-course"]').val());
            formdata.append('judul-video', $('[name="judul-video"]').val());
            formdata.append('mode', 'add');
        });

        this.on('success', function (file, responseText) {
            hidePopup();
            alert(responseText);
            location.assign("materials-summary");
        });
    }
});
$("#videofromexist").dropzone({
    url: "materi/new_add_material_proc",
    autoProcessQueue: false,
//    parallelUploads: 100,
    maxFilesize: 2048,
    timeout: 3600000,
//    uploadMultiple: true,
    acceptedFiles: ".mp4",
    init: function () {
        var dz = this;
        $(".myFormExist").submit(function (e) {
            e.preventDefault();
            e.stopPropagation();
            dz.processQueue();
        });

        this.on("sending", function (data, xhr, formdata) {
            formdata.append('nama-materi', $('[name="nama-materi"]').val());
            formdata.append('id-materi', $('[name="id-materi"]').val());
            formdata.append('deskripsi-materi', $('[name="deskripsi-materi"]').val());
            formdata.append('id-course', $('[name="id-course"]').val());
            formdata.append('judul-video', $('[name="judul-video"]').val());
            formdata.append('mode', 'edit');
        });

        this.on('success', function (file, responseText) {
            alert(responseText);
            location.assign("materials-summary");
        });
    }
});
$(".dz-button").html("Jatuhkan File anda kesini untuk upload atau klik disini");
/*
 * Add Materi Function End here 
 */


/*
 * Summary materi Function start here 
 */
function getVideoList(idMateri) {
    $(".list-video").html(null);
    $(".loader-gif").removeClass('d-none d-md-none');
    var url = "materi/get_video_list/" + idMateri;
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
                $(".list-video").append(innerData);
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
    var url = "materi/get_materi_list/" + idCourse;
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
        var url = "materi/delete_materi/" + idMateri;
        $.get(url, null, function (data) {
            console.log(data);
        });
        $(".materi-list-group").html(null);
        $(".list-video").html(null);
        getMateriList(idCourse);
    }
}

/*
 * Summary materi Function End here 
 */