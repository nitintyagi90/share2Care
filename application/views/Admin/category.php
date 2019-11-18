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
                                    <h4 class="page-title">Create Category</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li><a href="dashboard.html">Dashboard</a></li>
                                        <li class="active">
                                           Category
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
                                            <h4 class="header-title"><b>Category</b></h4>
                                        </div>
                                         <div class="col-md-6">
                                            <button type="button" class="btn btn-success pull-right" data-target="#add-news" data-toggle="modal"><i class=" mdi mdi-playlist-plus"></i>&nbsp;Add New</button>
                                        </div>
                                    </div>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S no.</th>
                                            <th>Category Name</th>
                                          
                                           
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                <?php $i=1; foreach ($message as $value) {
                                 ?>

                                        <tr>
                                            <th><?php echo $i; ?></th>
                                            <td><?php echo $value['name']; ?></td>
                                         
                                            <td class="text-center">
                                                <span><a href="#<?php echo $value['id']; ?>_edit" data-toggle="modal"><i class="mdi mdi-pencil"></i></a></span> |
                                                <span><a href="#<?php echo $value['id']; ?>_del" data-toggle="modal"><i class="mdi mdi-delete-forever"></i></a></span>
                                            </td>
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

                <footer class="footer text-right">
                   2018 © Share2care.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

    <!------- add ---------->
    <div id="add-news" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Category</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="member-card">
                            <form class="form-horizontal" action="<?php echo base_url('Admin/addcat'); ?>" method="post">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name='name' class="form-control" placeholder="Enter New Category Name" required>
                                    </div>
                                </div>  
                            </form>
                            <button type="submit" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">Add</button>
                            <button type="reset" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Cancel</button>
                        </div>
                    </div>
                    <!-- end card-box -->
                </div>
            </div>
        </div>
    </div>
    <!------- add ---------->
    <?php  foreach ($message as $value) { ?>

    <!------- edit ---------->
    <div id="<?php echo $value['id']; ?>_edit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="member-card">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('Admin/editcat'); ?>">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name"  placeholder="Enter  Professional Name" value="<?php echo $value['name']; ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
 
                          
                            <button type="submit" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">Save</button>
                            <button type="data-dismiss" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Cancel</button>
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
                           <form action="<?php echo base_url('Admin/delcat/'.$value['id']);?>" method="post">
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