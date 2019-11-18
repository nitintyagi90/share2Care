<?php

include 'header.php';
?>

  <!---------------------------- About --------------------------------->
  <section class="sct">
			<div class="container">
				<div class="mainabt">
					<div class="row">
						<div class="col-md-12">
							<div>
								<h3 class="heading-color text-center">What We Do</h3>
                <div class="row">
                  <div class="col-md-6">
								<p class="font2 text-justify"><?php echo $about[0]['note1']; ?>
                 
                </p></div>

                <div class="col-md-6" style="padding-left: 5%">
                 

 <!-- https://www.youtube.com/watch?v=QhxF4OsNS70 -->
                 
                  <iframe width="100%" height="420px" src="https://www.youtube.com/embed/QhxF4OsNS70" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   <!-- <video width="100%" height="400px" controls="">

                
                  </video> -->
                
                </div>
              </div>


                <!-- <h3 class="heading-color text-left">Process flow for submitting query</h3>
                <ul class="Process-list">
                  <li>Visit share2care.co website.</li>
                  <li>Select “Submit Query” option, and submit your details & the query.</li>
                  <li>Then, you will receive acknowledgement by SMS/Email. </li>
                  <li>The concerned subject matter expert shall give suggestions to resolve your issue, by email.</li>
                  <li>If you need further support, please revert back to us, using step (ii) above. </li>
                  <li>As required, you may be given an appointment with the expert and let you know the appointment details.</li>
                  <li>On discussing the matter with subject matter expert, your issue may be resolved. </li>
                  <li>In case, you query is still remains unresolved, please revert back to us, using step (ii) above.</li>
                  <li>We shall take it further to resolve the issue.</li>
                </ul> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
  <!---------------------------- About --------------------------------->

  <!---------------------------- About Information Starts --------------------->
  <section class="sct backcolr">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="contentbox">
							<?php echo $about[0]['note2']; ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contentbox">
						<?php echo $about[0]['note3']; ?>

						</div>
					</div>
					<div class="col-md-4">
						<div class="contentbox">
							<?php echo $about[0]['note4']; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
  <!---------------------------- About Information Ends ----------------------->
  <!---------------------------- Parallex Section Starts ---------------------->
  <!-- <section>
			<div class="parallax1">
				<div class="container">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="slideshow-container">
								<div class="mySlides1">
									<q class="font1">I love you the more in that I believe you had liked me for my own sake and for nothing else</q>
									<p class="author font2">- John Keats</p>
								</div>
								<div class="mySlides1">
		  							<q class="font1">But man is not made for defeat. A man can be destroyed but not defeated.</q>
		  							<p class="author font2">- Ernest Hemingway</p>
								</div>
								<div class="mySlides1">
		  							<q class="font1">I have not failed. I've just found 10,000 ways that won't work.</q>
		  							<p class="author font2">- Thomas A. Edison</p>
								</div>
							</div>
							<div class="dot-container">
  								<span class="dot" onclick="currentSlide(1)"></span> 
  								<span class="dot" onclick="currentSlide(2)"></span> 
  								<span class="dot" onclick="currentSlide(3)"></span> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides1");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script> -->

  <!---------------------------- Parallex Section Ends ------------------------>
  <!---------------------------- What we blv Starts --------------------------->
<!--   <section class="sct backcolr" style="margin-bottom: 2%;">
      <div class="container blvsec">
        <h2 class="font1">What We Believe</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="blvstyle">
              <center><i class="font1">1.</i></center>
              <h4 class="font1">God is Good</h4> -->
              <!-- <p class="font2">Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna.</p> -->
           <!--  </div>
          </div>
          <div class="col-md-4">
            <div class="blvstyle">
              <center><i class="font1">2.</i></center>
              <h4 class="font1">Nothing is Impossible</h4>
              <p class="font2">Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="blvstyle">
              <center><i class="font1">3.</i></center>
              <h4 class="font1">We are Significant</h4> -->
              <!-- <p class="font2">Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna.</p> -->
           <!--  </div>
          </div>
        </div>
      </div>
    </section> -->
  <!---------------------------- What we blv Ends ----------------------------->
  <!---------------------------- Parallex Section Starts ---------------------->
<!--   <section>
      <div class="parallax">
        <div class="container">
          <div class=" row">
            <div class="col-md-5">
              <div class="prlx">
                <span class="font2">MEET THE LEAD PASTORS</span>
                <h2 class="font1">Jane & Robert Smith</h2>
                <p class="font2">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna.</p>
                <a href="#">READ MORE</a>
              </div>
            </div>
            <div class="col-md-7"></div>
          </div>
        </div>
      </div>
    </section> -->
  <!---------------------------- Parallex Section Ends ------------------------>

 <?php
include 'footer.php';