<?php include 'header.php'; include 'sidebar.php'; ?>
<div class="content-page">
<div class="content">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="page-title-box"><h4 class="page-title">View Details</h4>
<div class="clearfix"></div>
</div>
</div>
</div>
<!-- end row -->
<div class="row">
<!-- CHAT -->
<div class="col-lg-6">
<div class="card-box">
<h4 class="m-t-0 m-b-20 header-title"><b>User's Message</b></h4>
<div class="chat-conversation">
<?php $data= $query[0]['id']; 
$comment=$this->Adminmodel->commentdata($data);
?>
<ul class="conversation-list slimscroll-alt" style="height: 380px; min-height: 332px;">
<?php foreach ($comment as $value) { 
?>
<?php if($value['is_comment']==0){ ?>
<li class="clearfix">
<div class="chat-avatar"><i><?php if($value['is_comment']==0){  echo $value['date']; } ?></i></div>
<div class="conversation-text" style="margin-left:35px;">
<div class="ctext-wrap"><i><?php if($value['is_comment']==0){  echo $value['comment']; } ?></i>
<p></p>
</div>
</div>
</li>
<?php } else if($value['is_comment']==1) { ?>
<li class="clearfix odd">
<div class="chat-avatar">
<!--<img src="<?php echo base_url(); ?>/image/icon.png" alt="Admin">-->
<i><?php if($value['is_comment']==1){  echo $value['date']; } ?></i>
</div>
<div class="conversation-text">
<div class="ctext-wrap">
<i>Admin</i><p><?php if($value['is_comment']==1){  echo $value['comment']; } ?></p>
</div>
</div>
</li><?php } else if($value['is_comment']==2) { ?>
<li class="clearfix odd">
<div class="chat-avatar"><i>Expert Reply</i>
</div>
<div class="conversation-text">
<div class="ctext-wrap"><i><?php if($value['is_comment']==2){  echo $value['date']; } ?></i><p><?php if($value['is_comment']==2){  echo $value['comment']; } ?></p>
</div>
</div>
</li>
<?php } ?>
<?php } ?>
</ul>
<?php if($query[0]['is_active']==2){ ?>
<div class="row">
<div class="col-sm-9 chat-inputbar"><input type="text" class="form-control chat-input" placeholder="Enter your text" id="text"></div>
<div class="col-sm-3 chat-send"><button type="submit" class="btn btn-md btn-info btn-block waves-effect waves-light" onclick="send();">Send</button></div>
</div>
<?php }?>
</div>
</div>
</div> <!-- end col-->
<!-- Todos app -->
<div class="col-lg-6">
<div class="card-box">
<h4 class="m-t-0 m-b-20 header-title text-center"><b>User Details</b></h4>
<div class="text-center">
<div class="member-card">
<div class="thumb-xl member-thumb m-b-10 center-block"><img src="<?php echo $profession[0]['u_image'] ?>" class="img-circle img-thumbnail" alt="profile-image">
<i class="mdi mdi-star-circle member-star text-success" title="verified user"></i></div>
<div class="">
<h4 class="m-b-5"><?php echo $profession[0]['u_name']; ?></h4>
<p class="text-muted">			
</div>
<div class="text-left">
<p style="font-size:13px;">
<strong>User's Name :</strong> <?php echo $profession[0]['u_name']; ?></span><br />
<strong>Age :</strong> <?php echo $profession[0]['u_age']; ?></span><br />
<strong>Gender :</strong> <?php echo $profession[0]['u_gender']; ?></span><br />
<strong>Profession :</strong> <?php echo $profession[0]['u_profession']; ?></span><br />
<strong>Date of Joining :</strong> <?php echo $profession[0]['u_date']; ?></span><br />
<strong>Address :</strong> <?php  $id=$profession[0]['u_city']; $where='id'; $table='cities';$category =$this->Adminmodel->select_comm_where($where,$id,$table); echo $category[0]['name']; ?>, <?php  $id=$profession[0]['u_state']; $where='id'; $table='states';$category =$this->Adminmodel->select_comm_where($where,$id,$table); echo $category[0]['name']; ?>  <br />
<strong>Selected Category :</strong>  <?php  $id=$profession[0]['id'];
$where='user_id';
$table='query';
$query =$this->Adminmodel->select_comm_where($where,$id,$table); 
$id=$query[0]['category'];
$where='id';
$table='category';
$category =$this->Adminmodel->select_comm_where($where,$id,$table);
echo $category[0]['name']; ?></span></p>
</div>
</div>
</div> <!-- end card-box -->
</div>
</div> <!-- end col -->
</div> <!-- end row -->                    
</div> <!-- container -->
</div> <!-- content -->
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">   
<input type="hidden" id="queryid" value="<?php echo $comment[0]['query_id']; ?>">   
<input type="hidden" id="userid" value="<?php echo $comment[0]['user_id']; ?>">   
<input type="hidden" id="proid" value="<?php echo $comment[0]['is_assigned']; ?>">  
<input type="hidden" id="uname" value="<?php echo $comment[0]['name']; ?>">	
<input type="hidden" id="ueml" value="<?php echo $comment[0]['email']; ?>">
<input type="hidden" id="umob" value="<?php echo $comment[0]['mobile']; ?>">	 
<input type="hidden" id="pname" value="<?php  $id=$comment[0]['query_id']; $where='query_id'; $table='comment'; $query =$this->Adminmodel->select_comm_where($where,$id,$table); 
$id = $query[0]['pro_id']; $where='id'; $table='proffesional'; $category =$this->Adminmodel->select_comm_where($where,$id,$table); echo $category[0]['p_name']; ?>"> 
<input type="hidden" id="peml" value="<?php  $id=$comment[0]['query_id']; $where='query_id'; $table='comment'; $query =$this->Adminmodel->select_comm_where($where,$id,$table); 
$id = $query[0]['pro_id']; $where='id'; $table='proffesional'; $category =$this->Adminmodel->select_comm_where($where,$id,$table); echo $category[0]['p_email']; ?>"> 
<input type="hidden" id="pmob" value="<?php  $id=$comment[0]['query_id']; $where='query_id'; $table='comment'; $query =$this->Adminmodel->select_comm_where($where,$id,$table); 
$id = $query[0]['pro_id']; $where='id'; $table='proffesional'; $category =$this->Adminmodel->select_comm_where($where,$id,$table); echo $category[0]['p_mobile']; ?>"> 
<input type="hidden" id="enqid" value="<?php echo $comment[0]['enq_id']; ?>"> 
</div>
</div>
<?php include 'footer.php';  ?>
<script type="text/javascript">
function send(){
var urls = $("#url").val();
var text = $("#text").val();
var userid = $("#userid").val();
var proid = $("#proid").val();
var queryid = $("#queryid").val();
var uname = $("#uname").val();
var ueml = $("#ueml").val();
var umob = $("#umob").val();
var pname = $("#pname").val();
var peml = $("#peml").val();
var pmob = $("#pmob").val();
$.ajax({
type: "POST",
url: urls+"Vendor/chat",
data: {userid:userid,proid:proid,text:text,queryid:queryid,uname:uname,ueml:ueml,umob:umob,pname:pname,peml:peml,pmob:pmob},
cache: false,
success: function(result){
window.location.reload();
}
});
}
</script>