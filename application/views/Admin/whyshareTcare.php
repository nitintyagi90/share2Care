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
                                    <h4 class="page-title clr">Why join Share2Care</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    	<li><a href="<?php echo base_url('Admin/Dashboard'); ?>">Dashboard</a></li>
                                        <li class="active clr">
                                           Why join Share2Care
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
                                    <h3 class="m-t-0 m-b-20 header-title text-center"><b>As Applicant</b></h4> <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                       <div class="summernote" id="summernote">
                                       <?php echo $note[0]['note1']; ?>
                                        </div>
                                   </form>
                                </div>
                                <div class="card-box">
                                    <h3 class="m-t-0 m-b-20 header-title text-center"><b>As Experts</b></h4> <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                       <div class="summernote"  id="summernote2">
                                        <?php echo $note[0]['note2']; ?>
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
  var note2 = $('#summernote2').summernote('code');

 var url=$('#url').val();
                 $.ajax({
            type: "POST",
            url: url+"Admin/addshare",
            data: {note:note,note2:note2},
            cache: false,
            success: function(result){
            window.location.reload();    
       
                }
            });
}
</script>