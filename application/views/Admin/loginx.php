<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>admin/assets/images/favicon.png">
        <!-- App title -->
        <title>Share2Care</title>

        <!-- App css -->
        <link href="<?php echo base_url();?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>admin/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>admin/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>admin/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>admin/assets/css/responsive.css" rel="stylesheet" type="text/css" />

       
        <script src="<?php echo base_url();?>admin/assets/js/modernizr.min.js"></script>
<style type="text/css">
    .padd-login{
            border: 2px solid #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 3px 5px 22px -5px #888888;
    }
</style>
    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page m-t-140">

                            <div class="m-t-40 account-pages padd-login">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="#" class="text-success">
                                            <span><img src="http://share2care.co/new/bootstrap/images/logo-new.png" alt="" height="80"></span>
                                        </a>
                                    </h2>
                                     <h4 class="text-uppercase font-bold m-b-0">Admin Login</h4>
                                    <br>
                                    <p>Enter your account details for administrator access.</p>
                                   <!--  <a href="index.html" class="logo"><span>Share2<span>Care</span></span><i class="mdi mdi-layers"></i></a> -->
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content" style="padding-bottom: 18%;">
                                    <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/Admin/admin_login'); ?>">

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" name="name" required="" placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="pass" type="password" required="" placeholder="Password">
                                            </div>
                                        </div>

                                       <!--  <div class="form-group ">
                                            <div class="col-xs-12">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox-signup" type="checkbox" checked>
                                                    <label for="checkbox-signup">
                                                        Remember me
                                                    </label>
                                                </div>

                                            </div>
                                        </div> -->

                                        <div class="form-group text-center m-t-30">
                                            <div class="col-sm-12">
                                                <a href="<?php echo base_url('index.php/Admin/Forgot'); ?>" class="frgt"><i class="fa fa-lock m-r-5"></i> Forgot password?</a>
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                  
                                                <input type="submit" class="btn btn-color " value="Login">
                                                 <br><br>

                                                <a href="http://share2care.co">Exit to Website</a>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                           <!--  <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                                </div>
                            </div> -->

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url();?>admin/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>admin/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>admin/assets/js/detect.js"></script>
        <script src="<?php echo base_url();?>admin/assets/js/fastclick.js"></script>
        <script src="<?php echo base_url();?>admin/assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url();?>admin/assets/js/waves.js"></script>
        <script src="<?php echo base_url();?>admin/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>admin/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url();?>admin/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>admin/assets/js/jquery.app.js"></script>

    </body>
</html>