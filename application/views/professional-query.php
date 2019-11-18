<?php

include 'header.php';
?>

<section class="mg-tp-50" style="margin-bottom: 12%;">
  <div class="container">
    <div class="mainabt">
      <h3 class="heading-color text-center">Submit Query</h3></div>
      <div class="col-md-6">
        <h3 class="text-left">Process flow for submitting query</h3>
        <ul class="Process-list">
          <li>Visit “www.share2care.co” website.</li>
          <li>Select “Submit Query” option, and submit your details &amp; the query.</li>
          <li>On receipt of the communication by us, you will receive acknowledgement (SMS/Email).</li>
          <li>The concerned subject matter expert shall give solutions to resolve your issue, which will be communicated to you (email).</li>
          <li>You may be happy with the solution.</li>
          <li>If NOT, please revert back to us, using step (ii) above.</li>
          <li>Now, we shall fix an appointment with the expert and let you know the appointment details.</li>
          <li>You will get opportunity to discuss the matter with subject matter expert to resolve your problem.</li>
          <li>You may be happy with the solution.</li>
          <li>In case, you query is still unresolved, please revert back to us, using step (ii) above.</li>
          <li>We shall take it further to resolve the issue.</li>
        </ul>
      </div>

      <?php $id= $_SESSION['sessionid'];
      $where='id';
      $table='Users';
      $name=$this->Adminmodel->select_comm_where($where,$id,$table); 


      $id = '101';
      $where='country_id';
      $table='states';
      $states=$this->Adminmodel->select_comm_where($where,$id,$table); 

      ?>

      <div class="col-md-offset-1 col-md-5">
        <form id="loginform1" method="post">
          <div class="form-group">
            <label for="name">Name<sup>*</sup></label>
            <input type="text" class="form-control" id="name" value="<?php echo $name[0]['u_name']; ?>" name="name" placeholder="Enter your Name"required>
          </div>
          <input type="hidden" name="profession" value="<?php echo $this->uri->segment(3); ?>">
          <input type="hidden" name="cat" value="<?php echo $this->uri->segment(4); ?>">

          <div class="row" style="margin-bottom: 3%;">
            <div class="col-12 col-md-6">
              <label for="name">Mobile Number<sup>*</sup></label>
              <input type="text" class="form-control" value="<?php echo $name[0]['u_phone']; ?>" id="mobile" name="mobile" placeholder="Enter your Mobile Number"required>
            </div>
            <div class="col-12 col-md-6">
             <label for="name">Email<sup>*</sup></label>
             <input type="email" class="form-control"  readonly="" value="<?php echo $_SESSION['sessionemail'] ?>" id="email" name="email" placeholder="Enter your Email"required>
           </div>
         </div>
         <!-- <div class="form-group">
          <label for="name">Email<sup>*</sup></label>
          <input type="email" class="form-control"  readonly="" value="<?php // echo $_SESSION['sessionemail'] ?>" id="email" name="email" placeholder="Enter your Email"required>
        </div> -->
        <div class="form-group">
          <label for="name">Address<sup>*</sup></label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter your Address" required value="<?php $name[0]['address'] ?>">
        </div>

        <div class="row" style="margin-bottom: 3%;">


          <div class="col-12 col-md-6">
            <label for="name">State<sup>*</sup></label>

            <select name="state" class="form-control option-list" required onchange="cityy()" id="cit" value="<?php echo $name[0]['u_state']; ?>">
              <option value="" disabled="">---- Select ----</option>
              <?php foreach ($states as  $values) {  ?>  

                <option value="<?php echo $values['id']; ?>" <?php if($values['id']==$name[0]['u_state']){echo "selected"; } ?>><?php echo $values['name']; ?></option>


              <?php } ?>
            </select>

          </div>


          <div class="col-12 col-md-6">
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


        </div>

        <div class="form-group">
          <label>Message<sup>*</sup></label>
          <textarea class="form-control" id="message" rows="3"  maxlength="50" name="comment" required></textarea>
        </div>
        <div class="text-center mt-4">

          <button type="submit" class="btn btn-color">Submit</button>
        </div>
        <div class="login_result2 error2" style="display: none;"  >query submit</div>

        <input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/"> 
      </form>
    </div>
  </div>
</section>
<?php
include 'footer.php';
?>
<script type="text/javascript">
  $(document).on('submit', '#loginform1',function(e){
    e.preventDefault();

    var formData = new FormData($(this)[0]);
    var urls=$('#url').val();
    $.ajax({
      url: urls+'Share/addproquery',
      type: 'POST',
      data:formData,
      contentType: false,
      processData: false,
      success: function(data) {


       /* if(data=='pass'){
          $('.login_result2.error2').css('color', 'red');
          $('.login_result2.error2').show();

        }else{
         $('.login.success').css('color', 'red');
         $('.login.success').show();
         window.setTimeout(function() {
           window.location.href=urls+'Share/query';}, 300);
       }*/
     }
   });
  });

</script> 