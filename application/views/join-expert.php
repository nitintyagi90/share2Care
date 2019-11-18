<?php

include 'header.php';
?>
<section class="mg-tp-50" style="padding: 50px 0px 50px 0px;">
  <div class="container">
    <h3 class="heading-color text-center mg-bt-30">Join Now (Share2care) as Consultant / Counselor</h3>
    <p style="font-size: 16px">Feel free to send us any questions you may have. We are happy to answer them.You are welcome to join panel of experts at Share2care. Pl submit you details below - 
</p>
    <div class="col-md-5 col-sm-12">
                <ul class="Process-list">
                  <li>Work is asynchronous,</li>
                  <li>you are in control of your time,</li>
                  <li>your focus is 100% counseling.</li>
                  <li>Do not worry about acquiring clients,</li>
                  <li>Above all you are doing social service.</li>
                </ul>
            </div>
    <div class="col-md-offset-1 col-md-6 col-sm-12">
                    <div class="formsec">
                      
                      <form id="loginform1" method="post">
                   
                      
                           <div class="login_result error" style="display: none;"  >Your Account is Already Existed </div>

      <div class="login success" style="display: none;"  >Thanks For Contacting us Team Will Contact us Shortly. </div>
                 <div class="login_result2 error2" style="display: none;"  >Password Not Matched</div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Your Name<sup>*</sup></label>
                                <input type="text"name='name' class="form-control" required="">
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Your Email<sup>*</sup></label>
                                <input type="email" name="email" class="form-control" required="">
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Phone<sup>*</sup></label>
                                <input type="text" name="phone" class="form-control" required="">
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Professional in</label>
                                    <select class="form-control option-list" name="profession" required="">
                                        <option>---- Select ----</option>
                                        <?php foreach ($message as  $value) {  ?>  
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                         <?php } ?>
                                       
                                    </select>
                            </div>
                             <div class="form-group" style="margin-bottom: 0px;">
                                <label>Password<sup>*</sup></label>
                                <input type="Password" name="pass" class="form-control" required="">
                            </div>
                             <div class="form-group" style="margin-bottom: 0px;">
                                <label>Confirm Password<sup>*</sup></label>
                                <input type="Password" name="cpass" class="form-control" required="">
                            </div>
                       <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                       <br/>
                        <button type="submit" class="btn btn-color">Submit</button>
                        </form>

                    </div>
            </div>
  </div>
</section>
<!---------------------------- footer-copyright-start ----------------------->


<script type="text/javascript">
    $(document).on('submit', '#loginform1',function(e){
    e.preventDefault();

    var formData = new FormData($(this)[0]);
    var urls=$('#url').val();
    $.ajax({
      url: urls+'Share/newprofession',
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
  <?php
include 'footer.php';