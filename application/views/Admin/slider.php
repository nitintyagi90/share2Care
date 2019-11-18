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
                                    <h4 class="page-title clr">Slider Content</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li><a href="<?php echo base_url('Admin/Dashboard'); ?>">Dashboard</a></li>
                                        <li class="active clr">
                                           Slider Content
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                       
   <?php     $table='slider';
$slider=$this->Adminmodel->select_comm($table);
?>
                       <div class="row">
                            <!-- User Details -->
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h3 class="m-t-0 m-b-20 header-title text-center"><b class="clr">Slider Content Details</b></h4> <form class="form-horizontal" action="addslider" method="post" enctype="multipart/form-data">
                                        <div class="row text-center">
                                            <div class="member-card">
                                               <div class="col-md-12">
                                                
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"><h4>Description 1&nbsp;:</h4></label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3" name="des1" value=""><?php echo $slider[0]['des1']; ?></textarea>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $slider[0]['id']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"><h4>Description 2&nbsp;:</h4></label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3" name="des2"  value=""><?php echo $slider[0]['des2']; ?></textarea>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label"><h4>Description 3&nbsp;:</h4></label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3"  name="des3"  value=""><?php echo $slider[0]['des3']; ?></textarea>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label"><h4>Description 4&nbsp;:</h4></label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3" name="des4"  value=""><?php echo $slider[0]['des4']; ?></textarea>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label"><h4>Description 5&nbsp;:</h4></label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3"  name="des5"  value=""><?php echo $slider[0]['des5']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"><h4>Description 6&nbsp;:</h4></label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3"  name="des6"  value=""><?php echo $slider[0]['des6']; ?></textarea>
                                                    </div>
                                                </div>
                                                 
                                            </div>
                                            </div>
                                        </div> <!-- end card-box -->
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">Submit</button>
                                                <button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Cancel</button>
                                            </div>
                                        </div>
                                         </form>
                                </div>

                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
<?php
include 'footer.php';

?>