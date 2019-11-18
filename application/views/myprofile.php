<?php include 'header.php'; ?>
<section class="mg-tp-50">
<div class="container padd-login">
<form name="form" action="<?php echo base_url('index.php/Share/updatepro'); ?>" method="post" enctype="multipart/form-data">
<h3 class="heading-color text-center mg-bt-3">My Profile</h3>
<div class="col-md-2"></div>
<?php $id= $_SESSION['sessionid'];
$where='id';
$table='Users';
$name=$this->Adminmodel->select_comm_where($where,$id,$table); ?>
<div class="col-md-2" style="padding-top: 4%;">


<?php if($name[0]['u_image']){ ?>
<img src="<?php echo $name[0]['u_image'];?>" class="img-circl img-thumbnai" width="120px" height="100px" alt="profile-image">
<input type="hidden" name="files" value="<?php echo $name[0]['u_image'];?>">
<?php }else{ ?>
<img src="<?php echo base_url();?>image/users/user.png" class="img-circle img-thumbnail" alt="profile-image">
<br /><br />
 <input type="file" class="filestyle" data-input="false" name="files">
<?php }?>


</div>
<div class="col-md-1"></div>
<div class="col-md-7 col-sm-12">
<div class="formsec pdd">
<div class="col-md-6">
<div class="form-group" style="margin-bottom: 0px;"><label>Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $name[0]['u_name']; ?>" required>
</div></div>
      
<div class="col-md-6">
<input type="hidden" readonly="true" name="id" class="form-control" value="<?php echo $_SESSION['sessionid']; ?>" >
<div class="form-group" style="margin-bottom: 0px;"><label>Mobile</label>
<input type="text"  name="phone" class="form-control" value="<?php echo $name[0]['u_phone']; ?>" readonly>
</div></div>

<div class="col-md-6"><div class="form-group" style="margin-bottom: 0px;"><label>Email</label>
<input type="email"  name="email" class="form-control" value="<?php echo $_SESSION['sessionemail']; ?>" readonly>
<input type="hidden"  name="pass" class="form-control" value="<?php echo $name[0]['u_pass']; ?>" >
</div></div>

<div class="col-md-6"><div class="form-group" style="margin-bottom: 0px;"><label>Age</label>
<input type="text"  name="age" class="form-control" value="<?php echo $name[0]['u_age']; ?>" required minlength="2" maxlength="2" onkeypress="return /^[0-9]/i.test(event.key)">
</div></div>

<div class="col-md-6"><div class="form-group" style="margin-bottom: 0px;"><label>Profession</label>
<input type="text"  name="profession" class="form-control" value="<?php echo $name[0]['u_profession']; ?>" required onkeypress="return /^[a-zA-Z\s]+$/i.test(event.key)">
</div></div>
      
<div class="col-md-6">
<div class="form-group" style="margin-bottom: 0px;"><label>Address</label>
<input type="text"  name="address" class="form-control" value="<?php echo $name[0]['u_address']; ?>" required>
</div></div>

<div class="col-md-6"><label for="name">State  <sup>*</sup></label>
<select name="state" class="form-control option-list" required onchange="cityy()" id="cit" value="<?php echo $name[0]['u_state']; ?>">
<option value="" disabled="">---- Select ----</option>
<?php foreach ($states as  $values) {  ?>  
<option value="<?php echo $values['id']; ?>" <?php if($values['id']==$name[0]['u_state']){echo "selected"; } ?>><?php echo $values['name']; ?></option>
<?php } ?>
</select>
</div>

<div class="col-md-6">
<label for="name">City<sup>*</sup></label>
<select name="city" class="form-control option-list" required id="cit1" value="<?php echo $name[0]['u_city']; ?>">
<option value="" disabled="">---- Select ----</option>
<?php 
$id= $name[0]['u_state'];
$where='state_id';
$table='cities';
$city =$this->Adminmodel->select_comm_where($where,$id,$table);
?>
<?php foreach ($city as  $values) {  ?>  
<option value="<?php echo $values['id']; ?>" <?php if($values['id']==$name[0]['u_city']){echo "selected"; } ?>><?php echo $values['name']; ?></option>
<?php } ?>
</select>
</div>
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">
<center><button type="submit" class="btn btn-color text-center" style="margin-bottom: 10px;margin-top: 20px;" onClick="return validate();">Update Profile</button> </center></form>
</div>
</div>
</form>
</div>
</section>
<?php include 'footer.php'; ?>
<script>
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

<script language="javascript" type="text/javascript">
function validate(){
  var file= form.files.value;
       var reg = /(.*?)\.(jpg|bmp|jpeg|png)$/;
       if(!file.match(reg))
       {
    	   alert("Select jpg, png, bmp jpeg file only or invalid file");
    	   return false;
       }
       }
	   </script>