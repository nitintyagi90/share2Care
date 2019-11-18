<?php
include 'header.php';
?>
<section class="mg-tp-50" style="padding: 50px 0px 50px 0px;">
    <div class="container">
        <h3 class="heading-color text-center mg-bt-30">Sign in</h3>
           
            <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <div class="formsec pdd">
                          <span>Feel free to send us any questions you may have. We are happy to answer them.</span>
                        <br>
                             <form id="loginform" method="post">
                   <input type="hidden" name="pro" value="<?php echo $this->uri->segment(3); ?>">
                   <input type="hidden" name="cat" value="<?php echo $this->uri->segment(4); ?>">
                      
                           <div class="login_result error" style="display: none;"  >Your Account is Already Existed </div>

      <div class="login success" style="display: none;"  >Thanks For Contacting us Team Will Contact us Shortly. </div>
                 <div class="login_result1 error1" style="display: none;"  >Password Not Matched</div>
                   
                            <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
                           
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Enter Password</label>
                                <input type="password"  name="pass" class="form-control">
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Enter Confirm Password</label>
                                <input type="password"  name="pass" class="form-control">
                            </div>
                       <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                       <div class="text-center">
                        <input type="hidden" id="urls" value="<?php echo base_url(); ?>">
                        <button type="submit" class="buton">Submit</button> </div></form>
                    </div>
                    

            </div>
    </div>
</section>

<script type="text/javascript">
    $(document).on('submit', '#loginform',function(e){
    e.preventDefault();

    var formData = new FormData($(this)[0]);
    var urls=$('#urls').val();
    var pro=$('#pro').val();
    var cat=$('#cat').val();
    $.ajax({
      url: urls+'Share/update_password',
      type: 'POST',
      data:formData,
      contentType: false,
      processData: false,
      success: function(data) {

         window.location =urls+'Share/login';
        
        }
    });
});

</script>
<?php
include 'footer.php';
?>