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
                                    <h4 class="page-title clr">Steps to follow</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li><a href="<?php echo base_url('Admin/Dashboard'); ?>">Dashboard</a></li>
                                        <li class="active clr">
                                           Steps to follow
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                       

                       <div class="row">
                            <!-- User Details -->
                            <div class="col-lg-3">
                                <form action="<?php echo base_url('Admin/addfollowimage'); ?>" method="post" enctype='multipart/form-data'>
                              <div class="thumb-xl member-thumb m-b-10 center-block">
                                                        <img src="<?php echo $note[0]['note2']; ?>" class="img-circle img-thumbnail" alt="steps-to-follow-image">
                                                    </div>
                              <div class="col-md-12 text-center">   <input type="file" class="filestyle" data-input="false" name="file">
                      
                                                <button type="submit" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">UPLOAD</button>
                                               
                                            </div> </form>
                            </div>
                            <div class="col-lg-9">
                                <div class="card-box">
                                    <h3 class="m-t-0 m-b-20 header-title text-center"><b class="clr">Steps to follow Details</b></h4> <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                       <div class="summernote" id="summernote">
                                       <?php echo $note[0]['note1']; ?>
                                        </div>

                                   </form>
                                </div>
                               
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                         <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light" onclick="submit();">Submit</button>
                                                <button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Cancel</button>
                                            </div>
                                        </div>
                    </div> <!-- container -->
<input type="hidden" id="url" value="<?php echo base_url(); ?>">
                </div> <!-- content -->
   <?php
include 'footer.php';               
?>
<script type="text/javascript">
function submit(){
  var note = $('#summernote').summernote('code');
 

 var url=$('#url').val();
                 $.ajax({
            type: "POST",
            url: url+"Admin/addfolow",
            data: {note:note},
            cache: false,
            success: function(result){
            window.location.reload();    
       
                }
            });

}
</script>