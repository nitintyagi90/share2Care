<?php 

if($_POST['type']=='query'){
$to = "info.share2care@gmail.com";
//$to = "sanjeev@technowhizz.in";
$subject = "Enquiry Details ";
$txt = "Name - ".$_POST['name']."\n Mobile -".$_POST['mobile']."\n Landline -".$_POST['Phone']."\n email -".$_POST['email']."\n address -".$_POST['address']."\n City -".$_POST['city']."\n State -".$_POST['state']."\n category -".$_POST['category']."\n message -".$_POST['message'];
$headers = "From: webmaster@example.com";

mail($to,$subject,$txt,$headers);
}elseif($_POST['type']=='expert'){
   $to = "info.share2care@gmail.com";
//$to = "sanjeev@technowhizz.in";

$subject = "Professional Enquiry Details ";
$txt = "Name - ".$_POST['name']."\n Mobile -".$_POST['phone']."\n email -".$_POST['email']."\n Interest In -".$_POST['interest']."\n Message -".$_POST['Message'];
$headers = "From: webmaster@example.com";

mail($to,$subject,$txt,$headers);
}elseif($_POST['type']=='user'){

   $to = "info.share2care@gmail.com";
//$to = "sanjeev@technowhizz.in";
    
$subject = "User Enquiry Details ";
$txt = "Name - ".$_POST['name']."\n Mobile -".$_POST['phone']."\n email -".$_POST['email']."\n Interest In -".$_POST['interest']."\n Message -".$_POST['Message'];
$headers = "From: webmaster@example.com";

mail($to,$subject,$txt,$headers);
}elseif($_POST['type']=='contact'){

   $to = "info.share2care@gmail.com";
//$to = "sanjeev@technowhizz.in";
    
$subject = "Contact Enquiry Details ";
$txt = "Name - ".$_POST['name']."\n Mobile -".$_POST['phone']."\n email -".$_POST['email']."\n Interest In -".$_POST['interest']."\n Message -".$_POST['Message'];
$headers = "From: webmaster@example.com";

mail($to,$subject,$txt,$headers);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home || Share2Care</title>
    <meta charset="utf-8">

    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/circle.css" />

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body>
    <section class="top-info">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="align-center">
                        <i class="fa fa-envelope" aria-hidden="true"></i>&emsp;info.share2care@gmail.com
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="text-right align-center">
                        <i class="fa fa-phone" aria-hidden="true"></i>&emsp;+ 0120-4292731
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------------------- navbar ---------------------->
    <nav class="navbar navbar-default navb" data-spy="affix" data-offset-top="197">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="bootstrap/images/logo-new.png" alt="awesome-logo" class="img-responsive hght"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav pull-right mar pos-nav nav-linkshover">
                    <li><a href="index.html" class="colr grow">Home</a></li>
                    <li><a href="about.html" class="colr grow">About Us</a></li>
                    <li><a href="expert.html" class="colr grow">Experts</a></li>
                    <li><a href="contact.html" class="colr grow">Contact Us</a></li>
                    <li class="dropdown bckclr">
                        <a class="dropdown-toggle colr grow" data-toggle="dropdown" href="#">Join Now &nbsp; <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu drp drp-weight">
                            <li><a href="join-user.html" class="bckclr1" style="padding-bottom: 10px;">User</a></li>
                            <li><a href="join-expert.html" class="bckclr1">Professional</a></li>
                        </ul>
                    </li>
                    <li class="dropdown bckclr">
                        <a class="dropdown-toggle colr grows" data-toggle="dropdown" href="#">Sign In &nbsp; <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu drp drp-weight">
                            <li><a href="#" class="bckclr1">Admin</a></li>
                            <li><a href="#" class="bckclr1">User</a></li>
                            <li><a href="#" class="bckclr1">Professional</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="donate-bt dnt color-bt-nav">Donate Now</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!-- navbar ends -->
    <section>
        <div class="container">
            <center>
                <h3 style="margin-bottom: 58px; margin-top: 49px;">Thanks for Submitting Your Query, We Will Contact You Soon!</h3>
                <a href="http://share2care.co/" class="donate-bt dnt color-bt-nav" style="padding: 14px 20px; text-decoration: none;">Go To Home</a><br><br><br><br><br>
            </center>
        </div>
    </section>
<!--footer-start -->
  <footer class="mainftr">
        <div class="container">
            <div class="row pd-tpbt">
                <div class="col-md-3">
                    <h3 class="mg-bt-30">Quick Links</h3>
                    <ul class="list-unstyled colo-navlink">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="expert.html">Experts</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-md-4 text-center">
                    <h3 class="mg-bt-30">Connect with us</h3>
                    <div class="socialmedia">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/Share2care-Foundation-1833132220058032/" target="_blank">
                                    <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" target="_blank">
                                    <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" target="_blank">
                                    <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" target="_blank">
                                    <i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" target="_blank">
                                    <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <div class="ih-item circle effect13 bottom_to_to">
                        <a href="#">
                            <div class="img size-round"><img src="images/donate.png" alt="img"></div>
                            <div class="info  size-round">
                                <div class="info-back back1">
                                    <h3>Donate Now</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  <!-- footer-end -->
  <!-- footer-copyright-start-->
    <section class="ftr2">
        <div class="container text-center">
            <p>Copyright &copy; 2018 <span>Share2Care</span>. All Rights Reserved</p>
        </div>
    </section>
<!--footer-copyright-end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
<script type="text/javascript">
    function myfunction(){
//alert("gghgg");
        var name = $("#name").val();
        var phone = $("#phone").val();
        var mobile = $("#mobile").val();
        var address = $("#address").val();
        var email = $("#email").val();
        var city = $("#city").val();
        var state = $("#state").val();
        //var professional = $("#professional").val();
        var category = $("#category").val();
        var message = $("#message").val();
        $.ajax({

    type: "POST",

    url: "mail.php",

    data: {name:name,phone:phone,mobile:mobile,address:address,email:email,city:city,state:state,category:category,message:message},

    cache: false,

    success: function(result){

        

  // alert(result);

    }

    });
    }

</script>