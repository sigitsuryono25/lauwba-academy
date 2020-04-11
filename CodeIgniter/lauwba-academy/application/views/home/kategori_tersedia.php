<div class="py-5 bg-white">
    <div class="container">
        <h4 class="mb-2">Kategori Yang Tersedia</h4>
        <div class="row">
            <?php foreach ($category as $key => $cat) { ?>
                <div class="col-md-3 mt-3 col-sm-12" onclick="return window.location.assign('<?php echo site_url('courses/' . $cat->nama_seo) ?>')" style="cursor: pointer">
                    <div class="card">
                        <div class="card-body shadow rounded ">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <i class="fa fa-3x <?php echo $cat->icon_on_academy ?> text-<?php echo $cat->bagde_class ?>"></i>
                                </div>
                                <div class="col-md-9 text-center">
                                    <p class="mt-2"><?php echo $cat->nama_kategori ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>