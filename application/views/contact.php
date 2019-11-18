<?php

include 'header.php';
?>

 <!-- Information Section Starts -->
    <section class="sec">
        <div class="container">
                <h3 class="heading-color text-center" style="margin-bottom: 4%;">Contact Us</h3>
            <div class="row">
                <div class="col-md-5 col-sm-4">
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.0436453058755!2d77.37475531451037!3d28.628453982419337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce551280894fd%3A0xd3ac55cec921531d!2sShilp+Indya+Designs+and+Developers+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1539159407315" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="styl">
                        <span>Address: </span><span class="styl2">H-69, Sector-63, Noida-201301.</span><br/>
                        <a href="#">GET DIRECTION</a>
                        <br>
                        <span>Phone: </span><span class="styl2"> 0120-4292731</span>
                        <br>
                        <span>Email:&nbsp;</span><span class="styl2">info.share2care@gmail.com</span>
                    </div>
                </div>
                <div class="col-md-7 col-sm-8">
                    <div class="formsec">
                        <span>Feel free to send us any questions you may have. We are happy to answer them.</span>
                        <br>
                         <div class="login_result error" style="display: none;"  >Thanks for Contacting us we representative will contact you</div>
                        <form action="<?php echo base_url('Share/'); ?>" id="loginform" method="post">
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Your Name<sup>*</sup></label>
                                <input type="text" id="name" name="name" required class="form-control">
                            </div>
                            <input type="hidden" name="type" value="contact">
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Your Email<sup>*</sup></label>
                                <input type="email" id="email" name="email" required  class="form-control" required>
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Phone<sup>*</sup></label>
                                <input type="number" id="phone" name="phone" required class="form-control">
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>I'm interested in</label>
                                    <select name="interest" id="interest"  class="form-control option-list" required>
                                        <option>---- Select ----</option>
                                        <option value="Support for Senior Citizens">Support for Senior Citizens</option>
                                         <option value="Miscellaneous">Miscellaneous</option>
                                          <option value="Health Care">Health Care</option>
                                         <option value="Aashayen (The Hope)(Counselling by Psychologist)">Aashayen (The Hope)(Counselling by Psychologist)</option>
                                         <option value="Skill Development">Skill Development</option>
                                         <option value="Financial Management">Financial Management</option>
                                         <option value="Woman Empowerment">Woman Empowerment</option>
                                    </select>
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label>Message</label>
                                <textarea class="form-control" id="message" name="message"  rows="7"  required></textarea>
                            </div>
                             <div class="padd-tp8">
                                <input type="Submit" onclick="submitfunction();" data-loading-text="Please wait..." class="btn btn-color" style="height: 45px;">
                            </div>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
       
    </section>
    <input type="hidden" id="url" value="<?php echo base_url(); ?>">
    <!-- Information Section Ends -->
<?php
include 'footer.php';
?>
 <script type="text/javascript">

        function submitfunction(){
            var urls = $("#url").val();
            var name= $("#name").val();
            var email= $("#email").val();
            var phone= $("#phone").val();
            var interest= $("#interest").val();
            var message= $("#message").val();
            if (name=='') {alert("Please Enter Your Name");exit();}
            else if (email=='') {alert("Please Enter Your Email");exit();}
            else if (phone == '') { alert("Please Enter Your Mobile No"); exit(); }
            else {
                $.ajax({
                type: "POST",
                url: urls+"Share/mail",
                data: { name: name, email: email, phone: phone,interest:interest, message: message },
                cache: false,
                success: function (result) {
                alert("Thank u for submitting your query. Our executive will contact as soon as possible.");
                location.reload(true);
                }
                });
            }
            }
</script>
<!-- <script type="text/javascript">
    $(document).on('submit', '#loginform',function(e){
    e.preventDefault();

    var formData = new FormData($(this)[0]);
    var urls=$('#url').val();
    
    $.ajax({
      url: urls+'Share/contactus',
      type: 'POST',
      data:formData,
      contentType: false,
      processData: false,
      success: function(data) {

        if(data=='mail'){
            $('.login_result.error').css('color', 'red');
                $('.login_result.error').show();

        window.setTimeout(function() {
          window.location.href=urls+'Share/contact';}, 3000);
        }
        
        }
    });
});

</script> -->