<?php
include 'header.php';
include 'sidebar.php';
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
<!-- Start content -->
<div class="content">
<div class="container">
<div class="row">
<div class="col-xs-12">
<br />
<div class="page-title-box">
<h4 class="page-title clr">Admin Dashboard</h4>
<ol class="breadcrumb p-0 m-0">
<li class="active"></li>
</ol>
<div class="clearfix"></div>
</div>
</div>
</div>
<!-- end row -->
<div class="row">
<div class="col-lg-3 col-md-6"><a href="<?php echo base_url('index.php/Admin/Proffesional'); ?>">
<div class="card-box widget-box-two">
<!--<div class="bg-icon pull-left"><i class="mdi mdi-briefcase"></i></div> -->
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Experts</p>
<?php
$table='proffesional';
$ongoing=$this->Adminmodel->select_comm($table); ?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($ongoing)){ echo count($ongoing);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-3 col-md-6"><a href="<?php echo base_url('index.php/Admin/User'); ?>">
<div class="card-box widget-box-two">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Users </p>
<?php
$table='Users';
$user=$this->Adminmodel->select_comm($table); ?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($user)){ echo count($user);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-3 col-md-6"><a href="profenquiry" >
<div class="card-box widget-box-three pd-box">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Enq. for Experts</p>
<?php
$id='2';
$where='pro_enquiry';
$table='query';
$p_query =$this->Adminmodel->select_comm_where($where,$id,$table);   ?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($p_query)){ echo count($p_query);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-3 col-md-6"><a href="direct">
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Enq. For Admin</p>
<?php
$id='1';
$where='pro_enquiry';
$table='query';
$querys =$this->Adminmodel->select_comm_where($where,$id,$table);?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($querys)){ echo count($querys);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<!--<div class="col-lg-2 col-md-6"><a href="<?php echo base_url('index.php/Admin/viewall'); ?>">
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">All Enquiry</p>
<?php
$table='query';
$querey=$this->Adminmodel->select_comm($table); ?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($querey)){ echo count($querey);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-2 col-md-6"><a href="<?php echo base_url('index.php/Admin/viewpending'); ?>">
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">UnAllocated Enq. </p><?php
$id='1';
$where='pro_enquiry';
$table='query';
$UnAllocated =$this->Adminmodel->select_comm_where($where,$id,$table);?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($UnAllocated)){ echo count($UnAllocated);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-2 col-md-6"><a href="<?php echo base_url('index.php/Admin/profenquiry'); ?>">
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Alloted Enquiry </p><?php
$id='1';
$where='is_assigned';
$table='query';
$Alloted =$this->Adminmodel->select_comm_where_not_in($where,$id,$table);?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Alloted)){ echo count($Alloted);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-2 col-md-6"><a href="<?php echo base_url('index.php/Admin/direct'); ?>">
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Not Alloted Enquiry </p><?php
$id='1';
$where='is_assigned';
$table='query';
$NotAlloted =$this->Adminmodel->select_comm_where($where,$id,$table);?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($NotAlloted)){ echo count($NotAlloted);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-2 col-md-6"><a href="<?php echo base_url('index.php/Admin/viewpending'); ?>">
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Disapproved Enquiry </p><?php
$id='1';
$where='is_active';
$table='query';
$Disapproved =$this->Adminmodel->select_comm_where($where,$id,$table);?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Disapproved)){ echo count($Disapproved);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-2 col-md-6"><a href="<?php echo base_url('index.php/Admin/viewpending'); ?>">
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Approved Enquiry </p><?php
$id='2';
$where='is_active';
$table='query';
$Approved =$this->Adminmodel->select_comm_where($where,$id,$table);?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Approved)){ echo count($Approved);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-2 col-md-6"><a>
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Support for Senior Citizens Enquiry </p><?php
$id='1';
$where='category';
$table='query';
$ssc =$this->Adminmodel->select_comm_where($where,$id,$table);?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($ssc)){ echo count($ssc);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-2 col-md-6"><a>
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Miscellaneous Enquiry </p><?php
$id='5';
$where='category';
$table='query';
$Miscellaneous =$this->Adminmodel->select_comm_where($where,$id,$table);?>
<h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Miscellaneous)){ echo count($Miscellaneous);}else{echo '0';} ?></span></h2>
</div>
</div></a>
</div>
<div class="col-lg-2 col-md-6"><a>
<div class="card-box widget-box-three">
<div class="text-center">
<p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Education & Career Development Enquiry </p><?php
$id='6';
                                        $where='category';
                                        $table='query';
                                        $Education =$this->Adminmodel->select_comm_where($where,$id,$table);?>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Education)){ echo count($Education);}else{echo '0';} ?></span></h2>
                                    </div>
                                </div></a>
                            </div>

                            <div class="col-lg-2 col-md-6"><a>
                                <div class="card-box widget-box-three">
                                 
                                    <div class="text-center">
                                        <p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Health Care Enquiry </p><?php
                                        $id='7';
                                        $where='category';
                                        $table='query';
                                        $Health =$this->Adminmodel->select_comm_where($where,$id,$table);?>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Health)){ echo count($Health);}else{echo '0';} ?></span></h2>
                                    </div>
                                </div></a>
                            </div>

                            <div class="col-lg-2 col-md-6"><a>
                                <div class="card-box widget-box-three">
                                  
                                    <div class="text-center">
                                        <p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Woman Empowerment Enquiry </p><?php
                                        $id='8';
                                        $where='category';
                                        $table='query';
                                        $Woman =$this->Adminmodel->select_comm_where($where,$id,$table);?>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Woman)){ echo count($Woman);}else{echo '0';} ?></span></h2>
                                    </div>
                                </div></a>
                            </div>



                            <div class="col-lg-2 col-md-6"><a>
                                <div class="card-box widget-box-three">
                              
                                    <div class="text-center">
                                        <p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Aashayen Enquiry </p><?php
                                        $id='9';
                                        $where='category';
                                        $table='query';
                                        $Aashayen =$this->Adminmodel->select_comm_where($where,$id,$table);?>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Aashayen)){ echo count($Aashayen);}else{echo '0';} ?></span></h2>
                                    </div>
                                </div></a>
                            </div>


                            <div class="col-lg-2 col-md-6"><a>
                                <div class="card-box widget-box-three">
                                 
                                    <div class="text-center">
                                        <p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Skill Development Enquiry </p><?php
                                        $id='10';
                                        $where='category';
                                        $table='query';
                                        $Skill =$this->Adminmodel->select_comm_where($where,$id,$table);?>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Skill)){ echo count($Skill);}else{echo '0';} ?></span></h2>
                                    </div>
                                </div></a>
                            </div>

                            <div class="col-lg-2 col-md-6"><a>
                                <div class="card-box widget-box-three">
                               
                                    <div class="text-center">
                                        <p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Financial Management Enquiry </p><?php
                                        $id='11';
                                        $where='category';
                                        $table='query';
                                        $Financial =$this->Adminmodel->select_comm_where($where,$id,$table);?>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($Financial)){ echo count($Financial);}else{echo '0';} ?></span></h2>
                                    </div>
                                </div></a>
                            </div>-->


                        </div>
                        <!-- end row -->



                        <!-- end row -->
                      <!--   <div class="row">
                            <div class="col-lg-3 col-md-6"><a href="<?php echo base_url('index.php/Admin/viewall'); ?>">
                                <div class="card-box widget-box-three">
                                    <div class="bg-icon pull-left">
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                    <div class="text-right">
                                        <p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e">Total Enquiry</p>
                                        <?php
                                        $table='query';
                                        $querey=$this->Adminmodel->select_comm($table); ?>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($querey)){ echo count($querey);}else{echo '0';} ?></span></h2>
                                    </div>
                                </div></a>
                            </div>

                            <div class="col-lg-3 col-md-6"><a href="<?php echo base_url('index.php/Admin/viewpending'); ?>">
                                <div class="card-box widget-box-three">
                                    <div class="bg-icon pull-left">
                                        <i class="mdi mdi-account"></i>
                                    </div>
                                    <div class="text-right">
                                        <p class="clr-red m-t-5 text-uppercase font-600 font-secondary" style="color: #ad181e"> UnAllocated Enquiry </p><?php
                                        $id='1';
                                        $where='pro_enquiry';
                                        $table='query';
                                        $UnAllocated =$this->Adminmodel->select_comm_where($where,$id,$table);?>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($UnAllocated)){ echo count($UnAllocated);}else{echo '0';} ?></span></h2>
                                    </div>
                                </div></a>
                            </div>



                        </div> -->
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="row pd-bt">
                                        <div class="col-md-6">
                                            <!-- <h4 class="header-title clr"><b>Professional Listing</b></h4> -->
                                            <h4 class="m-t-0 header-title"><b>Latest Enquiry</b></h4>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?php echo base_url('index.php/Admin/viewall'); ?>" class="btn btn-color1 pull-right" ><i class=" mdi mdi-playlist-plus"></i>&nbsp;View All</a>
                                        </div>
                                    </div>
                                    
<table id="datatable" class="table table-striped table-bordered">
<thead><th>Enq No.</th><th>Date</th><th>Expert Name</th><th>User Name</th><th>Category</th><th>Alloted</th><th>Action</th></tr></thead>
<tbody>
<?php $i=1; foreach ($query as  $value) {?>
<tr>
<!--<th><?php echo $i++; ?></th>-->
<td><?php echo $value['enq_id']; ?> </td>
<td><?php echo $value['date']; ?> </td>
<?php if($value['pro_enquiry']==2){ ?>
<td>
<h5 class="m-0"><?php 
$id=$value['is_assigned'];
$where='id';
$table='proffesional';
$names=$this->Adminmodel->select_comm_where($where,$id,$table);
echo $names[0]['p_name']; ?></h5>
<p class="m-0 text-muted font-13"><small><?php echo $names[0]['p_mobile']; ?></small></p>
<input type="hidden" id="exname" value="<?php echo $names[0]['p_name']; ?>">
</td>
<?php } else { ?>
<td><h5 class="m-0">Admin</h5><p class="m-0 text-muted font-13"><small></small></p></td>
<?php } ?>
<?php if($value['user_id']==0){ ?>
<td><h5 class="m-0">User</h5><p class="m-0 text-muted font-13"><small></small></p></td>
<?php } else { ?>
<td>
<input type="hidden" id="comment_<?php echo  $value['id'] ?>" value="<?php echo  $value['message'] ?>">
<h5 class="m-0"><?php 
$id=$value['user_id'];
$where='id';
$table='Users';
$user =$this->Adminmodel->select_comm_where($where,$id,$table);
echo $user[0]['u_name']; ?></h5>
<p class="m-0 text-muted font-13"><small><?php echo $user[0]['u_phone']; ?></small></p>
</td>
<?php } ?>
<td><select class="form-control" id="states_<?php echo $value['id']; ?>" onchange="getstates('<?php echo $value['id']; ?>')">
<?php $table='category';
$named=$this->Adminmodel->select_comm($table); foreach ($named as  $valued) {
?>
<option value="<?php echo $valued['id']; ?>" <?php if($valued['id']==$value['category']){echo "selected"; } ?>><?php echo $valued['name']; ?></option>
<?php } ?>          
</select></td>
<td>
<span id="citys_<?php echo $value['id']; ?>"><select class="form-control" id="city_<?php echo $value['id']; ?>" onchange="updatealot('<?php echo $value['id']; ?>');">
<span>
<option value="1">Not Alloted</option>
<?php $table='proffesional';
$name=$this->Adminmodel->select_comm($table); foreach ($name as  $value1) {
if($value1['p_active']==1) { ?>
<option value="<?php echo $value1['id']; ?>" <?php if($value1['id']==$value['is_assigned']){echo "selected"; } ?>><?php echo $value1['p_name']; ?></option>
<?php } } ?></span>
</select></span>
</td>

<td class="text-center">
<a href="<?php echo base_url('index.php/Admin/view/'.$value['user_id'].'/'.$value['id']); ?>"><i class="fa fa-eye"></i></a> | 
<a onclick="confirmDelete()"><i class="mdi mdi-delete-forever clr"></i></a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<!-- end row -->
</div> <!-- container -->
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">
</div> <!-- content -->
    
<?php include 'footer.php'; ?>    
<script type="text/javascript">
function confirmDelete(id) {
d = confirm('Do You want to delete this Enquiry');
if(d == true)
{
location.href= "<?php echo base_url('index.php/Admin/dellatestquery/'.$value['id']); ?>";
return true;
}
else
{
return false;
}
}

function getstates(id){
var urls = $("#url").val();
var states = $("#states_"+id).val();
$.ajax({
type: "POST",
url: urls+"Admin/city",
data: {state_id:states,id:id},
cache: false,
success: function(result){
$("#city_"+id).html(result);
}
});
}
    
function updatealot(id){
var urls = $("#url").val();
var city = $("#city_"+id).val();
var comment = $("#comment_"+id).val();
var user = $("#user_"+id).val();
var exname = $("#exname").val();
$.ajax({
type: "POST",
url: urls+"Admin/updatealot",
data: {city:city,id:id,user:user,comment:comment,exname:exname},
cache: false,
success: function(result){
// alert(result);
location.reload();
}
});
}
</script>