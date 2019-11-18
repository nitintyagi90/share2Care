<?php
include 'header.php';
include 'sidebar.php';
 ?>
 <div class="content-page">
<!-- Start content -->
<div class="content">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="page-title-box">
<h4 class="page-title">Enquiry Details</h4><ol class="breadcrumb p-0 m-0"><li><a href="#">Home</a></li><li class="active">View</li></ol>
<div class="clearfix"></div>
</div></div></div>
<!-- end row -->
<div class="row">
<!-- CHAT -->
<div class="col-lg-6">
<div class="card-box">
<h4 class="m-t-0 m-b-20 header-title"><b>Query</b></h4>
<div class="chat-conversation">
<?php $data= $query[0]['id']; 
$comment=$this->Adminmodel->commentdata($data);
?>
<ul class="conversation-list slimscroll-alt" style="height: 380px; min-height: 332px;">
<?php foreach ($comment as $value) { ?>
<?php if($value['is_comment']==0){ ?>
<li class="clearfix">
<div class="chat-avatar"><img src="<?php echo $value['u_image']; ?>" alt="male" class="img-circle"></div>
<div class="conversation-text">
<div class="ctext-wrap">
<p><i><?php if($value['is_comment']==0){  echo $value['date']; } ?></i><?php if($value['is_comment']==0){  echo $value['comment']; } ?></p>
</div>
</div>
</li>
<?php } else if($value['is_comment']==1) { ?>
<li class="clearfix odd">
<div class="chat-avatar"><img src="<?php echo base_url(); ?>/image/icon.png" alt="Admin"><i><?php if($value['is_comment']==1){  echo $value['date']; } ?></i></div>
<div class="conversation-text">
<div class="ctext-wrap">
<i>Admin</i>
<p><?php if($value['is_comment']==1){  echo $value['comment']; } ?></p>
</div>
</div>
</li><?php } else if($value['is_comment']==2) { ?>
<li class="clearfix odd">
<div class="chat-avatar"> <img src="<?php echo base_url(); ?>/image/icon.png" alt="Admin"><i><?php if($value['is_comment']==2){  echo $value['date']; } ?></i>
</div>
<div class="conversation-text">
<div class="ctext-wrap">
<i>Admin</i>
<p><?php if($value['is_comment']==2){  echo $value['comment']; } ?></p>
</div>
</div>
</li><?php } ?>
<?php } ?>
</ul>
<div class="row">
<div class="col-sm-9 chat-inputbar">
<textarea type="text" class="form-control chat-input" placeholder="Reply by admin" id="text"></textarea>
</div>
<div class="col-sm-3 chat-send"><button type="submit" class="btn btn-md btn-info btn-block waves-effect waves-light" onclick="send();">Send</button></div>
</div>
</div>
</div>
</div> <!-- end col-->
<!-- Todos app -->
<div class="col-lg-6">
<div class="card-box">
<h4 class="m-t-0 m-b-20 header-title text-center"><b>User Details</b></h4>
<div class="text-center">
<div class="member-card">
<div class="thumb-xl member-thumb m-b-10 center-block">
<img src="<?php echo $profession[0]['u_image'] ?>" class="img-circle img-thumbnail" alt="profile-image" style="height: 100px;width: 100px">
<i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
</div>
<!-- <div class=""><h4 class="m-b-5"><?php echo $profession[0]['u_name']; ?></h4></div>-->
<div class="text-left">
<p class="text-muted font-1">
<strong>Full Name :</strong> <span class="m-l-15"><?php echo $profession[0]['u_name']; ?></span><br />
<strong>Mobile :</strong><span class="m-l-15"><?php echo $profession[0]['u_phone']; ?></span><br />
<strong>Email :</strong> <span class="m-l-15"><?php echo $profession[0]['u_email']; ?></span><br />
<strong>Gender :</strong> <span class="m-l-15"><?php echo $profession[0]['u_gender']; ?></span><br />
<strong>Address :</strong> <span class="m-l-15"><?php echo $profession[0]['u_address']; ?>, <?php 
                                                $id=$profession[0]['u_city'];
												$where='id';
                                                $table='cities';
                                                $city =$this->Adminmodel->select_comm_where($where,$id,$table);
                                                echo $city[0]['name']; ?>, <?php 
                                                $id=$profession[0]['u_state'];
												$where='id';
                                                $table='states';
                                                $city =$this->Adminmodel->select_comm_where($where,$id,$table);
                                                echo $city[0]['name']; ?></span><br />
<strong>Age :</strong> <span class="m-l-15"><?php echo $profession[0]['u_age']; ?></span><br />
<strong>Profession :</strong> <span class="m-l-15"><?php echo $profession[0]['u_profession']; ?></span><br />
<strong>Category Selected :</strong> <span class="m-l-15"><?php  $id=$profession[0]['id'];
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

          <input type="hidden" id="url" value="<?php echo base_url(); ?>">   
          <input type="hidden" id="queryid" value="<?php echo $comment[0]['query_id']; ?>">   
          <input type="hidden" id="userid" value="<?php echo $comment[0]['user_id']; ?>">   
          <input type="hidden" id="proid" value="<?php echo $comment[0]['is_assigned']; ?>"> 
 <input type="hidden" id="uname" value="<?php echo $comment[0]['name']; ?>"> 
 <input type="hidden" id="uemail" value="<?php echo $comment[0]['email']; ?>"> 
<input type="hidden" id="umsg" value="<?php echo $comment[0]['message']; ?>"> 
<input type="hidden" id="uenq" value="<?php echo $comment[0]['enq_id']; ?>"> 
<input type="hidden" id="umob" value="<?php echo $comment[0]['mobile']; ?>"> 

 

            </div>

 <?php include 'footer.php'; ?>
<script type="text/javascript">
function send(){
var urls = $("#url").val();
var text = $("#text").val();
var userid = $("#userid").val();
var proid = $("#proid").val();
var queryid = $("#queryid").val();
var uname = $("#uname").val();
var uemail = $("#uemail").val();
var umsg = $("#umsg").val();
var uenq = $("#uenq").val();
var umob = $("#umob").val();

$.ajax({
type: "POST",
url: urls+"Admin/chat",
data: {userid:userid,proid:proid,text:text,queryid:queryid,uname:uname,uemail:uemail,umsg:umsg,uenq:uenq,umob:umob},
cache: false,
success: function(result){
window.location.reload();
}
});
}
</script>