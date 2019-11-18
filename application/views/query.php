<?php include 'header.php'; ?>
<section class="" style="margin-bottom:2.5%;">
<div class="container">
<!--<div class="mainabt"><h3 class="heading-color text-center">Submit Applicant’s Enquiry</h3></div>-->
<!--<div class="col-md-6">
<h4 class="text-left">Create/Authenticate Applicants profile</h3>
<ul class="Process-list">
<li>User shall submit credentials i.e. Name, email id/password (for this website purpose), mobile no& correct OTP. </li>
<li>For first time user new profile shall be created and for existing user profile shall be authenticated. </li>
<li>On next page user shall provide further details and submit the Enquiry. Thereafter, user will receive “Enquiry number” by SMS and acknowledgement email.</li>
<li>The concerned subject matter expert will send the reply giving solution of user’s enquiry. </li>
<li>If you require further online guidance or wish to meet the expert to discuss directly, please revert back to us by following the above steps and also mention the previous “Enquiry no.”.</li> 
<li>We will be happy to resolve the enquiry to the logical end.</li>
</ul>
</div>-->
<?php 
$id=$_SESSION['sessionid'];
$where='id';
$table='Users';
$user =$this->Adminmodel->select_comm_where($where,$id,$table);
?>
<div class="col-md-offse-1 col-md-12">
<form id="loginform1" method="post">
<div class="row"  style="margin-bottom: 2%;">
<div class="col-12 col-md-3"><label for="name">Name<sup style="color:red;">*</sup></label>
<input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required value="<?php echo $user[0]['u_name']; ?>">
</div>
<div class="col-12 col-md-3"><label for="name">Email<sup style="color:red;">*</sup></label>
<input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email" required  value="<?php echo $user[0]['u_email']; ?>" readonly>
</div>
<div class="col-12 col-md-3"><label for="name">Email<sup style="color:red;">*</sup></label>
<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your Mobile Number" required  value="<?php echo $user[0]['u_phone']; ?>" readonly>
<input type="hidden" class="form-control" id="pass" name="pass" value="<?php echo $user[0]['u_pass']; ?>"> 
<input type="hidden" class="form-control" id="dates" name="dates" value="<?php echo $user[0]['u_date']; ?>">
 </div>
<div class="col-12 col-md-3"><label for="name">Gender<sup style="color:red;">*</sup></label>
<select name="gender" class="form-control option-list"  id="gender">
<option value="Male" <?php if($user[0]['gender']=='Male'){echo 'Selected';} ?>>Male</option>
<option value="Female" <?php if($user[0]['gender']=='Female'){echo 'Selected';} ?>>Female</option>
</select>
</div>
</div>
<div class="row"  style="margin-bottom: 2%;">
<div class="col-12 col-md-3"><label for="age">Age<sup style="color:red;">*</sup></label>
<div><span style="position: absolute; z-index: 1; font-size: 14px; margin-top: 5px; right: 20px;">Yrs.</span><input style="padding-right: 55px;" type="text" class="form-control" id="age" name="age"  value="<?php echo $user[0]['u_age']; ?>"  required minlength="2" maxlength="2" onkeypress="return /^[0-9]/i.test(event.key)"></div>
</div>
<div class="col-12 col-md-3"><label for="profession">Proffesion<sup style="color:red;">*</sup></label>
<input type="text" class="form-control" id="profession" name="profession" value="<?php echo $user[0]['u_profession']; ?>" required  onkeypress="return /^[a-zA-Z\s]+$/i.test(event.key)" >
</div>
<div class="col-12 col-md-6"><label for="name">Address<sup style="color:red;">*</sup></label>
<input type="text" class="form-control" id="address" name="address" placeholder="Enter your Address" required  value="<?php echo $user[0]['u_address']; ?>">
</div>
</div>
<div class="row" style="margin-bottom: 2%;">
<div class="col-12 col-md-3"><label for="name">State<sup style="color:red;">*</sup></label>
<select name="state" class="form-control option-list" required onchange="cityy()" id="cit">
<option value="">---- Select ----</option>
<?php foreach ($states as  $values) {  ?>
<option value="<?php echo $values['id']; ?>" <?php if($values['id']==$user[0]['u_state']){echo "selected"; } ?>><?php echo $values['name']; ?>
</option><?php } ?>
</select>
 </div>
<div class="col-12 col-md-3"><label for="name">City<sup style="color:red;">*</sup></label>
<select name="city" class="form-control option-list" id="cit1" required>
<option value="">---- Select ----</option>
<?php $id= $user[0]['u_state']; $where='state_id'; $table='cities'; $city =$this->Adminmodel->select_comm_where($where,$id,$table); ?>
<?php foreach ($city as  $values) {  ?>
<option value="<?php echo $values['id']; ?>" <?php if($values['id']==$user[0]['u_city']){echo "selected"; } ?>><?php echo $values['name']; ?></option>
<?php } ?>
</select>
</div>

<div class="col-12 col-md-3"><label for="name">Category<sup style="color:red;">*</sup></label>
<select name="cat" class="form-control option-list" onchange="expertp()" id="exp" required>
<option value="">---- Select ----</option>
<?php foreach ($message as  $value) {  ?> 
<option value="<?php echo $value['id']; ?>" ><?php echo $value['name']; ?></option>
<?php } ?>
</select>
</div>
<div class="col-12 col-md-3">
<label for="name">Expert </label>
<select name="expid" class="form-control option-list" id="exp1">
<option value="">---- Select ----</option>
</select>
</div>
</div>

<div class="form-group"><label>Your Enquiry<sup style="color:red;">*</sup></label>
<textarea class="form-control" id="message" rows="2" name="comment" required></textarea>
</div>
<div class="text-center mt-4"><button type="submit" class="btn btn-color">Submit Now</button></div>
<div class="alert alert-success alert-dismissable" style="display: none;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Success! Query sent successfully.</div>
<div class="login_result2 error2" style="display: none;">enquiry submit</div>
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">
</form>
</div>
</div>
</section>
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">
<?php include 'footer.php'; ?>
 <script>
 function expertp(){
 var urls=$("#url").val();
 var catid= $("#exp").val();
 $.ajax({
 type: "POST",
 url: urls+"Share/cati",
 data: {id:catid},
 cache: false,
 success: function(result){
 // alert(result);
 $("#exp1").html(result);
 }
 });
 }
function cityy(){
var urls=$("#url").val();
var catid= $("#cit").val();
$.ajax({
type: "POST",
url: urls+"Share/citycat",
data: {id:catid},
cache: false,
success: function(result){
// alert(result);exit();
$("#cit1").html(result);
}
});
}
</script>
<script type="text/javascript">
$(document).on('submit', '#loginform1',function(e){
e.preventDefault();
var formData = new FormData($(this)[0]);
console.log(formData);
var urls=$('#url').val();
$.ajax({
url: urls+'Share/addquery',
type: 'POST',
data:formData,
contentType: false,
processData: false,
success: function(data) {
//alert(data);exit();
$(".alert").hide().show('medium');
console.log(data);
window.location.href = urls+"Share/myquery";
//location.reload();
/*  if(data=='pass'){
$('.login_result2.error2').css('color', 'red');
$('.login_result2.error2').show();
}else if(data=='session'){
$('.login.success').css('color', 'red');
$('.login.success').show();
window.setTimeout(function() {
window.location.href=urls+'Share/login';});
}*/
/* else{
alert(data);
$('.login.success').css('color', 'red');
$('.login.success').show();
window.setTimeout(function() {
// window.location.href=urls+'Share/query';}, 300);
}*/
// 
}
});
});
</script>