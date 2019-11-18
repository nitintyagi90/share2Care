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
                                    <h4 class="page-title clr">All Users</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li><a href="<?php echo base_url('index.php/Admin/Dashboard'); ?>">Dashboard</a></li>
                                        <li class="active clr">
                                           Users
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
                                            <!-- "<h4 class="header-title"><b>User Listing</b></h4>" -->

                                        </div>
                                        
                                    </div>
                                   
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S no.</th>
                                            <th>User Name</th>
                                            <th>Phone No.</th>
                                            <th>Email</th>
                                            <!-- <th>Interest</th> -->
                                            <th>Date of Join</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                              <?php $i=1; foreach ($message as $value) {
                                 ?>

                                        <tr>
                                            <th><?php echo $i; ?></th>
                                            <td><?php echo $value['u_name']; ?></td>
                                            <td><?php echo $value['u_phone']; ?></td>
                                            <td><?php echo $value['u_email']; ?></td>
                                            <!-- <td><?php
                                            $id=$value['category'];
                                            $where='id';
                                            $table='category';
                                            $name=$this->Adminmodel->select_comm_where($where,$id,$table);
                                            
                                             echo $name[0]['name']; ?></td> -->
                                            <td><?php $originalDate = $value['u_date'];
                                               echo $newDate = date("d-m-Y", strtotime($originalDate));  ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('index.php/Admin/userdetails/'.$value['id']); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                               <!--  <a href="#<?php echo $value['id']; ?>_edit" data-toggle="modal"><i class="fa fa-eye"></i></a>&nbsp;&nbsp; -->
                                                 <a href="#<?php echo $value['id']; ?>_edit" data-toggle="modal"><i class="mdi mdi-pencil clr"></i></a>&nbsp;&nbsp;
                                                <span><a href="#<?php echo $value['id']; ?>_del" data-toggle="modal"><i class="mdi mdi-delete-forever clr"></i></a></span></td>
                                            </tr>

                                         <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
                <?php  foreach ($message as $value) { ?>
                   <div id="<?php echo $value['id']; ?>_edit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit User's Details</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="member-card">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/Admin/editUser'); ?>">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">User Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name"  placeholder="Enter  Professional Name" value="<?php echo $value['u_name']; ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone No.</label>
                                    <div class="col-md-9">
                                        <input type="text" minlength="10" maxlength="10" class="form-control" name="mobile" placeholder="Enter  Phone No." value="<?php echo $value['u_phone']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email ID</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Enter  Designation" value="<?php echo $value['u_email']; ?>" readonly>
                                    </div>
                                </div>

                            <button type="submit" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">Save</button>
                            <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Cancel</button>
                              </form>
                        </div>
                    </div>
                    <!-- end card-box -->
                </div>
            </div>
        </div>
    </div>
<?php } ?>
                <?php  foreach ($message as $value) { ?>
 <div id="<?php echo $value['id'];  ?>_del" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="row">
                           <form action="<?php echo base_url('Admin/deluser/'.$value['id']);?>" method="post">
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
<?php
include 'footer.php';

?>
