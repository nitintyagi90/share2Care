<?php
include 'header.php';
?>
<section class="mg-tp-50" style="padding: 50px 0px 125px 0px;">
    <div class="container">
        <div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6 col-sm-12 padd-login">
              <h3 class="heading-color text-center mg-bt-30">Forgot Password</h3>
                    <div class="formsec pdd">
                         
                             <form id="loginform" method="post">
                   <input type="hidden" name="pro" value="<?php echo $this->uri->segment(3); ?>">
                   <input type="hidden" name="cat" value="<?php echo $this->uri->segment(4); ?>">
                      
                           <div class="login_result error" style="display: none;"  >Mail Sent to your Email Successfully </div>

      <div class="login success" style="display: none;"  >Thanks For Contacting us Team Will Contact us Shortly. </div>
                 <div class="login_result1 error1" style="display: none;"  >Email Not Existed</div>
                   
                            
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Your Email</label>
                                <input type="email"  name="emails" class="form-control">
                            </div>
                           
                       <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                       <div class="text-center">
                        <input type="hidden" id="urls" value="<?php echo base_url(); ?>"><br/>
                        <button type="submit" class="btn btn-color">Send Email</button> </div></form>
                    </div>
           

            </div>
            <div class="col-md-3"></div>
    </div></div>
</section>


<?php
include 'footer.php';
?>
<script type="text/javascript">
    $(document).on('submit', '#loginform',function(e){
    e.preventDefault();

    var formData = new FormData($(this)[0]);
    var urls=$('#urls').val();

    $.ajax({
      url: urls+'Share/Reset',
      type: 'POST',
      data:formData,
      contentType: false,
      processData: false,
      success: function(data) {

        if(data=='database'){
            $('.login_result1.error1').css('color', 'red');
                $('.login_result1.error1').show();
        }else if(data=='done'){
            $('.login_result.error').css('color', 'red');
                $('.login_result.error').show();
        }
        }
    });
});

</script>