<?php 
//pr($message);die();
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
                                  
                                    <h4 class="page-title clr"><?=$message[0]['name']?> All Enquiry</h4> 
                                    <ol class="breadcrumb p-0 m-0">
                                        <li><a href="<?php echo base_url('Admin/Dashboard'); ?>">Administrator</a></li>
                                        <li class="active clr">
                                           <?=$message[0]['name']?> All Enquiry
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
                                   <div class="row pd-bt">
                                        <div class="col-md-6">
                                            <!-- <h4 class="header-title clr"><b>Professional Listing</b></h4> -->

                                        </div>
                                        <div class="col-md-6">
                                            <a href="#_profile1" data-toggle="modal" class="btn btn-color1 pull-right"><i class=" mdi mdi-playlist-plus"></i>&nbsp;View Profile</a>
                                        </div>
                                    </div>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <!-- <th>S no.</th> -->
                                           
                                            <th>Category Of Expert</th>
                                            <th>Name Of Expert</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody id="fil1">
                               
                                            <?php $i=1; foreach ($message as  $value) { ?>
                                        <tr>
                                           
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
                                            
                                            <td>

                                                 <a href="<?php echo base_url('Admin/view/'.$value['user_id'].'/'.$value['id']); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                 <span><a href="#<?php echo $value['id']; ?>_del" data-toggle="modal"><i class="mdi mdi-delete-forever"></i></a></span>
                                                  <span><a href="#<?php echo $value['id']; ?>_profile" data-toggle="modal"><i class="mdi mdi-delete-forever"></i></a></span>
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
   <div id="_profile1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Profile</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Name</label>
                                                                <input type="text" value="<?=$message[0]['name']?>" class="form-control" id="field-1"  readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Email</label>
                                                                <input type="text" value="<?=$message[0]['email']?>" class="form-control" id="field-1"  readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Phone No</label>
                                                                <input type="text" value="<?=$message[0]['mobile']?>" class="form-control" id="field-1"  readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Landline No</label>
                                                                <input type="text" value="<?=$message[0]['landline']?>" class="form-control" id="field-1"  readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                       
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Address</label>
                                                                <input type="text" value="<?=$message[0]['address']?>" class="form-control" id="field-1"  readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">City</label>
                                                                <input type="text" value="<?=$message[0]['city']?>" class="form-control" id="field-1"  readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">State</label>
                                                                <input type="text" value="<?=$message[0]['state']?>" class="form-control" id="field-1"  readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Message</label>
                                                                <!-- <input type="text" value="<?=$message[0]['message']?>" class="form-control" id="field-1"  readonly> -->
                                                                <textarea class="form-control" readonly=""><?=$message[0]['message']?></textarea>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
   <?php 
include 'footer.php';
?>
