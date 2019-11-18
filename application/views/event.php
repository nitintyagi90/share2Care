<?php

include 'header.php';
?>
<style type="text/css">
	.img-hw{
		width: 100%;height: 420px ! important;
		padding-top: 5%;
	}
</style>


 <section class="sct">
  <div class="container">
    <div class="mainabt">
      <div class="row">
        <div class="col-md-12">
          <div>
            <h3 class="heading-color text-center">Our Events</h3>
            <div class="row">
              <div class="col-md-12">
                <p class="font2 text-justify"><?php echo $event[0]['note1']; ?>

              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</section>

<?php
include 'footer.php';