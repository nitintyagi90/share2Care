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

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page m-t-140">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="#" class="text-success">
                                            <span><img src="<?php echo base_url();?>admin/assets/images/share-pro.png" alt="" height="106"></span>
                                        </a>
                                    </h2>
                                   <!--  <a href="index.html" class="logo"><span>Share2<span>Care</span></span><i class="mdi mdi-layers"></i></a> -->
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                 <div class="account-content" style="padding-bottom: 18%;">
                                    <div class="text-center m-b-20">
                                        <p class="text-muted m-b-0 font-13">Enter your email address and we'll send you an email with instructions to reset your password.  </p>
                                    </div>
                                    <form class="form-horizontal" id="loginform">

      <div class="login success" style="display: none;"  >Thanks For Contacting us Team Will Contact us Shortly. </div>
                 <div class="login_result1 error1" style="display: none;"  >Password Not Matched</div>

                            <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
                             <input type="hidden" id="urls" value="<?php echo base_url(); ?>">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="password" type="password" required=""
                                                       placeholder="Enter password">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="password" type="password" required=""
                                                       placeholder="Enter confirm password">
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-color waves-effect waves-light"
                                                        type="submit">Update Password
                                                </button>
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
    <input type="hidden" id="urls" value="<?php echo base_url(); ?>">
</html>

<script type="text/javascript">
    $(document).on('submit', '#loginform',function(e){
    e.preventDefault();

    var formData = new FormData($(this)[0]);
    var urls=$('#urls').val();
    $.ajax({
      url: urls+'Vendor/update_password',
      type: 'POST',
      data:formData,
      contentType: false,
      processData: false,
      success: function(data) {

         window.location =urls+'Vendor/';
        
        }
    });
});

</script>