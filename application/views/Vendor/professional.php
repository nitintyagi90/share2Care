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
                                    <h4 class="page-title">Enquiry</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li><a href="dashboard.html">Dashboard</a></li>
                                        <li class="active">
                                           Enquiry
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
                                            <h4 class="header-title"><b>Enquiry</b></h4>
                                        </div>
                                       <!--  <div class="col-md-6">
                                            <button type="button" class="btn btn-success pull-right" data-target="#add-news" data-toggle="modal"><i class=" mdi mdi-playlist-plus"></i>&nbsp;Add New</button>
                                        </div> -->
                                    </div>
                                  <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S no.</th>
											<th>Enq. No</th>
											 <th>Date</th>
                                            <th>Name</th>
                                          
                                           
                                            <th>Category</th>                               
                                            <th>Enquiry</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                               
                                            <?php $i=1; foreach ($message as  $value) { ?>
                                        <tr>
                                            <th><?php echo $i++; ?></th>
											<td><?php echo $value['enq_id']; ?></td>
											<td><?php echo $value['date']; ?></td>
                                            <td><?php echo $value['name']; ?></td>
                                           <!-- <td><?php echo $value['email']; ?></td>
                                            <td><?php echo $value['mobile']; ?></td>-->
                                           

                                            <td> <?php    $id = $value['category'];
            $where='id';
            $table='category';
            $data = $this->Vendormodel->select_comm_where($where,$id,$table);
            echo $data[0]['name']; ?> </td>
                                          <!--<td> <?php  echo $_SESSION['proffessional_name'];  ?>  </td>-->
                                               
                                               
                                            <td class="text-center">
                                               <a href="<?php echo base_url('index.php/Vendor/view/'.$value['user_id'].'/'.$value['id']); ?>" class="btnx btn-color1x w-md waves-effect waves-light w-xs m-b-5"><i class="fa fa-eye"></i></a>
                                               
                                            </td>
                                            <!-- <td>
                                                 <span><a href="#<?php echo $value['id']; ?>_del" data-toggle="modal"><i class="mdi mdi-delete-forever"></i></a></span>
                                            </td> -->
                                        </tr><?php } ?>
                                 
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

              

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

    
   <?php 
include 'footer.php';
?>