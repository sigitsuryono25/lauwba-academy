<!-- header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary ">
        <h1>
            <a class="navbar-brand text-white" href="<?php echo site_url() ?>">
                Lauwba <small class="small">Academy</small>
            </a>
        </h1>
        <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown mr-lg-3 mt-lg-0 mt-3 align-content-center">
                    <a class="nav-link dropdown-toggle text-center" href="#" id="kategori-dropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="kategori-dropdown">
                        <?php foreach ($category as $key => $cat) { ?>
                            <a class="dropdown-item " href="<?php echo site_url('courses/' . $cat->nama_seo) ?>"> 
                                <i class="fa <?php echo $cat->icon_on_academy ?> text-<?php echo $cat->bagde_class ?>"></i>
                                &nbsp;&nbsp;<?php echo $cat->nama_kategori ?>
                            </a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-lg-auto text-center">
                <li>
                    <button type="button" class="btn w3ls-btn-outline mb-2 mt-2" >
                        login
                    </button>
                </li>
                <li>
                    <button type="button" class="btn  ml-lg-2 w3ls-btn mb-2 mt-2" data-toggle="modal" aria-pressed="false"
                            data-target="#exampleModal">
                        Daftar
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- //header -->