<?php include 'header.php'; ?>
<style type="text/css">
.btn-color1 {
background: #fff;
color: #71030f;
padding: 5px 21px 5px 21px;
border: 2px solid #9f0012;
}
.btn-color1:hover {
background: #9f0012;
color: #fff;
padding: 5px 21px 5px 21px;
border: 2px solid #9f0012;
}
</style>
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="card-box table-responsive">
<div class="row pd-bt"><div class="col-md-12"><div class="bs-box"><center><h2>My Enquiry</h2></center></div></div></div>
<table id="datatable" class="table table-striped table-bordered">
<thead>
<tr>
<th>S no.</th><th>Enquiry Number</th><th>Expert Name</th><th>Category</th> <th>Message</th><th>Date</th><th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1;
//pr($query);
foreach ($query as $value) {
$data= $value['id']; 
$comment=$this->Adminmodel->commentdatashare($data);
$id = $_SESSION['sessionid'];
$where='id';
$table='Users';
$data=$this->Adminmodel->select_comm_where($where,$id,$table);
$id = $value['category'];
$where='id';
$table='category';
$category=$this->Adminmodel->select_comm_where($where,$id,$table);
$id = $value['is_assigned'];
$where='id';
$table='proffesional';
$proffesional=$this->Adminmodel->select_comm_where($where,$id,$table);
//pr($proffesional);
?>   
<tr>
<th><?php echo $i++; ?></th>
<td><?php echo $value['enq_id']; ?></td>
<td><?php if(empty($proffesional)){ echo "Admin"; }else{ echo $proffesional[0]['p_name'];  } ?></td>
<td><?php echo $category[0]['name']; ?></td>
<td><?php echo $value['message']; ?></td> 
<td><?php echo $value['date']; ?></td>
<td class="text-center">
<a href="<?php echo base_url('index.php/Share/view/'.$_SESSION['sessionid'].'/'.$value['id']); ?>" class="btn btn-colors1 w-md waves-effect waves-light w-xs m-b-5"><i class="fa fa-eye"></i></a>
</td>
</tr><?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<!-- end row -->
</div>
<!-- <style type="text/css">
#login { display: none; }
.login,
.logout { 
    position: absolute; 
    top: -3px;
    right: 0;
}
.page-header { position: relative; }
.reviews {
    color: #555;    
    font-weight: bold;
    margin: 10px auto 20px;
}
.notes {
    color: #999;
    font-size: 12px;
}
.media .media-object { max-width: 120px; }
.media-body { position: relative; }
.media-date { 
    position: absolute; 
    right: 25px;
    top: 25px;
}
.media-date li { padding: 0; }
.media-date li:first-child:before { content: ''; }
.media-date li:before { 
    content: '.'; 
    margin-left: -2px; 
    margin-right: 2px;
}
.media-comment { margin-bottom: 20px; }
.media-replied { margin: 0 0 20px 50px; }
.media-replied .media-heading { padding-left: 6px; }

.btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
}
.btn-circle span { padding-right: 6px; }
.embed-responsive { margin-bottom: 20px; }
.tab-content {
    padding: 50px 15px;
    border: 1px solid #ddd;
    border-top: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
.custom-input-file {
    overflow: hidden;
    position: relative;
    width: 120px;
    height: 120px;
    background: #eee url('https://s3.amazonaws.com/uifaces/faces/twitter/walterstephanie/128.jpg');    
    background-size: 120px;
    border-radius: 120px;
}
input[type="file"]{
    z-index: 999;
    line-height: 0;
    font-size: 0;
    position: absolute;
    opacity: 0;
    filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
    margin: 0;
    padding:0;
    left:0;
}
.uploadPhoto {
    position: absolute;
    top: 25%;
    left: 25%;
    display: none;
    width: 50%;
    height: 50%;
    color: #fff;    
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;    
    background-color: rgba(0,0,0,.3);
    border-radius: 50px;
    cursor: pointer;
}
.custom-input-file:hover .uploadPhoto { display: block; }
</style> -->
<!-------- list -------->
   <!--  <section class="mg-top-bt">
        <div class="container">
            <div class="row border-bt mg-top-bt">
                <div class="bs-box">
                    <center>
                        <h2>My Queries</h2></center>
                </div>
                <div class="col-md-2 col-12">
                   
                </div>
                <div class="col-md-8 col-12 brdr">
                    
                   <div class="">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
       
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
             
                <li class="active"> <a href="#tab" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Query </h4></a></li>
                     
            </ul>  
    <?php $i=1; foreach ($query as $value) {
    $data= $value['id']; 
    $comment=$this->Adminmodel->commentdatashare($data);

    $id = $_SESSION['sessionid'];
    $where='id';
    $table='Users';
    $data=$this->Adminmodel->select_comm_where($where,$id,$table);
                                      ?>
                   
            <div class="tab-content">
                <div class="tab-pane active" id="tab">                
                    <ul class="media-list">
                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="<?php echo $data[0]['u_image'];?>" alt="profile">
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews"><?php echo $_SESSION['sessionname'];?> </h4>
                              <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd"><?php echo $value['date'];?></li>
                               
                              </ul>
                              <p class="media-comment">
                               <?php echo $value['message']; ?>
                              </p>
                            <?php 
                            $test=count($comment);
                            if($test>=2){ ?>
                              <a class="btn btn-info btn-circle text-uppercase" href="#reply1_<?php echo $value['id']; ?>" data-toggle="collapse"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                            <?php } ?>
                              <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne_<?php echo $value['id']; ?>"><span class="glyphicon glyphicon-comment"></span><span id="counts_<?php echo $value['id']; ?>"> <?php echo count($comment); ?> </span> comments</a>
                              <input type="hidden" id="count_<?php echo $value['id']; ?>" value="<?php echo count($comment); ?>">

                          </div>              
                        </div>
                         <div class="collapse" id="reply1_<?php echo $value['id']; ?>">
                            <ul class="media-list">
                                <li class="media media-replied">
                                   
                                    <div class="media-body">
                                      <form action="#" method="post" class="form-horizontal" id="commentForm" role="form"> 
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Reply</label>

                            <div class="col-sm-10">
                              <textarea class="form-control" name="addComment" id="comment_<?php echo $value['id']; ?>" rows="5"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <button class="btn btn-success btn-circle text-uppercase" type="button"  onclick="send('<?php echo $value['id']; ?>');"><span class="glyphicon glyphicon-send"></span> Submit Reply</button>
                            </div>
                        </div>            
                    </form>            
                                    </div>
                                </li>
                                
                            </ul>  
                        </div>
                       
                        <div class="collapse" id="replyOne_<?php echo $value['id']; ?>">
                             
                            <?php foreach ($comment as  $chat) {  
                            $id =$value['id'];
                            $countuser=$this->Adminmodel->countuser($id); ?>

                       <input type="hidden" id="countuser_<?php echo $value['id']; ?>" value="<?php echo count($countuser); ?>">
                       <input type="hidden" id="count_<?php echo $value['id']; ?>" value="<?php echo count($comment); ?>">
                     <span id="chat_<?php echo $value['id']; ?>"><span>
                        <input type="hidden" id="chatid" value="<?php echo  $chat['id']; ?>">
                            <ul class="media-list">
                                <li class="media media-replied">
                                    <a class="pull-left" href="#">
                                      <img class="media-object img-circle" src=" <?php if($chat['is_comment']==1){ ?> <?php echo base_url(); ?>/image/icon.png <?php } else if($chat['is_comment']==2){ ?><?php echo $chat['p_image']; ?><?php } else { ?><?php echo $data[0]['u_image']; } ?>" alt="profile">
                                    </a>
                                    <div class="media-body">
                                      <div class="well well-lg">
                                          <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span><?php if($chat['is_comment']==1){ ?> Admin <?php } else if($chat['is_comment']==2){ ?><?php echo $chat['p_name']; ?><?php } else { ?><?php echo $_SESSION['sessionname'];?> <?php } ?></h4>
                                          <ul class="media-date text-uppercase reviews list-inline">
                                            <li class="dd"><?php echo $chat['date']; ?></li>
                                           
                                          </ul>
                                          <p class="media-comment">
                                           <?php if($chat['is_comment']==1){ echo $chat['comment']; } else if($chat['is_comment']==2){ echo $chat['comment']; } else { ?><?php echo  $chat['comment'];?> <?php } ?>
                                          </p>
                                         
                                      </div>              
                                    </div>
                                </li>
                                
                <input type="hidden" id="url" value="<?php echo base_url(); ?>">   
   
          <input type="hidden" id="proids_<?php echo $value['id']; ?>" value="<?php echo $value['is_assigned']; ?>">  
                            </ul> 
                               </span>
                   </span>
                              <?php  } ?>
                           
                        </div>
                      </li>          
                     
                      
                    </ul> 
                </div>
                
            </div>
        <?php } ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="login">
        <div class="page-header">
            <h3 class="reviews">Leave your comment</h3>
            <div class="logout">
                <button class="btn btn-default btn-circle text-uppercase" type="button" onclick="$('#login').hide(); $('#logout').show()">
                    <span class="glyphicon glyphicon-off"></span> Login                    
                </button>                
            </div>
        </div>
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments-login" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Query 1</h4></a></li>
                <li><a href="#add-comment-disabled" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Query 2</h4></a></li>
                <li><a href="#new-account" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Query 3</h4></a></li>
            </ul>            
            <div class="tab-content">
                <div class="tab-pane active" id="comments-login">                
                    <ul class="media-list">
                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews">Marco</h4>
                              <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd">22</li>
                                <li class="mm">09</li>
                                <li class="aaaa">2014</li>
                              </ul>
                              <p class="media-comment">
                                Great snippet! Thanks for sharing.
                              </p>
                             
                              <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyThree"><span class="glyphicon glyphicon-comment"></span> 2 comments</a>
                          </div>              
                        </div>
                        <div class="collapse" id="replyThree">
                            <ul class="media-list">
                                <li class="media media-replied">
                                    <a class="pull-left" href="#">
                                      <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/ManikRathee/128.jpg" alt="profile">
                                    </a>
                                    <div class="media-body">
                                      <div class="well well-lg">
                                          <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> The Hipster</h4>
                                          <ul class="media-date text-uppercase reviews list-inline">
                                            <li class="dd">22</li>
                                            <li class="mm">09</li>
                                            <li class="aaaa">2014</li>
                                          </ul>
                                          <p class="media-comment">
                                            Nice job Maria.
                                          </p>
                                         
                                      </div>              
                                    </div>
                                </li>
                                <li class="media media-replied" id="replied">
                                    <a class="pull-left" href="#">
                                      <img class="media-object img-circle" src="https://pbs.twimg.com/profile_images/442656111636668417/Q_9oP8iZ.jpeg" alt="profile">
                                    </a>
                                    <div class="media-body">
                                      <div class="well well-lg">
                                          <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Mary</h4></h4>
                                          <ul class="media-date text-uppercase reviews list-inline">
                                            <li class="dd">22</li>
                                            <li class="mm">09</li>
                                            <li class="aaaa">2014</li>
                                          </ul>
                                          <p class="media-comment">
                                            Thank you Guys!
                                          </p>
                                         
                                      </div>              
                                    </div>
                                </li>
                            </ul>  
                        </div>
                      </li>          
                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kurafire/128.jpg" alt="profile">
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews">Nico</h4>
                              <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd">22</li>
                                <li class="mm">09</li>
                                <li class="aaaa">2014</li>
                              </ul>
                              <p class="media-comment">
                                I'm looking for that. Thanks!
                              </p>
                              <div class="embed-responsive embed-responsive-16by9">
                                  <iframe class="embed-responsive-item" src="//www.youtube.com/embed/80lNjkcp6gI" allowfullscreen></iframe>
                              </div>
                             
                          </div>              
                        </div>
                      </li>
                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/lady_katherine/128.jpg" alt="profile">
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews">Kriztine</h4>
                              <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd">22</li>
                                <li class="mm">09</li>
                                <li class="aaaa">2014</li>
                              </ul>
                              <p class="media-comment">
                                Yehhhh... Thanks for sharing.
                              </p>
                             
                              <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyFour"><span class="glyphicon glyphicon-comment"></span> 1 comment</a>
                          </div>              
                        </div>
                        <div class="collapse" id="replyFour">
                            <ul class="media-list">
                                <li class="media media-replied">
                                    <a class="pull-left" href="#">
                                      <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jackiesaik/128.jpg" alt="profile">
                                    </a>
                                    <div class="media-body">
                                      <div class="well well-lg">
                                          <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Lizz</h4>
                                          <ul class="media-date text-uppercase reviews list-inline">
                                            <li class="dd">22</li>
                                            <li class="mm">09</li>
                                            <li class="aaaa">2014</li>
                                          </ul>
                                          <p class="media-comment">
                                            Classy!
                                          </p>
                                         
                                      </div>              
                                    </div>
                                </li>
                            </ul>  
                        </div>
                      </li>
                    </ul> 
                </div>
         
                <div class="tab-pane" id="add-comment-disabled">
                    <div class="alert alert-info alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">×</span><span class="sr-only">Close</span>                        
                      </button>
                      <strong>Hey!</strong> If you already have an account <a href="#" class="alert-link">Login</a> now to make the comments you want. If you do not have an account yet you're welcome to <a href="#" class="alert-link"> create an account.</a>
                    </div>
                    <form action="#" method="post" class="form-horizontal" id="commentForm" role="form"> 
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="addComment" id="addComment" rows="5" disabled></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uploadMedia" class="col-sm-2 control-label">Upload media</label>
                            <div class="col-sm-10">                    
                                <div class="input-group">
                                  <div class="input-group-addon">http://</div>
                                  <input type="text" class="form-control" name="uploadMedia" id="uploadMedia" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <button class="btn btn-success btn-circle text-uppercase disabled" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                            </div>
                        </div>            
                    </form>
                </div>
                <div class="tab-pane" id="new-account">
                    <form action="#" method="post" class="form-horizontal" id="commentForm" role="form">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>                         
                        <div class="form-group">
                            <div class="checkbox">                
                                <label for="agreeTerms" class="col-sm-offset-2 col-sm-10">
                                    <input type="checkbox" name="agreeTerms" id="agreeTerms"> I agree all <a href="#">Terms & Conditions</a>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <button class="btn btn-primary btn-circle text-uppercase" type="submit" id="submit">Create an account</button>
                            </div>
                        </div>            
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div> 
      
                </div>
               
            </div>

        </div>
      </section> -->
      <!-------- list --------><br/>
      <?php
      include 'footer.php';
      ?>
      <script type="text/javascript">
        function send(id){

          var url=$("#url").val();
          var cid = $("#chatid").val();
          var comment=$("#comment_"+id).val();
          var count=$("#count_"+id).val();
          var countuser=$("#countuser_"+id).val();



          var productid = $("#proids_"+id).val();
          var text =parseInt(count) + 1;
          var countuse =parseInt(countuser);

          if(countuse<3){
            $.ajax({

              type: "POST",

              url: url+"Share/chat",

              data: {productid:productid,text:comment,id:id},

              cache: false,

              success: function(result){

                $("#chat_"+id).html(result);
                $("#counts_"+id).html(text);
                window.location.reload();

              }

            });
          }else{
            alert('maximum 3 comment');
          }
        }
      </script>

      <script>
        // $(document).ready(function () {
        //   $('#datatable').dataTable();
        //   $('#datatable-keytable').DataTable({keys: true});
        //   $('#datatable-responsive').DataTable();
        //   $('#datatable-colvid').DataTable({
        //     "dom": 'C<"clear">lfrtip',
        //     "colVis": {
        //       "buttonText": "Change columns"
        //     }
        //   });
        //   $('#datatable-scroller').DataTable({
        //     ajax: "../plugins/datatables/json/scroller-demo.json",
        //     deferRender: true,
        //     scrollY: 380,
        //     scrollCollapse: true,
        //     scroller: true
        //   });
        //   var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        //   var table = $('#datatable-fixed-col').DataTable({
        //     scrollY: "300px",
        //     scrollX: true,
        //     scrollCollapse: true,
        //     paging: false,
        //     fixedColumns: {
        //       leftColumns: 1,
        //       rightColumns: 1
        //     }
        //   });
        // });
        // TableManageButtons.init();

      </script>

