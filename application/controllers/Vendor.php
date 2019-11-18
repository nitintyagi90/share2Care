<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('Vendormodel');
$this->load->model('Adminmodel');
}

public function index()
{
if(!empty($this->session->userdata('proffessional_id')))
{ redirect('Vendor/Dashboard'); }
$this->load->view('Vendor/login');
}

public function newotp(){
$date=date('Y-m-d');
$otp=rand(1000,9999);		
$mob=$_POST['mobiles'];
sms91($mob,$otp);
$data=array(
'p_mobile' => $this->input->post('mobiles'),
'otp' =>$otp,
'p_date' => $date,
'p_email' =>$_POST['email'],
'p_password' =>md5($_POST['pass']),
);
$data1 = $_POST;
$id = $data1['mobiles'];
$where='p_mobile';
$table='proffesional';
$mobiles=$this->Adminmodel->select_comm_where($where,$id,$table);
if(empty($mobiles))
{
$table='proffesional';
$user=$this->Adminmodel->insert_comm($table,$data);
}
else{
$table='proffesional';
$where='p_mobile';
$id = $data1['mobiles'];
$data = array('otp' =>$otp );
$this->Adminmodel->update_comm($table,$data,$where,$id);
}
}
public function admin_login()
{
$data= array(
'p_email' => $this->input->post('email'),
'p_mobile' => $this->input->post('phone'),
//'otp' => $this->input->post('otp'),
//'p_password' => md5($this->input->post('pass'))
);
$table='proffesional';
$login=$this->Vendormodel->admin_log($data,$table);
if($login->otp !=$this->input->post('otp'))	{
echo "invalid";
}
else if ($login)
{
$newdata = array('proffessional_id'  => $login->id,
'proffessional_name'  => $login->p_email
);
$this->session->set_userdata($newdata);
//redirect('Vendor/Dashboard');
}
else
{
echo "enter";
}
}
	
public function Dashboard()
{ 
// /is_protected();
if(empty($this->session->userdata('proffessional_id')))
{ 
redirect('Vendor/index');
}
$id = $_SESSION['proffessional_id'];
$where='is_assigned';
$table='query';
$data['message'] = $this->Vendormodel->select_comm_where($where,$id,$table);
$this->load->view('Vendor/dashboard.php',$data);
}

public function Enquiry(){
is_proffesional();
$id = $_SESSION['proffessional_id'];
$where='is_assigned';
$table='query';
$data['message'] = $this->Vendormodel->select_comm_where($where,$id,$table);
//	pr($data);die;
$this->load->view('Vendor/professional.php',$data);
}

public function logout(){
session_destroy();
redirect('Vendor/index');
}

public function Profile(){
is_proffesional();
$id = $_SESSION['proffessional_id'];
$where='id';
$table='proffesional';
$data['message'] = $this->Vendormodel->select_comm_where($where,$id,$table);
$table='category';
$data['category'] = $this->Vendormodel->select_comm($table);
$this->load->view('Vendor/create-enquiry.php',$data);
}

public function forgot()
{
$this->load->view('Vendor/forgot.php');
}

public function Reset(){	
$data= array(
'email' => $this->input->post('email')					
);
$login=$this->Vendormodel->reset($data);							
if (empty($login)) {
echo "database";
}else{
$userid=$login->id; 
$id=base64_encode($userid);
$temp_pass = $id;
$url=base_url('Vendor/reset_password/'.$temp_pass);
$to = $_POST['email'];
$subject = "Forgot Password";
$txt = "Forgot Password-".$url;
$headers = "From: info.share2care@gmail.com";
mail($to,$subject,$txt,$headers);
echo "done";
}
}

public function reset_password($temp_pass){
$id['idd']= $this->uri->segment(3);
$this->load->view('Vendor/reset.php',$id);
}
public function update_password(){
$id=base64_decode($_POST['id']);
$data= array(
'p_password' => md5($this->input->post('password'))
); 
$this->Vendormodel->is_temp_pass_valid($data,$id);
}

public function UpdateProfile(){
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
'p_mobile' => $_POST['mobile'],			       
'p_destination' => $_POST['destination'],			       
'p_experience' => $_POST['experience'],			       
'p_description' => $_POST['description'],	
'p_cat'	=>	$_POST['category'],		       
'p_image' => $img_name			       
);
$table='proffesional';
$where='id';
$id=$_SESSION['proffessional_id'];
$id=$this->Adminmodel->update_comm($table,$data,$where,$id);
redirect('index.php/Vendor/Profile?msg=Profile Updated Successfully..');
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
//pr($data);die;
$this->load->view('Vendor/view.php',$data);
}

public function chat(){
date_default_timezone_set('Asia/Kolkata'); 
$dates=date("d-m-Y h:i:A");
$data = array(
'user_id' => $_POST['userid'],			       
'pro_id' =>$_POST['proid'],
'comment' =>$_POST['text'], 
'query_id' =>$_POST['queryid'],
'is_comment' =>'2',
'date' =>$dates,
);
//pr($data);die;
$id = $_POST['proid'];
$where='id';
$table='proffesional';
$pf =$this->Adminmodel->select_comm_where($where,$id,$table);
$table='comment';
//pr($pf);die;
	$id=$this->Adminmodel->insert_comm($table,$data);
$to = 'amit@maztro.com';
$subject = "Hello, Admin! Expert replied for Enquiry No - ".$_POST['queryid'];
$txt = $_POST['text']; 
$headers = "From: info.share2care@gmail.com";
mail($to,$subject,$txt,$headers);

$to = $pf[0]['p_email'];
$subject = "(Expert)Enquiry No - ".$_POST['queryid'];
$txt = $_POST['text'];
$headers = "From: info.share2care@gmail.com";
mail($to,$subject,$txt,$headers);
redirect('index.php/Admin/create');
}
}