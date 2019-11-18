<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>admin/assets/images/favicon.png">
<!-- App title -->
<title>Expert Dashboard: Share2care</title>
<!-- Bootstrap Sweet Alert -->
<link href="<?php echo base_url();?>admin/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
<!-- App css -->
<link href="<?php echo base_url();?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>admin/assets/css/components.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>admin/assets/css/pages.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>admin/assets/css/menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>admin/assets/css/responsive.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>admin/plugins/switchery/switchery.min.css">
<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script src="<?php echo base_url();?>admin/assets/js/modernizr.min.js"></script>
<!-- DataTables -->
<link href="<?php echo base_url();?>admin/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>admin/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>admin/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>admin/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<?php
$inactive = 600; 
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
<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">
<!-- Top Bar Start -->
<div class="topbar">
<!-- LOGO -->
<div class="topbar-left" style="background-color: #fff"><a href="Dashboard" class="logo"><span><img src="<?php echo base_url();?>admin/assets/images/share-pro.png" alt="" height="50"></span><i class="mdi mdi-layers"></i></a>
</div>
<!-- Button mobile view to collapse sidebar menu -->
<div class="navbar navbar-default" role="navigation">
<div class="container">
<!-- Navbar-left -->
<ul class="nav navbar-nav navbar-left"><li><button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button></li></ul>
</div><!-- end container -->
</div><!-- end navbar -->
</div>