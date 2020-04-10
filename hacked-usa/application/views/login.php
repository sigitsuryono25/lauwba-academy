<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from themes.startbootstrap.com/sb-admin-pro/blank.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 03 Apr 2020 02:22:15 GMT -->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Login Trainer | Lauwba Academy</title>
        <link href="<?php echo base_url('assets/') ?>css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />        
        <link href="<?php echo base_url('assets/') ?>js/datatables/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <script src="<?php echo base_url('assets/js/jquery/') ?>jquery-3.4.1.min.js"></script>
        <script data-search-pseudo-elements defer src="<?php echo base_url('assets/js/') ?>font-awesome/5.11.2/js/all.min.js"></script>
        <script src="<?php echo base_url('assets/js/feather-icons/4.24.1/') ?>feather.min.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center">
                                        <h3 class="font-weight-light my-4">Login Trainer</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="login-form">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" name="username" id="inputEmailAddress" type="text" placeholder="Enter username" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" required/>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-center mb-0">
                                                <input type="submit" class="btn btn-primary" value="Login"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="<?php echo base_url('assets/') ?>js/sb-customizer.js"></script>
        <script>
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
        <script>
            $(".login-form").submit(function (e) {
                e.preventDefault();

                var data = $(this).serialize();
                var redirectTo = "<?php echo site_url('main')?>";
                var url = "<?php echo site_url('login/login_proc') ?>";
                $.post(url, data, function (data, textStatus, jqXHR) {
                    alert(textStatus);
                    location.replace(redirectTo);
                });
            });
        </script>
    </body>
</html>
