<div class="container mt-n5">
    <div class="card">
        <div class="card-header">Tambah Meteri Baru</div>
        <div class="card-body">
            <div class="container">
                <div class="alert alert-primary" role="alert">
                    Anda Memiliki <?php echo $materi->num_rows() ?> Materi
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4"> 
                        <div class="card">
                            <div class="card-header">Kursus yang telah anda buat</div>
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
                                        <label for="materialname">Nama Materi</label>
                                        <input type="text" name="nama-materi" id="materialname" class="form-control" required>
                                    </div>
                                    <div class="form-group pt-3 table-responsive">
                                        <label>Deskripsi Materi</label>
                                        <textarea class="summernote form-control shadow-none" name="deskripsi-materi" style="border: 0px;" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="materialname">Judul Video</label>
                                        <input type="text" name="judul-video" id="materialname" class="form-control" required>
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
                                        <label for="materialname">Nama Materi</label>
                                        <input type="text" name="nama-materi" id="materialname" class="form-control" required>
                                    </div>
                                    <div class="form-group pt-3 table-responsive">
                                        <label>Deskripsi Materi</label>
                                        <textarea class="summernote form-control shadow-none" name="deskripsi-materi" style="border: 0px;" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="materialname">Judul Video</label>
                                        <input type="text" name="judul-video" id="materialname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="videomaterials">Video Files</label>
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