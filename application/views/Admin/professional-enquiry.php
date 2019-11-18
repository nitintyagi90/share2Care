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
<h4 class="page-title clr">Enquiry for Experts</h4>
<ol class="breadcrumb p-0 m-0">
<li><a href="<?php echo base_url('index.php/Admin/Dashboard'); ?>">Administrator</a></li>
<li class="active clr">Enquiry for Experts</li>
</ol>
<div class="clearfix"></div>
</div>
</div>
</div>
<!-- end row -->                    
<div class="row">
<div class="col-sm-12">
<div class="card-box table-responsive">
<div class="row pd-bt">
<div class="col-md-offset-1 col-md-3">
<label>Interest In:</label>
<select class="form-control"   id="Interest">
<option value="">Select</option>
<?php foreach ($category as $value) {?>
 <option value="<?=$value['id']?>"><?=$value['name']?></option>
 <?php } ?>
 </select>
 </div>
 <div class="col-md-3">
 <label>Alloted:</label>
 <select class="form-control" id="alloted" >
 <option value="">Select</option>
 <option value="1">Not Alloted</option>
 <?php foreach ($alloted as $value) {?>
<option value="<?=$value['id']?>"><?=$value['p_name']?></option>
<?php } ?>     
</select>
</div>
<div class="col-md-3">
<label>Status:</label>
<select class="form-control" id="status">
<option value="">Select</option>
<option value="1">Disapproved</option>
<option value="2">Approved</option>
</select>
</div>
<div class="col-md-2"><div style="margin-top: 17%;"><button class="btn btn-danger" onclick="myfunction3();"> Search</button></div></div>
</div>
<table id="datatable" class="table table-striped table-bordered">
<thead><tr><!--<th>S no.</th>--><th>Enq. No</th><th>User Name</th><th>Category</th><th>Expert Name</th><th>Status</th><th>Date</th><th>Action</th></tr></thead>
<tbody id="fil1">
<?php $i=1; foreach ($message as  $value) { ?>
<tr>
<!--<th><?php echo $i++; ?></th>-->
<td><?php echo $value['enq_id']; ?> </td>
<td><?php echo $value['name']; ?></td>
<td> <select class="form-control" rea id="states_<?php echo $value['id']; ?>" onchange="getstates('<?php echo $value['id']; ?>')">
<?php $table='category';
$named=$this->Adminmodel->select_comm($table); foreach ($named as  $valued) {
 ?>
<option value="<?php echo $valued['id']; ?>" <?php if($valued['id']==$value['category']){echo "selected"; } ?>><?php echo $valued['name']; ?></option>
<?php } ?>          
                                                </select></td>
                                          <td> <select class="form-control" id="city_<?php echo $value['id']; ?>" onchange="updatealot('<?php echo $value['id']; ?>');">
                                                <span>
                                                    <option value="1">Not Alloted</option>
                                              <?php $table='proffesional';
                                            $name=$this->Adminmodel->select_comm($table); foreach ($name as  $value1) {
                                                     if($value1['p_active']==1) {    ?>
                                                    <option value="<?php echo $value1['id']; ?>" <?php if($value1['id']==$value['is_assigned']){echo "selected"; } ?>><?php echo $value1['p_name']; ?></option>
                                                   <?php } } ?></span>
                                                </select></td>
                                                <td class="text-center">
                                              <select class="form-control"  id="aprove_<?php echo $value['id']; ?>" onchange="status('<?php echo $value['id']; ?>');">
                                                      <option value="1"  <?php if($value['is_active']=='1'){echo "selected"; } ?>>Disapproved</option>
                                                      <option value="2" <?php if($value['is_active']=='2'){echo "selected"; } ?>>Approved</option>
                                               </select> 
                                            </td>
                                               <input type="hidden" id="comment_<?php echo  $value['id'] ?>" value="<?php echo  $value['message'] ?>">
                                                     <input type="hidden" id="user_<?php echo  $value['id'] ?>" value="<?php echo  $value['user_id'] ?>">
                                           <!--  <td class="text-center">
                                               <a href="<?php echo base_url('Admin/view/'.$value['user_id'].'/'.$value['id']); ?>" class="btn btn-color1 w-md waves-effect waves-light w-xs m-b-5">View Enquiry</a>
                                               
                                            </td> -->
											
											<td><?php echo $value['date']; ?> </td>
                                            
                                            <td>
                                                 <a href="<?php echo base_url('Admin/view/'.$value['user_id'].'/'.$value['id']); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                 <span><a href="#<?php echo $value['id']; ?>_del" data-toggle="modal"><i class="mdi mdi-delete-forever"></i></a></span>
                                            </td>
                                        </tr><?php } ?>
                                 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                   2018 © Share2care.
                </footer>

            </div>
<input type="hidden" id="url" value="<?php echo base_url(); ?>index.php/">

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
 <?php  foreach ($message as $value) { ?>
 <div id="<?php echo $value['id'];  ?>_del" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="row">
                           <form action="<?php echo base_url('Admin/delproquery/'.$value['id']);?>" method="post">
                            <div class="col-md-12 col-xs-12 col-sm-12 mg-tp-6">
                               
                                   
                                    <input type="hidden" id="aa" value="1">
                                <h3 class="text-center">Are You Sure?</h3>
                                <div class="row" style="margin: 25px 0px 8px 52px;">
                                    <div class="col-md-offset-3 col-md-3">
                                       
                                        <input type="submit" class="btn btn-info"  value="Yes" >
                                    </div>
                                    <div class="col-md-3">
                                        <input type="button" class="btn btn-danger" value="no" data-dismiss="modal" >
                                    </div>
                                </div>  
                                </div> 
                               </form>
                           
                                                            
                            </div>
                        </div>
                </div>
            </div>

  </div>
<?php } ?>
    <!------- add ---------->
   
   <?php 
include 'footer.php';
?>
<script type="text/javascript">
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

            $.ajax({

                    type: "POST",

                    url: urls+"Admin/updatealot",

                    data: {city:city,id:id,user:user,comment:comment},

                    cache: false,

                    success: function(result){
                     location.reload();
                    }

                    });
        }
    </script>

<script type="text/javascript">
function status(id){
var urls = $("#url").val();
var status = $("#aprove_"+id).val();
$.ajax({
type: "POST",
url: urls+"Admin/status_enquiry",
data: {status:status,id:id},
cache: false,
success: function(result){
location.reload();
}
});
}
function myfunction3(){
var urls = $("#url").val();
var Interest= $("#Interest").val();
var alloted= $("#alloted").val();
var status= $("#status").val();
$.ajax({
type: "POST",
url: urls+"Admin/filter1",
data: {Interest:Interest,alloted:alloted,status:status},
cache: false,
success: function(result){
$("#fil1").html(result);
}
});
}
</script>