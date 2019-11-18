<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>admin/assets/images/favicon.png">
<!-- App title -->
<title>Vendor Login: Share2Care</title>
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
<div class="wrapper-page m-t-140 padd-login">
<div class="account-pages">
<div class="text-center account-logo-box">
<h2 class="text-uppercase">
<a href="#" class="text-success"><span><img src="http://share2care.co/new/bootstrap/images/logo-new.png" alt="" height="80"></span></a>
</h2>
<h4 class="text-uppercase font-bold m-b-0">Expert Login</h4>
<br><p>Create your professional account to submit profile and cater enquiries.</p>
</div>
<div class="account-content" style="padding-bottom: 18%;">
<form class="form-horizontal" method="post">
<div class="form-group ">
<div class="col-xs-12"  style="margin-bottom: 0px;">
<input class="form-control" type="text" id="email" name="email"  required="" placeholder="Email ID">
</div>
</div>
<!-- <div class="form-group">
<div class="col-xs-12"><input class="form-control" id="pass" type="password" required="" placeholder="Password"></div>
</div>-->
<div class="form-group ">
<div class="col-xs-12"  style="margin-bottom: 0px;">
<input placeholder="Phone No." type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="phone" name="phone" minlength="10" maxlength="10" class="form-control" onkeydown="if  (this.value.length==10 && event.keyCode == 13) otpclick()">
</div>
<span id="ourotp" style="float: right;"><a class="frgt" onclick="otpclick()" href="javascript:void(0)">Get OTP</a></span>
<span id="ourotp1" style="display: none;float: right;color: red;    font-size: 14px;">OTP Send Successfully</span>
<span id="ourotp4" style="display: none;float: right;color: red;font-size: 14px;">Please enter Mobile No</span>
</div>
<div class="form-group">
<div class="col-xs-12"><input class="form-control" id="otp" type="text" required="" placeholder="OTP" minlength="4" maxlength="4"></div>
<span id="ourotp2" style="float: right;"><a class="frgt" onclick="otpclick2()" href="javascript:void(0)">Resend OTP</a></span>
<span id="ourotp3" style="display: none;float: right;color: red;font-size: 14px;">Resend OTP Send Successfully</span>
<span id="ourotp8" style="display: none;float: right;color: red;font-size: 14px;">Please enter Mobile No</span>
</div>
<!--<div class="form-group text-center m-t-30">
<div class="col-sm-12"><a href="<?php echo base_url('index.php/Vendor/Forgot'); ?>" class="frgt"><i class="fa fa-lock m-r-5"></i> Forgot password?</a></div>
</div>-->
<div class="form-group account-btn text-center m-t-10">
<div class="col-xs-12"><input type="button" class="btn btn-color " value="Submit" onclick="otpclick1();">
<br><a href="<?php echo base_url();?>">Exit to Website</a></div>
</div>
</form>
<div class="clearfix"></div>
</div>
</div>
</div>
<!-- end wrapper -->
</div>
</div>
</div>
</section>
<!-- END HOME -->
<script>var resizefunc = [];</script>
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
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">
</body>
</html>
<script type="text/javascript">
function otpclick2() {
var mobile=$("#phone").val();
if(mobile==''){
$("#ourotp8").show();
}else{
var urls = $("#url").val();
$.ajax({
type: "POST",
url: urls+"Vendor/newotp",
data: {mobiles:mobile},
cache: false,
success: function(result){
$("#ourotp2").hide();
$("#ourotp3").show();
$("#ourotp8").hide();
}
});
}
}
</script>
<script type="text/javascript">
function otpclick() {
var mobile=$("#phone").val();
if(mobile==''){
$("#ourotp4").show();
}else{
var urls = $("#url").val();
var email = $("#email").val();
var pass = $("#pass").val();
$.ajax({
type: "POST",
url: urls+"Vendor/newotp",
data: {mobiles:mobile,email:email,pass:pass},
cache: false,
success: function(result){
$("#ourotp").hide();
$("#ourotp4").hide();
$("#ourotp1").show();
}
});
 }
 }
</script>
<script type="text/javascript">
function otpclick1() {
var mobile=$("#phone").val();
var otp=$("#otp").val();
var pass=$("#pass").val();
var email=$('#email').val();
if(mobile==''){alert("Please enter mobile no");exit(); }
if(email==''){alert("Please enter email id");exit(); }
if(pass==''){ alert("Please enter password");exit(); }
if(otp==''){alert("Please enter otp");exit(); }
var urls = $("#url").val();
$.ajax({
type: "POST",
url: urls+"Vendor/admin_login",
data: {otp:otp,phone:mobile,pass:pass,email:email},
cache: false,
success: function(result){
if(result=='enter'){alert("Please enter valid email or password.");exit();
}else if(result=='invalid'){
alert("Please enter valid OTP.");exit();
}else {
window.location.href = urls+"Vendor/Profile";
} 
}
});
}
</script>