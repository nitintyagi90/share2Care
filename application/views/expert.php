<?php

include 'header.php';
?>
<script type="text/javascript">
        $(document).ready(function() {
            //Center the "info" bubble in the  "circle" div
            var divTop = ($("#divCircle").height() - $("#middleBubble").height()) / 2;
            var divLeft = ($("#divCircle").width() - $("#middleBubble").width()) / 2;
            $("#middleBubble").css("top", divTop + "px");
            $("#middleBubble").css("left", divLeft + "px");

            //Arrange the icons in a circle centered in the div
            numItems = $("#divCircle img").length; //How many items are in the circle?
            start = 0.25; //the angle to put the first image at. a number between 0 and 2pi
            step = (2 * Math.PI) / numItems; //calculate the amount of space to put between the items.

            //Now loop through the buttons and position them in a circle
            $("#divCircle img").each(function(index) {
                radius = ($("#divCircle").width() - $(this).width()) / 2; //The radius is the distance from the center of the div to the middle of an icon
                //the following lines are a standard formula for calculating points on a circle. x = cx + r * cos(a); y = cy + r * sin(a)
                //We have made adjustments because the center of the circle is not at (0,0), but rather the top/left coordinates for the center of the div
                //We also adjust for the fact that we need to know the coordinates for the top-left corner of the image, not for the center of the image.
                tmpTop = (($("#divCircle").height() / 2) + radius * Math.sin(start)) - ($(this).height() / 2);
                tmpLeft = (($("#divCircle").width() / 2) + radius * Math.cos(start)) - ($(this).width() / 2);
                start += step; //add the "step" number of radians to jump to the next icon

                //set the top/left settings for the image
                $(this).css("top", tmpTop);
                $(this).css("left", tmpLeft);
            });

            //set the highlight and bubble default based on the homepageGridDefault class
            currentGridSelector = $(".homepageGridDefault").attr("id");
            $("#" + currentGridSelector).attr("src", "<?php echo base_url();?>new/images/home-" + currentGridSelector + "-icon-on.png");
            $("#middleBubble").html("<p><b>" + $(".homepageGridDefault").data("bubble1") + "</b><br />" + $(".homepageGridDefault").data("bubble2") + "</p>");

            //Setup the grid to change the highlighted bubble on mouseover ans click
            $("#divCircle img").mouseover(function() {
                //if the selected option has changed, deactivate the current selection
                if (currentGridSelector != $(this).attr("id")) {
                    $("#" + currentGridSelector).attr("src", "<?php echo base_url();?>new/images/home-" + currentGridSelector + "-icon-off.png");
                }
                //turn on the new selection
                $(this).attr("src", "<?php echo base_url();?>new/images/home-" + $(this).attr("id") + "-icon-on.png");
                //set the content of the center bubble
                $("#middleBubble").html("<p><b>" + $(this).data("bubble1") + "</b><br />" + $(this).data("bubble2") + "</p>");
                currentGridSelector = $(this).attr("id");
            });
        });
    </script>
<!-- round-section -->
     <section class="back-img" id="expert">
        <h3 class="heading-color text-center mg-bt-30">Fields of Expertise</h3>
        <div id="divCircle">
            <div id="middleBubble">&nbsp;</div>
            <a href="<?php echo base_url('index.php/education');?>" target="_blank"><img src="<?php echo base_url();?>new/images/home-img-1-icon-off.png" id="img-1" data-bubble1="Education & Career Development" data-bubble2="" class="homepageGridDefault"></a>
            <a href="<?php echo base_url('index.php/doctor');?>" target="_blank"><img src="<?php echo base_url();?>new/images/home-img-2-icon-off.png" id="img-2" data-bubble1="Health Care" data-bubble2=""></a>
            <a href="<?php echo base_url('index.php/women');?>" target="_blank"><img src="<?php echo base_url();?>new/images/home-img-3-icon-off.png" id="img-3" data-bubble1="Woman Empowerment" data-bubble2=""></a>
            <a href="<?php echo base_url('index.php/hope');?>" target="_blank"><img src="<?php echo base_url();?>new/images/home-img-5-icon-off.png" id="img-5" data-bubble1="Aashayen (The Hope)" data-bubble2="(Counselling by Psychologist)"></a>
            <a href="<?php echo base_url('index.php/skill');?>" target="_blank"><img src="<?php echo base_url();?>new/images/home-img-6-icon-off.png" id="img-6" data-bubble1="Skill Development" data-bubble2=""></a>
            <a href="<?php echo base_url('index.php/business');?>" target="_blank"><img src="<?php echo base_url();?>new/images/home-img-7-icon-off.png" id="img-7" data-bubble1="Financial<br/> Management" data-bubble2=""></a>
            <a href="<?php echo base_url('index.php/family');?>" target="_blank"><img src="<?php echo base_url();?>new/images/home-img-8-icon-off.png" id="img-8" data-bubble1="Support for <br/>Senior Citizens" data-bubble2=""></a>
            <a href="<?php echo base_url('index.php/Miscellaneous');?>" target="_blank"><img src="<?php echo base_url();?>new/images/home-img-9-icon-off.png" id="img-9" data-bubble1="Miscellaneous" data-bubble2=""></a>
        </div>
    </section>
    <!-- round-section -->
<?php
include 'footer.php';

