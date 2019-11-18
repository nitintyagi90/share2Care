<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>admin/assets/images/favicon.png">
<!-- App title -->
<title>User Login: Share2Care</title>
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
<h4 class="text-uppercase font-bold m-b-0">User Login</h4>
<br><p>Create/Authenticate User profile</p>
</div>
<div class="account-content" style="padding-bottom: 18%;">
<form class="form-horizontal" method="post">
<div class="login_result error" style="display: none;"  >Your Account is Already Existed </div>
<div class="login success" style="display: none;"  >Thanks For Contacting us Team Will Contact us Shortly. </div>
<div class="login_result1 error1" style="display: none;"  >Password Not Matched</div>

<div class="form-group ">
<div class="col-xs-12"  style="margin-bottom: 0px;"><input class="form-control" type="text" id="email" name="email"  required="" placeholder="Email ID">
<input class="form-control" id="pass" type="hidden" required="" placeholder="Password" value="123456">
<input type="hidden"  id="dates" class="form-control" value="<?php $date=date('d-m-Y'); echo "$date" ;?>">
</div>
</div>
<!--<div class="form-group">
<div class="col-xs-12"><input class="form-control" id="pass" type="password" required="" placeholder="Password"></div>
<span id="ourotp" style="float: right; margin-right:13px;"><a href="<?php echo base_url('Share/forgot'); ?>" style="color: #9f0012; ">Forgot Password</a></span>
</div>-->
<div class="form-group ">
<div class="col-xs-12"  style="margin-bottom: 0px;">
<span style="position: absolute; z-index: 1; font-size: 14px; margin-top:11px; left: 22px;">+ 91 - </span>
<input style="padding-left: 55px;" placeholder="10 Digit Mobile No." type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="phone" name="phone" minlength="10" maxlength="10" class="form-control" onkeydown="if  (this.value.length==10 && event.keyCode == 13) otpclick()">
</div>
<span id="ourotp" style="float: right; margin-right:13px;"><a class="frgt" onclick="otpclick()" href="javascript:void(0)">Get OTP</a></span>
<span id="ourotp1" style="display: none;float: right;color: red;    font-size: 14px;">OTP Send Successfully</span>
<span id="ourotp4" style="display: none;float: right;color: red;font-size: 14px;">Please enter Mobile No</span>
</div>
<div class="form-group">
<div class="col-xs-12"><input class="form-control" id="addotp" name="otp" type="text" required="" placeholder="OTP" minlength="4" maxlength="4"></div>
<div class="login_result1 error1" style="display: none;"  >Please Enter Valid  OTP</div>
<span id="ourotp2" style="float: right; margin-right:13px;"><a class="frgt" onclick="otpclick2()" href="javascript:void(0)">Resend OTP</a></span>
<span id="ourotp3" style="display: none;float: right;color: red;font-size: 14px;">Resend OTP Send Successfully</span>
<span id="ourotp8" style="display: none;float: right;color: red;font-size: 14px;">Please enter Mobile No</span>
</div>
<!--<div class="form-group text-center m-t-30">
<div class="col-sm-12"><a href="<?php echo base_url('index.php/Vendor/Forgot'); ?>" class="frgt"><i class="fa fa-lock m-r-5"></i> Forgot password?</a></div>
</div>-->
<div class="form-group account-btn text-center m-t-10">
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">
<input type="hidden" id="urls" value="<?php echo base_url(); ?>index.php/">
<div class="col-xs-12"><input type="button" class="btn btn-color " value="Submit" onclick="otpclick1();">
<br><br><a href="http://share2care.co">Back to Website</a></div>
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
url: urls+"Share/newotp",
data: {mobiles:mobile},
cache: false,
success: function(result){
$("#ourotp2").hide();
$("#ourotp8").hide();
$("#ourotp3").show();
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
$.ajax({
type: "POST",
url: urls+"Share/newotp",
data: {mobiles:mobile},
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
var otpfetch=$("#addotp").val();
var email=$("#email").val();
var pass=$("#pass").val();
var dates=$("#dates").val();
if(email==''){
alert("Please enter email id");exit();
}
if(pass==''){
alert("Please enter password");exit();
}
if(mobile==''){
alert("Please enter mobile no");exit();
}
if(otpfetch==''){
alert("Please enter otp");exit();
}
var urls = $("#url").val();
$.ajax({
type: "POST",
url: urls+"Share/fetchotp1",
data: {otpfetch:otpfetch,mobile:mobile,email:email,pass:pass,dates:dates},
cache: false,
success: function(result){
if(result=='enter'){
alert("Please enter valid email or does not match.");exit();
}else if(result=='invalid'){
alert("Please enter valid OTP.");exit();
}else{
window.location.href = urls+"Share/Profile";
}
// 
 }
});
}
</script>