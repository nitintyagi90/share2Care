<?php include 'header.php'; ?>
<section class="mg-tp-50" style="padding: : 8%;">
<div class="container   box-wrapper">
<div class="col-md-3"></div>
<div class="col-md-6 col-sm-12 padd-login">
<!-- <h3 class="heading-color text-center mg-bt-30">Login</h3> -->
 <span class="text-center" style="color: red"><?php echo $this->session->flashdata('message')?></span> 
<h4 class="text-center">Select Enquiry No. & Category For Appoinment</h5>
<div class="formsec pdd">
<form  method="post" action="<?php echo base_url('/index.php/Submitappointment')?>">
<div class="login_result error" style="display: none;"  >Your Account is Already Existed </div>
<div class="login success" style="display: none;"  >Thanks For Contacting us Team Will Contact us Shortly. </div>
<div class="login_result1 error1" style="display: none;"  >Password Not Matched</div>
<div class="row" style="margin-bottom: 3%;">
<div class="col-12 col-md-6"><label>Name:</label><input type="text"  id="name" name="username" class="form-control" value="<?php if(!empty($_SESSION['sessionname'])){ echo $_SESSION['sessionname']; } else{ echo "";} ?>">
<input type="hidden"  id="email" class="form-control" value="<?php if(!empty($_SESSION['sessionemail'])){ echo $_SESSION['sessionemail']; } else{ echo "";} ?>">
</div>
<div class="col-12 col-md-6"><label>Mobile</label>
<div>
<span style="position: absolute; z-index: 1; font-size: 14px; margin-top: 7px; left: 25px;">+ 91 - </span>
<input type="text" style="padding-left: 55px;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="phone" name="phone" minlength="10" maxlength="10" class="form-control" >
</div>
</div>
</div>
<input type="hidden" name="user_id" value="<?=$_SESSION['sessionid']?>">
<div class="row" style="margin-bottom: 3%;">
<div class="col-12 col-md-6"><label for="name">Enquiry No.<sup style="color:red;">*</sup></label>
<select name="enquiry" class="form-control option-list" required >
<option value="">---- Select ----</option>
<?php foreach ($enquiry as $value) {
 ?>
<option value="<?=$value['id']?>"><?=$value['enq_id']?></option>
<?php } ?>
</select>
</div>
<div class="col-12 col-md-6"><label for="name">Category<sup style="color:red;">*</sup></label>
<select name="category" class="form-control option-list" required >
<option value="">---- Select ----</option>
<?php foreach ($message as $value) {
 ?>
<option value="<?=$value['id']?>"><?=$value['name']?></option>
<?php } ?>
</select>
</div>
</div>

<div class="form-group"><label>Any Comments<sup style="color:red;">*</sup></label>
<textarea class="form-control" id="message" rows="2" name="comment" required></textarea>
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">
<input type="hidden" id="urls" value="<?php echo base_url(); ?>index.php/">
</div>


<div class="text-center mt-4"><button type="submit" class="btn btn-color">Submit Now</button></div>
</form>
</div> 
</div>
                            <div class="col-md-3"></div>
                          </div>
                        </section>

                        <script type="text/javascript">
                          $(document).on('submit', '#loginform',function(e){
                            e.preventDefault();

                            var formData = new FormData($(this)[0]);
                            var urls=$('#urls').val();
                            $.ajax({
                              url: urls+'Share/loginusers',
                              type: 'POST',
                              data:formData,
                              contentType: false,
                              processData: false,
                              success: function(data) {

                                if(data=='Invalid'){
                                  $('.login_result1.error1').css('color', 'red');
                                  $('.login_result1.error1').show();
                                }else if(data=='Notactivete'){
                                  $('.login_result.error').css('color', 'red');
                                  $('.login_result.error').show();
                                }else if(data=='submitform'){
                                  alert('Query Submit Succesfully');
                                  window.setTimeout(function() {
                                   window.location.href=urls+'Share/myquery';}, 300);

                                }
                                else{
        // window.location.reload();
        window.location = "<?php echo base_url('Share/myquery');?>";
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
                        var mobile=$("#phone").val();
                        var otpfetch=$("#addotp").val();
                        var email=$("#email").val();
                        var pass=$("#pass").val();
                        if(mobile==''){
                          alert("Please enter mobile no");exit();
                        }
                        if(email==''){
                          alert("Please enter email id");exit();
                        }
                        if(pass==''){
                          alert("Please enter password");exit();
                        }
                        if(otpfetch==''){
                          alert("Please enter otp");exit();
                        }
                        var urls = $("#url").val();
                        $.ajax({
                          type: "POST",
                          url: urls+"Share/fetchotp1",
                          data: {otpfetch:otpfetch,mobile:mobile,email:email,pass:pass},
                          cache: false,
                          success: function(result){
                            if(result=='enter'){
                              alert("Please enter valid email or password.");exit();
                            }else if(result=='invalid'){
                              alert("Please enter valid OTP.");exit();
                            }else{
                              window.location.href = urls+"Share/myquery";
                            }
   // 


 }

});

                      }
                    </script>
                    <?php
                    include 'footer.php';