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
                        <h4 class="page-title">Dashboard</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li class="active">
                           
                         </li>
                     </ol>
                     <div class="clearfix"></div>
                 </div>
             </div>
         </div>


         <!-- end row -->
         <div class="row">
            <div class="col-lg-3 col-md-6"><a href="<?php echo base_url('Vendor/Enquiry'); ?>">
                <div class="card-box widget-box-three">
                                   <!--  <div class="bg-icon pull-left">
                                        <i class="mdi mdi-briefcase"></i>
                                    </div> -->
                                    <div class="text-center">
                                        <p class="text-uppercase font-600 font-secondary" style="color: #ad181e">Enquiry</p>
                                        
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php if(!empty($message)){ echo count($message);}else{echo '0';} ?></span></h2> 
                                    </div>
                                </div></a>
                            </div>

                            

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="row pd-bt">
                                        <div class="col-md-6">
                                            <h4 class="header-title clr"><b>Latest Enquiry</b></h4>
                                        </div>
                                       <!--  <div class="col-md-6">
                                            <button type="button" class="btn btn-success pull-right" data-target="#add-news" data-toggle="modal"><i class=" mdi mdi-playlist-plus"></i>&nbsp;Add New</button>
                                        </div> -->
                                    </div>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S no.</th>
                                                <th>User Name</th>
                                                <!-- <th>Email</th> -->
                                                <!-- <th>Phone No.</th> -->
                                                <!-- <th>Interest In</th> -->
                                                <!-- <th>Alloted </th> -->
                                                <th>Enquiry</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            <?php $i=1; foreach ($message as  $value) { ?>
                                                <tr>
                                                    <th><?php echo $i++; ?></th>
                                                    <td><?php echo $value['name']; ?></td>
                                                    <!-- <td><?php echo $value['email']; ?></td> -->
                                                    <!-- <td><?php echo $value['mobile']; ?></td> -->


<!--                                                     <td>
                                                     <?php    $id = $value['category'];
                                                     $where='id';
                                                     $table='category';
                                                     $data = $this->Vendormodel->select_comm_where($where,$id,$table);
                                                     echo $data[0]['name']; ?> 
                                                 </td>
                                                 <td> 
                                                    <?php  echo $_SESSION['proffessional_name'];  ?> 
                                                </td>
 -->

                                                <td class="text-center">
                                                 <a href="<?php echo base_url('Vendor/view/'.$value['user_id'].'/'.$value['id']); ?>" class="btzn btn-colzor1 w-md waves-effect waves-light w-xs m-b-5"><i class="fa fa-eye"></i></a>

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


                     </div> <!-- container -->

                 </div> <!-- content -->
                 <?php
                 include 'footer.php';
                 ?>
