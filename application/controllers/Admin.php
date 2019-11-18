<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Adminmodel');


	}

	public function index()
	{

		if(!empty($this->session->userdata('session_id')))
		{
			redirect('index.php/Admin/Dashboard');
			// $this->load->view('Admin/Dashboard');

		}
		$this->load->view('Admin/login');
	}
	public function admin_login()
	{
		$data= array(
			'name' => $this->input->post('name'),
			'pass' => md5($this->input->post('pass'))
		);
		$table='admin';
		$login=$this->Adminmodel->admin_log($data,$table);

		if ($login)
		{

			$newdata = array('session_id'  => $login->id,
				'session_name'  => $login->email
			);
			$this->session->set_userdata($newdata);
			redirect('index.php/Admin/Dashboard');
		}

		else
		{
			echo "please enter correct login password";
		}
	}

	public function Dashboard()
	{
				 // /is_protected();
		if(empty($this->session->userdata('session_id')))
		{
			redirect('Admin/index');
		}

		$table='query';
		$data['query']=$this->Adminmodel->dashquery();
		$this->load->view('Admin/dashboard.php',$data);
	}
	public function logout(){
		session_destroy();
		redirect('Admin/index');
	}

	public function Proffesional()
	{
		is_protected();
		$data['message']=$this->Adminmodel->Proffesional();

		$this->load->view('Admin/professional.php',$data);
	}
	public function forgot()
	{

		$this->load->view('Admin/forgot.php');
	}
	public function Slider()
	{
		is_protected();
		/*$data['message']=$this->Adminmodel->Proffesional();*/

		$this->load->view('Admin/slider.php');
	}
	public function About()
	{
		is_protected();
		/*$data['message']=$this->Adminmodel->Proffesional();*/
		$id='1';
		$where='id';
		$table='about';
		$data['note'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		$this->load->view('Admin/about.php',$data);
	}
	public function Why()
	{
		is_protected();
		$id='2';
		$where='id';
		$table='about';
		$data['note'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		$this->load->view('Admin/whyshareTcare.php',$data);
	}
	public function steps()
	{
		is_protected();
		$id='3';
		$where='id';
		$table='about';
		$data['note'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		$this->load->view('Admin/step-to-follow.php',$data);
	}

	public function Event()
	{
		is_protected();
		/*$data['message']=$this->Adminmodel->Proffesional();*/
		$id='4';
		$where='id';
		$table='about';
		$data['note'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		$this->load->view('Admin/event.php',$data);
	}

	public function User(){
		is_protected();
		$data['message']=$this->Adminmodel->User();
		$this->load->view('Admin/user.php',$data);
	}
	public function editUser(){
		is_protected();


		$data = array(
			'u_name' => $_POST['name'],			       
			'u_email' =>$_POST['email'],
			'u_phone' =>$_POST['mobile'] 

		);

		$table='Users';
		$where='id';
		$id=$_POST['id'];

		$id=$this->Adminmodel->update_comm($table,$data,$where,$id);
		redirect('Admin/User');
	}
	public function direct(){
		is_protected();

		$id='1';
		$where='pro_enquiry';
		$table='query';
		$data['message'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		$table='proffesional';
		$where='p_active';
		$id='1';
		$data['alloted']=$this->Adminmodel->select_comm_where($where,$id,$table);
		$table='category';
		$data['category']=$this->Adminmodel->select_comm($table);
	//	pr($data);die;
		$this->load->view('Admin/direct-enquiry.php',$data);
	}
	public function viewpending(){
		is_protected();
		$id='1';
		$where='pro_enquiry';
		$table='query';
		$data['message'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		/*$table='proffesional';*/
		$this->load->view('Admin/viewpending.php',$data);
	}
	public function viewall(){
		is_protected();
		$table='query';
		$data['message'] =$this->Adminmodel->select_comm($table);
		$table='proffesional';
		$where='p_active';
		$id='1';
		$data['alloted']=$this->Adminmodel->select_comm_where($where,$id,$table);
		$table='category';
		$data['category']=$this->Adminmodel->select_comm($table);
		$this->load->view('Admin/viewall.php',$data);
	}
	public function profenquiry(){
		is_protected();
		$id='2';
		$where='pro_enquiry';
		$table='query';
		$data['message'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		$table='proffesional';
		$where='p_active';
		$id='1';
		$data['alloted']=$this->Adminmodel->select_comm_where($where,$id,$table);
		$table='category';
		$data['category']=$this->Adminmodel->select_comm($table);
		$this->load->view('Admin/professional-enquiry.php',$data);
	}
	public function userdetails(){
		is_protected();
		$id=$this->uri->segment(3);
		$where='user_id';
		$table='query';
		$data['message'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		$table='proffesional';
		$where='p_active';
		$id='1';
		$data['alloted']=$this->Adminmodel->select_comm_where($where,$id,$table);
		$table='category';
		$data['category']=$this->Adminmodel->select_comm($table);
		$this->load->view('Admin/userdetails.php',$data);
	}
	public function create(){
		is_protected();
		$data['message']=$this->Adminmodel->User();

		$this->load->view('Admin/create-enquiry.php',$data);
	}
	public function addprofession(){
		is_protected();

		$image = $_FILES['files']['name'];
		$url = base_url();

		$path = $url."image/".$image;	
		@unlink($path);

		$data = array(
			'p_name' => $_POST['name'],			       
			'p_destination' =>$_POST['designation'],
			'p_mobile' =>$_POST['mobile'], 
			'p_description' =>$_POST['description'],
			'p_experience' =>$_POST['experience'],
			'p_cat' =>$_POST['cat'],
			'p_password'=>$_POST['pass'],
			'p_email'=>$_POST['email'],
			'p_image'=>$path,
);

$table='proffesional';
move_uploaded_file($_FILES["file"]["tmp_name"], "./image/".$image);
$id=$this->Adminmodel->insert_comm($table,$data);
$to = $_POST['email'];
$subject = "Expert Details";
$txt = "Name-".$_POST['name']."\n Mobile-".$_POST['phone']."\n Email -".$_POST['email']."\n Password -".$_POST['pass'];
$headers = "From: info.share2care@gmail.com";	
mail($to,$subject,$txt,$headers);
redirect('index.php/Admin/Proffesional?msg=Expert Added Succesfully');
}

public function editprofession(){
		is_protected();
		
		$path1=  base_url().'image/';
		if(!empty($_FILES["file"]))
		{
		$upload_image=$_FILES["file"]["name"];			
		$path = $path1.$upload_image;			
		$upload = move_uploaded_file($_FILES["file"]["tmp_name"], "./image/".$upload_image); 			
		if($upload){
		$img_name = $path1.$upload_image;
		}
		}else{
		$img_name = $_POST['file'];
		}
		$data = array(
			'p_name' => $_POST['name'],	
            'p_email' =>$_POST['email'],				
			'p_mobile' =>$_POST['mobile'],	
            'p_destination' =>$_POST['designation'],			
			'p_experience' =>$_POST['experience'],
			'p_description' =>$_POST['description'],
			'p_cat' =>$_POST['cat'],
			'p_image' => $img_name	

		);

		$table='proffesional';
		$where='id';
		$id=$_POST['id'];

		$id=$this->Adminmodel->update_comm($table,$data,$where,$id);
		redirect('index.php/Admin/Proffesional');
	}
	public function delprofession(){
		is_protected();

		$table='proffesional';
		$where='id';
		$id=$this->uri->segment(3);

		$id=$this->Adminmodel->delete_comm($where,$id,$table);
		redirect('index.php/Admin/Proffesional');
	}
	public function deluser(){
		is_protected();

		$table='Users';
		$where='id';
		$id=$this->uri->segment(3);

		$id=$this->Adminmodel->delete_comm($where,$id,$table);
		redirect('index.php/Admin/User');
	}
	public function view(){
		$id=$this->uri->segment(3);
		$where='id';
		$table='Users';
		$data['profession'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		$id=$this->uri->segment(4);
		$where='id';
		$table='query';
		$data['query'] =$this->Adminmodel->select_comm_where($where,$id,$table);
		$this->load->view('Admin/view.php',$data);
	}
	public function category(){
		$table='category';
		$data['message']=$this->Adminmodel->select_comm($table);

		$this->load->view('Admin/category.php',$data);

	}
	public function addcat(){
		is_protected();

		$data = array(
			'name' => $_POST['name']		       


		);

		$table='category';


		$id=$this->Adminmodel->insert_comm($table,$data);
		redirect('index.php/Admin/category');
	}
	public function editcat(){
		is_protected();


		$data = array(
			'name' => $_POST['name'],			       


		);

		$table='category';
		$where='id';
		$id=$_POST['id'];

		$id=$this->Adminmodel->update_comm($table,$data,$where,$id);
		redirect('index.php/Admin/category');
	}
	public function delcat(){
		is_protected();

		$table='category';
		$where='id';
		$id=$this->uri->segment(3);

		$id=$this->Adminmodel->delete_comm($where,$id,$table);
		redirect('index.php/Admin/category');
	}
	public function delproquery(){
		is_protected();

		$table='query';
		$where='id';
		$id=$this->uri->segment(3);

		$id=$this->Adminmodel->delete_comm($where,$id,$table);
		$table='comment';
		$where='query_id';
		$id=$this->uri->segment(3);

		$id=$this->Adminmodel->delete_comm($where,$id,$table);
		redirect('index.php/Admin/profenquiry');
	}


	public function delquery(){
		is_protected();

		$table='query';
		$where='id';
		$id=$this->uri->segment(3);

		$id=$this->Adminmodel->delete_comm($where,$id,$table);
		$table='comment';
		$where='query_id';
		$id=$this->uri->segment(3);

		$id=$this->Adminmodel->delete_comm($where,$id,$table);
		redirect('index.php/Admin/direct');
	}




	public function dellatestquery(){
		// is_protected();
// 
		$table='query';
		$where='id';
		$id=$this->uri->segment(3);

		$id=$this->Adminmodel->delete_comm($where,$id,$table);
		$table='comment';
		$where='query_id';
		$id=$this->uri->segment(3);

		$id=$this->Adminmodel->delete_comm($where,$id,$table);

		redirect('index.php/Admin/dashboard');
	}



public function city(){
$id = $_POST['state_id'];
$postid=$_POST['id'];
$where='p_cat';
$table='proffesional';
$names=$this->Adminmodel->select_comm_where($where,$id,$table);
echo '<span>'; ?>
<option value="0">Not Alloted</option>
<?php 	foreach ($names as  $values) {   ?>
<option value="<?php echo  $values['id']?>"><?php echo  $values['p_name']?></option> 
<?php }
echo '</span>';
}


public function updatealot(){
is_protected();
if($_POST['city']==1){
$pr=1;
}else{
$pr=2;
$table='comment';
date_default_timezone_set('Asia/Kolkata'); 
$dates=date("d-m-Y h:i:A");
$data=array(
'comment' => $this->input->post('comment'),
'date' => $dates,
'pro_id' =>$_POST['city'],
//'user_id' => $_POST['user'],
'query_id' => $_POST['id']
);
$table='comment';
$where='query_id';
$id=$_POST['id'];
$id=$this->Adminmodel->update_comm($table,$data,$where,$id);
$id=$_POST['city'];
$where='id';
$table='proffesional';
$prof=$this->Adminmodel->select_comm_where($where,$id,$table);
$to = $prof[0]['p_email'];
$subject = "Dear Expert, New Direct Enquiry Alloted";
$txt = "Hello ".$_POST['exname']."\n\nNew Enquiry alloted to you by admin. please login into your account on www.share2care.co\n Thanks & Regards\nTeam Share2Care";
$headers = "From: info.share2care@gmail.com";
mail($to,$subject,$txt,$headers);
}
$data = array(
'is_assigned' => $_POST['city'],			       
'pro_enquiry'=>$pr
);
$table='query';
$where='id';
$id=$_POST['id'];
$id=$this->Adminmodel->update_comm($table,$data,$where,$id);
}


	
	public function addslider(){


		$data=array(
			'des1' => $this->input->post('des1'),
			'des2' => $this->input->post('des2'),
			'des3' => $this->input->post('des3'),
			'des4' => $this->input->post('des4'),
			'des5' => $this->input->post('des5'),
			'des6' => $this->input->post('des6')


		);
		$where='id';
		$id = $_POST['id'];
		$table='slider';
		$this->Adminmodel->update_comm($table,$data,$where,$id);	
		redirect('index.php/Admin/Slider');
	}
	public function addabout(){
		is_protected();


		$data = array(
			'note1' => $_POST['note'],		       
			'note2'=>$_POST['note2'],
			'note3'=>$_POST['note3'],
			'note4'=>$_POST['note4'],
			'note5'=>$_POST['note5']

		);
		
		$table='about';
		$where='id';
		$id = '1';
		$this->Adminmodel->update_comm($table,$data,$where,$id);	
		redirect('index.php/Admin/About');
	}



	public function addevent(){

		$data = array(
			'note1' => $_POST['note'],		       
		);
		
		$table='about';
		$where='id';
		$id = '4';
		$this->Adminmodel->update_comm($table,$data,$where,$id);	
		redirect('index.php/Admin/Event');
	}


	public function addshare(){
		is_protected();

		$data = array(
			'note1' => $_POST['note'],		       
			'note2'=>$_POST['note2']


		);

		$table='about';
		$where='id';
		$id = '2';
		$this->Adminmodel->update_comm($table,$data,$where,$id);	
		redirect('index.php/Admin/About');
	}
	public function addfolow(){
		is_protected();

		$data = array(
			'note1' => $_POST['note'],


		);

		$table='about';
		$where='id';
		$id = '3';
		$this->Adminmodel->update_comm($table,$data,$where,$id);	
		redirect('index.php/Admin/About');
	}
	public function addfollowimage(){
		is_protected();

		$image = $_FILES['file']['name'];
		$url = base_url();

		$path = $url."image/".$image;	
		@unlink($path);

		$data = array(
			'note2' => $path			       


		);



		move_uploaded_file($_FILES["file"]["tmp_name"], "./image/".$image);

		$table='about';
		$where='id';
		$id = '3';
		$this->Adminmodel->update_comm($table,$data,$where,$id);	
		redirect('index.php/Admin/steps');
	}
public function chat(){
//is_protected();
date_default_timezone_set('Asia/Kolkata'); 
$dates=date("d-m-Y h:i:A");
$data = array(
'user_id' => $_POST['userid'],			       
'pro_id' =>$_POST['proid'],
'comment' =>$_POST['text'], 
'query_id' =>$_POST['queryid'],
'is_comment' =>'1',
'date' =>$dates,
);
$table='comment';
$id=$this->Adminmodel->insert_comm($table,$data);
$uname=$_POST['uname'];
$uemail=$_POST['uemail'];
$umob=$_POST['umob'];
$umsg=$_POST['umsg'];
$uenq=$_POST['uenq'];

$to = $_POST['uemail'];
$subject = "Reply Recieved for Enquiry No." .$uenq." on ".$dates;
$txt = "Hello " .$_POST['uname']."\n\nExpert Replied to your Query No. " .$_POST['uenq'].". Please login your account on www.share2care.co";
$headers = "From: info.share2care@gmail.com";
mail($to,$subject,$txt,$headers);

$toa = 'amit@maztro.com';
$subject = "Admin Reply for Enquiry No." .$uenq." on ".$dates;
$txt = "Hello Admin\n\nYou Replied to your Query No. " .$_POST['uenq'];
$headers = "From: info.share2care@gmail.com";
mail($toa,$subject,$txt,$headers);
adminreply($umob,$uname);
redirect('index.php/Admin/create');
	}
public function status(){
is_protected();
$data = array(
'p_active' => $_POST['status'],     
);
$table='proffesional';
$where='id';
$id=$_POST['id'];
$id=$this->Adminmodel->update_comm($table,$data,$where,$id);
$mob=$_POST['mobile'];
$ename=$_POST['ename'];
$email=$_POST['email'];
$to = $_POST['email'];
$subject = "Your Expert Account Approved by Admin.";
$txt = "Hello " .$_POST['ename']."\n\n Your expert account approved successfully by Admin. Please login into your expert account on www.share2care.co";
$headers = "From: info.share2care@gmail.com";	
mail($to,$subject,$txt,$headers);
exprtaprve($mob,$ename);
}


	public function status_enquiry(){
		is_protected();


		$data = array(
			'is_active' => $_POST['status'],			       

		);

		$table='query';
		$where='id';
		$id=$_POST['id'];

		$ids=$this->Adminmodel->update_comm($table,$data,$where,$id);

		$expert =$this->Adminmodel->select_comm_where($where,$id,$table);
	//	pr($expert);die;
		$expertid = $expert[0]['is_assigned'];
		$table='proffesional';
		$where='id';
		$proffesionaldetail =$this->Adminmodel->select_comm_where($where,$expertid,$table);

		$pemail = $proffesionaldetail[0]['p_email'];
		$pmobile = $proffesionaldetail[0]['p_mobile'];
		$to = $pemail;
		$subject = "Enquiry Approved - S2C-".$id;
		$txt = "Enquiry Number S2C-".$id. " is Approved . Please Login your account to reply.";
		$headers = "From: info.share2care@gmail.com";
		if($_POST['status']==2){
		mail($to,$subject,$txt,$headers);
		enqapproved($pmobile,$id);
		}
	}
	public function Reset(){	


		$login='info.share2care@gmail.com';							

		$userid=$login; 

		$id=base64_encode($userid);

		$temp_pass = $id;


		$url=base_url('Admin/reset_password/'.$temp_pass);
		$to = $login;
		$subject = "Forgot Password";
		$txt = "Forgot Password-".$url;
		$headers = "From: info.share2care@gmail.com";

		mail($to,$subject,$txt,$headers);
		echo "done";

	}



	public function reset_password($temp_pass){

		$id['idd']= $this->uri->segment(3);
		$this->load->view('Admin/reset.php',$id);

	}

	public function update_password(){

		$id='1';

		$data= array(
			'pass' => md5($this->input->post('password'))
		); 




		$this->Adminmodel->is_temp_pass_valid($data,$id);


	}
	public function filter(){
		is_protected();
		$cat = $_POST['Interest'];
		$alloted = $_POST['alloted'];
		$status = $_POST['status'];
		$message  =  $this->Adminmodel->filter($cat,$alloted,$status);
		$i=1; foreach ($message as  $value) {
			echo  '<tr>'; ?>
			<th><?php echo $i++; ?></th>
			<td><?php echo $value['name']; ?></td>
			<td><?php echo $value['email']; ?></td>
			<td><?php echo $value['mobile']; ?></td>


			<td> <select class="form-control" id="states_<?php echo $value['id']; ?>" onchange="getstates('<?php echo $value['id']; ?>')">


				<?php $table='category';
				$named=$this->Adminmodel->select_comm($table); foreach ($named as  $valued) {
					?>
					<option value="<?php echo $valued['id']; ?>" <?php if($valued['id']==$value['category']){echo "selected"; } ?>><?php echo $valued['name']; ?></option>
				<?php } ?>          
			</select></td>
			<td> <span id="citys"><select class="form-control" id="city_<?php echo $value['id']; ?>" onchange="updatealot('<?php echo $value['id']; ?>');">
				<span>
					<option value="1">Not Alloted</option>
					<?php $table='proffesional';
					$name=$this->Adminmodel->select_comm($table); foreach ($name as  $value1) {
						if($value1['p_active']==1) {   ?>

							<option value="<?php echo $value1['id']; ?>" <?php if($value1['id']==$value['is_assigned']){echo "selected"; } ?>><?php echo $value1['p_name']; ?></option>
							<?php } } ?></span>
						</select></span></td>
						<td class="text-center">
							<select class="form-control"  id="aprove_<?php echo $value['id']; ?>" onchange="status('<?php echo $value['id']; ?>');">
								<option value="1"  <?php if($value['is_active']=='1'){echo "selected"; } ?>>Disapproved</option>
								<option value="2" <?php if($value['is_active']=='2'){echo "selected"; } ?>>Approved</option>
							</select> 
							<input type="hidden" id="comment_<?php echo  $value['id'] ?>" value="<?php echo  $value['message'] ?>">
							<input type="hidden" id="user_<?php echo  $value['id'] ?>" value="<?php echo  $value['user_id'] ?>">
							<td class="text-center">
								<a href="<?php echo base_url('Admin/view/'.$value['user_id'].'/'.$value['id']); ?>" class="btn btn-color1 w-md waves-effect waves-light w-xs m-b-5">View Enquiry</a>
							</td>
							<td class="text-center">

								<span><a href="#<?php echo $value['id']; ?>_del" data-toggle="modal"><i class="mdi mdi-delete-forever clr"></i></a></span>
							</td>
							<?php echo  '</tr>'; } 

						}
						public function filter1(){
							is_protected();
							$cat = $_POST['Interest'];
							$alloted = $_POST['alloted'];
							$status = $_POST['status'];
							$message  =  $this->Adminmodel->filter1($cat,$alloted,$status);
							$i=1; foreach ($message as  $value) {
								echo  '<tr>'; ?>
								<th><?php echo $i++; ?></th>
								<td><?php echo $value['name']; ?></td>
								<td><?php echo $value['email']; ?></td>
								<td><?php echo $value['mobile']; ?></td>


								<td> <select class="form-control" id="states_<?php echo $value['id']; ?>" onchange="getstates('<?php echo $value['id']; ?>')">


									<?php $table='category';
									$named=$this->Adminmodel->select_comm($table); foreach ($named as  $valued) {
										?>
										<option value="<?php echo $valued['id']; ?>" <?php if($valued['id']==$value['category']){echo "selected"; } ?>><?php echo $valued['name']; ?></option>
									<?php } ?>          
								</select></td>
								<td> <span id="citys"><select class="form-control" id="city_<?php echo $value['id']; ?>" onchange="updatealot('<?php echo $value['id']; ?>');">
									<span>
										<option value="1">Not Alloted</option>
										<?php $table='proffesional';
										$name=$this->Adminmodel->select_comm($table); foreach ($name as  $value1) {
											if($value1['p_active']==1) {   ?>

												<option value="<?php echo $value1['id']; ?>" <?php if($value1['id']==$value['is_assigned']){echo "selected"; } ?>><?php echo $value1['p_name']; ?></option>
												<?php } } ?></span>
											</select></span></td>
											<td class="text-center">
												<select class="form-control"  id="aprove_<?php echo $value['id']; ?>" onchange="status('<?php echo $value['id']; ?>');">
													<option value="1"  <?php if($value['is_active']=='1'){echo "selected"; } ?>>Disapproved</option>
													<option value="2" <?php if($value['is_active']=='2'){echo "selected"; } ?>>Approved</option>
												</select> 
												<input type="hidden" id="comment_<?php echo  $value['id'] ?>" value="<?php echo  $value['message'] ?>">
												<input type="hidden" id="user_<?php echo  $value['id'] ?>" value="<?php echo  $value['user_id'] ?>">
												<td class="text-center">
													<a href="<?php echo base_url('Admin/view/'.$value['user_id'].'/'.$value['id']); ?>" class="btn btn-color1 w-md waves-effect waves-light w-xs m-b-5">View Enquiry</a>
												</td>
												<td class="text-center">

													<span><a href="#<?php echo $value['id']; ?>_del" data-toggle="modal"><i class="mdi mdi-delete-forever clr"></i></a></span>
												</td>
												<?php echo  '</tr>'; } 
											}

											public function filter2(){
												is_protected();
												$cat = $_POST['Interest'];
												$alloted = $_POST['alloted'];
												$status = $_POST['status'];
												$message  =  $this->Adminmodel->filter2($cat,$alloted,$status);
												$i=1; foreach ($message as  $value) {
													echo  '<tr>'; ?>
													<th><?php echo $i++; ?></th>
													<td><?php echo $value['name']; ?></td>
													<td><?php echo $value['email']; ?></td>
													<td><?php echo $value['mobile']; ?></td>


													<td> <select class="form-control" id="states_<?php echo $value['id']; ?>" onchange="getstates('<?php echo $value['id']; ?>')">


														<?php $table='category';
														$named=$this->Adminmodel->select_comm($table); foreach ($named as  $valued) {
															?>
															<option value="<?php echo $valued['id']; ?>" <?php if($valued['id']==$value['category']){echo "selected"; } ?>><?php echo $valued['name']; ?></option>
														<?php } ?>          
													</select></td>
													<td> <span id="citys"><select class="form-control" id="city_<?php echo $value['id']; ?>" onchange="updatealot('<?php echo $value['id']; ?>');">
														<span>
															<option value="1">Not Alloted</option>
															<?php $table='proffesional';
															$name=$this->Adminmodel->select_comm($table); foreach ($name as  $value1) {
																if($value1['p_active']==1) {   ?>

																	<option value="<?php echo $value1['id']; ?>" <?php if($value1['id']==$value['is_assigned']){echo "selected"; } ?>><?php echo $value1['p_name']; ?></option>
																	<?php } } ?></span>
																</select></span></td>
																<td class="text-center">
																	<select class="form-control"  id="aprove_<?php echo $value['id']; ?>" onchange="status('<?php echo $value['id']; ?>');">
																		<option value="1"  <?php if($value['is_active']=='1'){echo "selected"; } ?>>Disapproved</option>
																		<option value="2" <?php if($value['is_active']=='2'){echo "selected"; } ?>>Approved</option>
																	</select> 
																	<input type="hidden" id="comment_<?php echo  $value['id'] ?>" value="<?php echo  $value['message'] ?>">
																	<input type="hidden" id="user_<?php echo  $value['id'] ?>" value="<?php echo  $value['user_id'] ?>">
																	<td class="text-center">
																		<a href="<?php echo base_url('Admin/view/'.$value['user_id'].'/'.$value['id']); ?>" class="btn btn-color1 w-md waves-effect waves-light w-xs m-b-5">View Enquiry</a>
																	</td>
																	<td class="text-center">

																		<span><a href="#<?php echo $value['id']; ?>_del" data-toggle="modal"><i class="mdi mdi-delete-forever clr"></i></a></span>
																	</td>
																	<?php echo  '</tr>'; } 
																}
															}
