<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Share extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('ShareModel');
$this->load->model('Adminmodel');
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
$this->load->view('view.php',$data);
}
public function chat(){
//is_protected();
date_default_timezone_set('Asia/Kolkata'); 
$dates=date("d-m-Y h:i:A");
$data = array(
'user_id' => $_SESSION['sessionid'],			       
'pro_id' =>$_POST['proid'],
'comment' =>$_POST['text'], 
'query_id' =>$_POST['queryid'],
'is_comment' =>'0',
'date' =>$dates,
);
//	pr($data);die;
$table='comment';
$id=$this->Adminmodel->insert_comm($table,$data);

$to = $_POST['peml'];
$subject = "Dear Expert, User's reply for Enquiry No." .$_POST['enqid'];
$txt = "Hello Expert, \n\nUser asked a question for Enquiry No.".$_POST['enqid']. " please login into your account on www.share2care.co\n Thanks & Regards\nTeam Share2Care";
$headers = "From: info.share2care@gmail.com";
mail($to,$subject,$txt,$headers);
$pmob = $_POST['pmob'];
$enqid = $_POST['enqid'];
ureply($pmob,$enqid);
}

public function newotp(){
$otp=rand(1000,9999);		
$mob=$_POST['mobiles'];
sms91($mob,$otp);
$data=array(
'u_phone' => $this->input->post('mobiles'),
'otp' =>$otp,
);
$data1 = $_POST;
$id = $data1['mobiles'];
$where='u_phone';
$table='Users';
$mobiles=$this->Adminmodel->select_comm_where($where,$id,$table);

//pr($mobiles);die;
if(empty($mobiles))
{
$table='Users';
$user=$this->Adminmodel->insert_comm($table,$data);
}
else{
$table='Users';
$where='u_phone';
$id = $data1['mobiles'];
$data = array('otp' =>$otp );
$this->Adminmodel->update_comm($table,$data,$where,$id);
}
redirect("");
}

public function fetchotp(){
$id = $_POST['mobile'];
$where='u_phone';
$table='Users';
$emailfetch=$this->Adminmodel->select_comm_where($where,$id,$table);
if(empty($emailfetch[0]['u_email'])){
$data = array(
'u_email' => $this->input->post('email'),
'u_password' =>md5($this->input->post('pass')),
'u_pass' => $this->input->post('pass'),
'u_name' => $this->input->post('name'),
'u_date' =>$this->input->post('dates'),
);

// Query to user
$to = $_POST['email'];
$name = $_POST['name'];
$ddat = $_POST['dates'];
$headers = "From: info.share2care@gmail.com";
$subject = "++ Hi $name, Your Account Created Successfully on $ddat. ++";
$txt = "Thank You $name for Registerting with Share2care.\n+++++++++++++++++++++++++++++++++++++++++++\n
Your Details:\nName: ".$_POST['name']."\nEmail: ".$_POST['email']."\nMobile: ".$_POST['mobile']."\n+++++++++++++++++++++++++++++++++++++++++++\n 
Thanks & Regards\nTeam Share2Care";
mail($to,$subject,$txt,$headers);

// Mail to admin
$toad = "amit@maztro.com";
$name = $_POST['name'];
$subject = "New User Successfully Registered on $ddat. ++";
$txt = "+++++++++++++++++++++++++++++++++++++++++++\nUser Details:\nName: ".$_POST['name']."\nEmail: ".$_POST['email']."\nMobile: ".$_POST['mobile']."\n+++++++++++++++++++++++++++++++++++++++++++\n";
mail($toad,$subject,$txt,$headers);
$table='Users';
$where='u_phone';
$id = $_POST['mobile'];
$this->Adminmodel->update_comm($table,$data,$where,$id);	
$data= array(
'mobile' => $this->input->post('mobile'),
'otp' => $this->input->post('otpfetch'),
'u_date' =>$this->input->post('dates'),
);
$login=$this->ShareModel->otp_login1($data);
}
else{
$data= array(
'u_name' => $this->input->post('name'),
'u_email' => $this->input->post('email'),
'u_password' =>md5($this->input->post('pass')),
'u_pass' => $this->input->post('pass'),
'mobile' => $this->input->post('mobile'),		
'u_date' => $this->input->post('dates'),
);
$login=$this->ShareModel->otp_login($data);
}
if(empty($login)){ echo "enter" ;}
else if($login->otp !=$this->input->post('otpfetch'))	{
//pr($login);
echo "invalid";
}
else 
{
$newdata = array('sessionid'  => $login->id,
'sessionname'  => $login->u_name,
'sessionemail'  => $login->u_email
);
$this->session->set_userdata($newdata);			
//pr($newdata);die;
/*if($login->otp !=$this->input->post('otpfetch'))	{
echo "invalid";*/
}
}
public function addquery()
{
//pr($_POST);die;
$id=$_POST['state'];
$where='id';
$table='states';
$state_name	=$this->Adminmodel->select_comm_where($where,$id,$table);
$id=$_POST['city'];
$where='id';
$table='cities';
$city_name	=$this->Adminmodel->select_comm_where($where,$id,$table);
$_POST['state_name'] = $state_name[0]['name'];
$_POST['city_name'] = $city_name[0]['name'];
$table='query';
$data=array(
'name' => $this->input->post('name'),
'email' => $this->input->post('email'),
'mobile' => $this->input->post('mobile'),
'gender' => $this->input->post('gender'),
'age' => $this->input->post('age'),
'profession' => $this->input->post('profession'),
'address' => $this->input->post('address'),
'city' => $this->input->post('city'),
'state' => $this->input->post('state'),
'category' => $this->input->post('cat'),
'message' => $this->input->post('comment'),
'is_assigned' => '0',
'assigned_to' => $this->input->post('expid'),
'is_active'=>'1',
'pro_enquiry'=>'1',
'date' =>  $this->input->post('dates'),
'user_id' => $_SESSION['sessionid'],
);
$lastid=$this->Adminmodel->insert_comm($table,$data);
$enqid = "S2C-".$lastid;
$table='query';
$data=array(
'enq_id'=>$enqid
);
$where='id';
$id = $lastid;
$this->Adminmodel->update_comm($table,$data,$where,$id);	
$table='Users';

$data=array(
'u_name' => $this->input->post('name'),
'u_gender' => $this->input->post('gender'),
'u_age' => $this->input->post('age'),
'u_profession' => $this->input->post('profession'),
'u_address' => $this->input->post('address'),
'u_state' => $this->input->post('state'),
'u_city' => $this->input->post('city'),
'u_date' =>  $this->input->post('dates'),
);
		
$where='u_phone';
$id = $_POST['mobile'];
$this->Adminmodel->update_comm($table,$data,$where,$id);	
$table='comment';
date_default_timezone_set('Asia/Kolkata'); 
$dates=date("h:i:A");
$data=array(
'comment' => $this->input->post('comment'),
'date' => $dates,
'pro_id' => '0',
'user_id' => $_SESSION['sessionid'],
'query_id' => $lastid
);
$this->Adminmodel->insert_comm($table,$data);
$id=$_POST['cat'];
$where='id';
$table='category';
$data =$this->Adminmodel->select_comm_where($where,$id,$table);

// Query to user
$to = $_POST['email'];
$name = $_POST['name'];
$headers = "From: info.share2care@gmail.com";
$subject = "++ Hi $name, Enquiry No. $enqid Submitted Successfully on $date. ++";
$txt = "Thank You $name,\n\nWe have received your query request and forwarded to our experts.\n+++++++++++++++++++++++++++++++++++++++++++\nYour Details:\nEnquiry ID: ".$enqid."\nName: ".$_POST['name']."\nEmail: ".$_POST['email']."\nMobile: ".$_POST['mobile']."\nMessage: ".$_POST['comment']."\n+++++++++++++++++++++++++++++++++++++++++++\n 
Thanks & Regards\nTeam Share2Care";
mail($to,$subject,$txt,$headers);

// Mail to admin
$toad = "info.share2care@gmail.com";
$name = $_POST['name'];
$subject = "++ Hi Admin, Enquiry No. $enqid Submitted Successfully by $name on $date. ++";
$txt = "+++++++++++++++++++++++++++++++++++++++++++\nDetails Submitted:\nEnquiry ID: ".$enqid."\nName: ".$_POST['name']."\nEmail: ".$_POST['email']."\nMobile: ".$_POST['mobile']."\nMessage: ".$_POST['comment']."\n+++++++++++++++++++++++++++++++++++++++++++\n";
mail($toad,$subject,$txt,$headers);
echo   $enqid." is your enquiry no. Thank you for submitting enquiry.";
$mob=$_POST['mobile'];
sms911($mob,$enqid);
echo "session";
}



public function fetchotp1(){
$id = $_POST['mobile'];
$where='u_phone';
$table='Users';
$emailfetch=$this->Adminmodel->select_comm_where($where,$id,$table);
if(empty($emailfetch[0]['u_email'])){
$data = array(
'u_email' => $this->input->post('email'),
'u_password' =>md5($this->input->post('pass')),
'u_pass' => $this->input->post('pass'),
'u_date' =>$this->input->post('dates'),
);
$table='Users';
$where='u_phone';
$id = $_POST['mobile'];
$this->Adminmodel->update_comm($table,$data,$where,$id);	
$data= array(
'mobile' => $this->input->post('mobile'),
'otp' => $this->input->post('otpfetch')
);
$login=$this->ShareModel->otp_login1($data);
//echo "new";
}
							else{
								$data= array(
									'mobile' => $this->input->post('mobile'),
									'u_email' => $this->input->post('email'),
									'u_password' =>md5($this->input->post('pass')),
									'u_pass' => $this->input->post('pass'),

									/*'otp' => $this->input->post('otpfetch')*/
								);
								$login=$this->ShareModel->otp_login($data);

        		//echo 'old';
							}					if(empty($login)){
								echo "enter"  ;

							}
							else if($login->otp !=$this->input->post('otpfetch'))	{
							//pr($login);
								echo "invalid";
							}
							else 
							{

								$newdata = array('sessionid'  => $login->id,
									'sessionname'  => $login->u_name,
									'sessionemail'  => $login->u_email
								);

								$this->session->set_userdata($newdata);			

							//pr($newdata);die;
							/*if($login->otp !=$this->input->post('otpfetch'))	{
								echo "invalid";*/

							}
				/*	else
					{
						echo "enter"  ;
					}*/
				}



				public function index(){
					$table='slider';
					$data['slider']=$this->Adminmodel->select_comm($table);
					$this->load->view('index.php',$data);
				}
				public function about(){
					$table='about';
					$data['about']=$this->Adminmodel->select_comm($table);
					$this->load->view('about.php',$data);
				}

				public function why(){
					$id='2';
					$where='id';
					$table='about';
					$data['note'] =$this->Adminmodel->select_comm_where($where,$id,$table);
					$this->load->view('why-join.php',$data);
				}


				public function event(){
					$id='4';
					$where='id';
					$table='about';
					$data['event'] =$this->Adminmodel->select_comm_where($where,$id,$table);
					$this->load->view('event.php',$data);
				}

				public function process(){
					$id='3';
					$where='id';
					$table='about';
					$data['note'] =$this->Adminmodel->select_comm_where($where,$id,$table);
					$this->load->view('process.php',$data);
				}
				public function expert(){
					$table='category';
					$data['message']=$this->Adminmodel->select_comm($table);
					$this->load->view('expert.php',$data);
				}
				public function user(){
					$table='category';
					$data['message']=$this->Adminmodel->select_comm($table);
					$this->load->view('join-user.php',$data);
				}
				public function contact(){

					$this->load->view('contact.php');
				}
				public function mail(){
					$to = "info.share2care@gmail.com";
					$subject = "Contact Enquiry Details";
					$txt = "Name - ".$_POST['name']."\n Phone -".$_POST['phone']."\n Email -".$_POST['email']."\n Interest -".$_POST['interest']."\n Message -".$_POST['message'];
					$headers = "From: webmaster@example.com";

					mail($to,$subject,$txt,$headers);
				}
				
				public function submitEnquiry()
				{

					$table='country';
					$data['country']=$this->Adminmodel->select_comm($table);

					if(!empty($_SESSION['sessionid'])){
						redirect('index.php/Share/query');
					}else{
						$this->load->view('submit.php',$data);
					}
				}
	/*public function old(){
		$this->load->view('olduser.php');
	}*/
	public function proquery(){
	
		$id = '101';
		$where='country_id';
		$table='states';
		$data['states']=$this->Adminmodel->select_comm_where1($where,$id,$table);

		$table='category';
		$data['message']=$this->Adminmodel->select_comm($table);	

		$this->load->view('professional-query.php');
	}
	public function professional(){
		$table='category';
		$data['message']=$this->Adminmodel->select_comm($table);
		$this->load->view('join-expert.php',$data);
	}
	public function query(){
		$id = '101';
		$where='country_id';
		$table='states';
		$data['states']=$this->Adminmodel->select_comm_where1($where,$id,$table);

		$table='category';
		$data['message']=$this->Adminmodel->select_comm($table);
		$this->load->view('query.php',$data);
	}
	public function women(){$this->load->view('women-listing.php');}
	public function doctor(){$this->load->view('doctor-listing.php');}
	public function Miscellaneous(){$this->load->view('misclaneous.php');}
	public function education(){$this->load->view('education-listing.php');}
	public function family(){$this->load->view('Family-listing.php');}
	public function hope(){$this->load->view('hope.php');}
	public function skill(){$this->load->view('skill-listing.php');}
	public function business(){$this->load->view('business-listing.php');	}
	public function Applyonline(){$this->load->view('apply.php');}	

	public function appoinment(){

		$id = $_SESSION['sessionid'];
		$where='user_id';
		$table='query';
		$data['enquiry']=$this->Adminmodel->select_comm_where1($where,$id,$table);
		$table='category';
		$data['message']=$this->Adminmodel->select_comm($table);
		$this->load->view('appoinment.php',$data);
	}
	
	public function Submitappointment(){
		
			$table='appointment';
			$data=array(
				'user_id' => $this->input->post('user_id'),
				'enquiry_id' => $this->input->post('enquiry'),
				'name' => $this->input->post('username'),
				'mobile' => $this->input->post('phone'),
				'category_id' => $this->input->post('category'),
				'comment' => $this->input->post('comment'),
				'creation_on'=>time(),
				
			);
	//		pr($data);die;
			$this->Adminmodel->insert_comm($table,$data);
			$this->session->set_flashdata('message', 'Appointment Submitted');
			redirect('appoinment');
	}

	public function myquery()
	{
		$id = $_SESSION['sessionid'];
		$where='user_id';
		$table='query';
		$data['query']=$this->Adminmodel->select_comm_where($where,$id,$table);
		$data['session_id']= $_SESSION['sessionid'];
		$this->load->view('myquery.php',$data);
	}


	public function status(){
		$mobile=$_POST['Mobile'];
		$result = $this->JiowebModel->checkform($mobile);
		if($result){
			$data['message'] = $result;
			$this->load->view('status.php',$data);
		}else{
			$message= 'Not Registered';
			echo "<script type='text/javascript'>alert('$message');</script>";
			$this->index();
		}
	}
	public function submit(){

		$district=$_POST['district'];
		$mob=$_POST['mobile'];
		$name=$_POST['name'];

		$data= array(
			'name'  => $_POST['name'],
			'mobile' =>$_POST['mobile'],
			'email'  => $_POST['email'],
			'pincode' =>$_POST['pincode'],
			'sitename' =>$_POST['sitename'],
			'taluk' =>$_POST['taluk'],
			'district' =>$_POST['district'],
			'statename' =>$_POST['statename'],
			'full_address' =>$_POST['fulladdress'],
			'thaana_no'  =>$_POST['thaana'],
			'kaata_no' =>$_POST['khata'],
			'plot_no'  =>$_POST['plot'],
			'police_station' =>$_POST['police']
		);
		$mobile= $_POST['mobile'];
		$result = $this->JiowebModel->checkform($mobile);
		if($result){
			$this->session->set_flashdata('message_name', 'Already Submitted');
			redirect("Jioweb/Applyonline");


		}else{
			$to = $_POST['email'];
			$subject = "Enquiry 4gjiotower.co.in";
			$txt = "Thanks for appliying on Reliance Jio 4G Towers.Our executive will contact you soon.";
			$mobile= $_POST['mobile'];
			$headers = "From: support@4gjiotower.co.in";
			mail($to,$subject,$txt,$headers);



/*$to1 = 'support@4gjiotower.co.in';
$subject1 = "Enquiry Received 4gjiotower.co.in";

$headers1 = "From: support@4gjiotower.co.in";
$headers1 .= "Content-Type: text/html; charset=UTF-8\r\n";

$txt1 = "Customer Name-".$_POST['name']."\n Mobile-".$_POST['mobile']."\n Email-".$_POST['email'];
*/

sms91($mob,$district,$name);

mail($to1,$subject1,$txt1,$headers1);


$id=$this->JiowebModel->submitform($data);
$to_email ="support@4gjiotower.co.in"; 
$subject = 'User Detail';
$url=base_url('Jioweb/confirm_mail?id='.$id);
$htmlContent = file_get_contents($url);
$headers =  array(
	'From' =>"support@4gjiotower.co.in",
	'X-Mailer' => 'PHP/' . phpversion(),
	'Content-type' => 'text/html; charset=UTF-8'

);
$mail=mail($to_email,$subject,$htmlContent,$headers);


$this->session->set_flashdata('message_name', 'Submitted Sucessfully');
redirect("Jioweb/Applyonline");

}
}
public function confirm_mail(){
	
	$mobile=$_GET['id'];
	$result['mobile'] = $this->JiowebModel->checkid($mobile);
	$this->load->view('mail.php',$result);
}
public function checkstatus(){
	$this->load->view('check-status.php');
}
public function newuser1(){
	$id=$_POST['email'];
	$where='u_email';
	$table='Users';
	$name=$this->Adminmodel->select_comm_where($where,$id,$table);

	if(!empty($name)){
		echo "email";
	}else{
		if($_POST['pass']==$_POST['cpass']){
			$table='Users';
			$date=date('Y-m-d');
			$data=array(
				'u_name' => $this->input->post('name'),
				'u_email' => $this->input->post('email'),
				'u_password' => md5($this->input->post('pass')),
				'u_pass' => $this->input->post('pass'),
				'u_profession' => $this->input->post('profession'),
				'u_phone' => $this->input->post('phone'),
				'u_landline'=>$this->input->post('landline'),
				'u_address'=>$this->input->post('address'),
				'u_city'=>$this->input->post('city'),
				'u_state'=>$this->input->post('state'),
				'u_date' =>$this->input->post('dates'),
			);
			$this->Adminmodel->insert_comm($table,$data);
			$to = $_POST['email'];
			$subject = "Join share2care";
			$txt = "Thank You.. Your are Successfully join to share2care.";
			$headers = "From: info.share2care@gmail.com";
			mail($to,$subject,$txt,$headers);
			$to = "info.share2care@gmail.com";
			$subject = "New User Detail";
			$txt = "Name-".$_POST['name']."\n Mobile-".$_POST['phone']."\n Email -".$_POST['email'];
			$headers = "From: info.share2care@gmail.com";	
			mail($to,$subject,$txt,$headers);	
		}else{
			echo "pass";
		}
	}
}





public function newuser(){
	$id=$_POST['email'];
	$where='u_email';
	$table='Users';
	$name=$this->Adminmodel->select_comm_where($where,$id,$table);

	if(!empty($name)){
		echo "email";
	}else{
		if($_POST['pass']==$_POST['cpass']){
			$table='Users';
			$date=date('Y-m-d');
			$data=array(
				'u_name' => $this->input->post('name'),
				'u_email' => $this->input->post('email'),
				'u_password' => md5($this->input->post('pass')),
				'u_pass' => $this->input->post('pass'),
				'u_profession' => $this->input->post('profession'),
				'u_phone' => $this->input->post('phone'),
				'u_date' => $date
				
			);
			$this->Adminmodel->insert_comm($table,$data);
			$to = $_POST['email'];
			$subject = "Join share2care";
			$txt = "Thank You.. Your are Successfully join to share2care.";
			$headers = "From: info.share2care@gmail.com";
			mail($to,$subject,$txt,$headers);
			$to = "info.share2care@gmail.com";
			$subject = "New User Detail";
			$txt = "Name-".$_POST['name']."\n Mobile-".$_POST['phone']."\n Email -".$_POST['email'];
			$headers = "From: info.share2care@gmail.com";	
			mail($to,$subject,$txt,$headers);	
		}else{
			echo "pass";
		}
	}
}




public function newprofession(){
	$id=$_POST['email'];
	$where='p_email';
	$table='proffesional';
	$name=$this->Adminmodel->select_comm_where($where,$id,$table);

	if(!empty($name)){
		echo "email";
	}else{
		if($_POST['pass']==$_POST['cpass']){
			$table='proffesional';
			$date=date('Y-m-d');

			$data=array(
				'p_name' => $this->input->post('name'),
				'p_email' => $this->input->post('email'),
				'p_password' => md5($this->input->post('pass')),
				'p_cat' => $this->input->post('profession'),
				'p_mobile' => $this->input->post('phone'),
				'p_date' => $date,
			);
			$this->Adminmodel->insert_comm($table,$data);
			$to = $_POST['email'];
			$subject = "Join share2care";
			$txt = "Thank You.. Your are Successfully join as Professional to share2care.";
			$headers = "From: info.share2care@gmail.com";
			mail($to,$subject,$txt,$headers);
			$to = "info.share2care@gmail.com";
			$subject = "New Professional Detail";
			$txt = "Name-".$_POST['name']."\n Mobile-".$_POST['phone']."\n Email -".$_POST['email'];
			$headers = "From: info.share2care@gmail.com";	
			mail($to,$subject,$txt,$headers);

		}else{
			echo "pass";
		}
	}
}


public function cati(){
$id=$_POST['id'];
$where='p_cat';
$table='proffesional';
$data=$this->Adminmodel->select_comm_where($where,$id,$table);
if($data){
?>
<option value="">Please Select Expert</option>
<?php
foreach($data as $value){ ?>
<option value="<?php echo $value['id']?>"><?=$value['p_name']?></option>
<?php } 
}else{
?>
<option value="0">Expert Not Listed</option>
<?php
}
}
public function citycat(){
$id=$_POST['id'];
$where='state_id';
$table='cities';
$data=$this->Adminmodel->select_comm_where1($where,$id,$table);
foreach($data as $value){ 
?>
<option value="<?php echo $value['id']?>"><?=$value['name']?></option>
<?php } 
}
public function addproquery(){

	$table='query';
	$date=date('Y-m-d');
	$data=array(
		'name' => $this->input->post('name'),
		'email' => $this->input->post('email'),
		'mobile' => $this->input->post('mobile'),
		//'landline' => $this->input->post('landline'),
		'address' => $this->input->post('address'),
		'city' => $this->input->post('city'),
		'state' => $this->input->post('state'),
		'category' => $this->input->post('cat'),
		'message' => $this->input->post('comment'),
		'date' => $date,
		'pro_enquiry' => '2',
		'is_assigned' => $this->input->post('profession'),
		'user_id' => $_SESSION['sessionid']

	);


	$id=$this->Adminmodel->insert_comm($table,$data);//echo $id;die;
	$table='comment';
	date_default_timezone_set('Asia/Kolkata'); 
	$dates=date("h:i:A");
	
	$data=array(
		'comment' => $this->input->post('comment'),
		'date' => $dates,
		'pro_id' => $this->input->post('profession'),
		'user_id' => $_SESSION['sessionid'],
		'query_id' => $id

	);


	$this->Adminmodel->insert_comm($table,$data);
	$id=$_POST['cat'];
	$where='id';
	$table='category';
	$data =$this->Adminmodel->select_comm_where($where,$id,$table);


	$id=$_POST['profession'];
	$where='id';
	$table='proffesional';
	$profession =$this->Adminmodel->select_comm_where($where,$id,$table);
	$to = $_POST['email'];
	$subject = "Contact Detail";
	$txt = "Name-".$_POST['name']."\n Mobile-".$_POST['mobile']."\n Email -".$_POST['email']."\n Address-".$_POST['address']."\n City-".$_POST['city']."\n State-".$_POST['state']."\n Category-".$data[0]['name']."\n Alloted-".$profession[0]['p_name']."\n Message-".$_POST['comment'];
	$headers = "From: info.share2care@gmail.com";

	mail($to,$subject,$txt,$headers);


	$to = $profession[0]['p_email'];
	$subject = "Contact Detail";
	$txt = "You have Alloted by Name-".$_POST['name']."\n Mobile-".$_POST['mobile']."\n Email -".$_POST['email']."\n Address-".$_POST['address']."\n City-".$_POST['city']."\n State-".$_POST['state']."\n Category-".$data[0]['name']."\n Alloted-".$profession[0]['p_name']."\n Message-".$_POST['comment'];
	$headers = "From: info.share2care@gmail.com";

	mail($to,$subject,$txt,$headers);
	$to = "info.share2care@gmail.com";
	$subject = "Contact Detail";
	$txt = "You have Alloted by Name-".$_POST['name']."\n Mobile-".$_POST['mobile']."\n Email -".$_POST['email']."\n Address-".$_POST['address']."\n City-".$_POST['city']."\n State-".$_POST['state']."\n Category-".$data[0]['name']."\n Alloted-".$profession[0]['p_name']."\n Message-".$_POST['comment'];
	$headers = "From: info.share2care@gmail.com";

	mail($to,$subject,$txt,$headers);
}
public function login(){$this->load->view('userlogin.php');}
public function loginuser(){$this->load->view('loginuser.php');}


public function loginusers()
{	
	if(empty($_SESSION['postname'])){	
		$data= array(
			'u_email' => $this->input->post('email'),
			'u_password' => md5($this->input->post('pass'))
		);
		$login=$this->ShareModel->vendor_log($data);

		if(empty($login)){
			echo 'Invalid';
		}else{




			$newdata1 = array('sessionid'  => $login->id,
				'sessionname'  => $login->u_name,
				'sessionemail'  => $login->u_email
			);

			$this->session->set_userdata($newdata1);



		}
	}
	else {
		$data= array(
			'u_email' => $this->input->post('email'),
			'u_password' => md5($this->input->post('pass'))
		);
		$login=$this->ShareModel->vendor_log($data);

		if(empty($login)){
			echo 'Invalid';
		}else{




			$newdata1 = array('sessionid'  => $login->id,
				'sessionname'  => $login->u_name,
				'sessionemail'  => $login->u_email
			);

			$this->session->set_userdata($newdata1);



		}
		$table='query';
		$date=date('Y-m-d');
		$data=array(
			'name' =>  $_SESSION['postname'],
			'email' => $_SESSION['postemail'],
			'mobile' => $_SESSION['postmobile'],
			'landline' => $_SESSION['postlandline'],
			'address' =>  $_SESSION['postaddress'],
			'city' =>$_SESSION['postcity'],
			'state' => $_SESSION['poststate'],
			'category' =>$_SESSION['postcat'],
			'message' => $_SESSION['postcomment'],
			'date' => $date,
			'user_id' => $_SESSION['sessionid'],
			'is_assigned' => 1,
			'is_active' => 1,
			'pro_enquiry' => 1

		);


		$id=$this->Adminmodel->insert_comm($table,$data);
		$table='comment';
		date_default_timezone_set('Asia/Kolkata'); 
		$dates=date("h:i:A");


		$data=array(
			'comment' => $_SESSION['postcomment'],
			'date' => $dates,
			'pro_id' => '0',
			'user_id' => $_SESSION['sessionid'],
			'query_id' => $id

		);


		$this->Adminmodel->insert_comm($table,$data);
		$id=$_SESSION['postcat'];
		$where='id';
		$table='category';
		$data =$this->Adminmodel->select_comm_where($where,$id,$table);



		$to = $_SESSION['postemail'];
		$subject = "Contact Detail";
		$txt = "Name-".$_SESSION['postname']."\n Mobile-".$_SESSION['postmobile']."\n Email -".$_SESSION['postemail']."\n Address-".$_SESSION['postaddress']."\n City-".$_SESSION['postcity']."\n State-".$_SESSION['poststate']."\n Category-".$data[0]['name']."\n Message-".$_SESSION['postcomment'];
		$headers = "From: info.share2care@gmail.com";

		mail($to,$subject,$txt,$headers);
		echo "submitform";
		unset($_SESSION['postname']);
		unset($_SESSION['postemail']);
		unset($_SESSION['postmobile']);
		unset($_SESSION['postlandline']);
		unset($_SESSION['postaddress']);
		unset($_SESSION['postcity']);
		unset($_SESSION['poststate']);
		unset($_SESSION['postcat']);
		unset($_SESSION['postcomment']);
	}

}




public function contactus(){

	$to = "info.share2care@gmail.com";
	$subject = "Contact Detail";
	$txt = "Name-".$_POST['name']."\n Phone-".$_POST['phone']."\n Interest in-".$_POST['interest']."\n Message-".$_POST['message'];
	$headers = "From: ".$_POST['email'] . "\r\n";

	mail($to,$subject,$txt,$headers);
	echo "mail";
	redirect('Share/contact');

}
public function Profile(){

	$id = '101';
	$where='country_id';
	$table='states';
	$data['states']=$this->Adminmodel->select_comm_where1($where,$id,$table);

	$table='category';
	$data['message']=$this->Adminmodel->select_comm($table);			

	$this->load->view('myprofile.php',$data);

}
public function logout(){
session_destroy();
redirect('index.php/Share/index');
}
public function updatepro(){
$path1=  base_url().'image/users/';
if(!empty($_FILES["files"]))
{
$s = mt_rand(100000, 999999);
$sep='-';
$upload_image=$_FILES["files"]["name"];
$up=$s.$sep.$upload_image;

$path = $path1.$upload_image;
$upload = move_uploaded_file($_FILES["files"]["tmp_name"], "./image/users/".$up); 
if($upload){
$img_name = $path1.$up;
}
}else{
$img_name = $_POST['files'];
}

$data = array(
'u_image'=>$path,
'u_name'=>$_POST['name'],
'u_email'=>$_POST['email'],
'u_phone' =>$_POST['phone'], 
'u_pass' =>$_POST['pass'],
'u_age'=>$_POST['age'],
'u_profession'=>$_POST['profession'],
'u_address'=>$_POST['address'],
'u_city'=>$_POST['city'],
'u_state'=>$_POST['state'],
'u_image' => $img_name	
);
$table='Users';
//move_uploaded_file($_FILES["file"]["tmp_name"], "./image/users/".$image);
$where='id';
$id = $_POST['id']; 
$this->Adminmodel->update_comm($table,$data,$where,$id);
redirect('index.php/Share/Profile');
}
/*public function chat(){
			
date_default_timezone_set('Asia/Kolkata'); 
           $dates=date("h:i:A");
		$data = array(
			          'user_id' => $_SESSION['sessionid'],			       
			          'pro_id' =>$_POST['productid'],
			          'comment' =>$_POST['text'], 
			          'query_id' =>$_POST['id'],
			          'is_comment' =>'0',
			          'date' =>$dates,
			          );
		
		$table='comment';
		$id=$this->Adminmodel->insert_comm($table,$data);
	    $data= $_POST['id']; 
        $comment=$this->Adminmodel->commentdatashare($data);
                $id = $_SESSION['sessionid'];
		$where='id';
		$table='Users';
		$data=$this->Adminmodel->select_comm_where($where,$id,$table);
	
                       
                            foreach ($comment as  $chat) {  

              echo '<span>'; ?>
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
                              </ul> 
                            
                       
                        <?php echo '</span>'; 
                    };
                }*/
                public function forgot(){
                	$this->load->view('forget.php');
                }
                public function Reset(){	

                	$data= array(

                		'email' => $this->input->post('emails')					

                	);


                	$login=$this->ShareModel->reset($data);							

                	if (empty($login)) {
                		echo "database";
                	}else{


                		$userid=$login->id; 

                		$id=base64_encode($userid);

                		$temp_pass = $id;


                		$url=base_url('Share/reset_password/'.$temp_pass);
                		$to = $_POST['emails'];
                		$subject = "Forgot Password";
                		$txt = "Forgot Password-".$url;
                		$headers = "From: info.share2care@gmail.com";

                		mail($to,$subject,$txt,$headers);
                		echo "done";

                	}

                }

                public function reset_password($temp_pass){

                	$id['idd']= $this->uri->segment(3);
                	$this->load->view('resetpass.php',$id);

                }

                public function update_password(){

                	$id=base64_decode($_POST['id']);

                	$data= array(
                		'u_password' => md5($this->input->post('pass')),
                		'u_pass' => $this->input->post('pass')
                	); 




                	$this->ShareModel->is_temp_pass_valid($data,$id);

                	redirect('Share/login');
                }

            }

