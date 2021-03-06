<nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
    <a class="navbar-brand d-none d-sm-block" href="<?php echo site_url() ?>">Lauwba Academy</a><button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
    <form class="form-inline mr-auto d-none d-lg-block"><input class="form-control form-control-solid mr-sm-2" type="search" placeholder="Search" aria-label="Search" /></form>
    <ul class="navbar-nav align-items-center ml-auto">
        <li class="nav-item dropdown no-caret mr-3 dropdown-user">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-fluid" src="<?php echo!empty($this->session->userdata('foto')) ? $this->session->userdata('foto') : "https://source.unsplash.com/QAB-WJcbgJk/60x60" ?>"/></a>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="<?php echo!empty($this->session->userdata('foto')) ? $this->session->userdata('foto') : "https://source.unsplash.com/QAB-WJcbgJk/60x60" ?>" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name"><?php echo $this->session->userdata('nama') ?></div>
                        <div class="dropdown-user-details-email"><?php echo $this->session->userdata('username') ?></div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('logout') ?>">
                    <div class="dropdown-item-icon">
                        <i data-feather="log-out"></i>
                    </div>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?php echo site_url('main') ?>">
                        <div class="nav-link-icon">
                            <i data-feather="home"></i>
                        </div>
                        Beranda
                    </a>
                    <div class="sidenav-menu-heading">Course</div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon">
                            <i data-feather="book" class="lead"></i>
                        </div>
                        Kursus Anda
                        <div class="sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                            <a class="nav-link" href="<?php echo site_url('course-summary') ?>">
                                Ringkasan Kursus
                            </a>
                            <a class="nav-link" href="<?php echo site_url('add-new-course') ?>">
                                Tambah Kursus Baru
                            </a>
                            <a class="nav-link" href="<?php echo site_url('materials-summary') ?>">
                                Ringkasan Materi
                            </a>
                            <a class="nav-link" href="<?php echo site_url('add-new-material') ?>">
                                Tambah Materi Baru
                            </a>

                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon">
                            <i data-feather="message-circle"></i>
                        </div>
                        Komentar
                    </a>
                </div>
            </div>
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title"><?php echo $this->session->userdata('nama') ?></div>
                </div>
            </div>
        </nav>
    </div>
