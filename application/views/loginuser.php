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
                   
                            
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Your Email</label>
                                <input type="email"  name="email" class="form-control" required="">
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Password</label>
                                <input type="password"  name="pass" class="form-control" required="">
                            </div>
                       <input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">
                       <div class="text-center">
                        <input type="hidden" id="urls" value="<?php echo base_url(); ?>index.php/">
                        <button type="submit" class="buton">Submit</button> </div></form>
                    </div>
                    <span class="float-left">if you don't register please register <a href="user">signup</a></span>
                    <span class="float-right"><a href="forgot">Forget Password?</a></span>

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
        }else{

          console.log(data);
        // window.location.reload();

         window.location = "<?php $pr=$this->uri->segment(3); $cat=$this->uri->segment(4);  echo base_url('index.php/Share/proquery/'.$pr.'/'.$cat);?>";
        }
        }
    });
});

</script>
<?php
include 'footer.php';