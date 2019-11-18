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
                                    <h4 class="page-title clr">About (What We Do)</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li><a href="<?php echo base_url('Admin/Dashboard'); ?>">Dashboard</a></li>
                                        <li class="active clr">
                                           About (What We Do)
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
                                    <h3 class="m-t-0 m-b-20 header-title text-center"><b class="clr">About (What We Do) Details</b></h4> <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                       <div class="summernote" id="summernote">
                                       <?php echo $note[0]['note1']; ?>
                                        </div>

                                   </form>
                                </div>
                                <div class="card-box">
                                    <h3 class="m-t-0 m-b-20 header-title text-center"><b class="clr">About (Who we are) Details</b></h4> <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                       <div class="summernote" id="summernote2">
                                       <?php echo $note[0]['note2']; ?>
                                       
                                        </div>
                                   </form>
                                </div>
                                <div class="card-box">
                                    <h3 class="m-t-0 m-b-20 header-title text-center"><b class="clr">About (Our mission) Details</b></h4> <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                       <div class="summernote" id="summernote9">
                                       <?php echo $note[0]['note3']; ?>
                                       
                                        </div>
                                   </form>
                                </div>
                                 <div class="card-box">
                                    <h3 class="m-t-0 m-b-20 header-title text-center"><b class="clr">About (For whom, we are working) Details</b></h4> <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                       <div class="summernote" id="summernote4">
                                       <?php echo $note[0]['note4']; ?>
                                       
                                        </div>
                                   </form>
                                </div>
                                 <div class="form-group" style="display: none;">
                                                    <label class="col-md-2 control-label"><h4>Youtube Link 6&nbsp;:</h4></label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3" id="youtube"  name=""  value=""><?php echo $note[0]['note5']; ?></textarea>
                                                    </div>
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

                </div> <!-- content -->
                <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                
<?php
include 'footer.php';

?>
<script type="text/javascript">
function submit(){
  var note = $('#summernote').summernote('code');
  var note2 = $('#summernote2').summernote('code');
  var note3 = $('#summernote9').summernote('code');

  var note4 = $('#summernote4').summernote('code');
  var note5 = $('#youtube').val();
  var url=$('#url').val();
                 $.ajax({
            type: "POST",
            url: url+"Admin/addabout",
            data: {note:note,note2:note2,note3:note3,note4:note4,note5:note5},
            cache: false,
            success: function(result){
             // alert(result);exit();
            window.location.reload();    
       
                }
            });

}
</script>