<?php

include 'header.php';
?>

<section class="mg-tp-50" style="margin-bottom: 20%;">
  <div class="container">
    <h3 class="heading-color text-center">Why Join Share<span class="font-2size">2</span>Care</h3>
    <div class="row">
            <div class="col-md-6">
              <h3 class="text-left heading-color">As Applicant</h3>
                <ul class="Process-list">
               <?php echo $note[0]['note1']; ?>
                </ul>
            </div>
            <div class="col-md-offset-1 col-md-5">
              <h3 class="text-left heading-color">As Experts</h3>
                <ul class="Process-list">
               <?php echo $note[0]['note2']; ?>
                
                </ul>
            </div>
    </div>
  </div>
</section>

<?php
include 'footer.php';