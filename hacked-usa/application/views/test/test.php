<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Title</title>
        <style>
            .content {
                position: relative;
                width: 50%;
            }

            .image {
                opacity: 1;
                display: block;
                width: 100%;
                height: auto;
                transition: .5s ease;
                backface-visibility: hidden;
            }

            .middle {
                transition: .5s ease;
                opacity: 0.5;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center;
            }
            .content:hover .middle{
                opacity: 1;
                cursor: pointer;
            }

            .container .image {
                opacity: 0.3;
            }

            .container .middle {
                opacity: 1;
            }

            .text {
                background-color: #4CAF50;
                color: blue;
                font-size: 16px;
                padding: 16px 32px;
            }
        </style>
    </head>
    <body onload="return snap()">
        <?php // for ($i = 0; $i < 3; $i++) { ?>
        <video controls >
            <source src="http://localhost/LauwbaAcademy/hacked-usa/assets/course/android-tourism-apps/introduction/introduction.mp4" type="video/mp4">
        </video>
        <img class="w-50 img-data" />
        <?php // } ?>

        <div class="row">
            <div class="col-md-3">
                <div class="content">
                    <canvas class="image w-100" ></canvas>  
                    <div class="middle">
                        <img src="<?php echo base_url('assets/img/') ?>play-100.png" class="w-50" />
                    </div> 
                </div>
            </div>
        </div>
        <button id="snap">Take screenshot</button>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script>
        var canvas = document.querySelector('canvas');
        var context = canvas.getContext('2d');
        var w, h, ratio;
        var video = document.querySelector('video');
        $(document).ready(function () {

//            var canvas = document.querySelector('canvas');
//            var context = canvas.getContext('2d');
////            $('video source').each(function (i) {
//            var video = document.querySelector('video');
//            video.currentTime = 10;
//            video.addEventListener('loadedmetadata', function () {
////                w = video.videoWidth - 100;
////                console.log(w);
////                h = parseInt(w / ratio, 10);
////                console.log(h);
//
//                canvas.width = 200;
//                canvas.height = 200;
//            }, false);
            // Get handles on the video and canvas elements
            // var canvas = document.querySelector('canvas');

            // Get a handle on the 2d context of the canvas element
            // Define some vars required later
            var w, h, ratio;

            video.currentTime = 5;

            // Add a listener to wait for the 'loadedmetadata' state so the video's dimensions can be read
            video.addEventListener('loadedmetadata', function () {
                // Calculate the ratio of the video's width to height
                // ratio = video.videoWidth / video.videoHeight;
                // Define the required width as 100 pixels smaller than the actual video's width
                // w = video.videoWidth - 100;
                // // Calculate the height based on the video's width and the ratio
                // h = parseInt(w / ratio, 10);
                // // Set the canvas width and height to the values just calculated
                // canvas.width = w;
                // canvas.height = h;
                w = canvas.offsetWidth;
                h = canvas.offsetHeight;
            }, false);

        });
        function snap() {
            // Define the size of the rectangle that will be filled (basically the entire element)
            context.fillRect(0, 0, w, h);
            // Grab the image from the video
            context.drawImage(video, 0, 0, w, h);
            var canvas = document.querySelector('canvas');
            $(".img-data").prop('src', canvas.toDataURL());
        }
        </script>
    </body>
</html>