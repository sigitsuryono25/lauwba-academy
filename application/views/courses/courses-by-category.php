<div class="bg-white pt-4" style="margin-top: 80px">
    <div class="mb-5" style="background: linear-gradient(220deg,#EC5252 -10%,#6E1A52 70%)">
        <div class="container py-3">        
            <h1 class="text-white font-weight-100"><?php echo $courses->row()->nama_kategori ?></h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($courses->result() as $key => $cat) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="content">
                            <div class="image" style="
                                 background: url(<?php echo base_url('hacked-usa/assets/course/' . $cat->location_folder . '/' . $cat->course_cover) ?>);
                                 background-position: center; background-repeat: no-repeat; width: 100%; height: 250px;">
                                &nbsp;
                            </div>
                            <div class="middle">
                                <a href="<?php echo site_url('detail?courses=' . $this->etc->replaceAll("\s+\/&@#$%", $cat->nama_course) . '&hash=' . $cat->id_course) ?>" class="btn btn-primary text-white"><i class="fa fa-eye"></i> Lihat Detail</a>
                            </div>
                        </div>
                        <label class="p-2" style="position: absolute; top: 0; left: 0;">
                            <i class="fa fa-2x <?php echo $cat->icon_on_academy ?> text-<?php echo $cat->bagde_class ?>"></i>    
                            <!--&nbsp;Android-->
                        </label>
                        <div class="card-body">
                            <span style="max-width: 200px;" class="card-title d-inline-block text-truncate"><?php echo $cat->nama_course ?></span><br>
                            <small class="lead" style="font-size: 14px;"><?php echo $cat->nama ?></small>
                        </div>
                        <div class="card-footer">
                            <div class="container text-center">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star-half text-warning"></i>&nbsp;&nbsp;
                                <label>4.5</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <h4 class="mb-2">Kategori Yang Tersedia</h4>
        <div class="row">
            <div class="col-md-3 mt-3 col-sm-12">
                <div class="card">
                    <div class="card-body   shadow rounded ">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <i class="fa fa-3x fa-android text-success"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                <p class="mt-2">Android</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <i class="fa fa-3x fa-globe text-warning"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                <p class="mt-2">Website</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <i class="fa fa-3x fa-laptop text-danger"></i>
                            </div>
                            <div class="col-md-9 text-center text-center">
                                <p class="mt-2">Teknisi Komputer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <i class="fa fa-3x fa-apple text-dark"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                <p class="mt-2">iOS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
<!--                                <img class="img-fluid" src="https://i.udemycdn.com/browse_components/value-props-unit/video_courses.svg">-->
                                <i class="fa fa-3x fa-paypal text-primary"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                <p class="mt-2">Digital Marketing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <i class="fa fa-3x fa-google text-info"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                <p class="mt-2">SEO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-12">
                <h4 class="mb-2">Apa Kata Peserta Kami?</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 p-3">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-4 col-3"> <img class="img-fluid d-block rounded-circle" src="https://static.pingendo.com/img-placeholder-2.svg"> </div>
                            <div class="d-flex  col-md-8 flex-column justify-content-center align-items-start col-9">
                                <p class="mb-0 lead"> <b>J. W. Goethe</b> </p>
                                <p class="mb-0">Co-founder</p>
                            </div>
                        </div>
                        <p class="mt-3 mb-0">I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-3">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-4 col-3"> <img class="img-fluid d-block rounded-circle" src="https://static.pingendo.com/img-placeholder-1.svg"> </div>
                            <div class="d-flex  col-md-8 flex-column justify-content-center align-items-start col-9">
                                <p class="mb-0 lead"> <b>G. W. John</b> </p>
                                <p class="mb-0">CEO &amp; founder</p>
                            </div>
                        </div>
                        <p class="mt-3 mb-0">I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-3">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-4 col-3"> <img class="img-fluid d-block rounded-circle" src="https://static.pingendo.com/img-placeholder-3.svg"> </div>
                            <div class="d-flex  col-md-8 flex-column justify-content-center align-items-start col-9">
                                <p class="mb-0 lead"> <b>J. G. Wolf</b> </p>
                                <p class="mb-0">CFO</p>
                            </div>
                        </div>
                        <p class="mt-3 mb-0">Oh, would I could describe these conceptions, could impress upon paper all that is living so full and warm within me, that it might be the mirror of my soul, as my soul is the mirror of the infinite God!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pb-5 pt-5 text-center" >
    <div class="container">
        <span class="mb-3">Dipercayai Oleh</span><br><br>
        <div class="row text-center">
            <div class="mx-auto col-md-7">
                <div class="row text-muted">
                    <div class="col-md-3 col-4 p-2 mb-2">
                        <img class="img-fluid gray-scale w-50" src="https://pngimage.net/wp-content/uploads/2018/06/logo-untar-png-6.jpg" alt="Pineapple">
                    </div>
                    <div class="col-md-3 col-4 p-2 mb-2 mt-2 align-middle">
                        <img class="img-fluid gray-scale  w-50" src="https://www.akakom.ac.id/themes/akakom/dist/images/logo-footer.png" alt="Pineapple" >

                    </div>
                    <div class="col-md-3 col-4 p-2 mb-2">
                        <img class="img-fluid gray-scale  w-50" src="http://www.ust.ac.id//assets/img/icon.png" alt="Pineapple" >
                    </div>

                    <div class="col-md-3 col-4 p-2 mb-2">
                        <img class="img-fluid gray-scale  w-50" src="https://umsrappang.ac.id/asset/kcfinder/upload/files/LOGO%20FINAL%20UMS%20RAPPANG.png" alt="Pineapple" >

                    </div>
                    <div class="col-4 p-2 mb-2">
                        <img class="img-fluid gray-scale w-75" src="https://i1.wp.com/indoforwarding.com/wp-content/uploads/2019/06/wahana-2.png?resize=768%2C326&ssl=1" alt="Pineapple" >

                    </div>
                    <div class="col-4 p-2 mb-2">
                        <img class="img-fluid gray-scale  w-50" src="http://www.interadigm.com/wp-content/uploads/2016/06/QAFCO-LOGO.jpg" alt="Pineapple" >

                    </div>
                    <div class="col-4 p-2 mb-2">                         
                        <img class="img-fluid gray-scale  w-50" src="https://akupintar.id/documents/20143/0/download+%281%29aafag.png/8135d607-38f3-6c48-931a-c4b1c752e283?version=1.0&t=1519338503514&imageThumbnail=1" alt="Pineapple" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-3 text-center" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 p-4 border-right"> 
                <h4><b>Daftar Sekarang</b></h4><br/>
                <p>Dapatkan akses gratis selamanya untuk semua modul dan video yang telah anda bayarkan</p>
            </div>
            <div class="col-lg-5 col-md-6 p-4"> 
                <h4> <b>Lauwba Academy for Business</b> </h4><br/>
                <p>Daftarkan Instansi/Kelompok Anda untuk mendapatkan Bimbingan Teknis dari tim kami</p>
            </div>
        </div>
    </div>
</div>