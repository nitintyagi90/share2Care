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
                                <div class="page-title-box">
                                    <h4 class="page-title clr">UnAllocated Enquiry</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li><a href="href="<?php echo base_url('Admin/Dashboard'); ?>">Administrator</a></li>
                                        <li class="active clr">
                                          Enquiry For Admin
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                       

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <!-- <th>S no.</th> -->
                                            <th>Name</th>
                                            <!-- <th>Email</th> -->
                                            <th>Phone No.</th>
                                            <th>Interest In</th>
                                            <th>Alloted </th>
                                           
                                            <th>Status</th>
                                            <!-- <th>Enquiry</th> -->
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody id="fil2">
                               
                                            <?php $i=1; foreach ($message as  $value) { ?>
                                        <tr>
                                           <!--  <th><?php echo $i++; ?></th> -->
                                            <td><?php echo $value['name']; ?></td>
                                           <!--  <td><?php echo $value['email']; ?></td> -->
                                            <td><?php echo $value['mobile']; ?></td>
                                           

                                            <td> <select class="form-control" id="states_<?php echo $value['id']; ?>" onchange="getstates('<?php echo $value['id']; ?>')">

                                             
                                           <?php $table='category';
                                            $named=$this->Adminmodel->select_comm($table); foreach ($named as  $valued) {
                                                      ?>
                                                    <option value="<?php echo $valued['id']; ?>" <?php if($valued['id']==$value['category']){echo "selected"; } ?>><?php echo $valued['name']; ?></option>
                                                   <?php } ?>          
                                                </select></td>
                                          <td> <span id="citys"><select class="form-control" id="city_<?php echo $value['id']; ?>" onchange="updatealot('<?php echo $value['id']; ?>');">
                                             <span>
                                                    <option value="1">Not Alloted</option>
                                              <?php $table='proffesional';
                                            $name=$this->Adminmodel->select_comm($table); foreach ($name as  $value1) {
                                                  if($value1['p_active']==1) {   ?>

                                                    <option value="<?php echo $value1['id']; ?>" <?php if($value1['id']==$value['is_assigned']){echo "selected"; } ?>><?php echo $value1['p_name']; ?></option>
                                                   <?php } } ?></span>
                                                </select></span></td>
                                                 <td class="text-center">
                                                  <select class="form-control"  id="aprove_<?php echo $value['id']; ?>" onchange="status('<?php echo $value['id']; ?>');">
                                                      <option value="1"  <?php if($value['is_active']=='1'){echo "selected"; } ?>>Disapproved</option>
                                                      <option value="2" <?php if($value['is_active']=='2'){echo "selected"; } ?>>Approved</option>
                                               </select> 
                                                <input type="hidden" id="comment_<?php echo  $value['id'] ?>" value="<?php echo  $value['message'] ?>">
                                                     <input type="hidden" id="user_<?php echo  $value['id'] ?>" value="<?php echo  $value['user_id'] ?>">
                                             <!--   <td class="text-center">
                                                    <a href="<?php echo base_url('Admin/view/'.$value['user_id'].'/'.$value['id']); ?>" class="btn btn-color1 w-md waves-effect waves-light w-xs m-b-5">View Enquiry</a>
                                               </td> -->
                                            <td class="text-center">
                                                <a href="<?php echo base_url('Admin/view/'.$value['user_id'].'/'.$value['id']); ?>"><i class="fa fa-eye"></i>&nbsp;&nbsp;</a>
                                                <span><a href="#<?php echo $value['id']; ?>_del" data-toggle="modal"><i class="mdi mdi-delete-forever clr"></i></a></span>
                                            </td>
                                        </tr><?php } ?>
                                 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
<input type="hidden" id="url" value="<?php echo base_url(); ?>">

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                   2018 © Share2care.
                </footer>

            </div>

<input type="hidden" id="url" value="<?php echo base_url(); ?>">

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
                           <form action="<?php echo base_url('Admin/delquery/'.$value['id']);?>" method="post">
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
        
    </script>