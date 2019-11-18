<?php

include 'header.php';
?>
<!--------------------------- Information Section Starts -------------->
<section class="mg-tp-60">
    <div class="container">
        <div class="row">
            <div>

                <h3 class="heading-color text-center" style="margin-top:-10px;">Counselling by Psychologist</h3>
            </div>
            <div class="col-md-12">
                <p>Just as for physically health, there are doctors, for mental well being, it is essential to contact Psychologist, for taking care of stigma around mental health.</p>
                <p>When one (no matter what age, gender or cultural background) is unable to cope with incidences like disputes in family, break up of relationship, loss of loved one, loss in business, disputes/pressures at work place, property disputes, loneliness, pressure in studies which causes depression, stress, anxiety and shake confidence, counselling can help to provide strategies to cope with for managing such situation.</p>
                <p>Thus, <b>Counselling</b> is a talk therapy with application of psychological or human development principles that addresses wellness & personal development. A counselor is not there to advise or direct, it is to EMPOWER the needy through rationalizing of thoughts & feelings.</p>
                <p><b>Depending of situation counseling can be as follows – </b></p>
                <p><b>Individual Counselling :-&nbsp;</b>Individual counselling involves a single person that solves the emotional difficulties such as depression, anxiety, harassment, grief, trauma, low self-esteem, guilt, interpersonal problems, stress, and problems in living. It helps them to have a clear vision of their own self.</p>
                <p>Further, Adolescents or teenagers may suffers from different level of anxiety and depression, if the same remain untreated, it may lead to worse consequences like suicide or adopting criminal way of life. Adolescent counselling (as individual counseling) helps such youngsters to make sense of their feelings, thoughts and behaviour.</p>
                <p><b>Couple/Marriage Counselling :-&nbsp;</b>Fact is very few relationships exist conflict-free. Hence counseling is to resolve issues like odd tiff, full-blown arguments, and frequent fights with your partner or you have simply stopped having fun. </p>
                <p><b>Workplace Counselling :-&nbsp;</b>It is for providing a non-judgmental, empathic and accessible means to allow an employee to find a way forward by coming out of work related stress, anxiety, low in self-esteem and identify their true strength and get bounce back in their professional life with full throttle to excel and grow.</p>
                <p><b>Mental Health – </b>Anxiety, Chronic Pain, Depression, Eating Disorders, Insomnia</p>
                <p><b>Personality Problems - </b>Lack of confidence, Shyness, Develop self esteem, assertiveness, anger.</p>
                <p><b>Personal Growth - </b>Learn to Set Goals in life, Achieve Happiness in life, Develop Positive thinking</p>
                <p><b>Relationships - </b>Relationship difficulties, Combat separation or divorce</p>
                <p><b>Emotional Management – </b>Anger, Stress</p>
                <p><b>Betterment of Family Life –</b> Parenting, Fighting old age depression, Address to adolescence issues</p>
            </div>
        </div>
    </section>
    <!-------------------- Information Section Ends ----------------------------------->

<!-------- list -------->
<style>
h2{text-align:center; padding: 20px;}
/* Slider */
.slick-slide { margin: 0px 20px;}
.slick-slide img { width: 100%;}
.slick-slider
{position: relative; display: block; box-sizing: 
border-box;   -webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
-webkit-touch-callout: none;
-khtml-user-select: none;
-ms-touch-action: pan-y;
touch-action: pan-y;
-webkit-tap-highlight-color: transparent;
}
.slick-list{position: relative;display: block;overflow: hidden;margin: 0;padding: 0;}
.slick-list:focus{ outline: none;}
.slick-list.dragging { cursor: pointer; cursor: hand;}
.slick-slider .slick-track,
.slick-slider .slick-list{-webkit-transform: translate3d(0, 0, 0);-moz-transform: translate3d(0, 0, 0);-ms-transform: translate3d(0, 0, 0);-o-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0);}
.slick-track{position: relative; top: 0;left: 0; display: block;}
.slick-track:before,.slick-track:after{ display: table; content: '';}
.slick-track:after{ clear: both;}
.slick-loading .slick-track{ visibility: hidden;}
.slick-slide{display: none; float: left; height: 100%; min-height: 1px;}
[dir='rtl'] .slick-slide{ float: right;}
.slick-slide img{ width:200px; height:150px; display: block;}
.slick-slide.slick-loading img{display: none;}
.slick-slide.dragging img{ pointer-events: none;}
.slick-initialized .slick-slide{ display: block;}
.slick-loading .slick-slide{ visibility: hidden;}
.slick-vertical .slick-slide{ display: block; height: auto; border: 1px solid transparent;}
.slick-arrow.slick-hidden {display: none;}
</style>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="container">
<section class="customer-logos slider">
      <?php 
      $id='6';
      $where='p_cat';
      $table='proffesional';
      $name=$this->Adminmodel->select_comm_where($where,$id,$table);
      foreach ($name as $value) {
       ?>   
<?php 
if(isset($value['p_image']) && $value['p_image'] != base_url().'image/' )
{
?>
<div class="slide"><img src="<?php echo $value['p_image']; ?>" class="img-responsive" >
<center><b><?php echo $value['p_name']; ?></b><br />
<span data-toggle="modal" data-target="#myModal<?php echo $value['id']; ?>">View Details</span></center>
<!--<a href="<?php echo base_url('index.php/Share/proquery/'.$value['id'].'/10' );?>" class="bt-colors">Submit Enquiry</a>-->
</div>


<?php
}
else
{
?>
<div class='slide'><img src='<?php echo base_url() ?>/image/user.svg' class='img-responsive'>
<center>No Expert in this Category</center>
<a href='<?php echo base_url('index.php/Share/loginuser/'.$value['id'].'/10' );?>' class='bt-color'>Submit Enquiry</a></div>
<?php
}
?>
<?php }  ?>
</section>
</div>
<script id="rendered-js">
$(document).ready(function () {
$('.customer-logos').slick({
slidesToShow: 6, slidesToScroll: 1, autoplay: true, autoplaySpeed: 1500, arrows: false, dots: false, pauseOnHover: false, 
responsive: [{ breakpoint: 768, settings: { slidesToShow: 4 } }, 
{breakpoint: 520, settings: { slidesToShow: 3 } }] });
});
</script>
<!-------- list -------->
 <?php 
      $id='6';
      $where='p_cat';
      $table='proffesional';
      $name=$this->Adminmodel->select_comm_where($where,$id,$table);
      foreach ($name as $value) {
       ?>   
<?php 
if(isset($value['p_image']) && $value['p_image'] != base_url().'image/' )
{
?>
<style type="text/css">
.lib-panel {margin-bottom: 0Px;}
.lib-panel img {width: 100%; height: 50%; background-color: transparent;}
.lib-panel .row,.lib-panel .col-md-6 { padding: 0;  background-color: #FFFFFF;}
.lib-panel .lib-row { padding: 0 20px 0 20px;}
.lib-panel .lib-row.lib-header { background-color: #FFFFFF; font-size: 20px; padding: 10px 20px 0 20px;}
.lib-panel .lib-row.lib-header .lib-header-seperator { height: 2px; width: 100%; background-color: #d9d9d9; margin: 7px 0 7px 0;}
.lib-panel .lib-row.lib-header-seperator { height: 2px; width: 100%; background-color: #000; margin: 7px 0 7px 0;}
.lib-panel .lib-row.lib-desc {position: relative; height: 100%; display: block; font-size: 13px;}
.lib-panel .lib-row.lib-desc a{position: absolute; width: 100%; bottom: 10px; left: 20px;}
.row-margin-bottom {margin-bottom: 20px;}
.box-shadow {-webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.10); box-shadow: 0 0 10px 0 rgba(0,0,0,.10);}
.no-padding { padding: 0;}
</style>
<div class="container">
<div class="modal fade" id="myModal<?php echo $value['id']; ?>" role="dialog">
<div class="modal-dialog">    
<div class="modal-content">
<div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Expert Info</h4></div>
<div class="modal-body"> 
<div class="col-md-12 no-padding lib-item" data-category="ui">
<div class="lib-panel">
<div class="row box-shadow">
<div class="col-md-4"><img class="lib-img img-responsive" src="<?php echo $value['p_image']; ?>" width="200px" height="150px"></div>
<div class="col-md-8">
<div class="lib-row lib-header"><?php echo $value['p_name']; ?>
<div class="lib-header-seperator"></div>
</div>
<div class="lib-row lib-desc"><?php echo $value['p_description']; ?></div>
<div class="lib-row lib-desc">+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++</div>
<div class="lib-row lib-desc"><b>Full Name:</b> <?php echo $value['p_name']; ?></div>
<div class="lib-row lib-desc"><b>Designation:</b> <?php echo $value['p_destination']; ?></div>
<div class="lib-row lib-desc"><b>Experience:</b> <?php echo $value['p_experience']; ?></div>
<?php 
      $id='6';
      $where='id';
      $table='category';
      $name=$this->Adminmodel->select_comm_where($where,$id,$table);
      foreach ($name as $values) {
       ?><?php 
if(isset($values['name']) && $value['name'] != base_url().'image/' )
{?>
<div class="lib-row lib-desc"><b>Category:</b> <?php echo $values['name']; ?></div><?php } else { ?>
<?php } ?>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
</div>
</div>
</div>  
</div>
<?php
}
else
{
?>
<?php
}
?>
<?php }  ?>
<p><br /></p>
<?php include 'footer.php'; ?>
