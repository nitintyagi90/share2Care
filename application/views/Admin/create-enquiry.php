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
                                    <h4 class="page-title clr">Create Expert</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li><a href="<?php echo base_url('index.php/Admin/Dashboard'); ?>">Administrator</a></li>
                                        <li class="active clr">
                                          Create Expert
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                       

                       <div class="row">
                            <!-- User Details -->
                            <div class="col-lg-12">
                                <div class="card-box">
                                   <!--  <h4 class="m-t-0 m-b-20 header-title text-center"><b>Professional Details</b></h4>  -->
                                   <form class="form-horizontal" name="form" action="<?php echo base_url('index.php/Admin/addprofession'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="row text-center">
										
                                            <div class="member-card">
                                                <div class="col-md-3">
                                                    <div class="thumb-xl member-thumb m-b-10 center-block">
                                                        <img src="<?php echo base_url();?>image/users/user.png" class="img-circle img-thumbnail" alt="profile-image">
                                                        <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                                    </div>

                                                    <div style="margin-left: 27%;">
                                                        <div class="form-group">
                                                            <input type="file" class="filestyle" data-input="false" name="files">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                   
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="Name" name="name" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Designation</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="Designation" name="designation" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Experience</label>
                                                    <div class="col-md-6">
													<select class="form-control" name="experience" required="">
													 <option value="">Please Select</option>
													  <option value="< 10 Yrs">< 10 Yrs</option>
													  <option value="10 - 20 Yrs">10 - 20 Yrs</option>
													  <option value="20 - 30 Yrs">20 - 30 Yrs</option>
													  <option value="> 30 Yrs">> 30 Yrs</option>
                                                    </select></div>
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Mobile No.</label>
                                                    <div class="col-md-6">
													<span style="position: absolute; z-index: 1; font-size: 14px; margin-top: 7px; left: 25px;">+ 91 - </span>
                                                        <input style="padding-left: 55px;" type="text" minlength="10" maxlength="10" class="form-control" placeholder="Mobile Number" name="mobile" required="">
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Email ID</label>
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control" placeholder="Email ID" name="email" required="">
														<input type="hidden" class="form-control"  name="pass" value="123456">
                                                    </div>
                                                    
                                                </div>

                                                  <div class="form-group">
                                                    <label class="col-md-2 control-label">Category</label>
                                                    <div class="col-md-6">
                                                <select class="form-control" name="cat" required="">

                                             
                                           <?php $table='category';
                                            $named=$this->Adminmodel->select_comm($table); foreach ($named as  $valued) {
                                                      ?>
                                                    <option value="<?php echo $valued['id']; ?>"><?php echo $valued['name']; ?></option>
                                                   <?php } ?>          
                                                </select>
                                                  </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">About Me</label>
                                                    <div class="col-md-6">
                                                        <textarea class="form-control" rows="5" placeholder="Write about yourself ... " name="description" required=""></textarea>
                                                    </div>
                                                </div>
                                           
                                                </div>
                                            </div>
                                        </div> <!-- end card-box -->
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" name="register" 	class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light" onClick="return validate();">Create New</button>
                                                <button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Cancel</button>
                                            </div>
                                        </div>
                                         </form>
                                </div>

                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container -->
					<script language="javascript" type="text/javascript">
function validate(){
  var file= form.files.value;
       var reg = /(.*?)\.(jpg|bmp|jpeg|png)$/;
       if(!file.match(reg))
       {
    	   alert("Select jpg, png, bmp jpeg file only or invalid file");
    	   return false;
       }
       }
	   </script>
                </div> <!-- content -->
<?php include 'footer.php'; ?>