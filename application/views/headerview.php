<!DOCTYPE html>
<html lang="en">
<head>
<title>Home || Share2Care</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" href="<?php echo base_url();?>new/images/fav.png" type="image/png" sizes="16x16">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>new/bootstrap/css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>new/bootstrap/css/circle.cssa" />
<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<style>
.Wrapper {
height: 100% !important;
width: 100% !important;
margin: 0 auto;
}
</style>
<?php
$inactive = 180; 
ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours
session_start();
if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
// last request was more than 2 hours ago
session_unset();     // unset $_SESSION variable for this page
session_destroy();   // destroy session data
}
$_SESSION['testing'] = time();
$this->output->set_header("HTTP/1.1 200 OK");
$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
$this->output->set_header("Pragma: no-cache");
?>
</head>
<body>
<div class="Wrapper">
<section class="top-info">
<div class="container-fluid">
<div class="row">
<div class="col-md-6 col-sm-12 col-xs-12">
<div class="align-center"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;info.share2care@gmail.com</div>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
<ul class="list-unstyled list-inline text-right link-social res-textcenter" style="margin-bottom: 0px;">
<li class="list-inline-item"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+ 0120-4292731</li>
<li class="list-inline-item"><a href="https://www.facebook.com/Share2care-Foundation-1833132220058032/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
<li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
<li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
</section>
<!----------------------- navbar ---------------------->
<nav class="navbar navbar-default navb" data-spy="affix" data-offset-top="197">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>new/bootstrap/images/logo-new.png" alt="logo" class="img-responsive hght"></a>
</div>
<?php  $page =  $this->uri->segment(1); ?>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav pull-right mar pos-nav nav-linkshover">
<?php if($page == ''){ ?>
<li><a href="<?php echo base_url(); ?>" class="colr grow  current">Home</a></li>
<?php }else{ ?>
<li><a href="<?php echo base_url(); ?>" class="colr grow  ">Home</a></li>
<?php } ?>
<?php if($page == 'about'  || $page == 'why' || $page == 'process'){ ?>
<li class="dropdown bckclr"><a class="dropdown-toggle colr grows current" data-toggle="dropdown" href="#">About Us <i class="fa fa-angle-down" aria-hidden="true"></i></a>
<ul class="dropdown-menu drp drp-weight">
<li><a href="<?php echo base_url('about');?>" class="bckclr1" style="padding-bottom: 10px;">What We Do</a></li>
<li><a href="<?php echo base_url('why');?>" class="bckclr1" style="padding-bottom: 10px;">Why Join Share2Care </a></li>
<li><a href="<?php echo base_url('process');?>" class="bckclr1">Steps to follow</a></li>
</ul>
</li>
<?php }else{ ?>
<li class="dropdown bckclr"><a class="dropdown-toggle colr grows" data-toggle="dropdown" href="#">About Us <i class="fa fa-angle-down" aria-hidden="true"></i></a>
<ul class="dropdown-menu drp drp-weight">
<li><a href="<?php echo base_url('about');?>" class="bckclr1" style="padding-bottom: 10px;">What We Do</a></li>
<li><a href="<?php echo base_url('why');?>" class="bckclr1" style="padding-bottom: 10px;">Why Join Share2Care </a></li>
<li><a href="<?php echo base_url('process');?>" class="bckclr1">Steps to follow</a></li>
</ul>
</li>
<?php } ?>
<?php if($page == 'expert'){ ?>
<li><a href="<?php echo base_url('expert');?>" class="colr grow current">Experts</a></li>
<?php }else{ ?>
<li><a href="<?php echo base_url('expert');?>" class="colr grow">Experts</a></li>
<?php }?>
<!--  <li class="dropdown bckclr"><a class="dropdown-toggle colr grows" data-toggle="dropdown" href="#">Submit Enquiry <i class="fa fa-angle-down" aria-hidden="true"></i></a>
<ul class="dropdown-menu drp drp-weight">
<li><a href="<?php echo base_url('Share/new');?>" class="bckclr1" style="padding-bottom: 10px;">New User</a></li>
<li><a href="<?php echo base_url('Share/old');?>" class="bckclr1" style="padding-bottom: 10px;">Existing User </a></li>
</ul>
</li> -->
<!--<li><a href="<?php //echo base_url('Share/query');?>" class="colr grow">Submit Enquiry</a></li> -->
<?php if($page == 'submitEnquiry'){ ?>
<li><a href="<?php echo base_url('submitEnquiry');?>" class="colr grow current">Submit Enquiry</a></li>
<?php }else{ ?>
<li><a href="<?php echo base_url('submitEnquiry');?>" class="colr grow ">Submit Enquiry</a></li>
<?php } ?>
<?php if($page == 'event'){ ?>
<li><a href="https://share2care-foundation.blogspot.com/" class="colr grow current">Events</a></li>
<!-- <li><a href="<?php // echo base_url('index.php/event');?>" class="colr grow current">Events</a></li> -->
<?php } else{ ?>
<!-- <li><a href="<?php // echo base_url('index.php/event');?>" class="colr grow">Events</a></li> -->
<li><a href="https://share2care-foundation.blogspot.com/" class="colr grow current">Events</a></li>
<?php } ?>
<?php if(!empty($_SESSION['sessionid'])){ ?>
<li class="dropdown bckclr">
<a class="dropdown-toggle colr grows" data-toggle="dropdown" href="#"><b>
<?php if(!empty($_SESSION['sessionname'])){   
echo $_SESSION['sessionname']; 
} 
else{ echo "User";} 
?></b>&nbsp; <i class="fa fa-angle-down" aria-hidden="true"></i></a>
<ul class="dropdown-menu drp drp-weight">
<li><a href="<?php echo base_url('Profile');?>" class="bckclr1">My Profile</a></li>
<li><a href="<?php echo base_url('myquery');?>" class="bckclr1">My Enquiry</a></li>
<li><a href="<?php echo base_url('logout');?>" class="bckclr1">Logout</a></li>
</ul>
</li>
<?php } else { ?>

<?php if($page == 'Admin' || $page == 'login' || $page == 'Vendor'){ ?>
<li class="dropdown bckclr">
<a class="dropdown-toggle colr grows current" data-toggle="dropdown" href="#">Login <i class="fa fa-angle-down" aria-hidden="true"></i></a>
<ul class="dropdown-menu drp drp-weight">
<li><a href="<?php echo base_url('Admin');?>" target="_blank" class="bckclr1">Admin</a></li>
<li><a href="<?php echo base_url('login');?>" class="bckclr1">User</a></li>
<li><a href="<?php echo base_url('Vendor');?>" target="_blank" class="bckclr1">Expert</a></li>
</ul>
</li>
<?php }else{ ?>
<li class="dropdown bckclr">
<a class="dropdown-toggle colr grows" data-toggle="dropdown" href="#">Login <i class="fa fa-angle-down" aria-hidden="true"></i></a>
<ul class="dropdown-menu drp drp-weight">
<li><a href="<?php echo base_url('Admin');?>" target="_blank" class="bckclr1">Admin</a></li>
<li><a href="<?php echo base_url('login');?>" class="bckclr1">User</a></li>
<li><a href="<?php echo base_url('Vendor');?>" target="_blank" class="bckclr1">Expert</a></li>
</ul>
</li>
<?php } ?>
<?php } ?>
<?php if($page == 'contact'){ ?>
<li><a href="<?php echo base_url('contact');?>" class="colr grow current">Contact Us</a></li>
<?php } else{ ?>
<li><a href="<?php echo base_url('contact');?>" class="colr grow">Contact Us</a></li>
<?php } ?>
<li><a href="https://www.payumoney.com/paybypayumoney/#/3CEC9792A934E91DCF444E9410C957DC" target="_blank" class="donate-bt dnt color-bt-nav">Donate Now</a></li>
</ul>
</div>
</div>
</nav>
<!-- navbar ends -->