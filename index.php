<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MERCY-KOMBA | Vehicle Management System</title>
    <!-- Favicon -->
    <link rel="icon" href="icon.png" type="image/png">
    
    
    <link href="assets/template/vendors/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link href="assets/template/css/argon.css?v=1.0.1" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/kvm.css">
    <style type="text/css">    
        * {
            color: #202124;
            font-family: roboto,'Noto Sans Myanmar UI',arial,sans-serif;
        }
        .preloader {
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           z-index: 9999;
           background-image: url('assets/img/spinner.gif');
           background-repeat: no-repeat; 
           background-color: #FFF;
           background-position: center;
        }
          .vms-btn {
            background-color: #024e5a;
            color: whitesmoke;
            transition: ease-in 0.4s all;
        }
        .vms-btn:hover {
            background-color: #024e5a;
            color: whitesmoke;
        }

        .vms-btn:focus {
            background-color: #024e5a;
            color: whitesmoke;
        }

        .btn-success {
            background-color: #024e5a;
        }
        .vms-text {
            color: #024e5a;
        }
    </style>
<body>
<div class="preloader"></div>
<div>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-5 col-xs-12 wow fadeIn login-form-mobile">
                <div class="card-heade bg-white pb-1">
                    <center><img src="icon.png" alt="" srcset="" class="kvm-logo"></center>
                    <h3 class="text-center vms-text">Signin to KVMS</h3>
                </div>
                <div class="kvm-car card">
                    <div class="card-bod px-lg-3 px-sm-3 py-lg-5 mt-3">
                        <form  name="signin" action="includes/auth.php" method="POST" autocomplete="off" role="form">
                            <?php include_once('includes/messages.php') ?>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Username" type="text" name="username" required>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" name="signin" class="btn btn-block vms-btn my-4">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer fixed-bottom bg-light p-lg-2 pt-3">
        <div class="container">
            <div class="row align-items-center justify-content-md-between pb-0 ">
                <div class="col-md-12 col-xs-12 my_footer">
                    <div class="copyright text-center">
                        &copy; <?php echo date ('Y'); ?>
                        <a href="http://www.kvms.co.tz/" target="_blank" class="vms-text" >Komba Vehicle Management System</a>.
                    </div>
                </div>

            </div>
        </div>
    </footer>
</div>

<script src="assets/js/jquery3-6.js"></script>
<script type="text/javascript">
    $(window).on('load', function () {
       $('.preloader').fadeOut('slow');
    });
</script>
<script src="assets/js/kvm.js"></script>
</body>

</html>