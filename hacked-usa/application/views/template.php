<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Trainer Portal | Lauwba Academy</title>
        <link href="<?php echo base_url('assets/') ?>css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />        
        <link href="<?php echo base_url('assets/') ?>js/datatables/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dropzone/dropzone.css">
        <script src="<?php echo base_url('assets/js/jquery/') ?>jquery-3.4.1.min.js"></script>
        <script src="<?php echo base_url('assets/')?>dropzone/dropzone.js"></script>
        <script data-search-pseudo-elements defer src="<?php echo base_url('assets/js/') ?>font-awesome/5.11.2/js/all.min.js"></script>
        <script src="<?php echo base_url('assets/js/feather-icons/4.24.1/') ?>feather.min.js"></script>
    </head>
    <style>
        .lds-facebook {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-facebook div {
            display: inline-block;
            position: absolute;
            left: 8px;
            width: 16px;
            background: #fff;
            animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
        }
        .lds-facebook div:nth-child(1) {
            left: 8px;
            animation-delay: -0.24s;
        }
        .lds-facebook div:nth-child(2) {
            left: 32px;
            animation-delay: -0.12s;
        }
        .lds-facebook div:nth-child(3) {
            left: 56px;
            animation-delay: 0;
        }
        @keyframes lds-facebook {
            0% {
                top: 8px;
                height: 64px;
            }
            50%, 100% {
                top: 24px;
                height: 32px;
            }
        }

        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float{
        }
    </style>
    <body class="nav-fixed">
        <?php echo $navigation ?>
        <div id="layoutSidenav_content">
            <main>
                <?php echo $top ?>
                <?php echo $main ?>
            </main>
            <footer class="footer mt-auto footer-light">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Lauwba Academy <?php echo date('Y') ?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="modal fade" id="progressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-transparent border-0  ">
                <div class="modal-body align-self-center">
                    <div class="lds-facebook"><div></div><div></div><div></div></div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/bootstrap/') ?>bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/scripts.js"></script>
    <!--<script src="<?php echo base_url('assets/') ?>js/sb-customizer.js"></script>-->
    <script src="<?php echo base_url('assets/') ?>js/datatables/1.10.20/js/jquery.dataTables.min.js" ></script>
    <script src="<?php echo base_url('assets/') ?>js/datatables/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
    <script>
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
    </script>
</body>

<!-- Mirrored from themes.startbootstrap.com/sb-admin-pro/blank.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 03 Apr 2020 02:22:15 GMT -->
</html>
