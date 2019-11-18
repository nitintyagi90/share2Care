<?php include 'headerview.php'; ?>
<link href="http://www.zivatech.online/admin/assets/css/core.css" rel="stylesheet" type="text/css" />
<link href="http://www.zivatech.online/admin/assets/css/components.css" rel="stylesheet" type="text/css" />
<link href="http://www.zivatech.online/admin/assets/css/icons.cs" rel="stylesheet" type="text/css" />
<link href="http://www.zivatech.online/admin/assets/css/pages.csss" rel="stylesheet" type="text/css" />
<section>
<div class="container">
<div class="row">
<!-- CHAT -->
<div class="col-lg-6">
<div class="card-box">
<h4 class="m-t-0 m-b-20 header-title"><b>Message Box</b></h4>
<div class="chat-conversation">
<?php $data = $query[0]['id']; $comment=$this->Adminmodel->commentdatauser($data); 
$pid = $query[0]['is_assigned'];
$wheres='id';
$tables='proffesional';
$prodetails=$this->Adminmodel->select_comm_where($wheres,$pid,$tables); 
?>
<ul class="conversation-list slimscroll-alt" style="height: 280px; min-height: 280px;">
<?php foreach ($comment as $value) { ?>
<?php if($value['is_comment']==0){ ?>
<li class="clearfix">
<div class="chat-avatar">
<img src="<?php echo $value['u_image']; ?>" alt="male" style="height: 90px;width: 90px">
</div>
<div class="conversation-text" style="margin-left:55px;">
<div class="ctext-wrap">
<i><?php if($value['is_comment']==0){  echo $value['date']; } ?></i>
<p> <?php if($value['is_comment']==0){  echo $value['comment']; } ?></p>
</div>
</div>
</li>                                                                            
<?php } else if($value['is_comment']==1) { ?>
<li class="clearfix odd" style="margin-right:35px;">
<div class="chat-avatar"><!--<img src="<?php echo base_url(); ?>/image/icon.png" alt="Admin">-->
<i>Expert_Reply</i>
<i><?php if($value['is_comment']==1){  echo $value['date']; } ?></i>
</div>
<div class="conversation-text" >
<div class="ctext-wrap">
<p style="color:#fff; font-size:12px;"><?php if($value['is_comment']==1){  echo $value['comment']; } ?></p></div>
</div>
</li>
<?php } else if($value['is_comment']==2) { ?>
<li class="clearfix odd" style="margin-right:20px;">
<div class="chat-avatar"><img src="<?php echo base_url(); ?>/image/icon.png" alt="Proffesional">
<i><?php if($value['is_comment']==2){  echo $value['date']; } ?></i>
</div>
<div class="conversation-text">
<div class="ctext-wrap">
<i><?=$prodetails[0]['p_name']?></i>
<p style="color:#fff; font-size:12px;">
<?php if($value['is_comment']==2){  echo $value['comment']; } ?>
</p>
</div>
</div>
</li><?php } ?>
<?php } ?>                                       
</ul>
<?php 
$data= $query[0]['id']; 
$admincomment=$this->Adminmodel->admincomment($data);
if(!empty($admincomment)){
?>                                  
<div class="row">
<div class="col-sm-9 chat-inputbar">
<input type="text" class="form-control chat-input" placeholder="Enter your message" id="text">
</div>
<?php $data= $query[0]['id']; 
$comment=$this->Adminmodel->commentdatauser($data); ?>
<div class="col-sm-3 chat-send">
<button type="submit" class="btn btn-md btn-info btn-block waves-effect waves-light" onclick="send();">Send</button>
</div>
</div>
<?php } ?>
</div>
</div>
</div> 
<!-- end col-->                     
<!-- Todos app -->
<div class="col-lg-6">
<div class="card-box">
<h4 class="m-t-0 m-b-20 header-title text-center"><b>Assigned to</b></h4>
<div class="text-center">
<div class="member-cards">
<?php 
$id = $query[0]['is_assigned'];
$where='id';
$table='proffesional';
$prodetail=$this->Adminmodel->select_comm_where($where,$id,$table); 
?>
<?php if($prodetail[0]['p_image']){ ?>
<div class="thumb-xl member-thumb m-b-10 center-block">
<img src="<?php echo $prodetail[0]['p_image']?>" class="img-circl img-thumbnai" alt="profile-image" style="height: 100px; width:120px">
</div>
<div class="text-left">
<p style="font-size:13px;">
<strong>Expert Name :</strong> <?php echo $prodetail[0]['p_name']; ?></span><br />
<strong>Total Experience :</strong> <?php echo $prodetail[0]['p_experience']; ?></span><br />
<strong>Designation :</strong> <?php echo $prodetail[0]['p_destination']; ?></span><br />
<strong>Date of Joining :</strong> <?php echo $prodetail[0]['p_date']; ?></span><br />
<strong>Category :</strong> <?php  $id=$prodetail[0]['p_cat']; $where='id'; $table='category';$category =$this->Adminmodel->select_comm_where($where,$id,$table); echo $category[0]['name']; ?>  <br />
<strong>About :</strong>  <?php echo $prodetail[0]['p_description']; ?></span></p>
</div>
<?php } else { ?>
 <div class="thumb-xl member-thumb m-b-10 center-block">
<img src="<?php echo base_url();?>image/users/admin-default.jpg" class="img-circle img-thumbnail" alt="profile-image" style="height: 100px;width: 100px">
<i class="mdi mdi-star-circle member-star text-success" title="verified user"></i></div>
<div class=""><h4 class="m-b-5">Admin</h4></div>
<?php } ?>
</div>
</div>
</div>
</div>
</section>
<input type="hidden" id="url" value="<?php echo base_url(); ?>">   
<input type="hidden" id="queryid" value="<?php echo $comment[0]['query_id']; ?>">   
<input type="hidden" id="userid" value="<?php echo $comment[0]['user_id']; ?>">   
<input type="hidden" id="proid" value="<?php echo $comment[0]['is_assigned']; ?>">   
<input type="hidden" id="peml" value="<?php echo $prodetail[0]['p_email']; ?>">
<input type="hidden" id="pmob" value="<?php echo $prodetail[0]['p_mobile']; ?>">
<input type="hidden" id="ueml" value="<?php echo $comment[0]['email']; ?>">
<input type="hidden" id="umob" value="<?php echo $comment[0]['mobile']; ?>">
<input type="hidden" id="enqid" value="<?php echo $comment[0]['enq_id']; ?>">
<input type="hidden"  id="dates" value="<?php $date=date('d-m-Y'); echo "$date" ;?>">
<?php 
$id =$comment[0]['query_id'];
$countuser=$this->Adminmodel->countuser($id); ?>
<input type="hidden" id="countuser" value="<?php echo count($countuser); ?>">

<p><br /><br /><br /></p>
<?php include 'footer.php'; ?>
<script type="text/javascript">
function send(){
var urls = $("#url").val();
var text = $("#text").val();
var userid = $("#userid").val();
var proid = $("#proid").val();
var queryid = $("#queryid").val();
var peml=$("#peml").val();
var pmob=$("#pmob").val();
var ueml=$("#ueml").val();
var umob=$("#umob").val();
var enqid=$("#enqid").val();
var dates=$("#dates").val();
var countuser=$("#countuser").val();
var countuse =parseInt(countuser);
if(countuse<3){
$.ajax({
type: "POST",
url: urls+"Share/chat",
data: {userid:userid,proid:proid,text:text,queryid:queryid,peml:peml,pmob:pmob,ueml:ueml,umob:umob,enqid:enqid,dates:dates},
cache: false,
success: function(result){
window.location.reload();
}
});
}else{
alert('maximum 3 comment');
}
}
</script>
<script src="http://www.zivatech.online/admin/assets/js/jquery.slimscroll.js"></script>
<script src="http://www.zivatech.online/admin/assets/js/jquery.core.js"></script>
<script src="http://www.zivatech.online/admin/assets/js/jquery.app.js"></script>