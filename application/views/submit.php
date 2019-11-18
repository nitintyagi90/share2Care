<?php include 'header.php'; ?>
<section class="mg-tp-50" style="margin-top:-2%; margin-bottom: -0%;">
<div class="container   box-wrapper">
<div class="row">
<h3 class="heading-color text-center" style="margin-bottom:-5px;">Create/Authenticate User profile</h3></div>
<div class="col-md-6">
<h4 class="text-left">&nbsp;<br /></h4>
<ul class="Process-list">

<li>User shall submit credentials i.e. Name, email id/password (for this website purpose), mobile no & correct OTP. </li>
<li>For first time user new profile shall be created and for existing user profile shall be authenticated. </li>
<li>On next page user shall provide further details and submit the Enquiry. Thereafter, user will receive “Enquiry number” by SMS and acknowledgement email.</li>
<li>The concerned subject matter expert will send the reply giving solution of user’s enquiry. </li>
<li>If you require further online guidance or wish to meet the expert to discuss directly, please revert back to us by following the above steps and also mention the previous “Enquiry no.”.</li> 
<li>We will be happy to resolve the enquiry to the logical end.</li>
</ul>
</div>
<div class="col-md-offse-1 col-md-6"><!-- <h3 class="heading-color text-center mg-bt-30">Submit Enquiry</h3> -->
<div class="formsec pdd"><!-- <span>Feel free to send us any questions you may have. We are happy to answer them.</span><br> -->
<form id="loginform1" method="post"><!-- <div class="login_result error" style="display: none;"  >Your Account is Already Existed </div><div class="login success" style="display: none;"  >Thanks For Contacting us Team Will Contact us Shortly. </div><div class="login_result1 error1" style="display: none;"  >Password Not Matched</div> -->
<div class="row" style="margin-bottom: 0%;">
<div class="col-12 col-md-12"><label for="name">Full Name: <sup style="color:red;">*</sup></label><input type="text"  id="name" class="form-control" required></div>
</div>
<div class="row" style="margin-bottom: 0%;">
<div class="col-12 col-md-12"><label>Email: <sup style="color:red;">*</sup></label><input type="email"  id="email" class="form-control" required>
<input type="hidden"  id="pass" class="form-control" value="123456<?php //echo rand(100000,999999); ?>" required readonly>
<input type="hidden"  id="dates" class="form-control" value="<?php $date=date('d-m-Y'); echo "$date" ;?>"></div>
</div><div class="row" style="margin-top:0%;">
<div class="col-12 col-md-12"><label>Mobile: <sup style="color:red;">*</sup></label>
<div><span style="position: absolute; z-index: 1; font-size: 14px; margin-top: 4px; left: 25px;">+ 91 - </span>
<input type="text" style="padding-left: 55px;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="phone" name="phone" minlength="10" maxlength="10" class="form-control" onkeydown="if  (this.value.length==10 && event.keyCode == 13) otpclick()">
</div>
<span id="ourotp"><a class="frgt" onclick="otpclick()" href="javascript:void(0)">Get OTP</a></span>
<span id="ourotp1" style="display: none;float: right;color: red;    font-size: 13px; margin-bottom:-1px;">OTP Sent Successfully</span>
<span id="ourotp4" style="display: none;float: left;color: red;    font-size: 13px; margin-bottom:-1px;">Please enter Mobile No</span>
</div>
</div>
<div class="row">
<div class="col-12 col-md-12" style="margin-top:-13px;"><label>OTP: <sup style="color:red;">*</sup></label>
<input type="text" id="addotp" name="otp" minlength="4" maxlength="4" class="form-control">
<div class="login_result1 error1" style="display: none;"  >Please Enter Valid  OTP</div>
<span id="ourotp2"><a class="frgt" onclick="otpclick2()" href="javascript:void(0)">Resend OTP</a></span>
<span id="ourotp3" style="display: none;float: right;color: red;font-size: 13px;  margin-bottom:-1px;">Resend OTP Send Successfully</span>
<span id="ourotp8" style="display: none;float: left;color: red;    font-size: 13px;  margin-bottom:-1px;">Please enter Mobile No</span>
</div>
</div>							  
<!--<div class="row" style="margin-top:0%; margin-bottom:5%;">
<div class="col-12 col-md-6"><label for="age">Age<sup style="color:red;">*</sup></label>
<div><span style="position: absolute; z-index: 1; font-size: 14px; margin-top: 5px; right: 20px;">Yrs.</span><input style="padding-right: 55px;" type="text" class="form-control" id="age" name="age"  value="<?php echo $user[0]['profession']; ?>"  required minlength="2" maxlength="2" onkeypress="return /^[0-9]/i.test(event.key)"></div>
</div>
<div class="col-12 col-md-6"><label for="profession">Proffesion<sup style="color:red;">*</sup></label>
<input type="text" class="form-control" id="profession" name="profession" value="<?php echo $user[0]['profession']; ?>" required  onkeypress="return /^[a-zA-Z\s]+$/i.test(event.key)" >
</div>
</div>-->
<div class="form-group" style="margin-top:0%; margin-bottom:0%;">				  
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">
<input type="hidden" id="urls" value="<?php echo base_url(); ?>index.php/">
<div class="text-center" style="margin-bottom: 8px;margin-top: 0px;">
<button type="button" class="btn btn-color text-center" onclick="otpclick1();">Submit</button>
</div>
</div>
</form>
</div>
</div> 
</div>
</div>  
</section>
<script type="text/javascript">
$(document).on('submit', '#loginform',function(e){
e.preventDefault();
var formData = new FormData($(this)[0]);
var urls=$('#url').val();
var phone=$('#phone').val();
var dates=$('#dates').val();
$.ajax({
url: urls+'Share/newuser1',
type: 'POST',
data:formData,
contentType: false,
processData: false,
success: function(data) {
if(data=='pass'){
$('.login_result2.error2').css('color', 'red');
$('.login_result2.error2').show();
}else if(data=='email'){
$('.login_result2.error2').css('color', 'red');
$('.login_result.error').show();
}else{
$('.login.success').css('color', 'red');
$('.login.success').show();
window.setTimeout(function() {
window.location.href=urls+'Share/index';}, 3000);
}
}
});
});
</script>
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
var name=$("#name").val();
var email=$("#email").val();
var pass=$("#pass").val();
var mobile=$("#phone").val();
var otpfetch=$("#addotp").val();
var dates=$("#dates").val();
//var profession=$("#profession").val();
if(name==''){alert("Please Enter Full Name");exit();}   
if(email==''){alert("Please Enter Valid Email Id");exit(); }  
if(pass==''){alert("Please Enter Password");exit(); }                 
if(mobile==''){alert("Please Enter 10 Digit Mobile No.");exit(); }
if(otpfetch==''){alert("Please Enter OTP");exit();}
//if(age==''){alert("Please Enter Your Age");exit();}
//if(profession==''){alert("Please Enter Your Profession");exit();}
var urls = $("#url").val();
$.ajax({
type: "POST",
url: urls+"Share/fetchotp",
//data: {otpfetch:otpfetch,mobile:mobile,email:email,pass:pass,name:name,age:age,profession:profession},
data: {otpfetch:otpfetch,mobile:mobile,email:email,pass:pass,name:name,dates:dates},
cache: false,
success: function(result){
//alert(result);exit();
if(result=='enter'){alert("Please enter valid email or password.");exit();}
else if(result=='invalid'){alert("Please enter valid OTP.");exit();}
else{window.location.href = urls+"Share/query";}
//
}
});
}
</script>
<?php include 'footer.php'; ?>