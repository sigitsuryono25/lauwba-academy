<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Lauwba Academy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8" />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <link href="<?php echo base_url('assets/') ?>css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="<?php echo base_url('assets/') ?>css/aasana.css" type="text/css" rel="stylesheet" media="all">
        <link href="<?php echo base_url('assets/') ?>css/font-awesome.min.css" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    </head>
    <style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        .dropdown>.dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
            pointer-events: none;
        }
    </style>
    <body>
        <!--NAVIGATION-->
        <?php echo $navigation?>
        <!--BANNER-->
        <?php echo $banner ?>

        <div class="container-fluid p-0 bg-light">
            <!--content start here-->
            <?php echo $content?>
        </div>

        <!-- footer -->
        <div class="footerv4-w3ls" id="footer">
            <div class="footerv4-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 footv4-left">
                            <h3>About Us</h3>
                            <h4 class="text-white">
                                <a class="text-white" href="<?php echo site_url() ?>">Lauwba Academy</a>
                            </h4>
                            <p class="text-white"></p>
                            <div class="footerv4-social">
                                <h3>stay connected</h3>
                                <ul>
                                    <li>
                                        <a href="https://fb.com/LauwbaTechno">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-instagram"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- //footer social -->

                        </div>
                        <div class="col-lg-3 offset-lg-6 col-sm-1 footv4-content mt-sm-0 mt-4">
                            <h3>featured content</h3>
                            <ul class="v4-content">
                                <li>
                                    <a href="<?php echo site_url() ?>">Home</a>
                                </li>
                                <li>
                                    <a href="#about" class="scroll">Kategori</a>
                                </li>
                                <li>
                                    <a href="https://www.lauwba.com/" class="font-weight-bold">Lauwba Techno Indonesia</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /footerv4-top -->
            </div>
        </div>
        <!-- //footer -->
        <div class="cpy-right">
            <p>&copy; <?php echo date('Y') ?> Lauwba Academy Design By LTI Creative Team</p>
        </div>

        <script src="<?php echo base_url('assets/') ?>js/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url('assets/') ?>js/responsiveslides.min.js"></script>
        <script>
            // You can also use"$(window).load(function() {"
            $(function () {
                // Slideshow 4
                $(".slider3").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: false,
                    speed: 500,
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });

            });
        </script>
        <script src="<?php echo base_url('assets/') ?>js/move-top.js"></script>
        <script src="<?php echo base_url('assets/') ?>js/easing.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();

                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 1000);
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $().UItoTop({
                    easingType: 'easeOutQuart'
                });

            });
        </script>
        <script src="<?php echo base_url('assets/') ?>js/SmoothScroll.min.js"></script>
        <script src="<?php echo base_url('assets/') ?>js/counter.js"></script>
        <script src="<?php echo base_url('assets/') ?>js/bootstrap.js"></script>
    </body>

</html>
