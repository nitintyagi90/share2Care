<?php
//pr($message);die;
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
                                    <h4 class="page-title clr">Expert Panel</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li>Hello <a href="#<?php//echo base_url('index.php/Vendor/Dashboard'); ?>"><?php echo $message[0]['p_name']?></a></li>

                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                       

                       <div class="row">
                            <!-- User Details -->
							 <center>
<?php
if($_REQUEST['msg']!="")
{
$upd=$_REQUEST['msg'];
echo "<font color=Red><b>$upd</b></font>";	
echo"<META HTTP-EQUIV='Refresh' CONTENT='2;/index.php/Vendor/Profile'>";
}
else
{
echo""	;
}
?>
</center>
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 m-b-20 header-title text-center"><b>Your Details</b></h4> <form class="form-horizontal" action="<?php echo base_url('index.php/Vendor/UpdateProfile'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="row text-center">
                                            <div class="member-card">
                                                <div class="col-md-3">
                                                    <div class="thumb-xl member-thumb m-b-10 center-block">
                                                        <?php if($message[0]['p_image']){ ?>
                                                        <img src="<?php echo $message[0]['p_image']?>" class="img-circl img-thumbnai" width="120px" height="100px" alt="profile-image">
														 <input type="hidden" class="filestyle" value="<?php echo $message[0]['p_image']?>" name="file">
                                                    <?php }else{ ?>
                                                         <img src="<?php echo base_url();?>image/users/user.png" class="img-circle img-thumbnail" alt="profile-image">
														 <br /><br />
														  <input type="file" class="filestyle" data-input="false" name="file">
														   <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                                    <?php }?>
                                                       
                                                    </div>

                                                   
                                                </div>
                                                <div class="col-md-9">
                                                   
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" value="<?php echo $message[0]['p_name']?>"  class="form-control" placeholder="Professional Name" name="name"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Email</label>
                                                    <div class="col-md-6">
                                                        <input type="email" value="<?php echo $message[0]['p_email']?>" class="form-control" placeholder="Email Here" name="email" readonly  required>
                                                    </div>
                                                </div>

                                              
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Mobile No.</label>
                                                    <div class="col-md-6">
													<span style="position: absolute; z-index: 1; font-size: 14px; margin-top: 10px; left: 20px;">+ 91 - </span>
                                                        <input style="padding-left: 55px;" type="text" class="form-control" value="<?php echo $message[0]['p_mobile']?>" placeholder="Mobile No" name="mobile" readonly  required>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Designation</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" value="<?php echo $message[0]['p_destination']?>" placeholder="Designation" name="destination" required>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Experience</label>
                                                    <div class="col-md-6">
													<select name="experience" class="form-control option-list" required >
													<option value="<?php echo $message[0]['p_experience']?>"><?php echo $message[0]['p_experience']?></option>
													<option value="">---- To change select below----</option>
													<option value="< 10 Yr.">< 10 Yr.</option>
													<option value="10 - 20 Yr">10 - 20 Yr</option>
													<option value="20 - 30 yr">20 - 30 yr</option>
													<option value="30 Yr >">30 Yr ></option>
</select>													
                                                        
                                                    </div>
                                                    
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-2 control-label">Category</label>
                                                    <div class="col-md-6">
                                                    <select name="category" class="form-control option-list" required >
                                                        <?php foreach ($category as  $value) {
                                                         ?>
                                                   <option value="<?=$value['id']?>" <?php if($value['id']==$message[0]['p_cat']){echo 'Selected';} ?>><?=$value['name']?></option>
                                                        <?php } ?>
                                                    </select>                                                   
                                                        
                                                    </div>
                                                    
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Description</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" value="<?php echo $message[0]['p_description']?>" placeholder="Description Here ..." name="description"  required>
                                                    </div>
                                                    
                                                </div>
                                               
                                           
                                                </div>
                                            </div>
                                        </div> <!-- end card-box -->
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <input type="submit" class="btn btn-success" value="update">
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