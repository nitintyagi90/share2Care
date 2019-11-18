<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/img/fav.png">
<title>Obaazo</title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>vendor/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>vendor/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>vendor/css/colors/blue.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <form class="form-horizontal form-material" method="post" id="loginform" action="<?php echo base_url('Vendor/newvendor') ?>"  enctype="multipart/form-data">
        <a href="javascript:void(0)" class="text-center db"><img src="<?php echo base_url();?>assets/img/logo.png" alt="Home" /><br/></a> 
     
      <div class="login_result error" style="display: none;"  >Your Account is Already Existed </div>

      <div class="login success" style="display: none;"  >Thanks For Contacting us Team Will Contact us Shortly. </div>
                 <div class="login_result1 error1" style="display: none;"  >Password Not Matched</div>

        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" name="username" placeholder="Name" autocomplete="off">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" name="email" placeholder="Email" autocomplete="off">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="password" required="" name="pass" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" required="" name="cpass" placeholder="Confirm Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" name="phone" placeholder="Enter Your Phone no.">
          </div>
        </div>
        <div class="form-group">
        <!--   <div class="col-xs-12">
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <div class="form-control form-control-line" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select Image</span> <span class="fileinput-exists">Change</span>
                                                   </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                            </div></div> -->
                                    <input type="hidden" id="urls" value="<?php echo base_url(); ?>">    
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
            </div>
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
          </div>
        </div>
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Already have an account? <a href="<?php echo base_url('Vendor/index');?>" class="text-primary m-l-5"><b>Sign In</b></a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>vendor/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>vendor/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>vendor/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>vendor/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>vendor/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>vendor/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/register2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jun 2018 11:13:58 GMT -->
</html>
<script type="text/javascript">
    $(document).on('submit', '#loginform',function(e){
    e.preventDefault();

    var formData = new FormData($(this)[0]);
    var urls=$('#urls').val();
    $.ajax({
      url: urls+'Vendor/newvendor',
      type: 'POST',
      data:formData,
      contentType: false,
      processData: false,
      success: function(data) {

        if(data=='pass'){
            $('.login_result1.error1').css('color', 'red');
                $('.login_result1.error1').show();
        }else if(data=='email'){
            $('.login_result.error').css('color', 'red');
                $('.login_result.error').show();
        }else{
           $('.login.success').css('color', 'red');
                $('.login.success').show();
                window.setTimeout(function() {
          window.location.href=urls+'Vendor/index';}, 3000);
        }
        }
    });
});

</script>

