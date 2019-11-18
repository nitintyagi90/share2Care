<?php include 'header.php'; ?>
<div class="header-banner mg-minus mg-btminus">
    <div class="fluid-container">
        <div id="carouselHacked" class="carousel slide carousel-fade box-wrapper" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators hidden-sm hidden-xs">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo base_url();?>new/bootstrap/images/slider-1.png" alt="slider-image" style="width:100%;">
                    <div class="carousel-caption caption-style">
                        <h2>Our Mission</h2>
                        <p><?php echo $slider[0]['des1']; ?></p>

                        <!-- <a href="query.html" class="btn btn-color res-bt">Submit Query</a> -->
                    </div>
                </div>
                <div class="item ">
                    <img src="<?php echo base_url();?>new/bootstrap\images\slider-2.png" alt="slider-image" style="width:100%;">
                    <div class="carousel-caption caption-style">
                        <h2>Education & Career Development </h2>
                        <p><?php echo $slider[0]['des2']; ?></p>

                        <!-- <a href="query.html" class="btn btn-color res-bt">Submit Query</a> -->
                    </div>
                </div>

                <div class="item">
                    <img src="<?php echo base_url();?>new/bootstrap\images\slider-3.png" alt="slider-image" style="width:100%;">
                    <div class="carousel-caption caption-style">
                        <h2>Aashayen (The Hope) - Counselling by Psychologist</h2>
                        <p><?php echo $slider[0]['des3']; ?></p>

                        <!-- <a href="query.html" class="btn btn-color res-bt">Submit Query</a> -->
                    </div>
                </div>

                <div class="item">
                    <img src="<?php echo base_url();?>new/bootstrap\images\slider-4.png" alt="slider-image" style="width:100%;">
                    <div class="carousel-caption caption-style">
                        <h2>Support for Senior Citizens</h2>
                        <p><?php echo $slider[0]['des4']; ?></p>

                        <!-- <a href="query.html" class="btn btn-color res-bt">Submit Query</a> -->
                    </div>
                </div>

                <div class="item ">
                    <img src="<?php echo base_url();?>new/bootstrap\images\slider-5.png" alt="slider-image" style="width:100%;">
                    <div class="carousel-caption caption-style">
                        <h2>Health Care </h2>
                        <p><?php echo $slider[0]['des5']; ?></p>

                        <!-- <a href="query.html" class="btn btn-color res-bt">Submit Query</a> -->
                    </div>
                </div>

                <div class="item">
                    <img src="<?php echo base_url();?>new/bootstrap\images\slider-6.png" alt="slider-image" style="width:100%;">
                    <div class="carousel-caption caption-style">
                        <h2>Financial Management </h2>
                        <p><?php echo $slider[0]['des6']; ?></p>

                        <!-- <a href="query.html" class="btn btn-color res-bt">Submit Query</a> -->
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control width-arrow" href="#carouselHacked" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control width-arrow" href="#carouselHacked" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>