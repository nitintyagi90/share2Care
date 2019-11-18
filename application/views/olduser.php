<?php
include 'header.php';
?>
<section class="mg-tp-50" style="padding: 50px 0px 50px 0px;">
    <div class="container   box-wrapper">
       
           <div class="col-md-3"></div>
            <div class="col-md-6 col-sm-12 padd-login">
               <h3 class="heading-color text-center mg-bt-30">Existing User</h3>
                    <div class="formsec pdd">
                         <!--  <span>Feel free to send us any questions you may have. We are happy to answer them.</span>
                        <br> -->
                             <form id="loginform" method="post">
                   
                      
                           <div class="login_result error" style="display: none;"  >Your Account is Already Existed </div>

      <div class="login success" style="display: none;"  >Thanks For Contacting us Team Will Contact us Shortly. </div>
                 <div class="login_result1 error1" style="display: none;"  >Password Not Matched</div>
                   
                            
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Your Email</label>
                                <input type="email"  name="email" class="form-control">
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Password</label>
                                <input type="password"  name="pass" class="form-control">
                                 <span><a class="frgt" href="forgot">Forgot Password?</a></span>
                            </div>
                       <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                       <div class="text-center" style="margin-bottom: 10px;margin-top: 10px;">
                        <input type="hidden" id="urls" value="<?php echo base_url(); ?>">
                        <div class="padd-l-20">
                        <button type="submit" class="btn btn-color text-center">Login</button></div></div>
                        <div class="text-center" style="margin-top: 10px;"><a class="btn btn-color text-center" href="user">New to Share2care Signup</a></div>
                         </div></form>

                    </div> 
                   
            </div>
            <div class="col-md-3"></div>
    </div>
</section>

<!-- <script type="text/javascript">
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
       window.location.href=urls+'Share/index';}, 300);
       
        }
        else{
        // window.location.reload();
         window.location = "<?php echo base_url('Share/index');?>";
        }
        }
    });
});

</script> -->
<?php
include 'footer.php';