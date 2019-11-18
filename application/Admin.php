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
						redirect('Admin/Dashboard');
					}
			$this->load->view('Admin/Adminlogin');
		}
	public function admin_login()
		{
				$data= array(
							'name' => $this->input->post('username'),
							'pass' => md5($this->input->post('password'))
							);
				$table='admin';
						$login=$this->Adminmodel->admin_log($data,$table);
						
					if ($login)
						{
				    
							$newdata = array('session_id'  => $login->id,
											'session_name'  => $login->email
											);
							$this->session->set_userdata($newdata);
							redirect('Admin/Dashboard');
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
				$date=date("F d, Y");
				
				$table='cars';

				$data['cars']=$this->Adminmodel->list_common($table);

				$table='car_owner';

				$data['vendor']=$this->Adminmodel->list_common($table);
				$table='users';

				$data['users']=$this->Adminmodel->list_common($table);

				
				$book=$this->Adminmodel->booking();
				foreach ($book as  $value) {
					if($value['status']==0){
						$upcoming[]=$value;
					}elseif($value['status']==1){
						$ongoing[]=$value;
					}elseif($value['status']==2){
						$complete[]=$value;
					}else{
						$cancelled[]=$value;
					}
				}
				@$data['upcoming'] = $upcoming;
				@$data['ongoing'] = $ongoing;

				@$data['complete'] = $complete;

				@$data['cancelled'] = $cancelled;

			
				$this->load->view('Admin/dashboard.php',$data);
			}
			public function logout(){
				session_destroy();
				redirect('Admin/index');
			}

			public function CreateManager(){

				is_protected();

				$this->load->view('Admin/Createuser');

			}

			public function Adduser(){

				is_protected();
				
				$name= $_POST['name'];

				$pass= md5($_POST['passsword']);

				$table='car_owner';

				$url = base_url();

				$image = $_FILES['file']['name'];
				if(empty($image)){
					$image='';
				}
			    $path1 = $url."image/".$image;
				@unlink($path1);

			    move_uploaded_file($_FILES["file"]["tmp_name"], "./image/".$image);

				$data= array(

					'email'      =>  $_POST['email'],
					'password'   =>  $pass,
					'owner_image'=>  $path1,
					'owner_type' =>  'Agency',
					'owner_name' =>  $name

							);
				$this->Adminmodel->insert_common($table,$data);

				redirect('Admin/ListManager');

			}

			public function ListManager(){

				is_protected();
				$table='car_owner';

				$data['message']=$this->Adminmodel->list_common($table);
				//pr($data);die;
				$this->load->view('Admin/ListManager',$data);

			}


			public function DeleteManager(){

				is_protected();

				$id=$this->uri->segment(3);

				$this->Adminmodel->DeleteManager($id);

				$this->ListManager();

			}
			public function booking(){
				is_protected();
				$status=$this->uri->segment(3);
				if($status==0){
					$data['ri']= 'Upcoming Rides';
				}elseif($status==1){
					$data['ri']= 'On-Going Rides';
				}elseif($status==3){
					$data['ri']= 'Cancelled Rides';
				}
				else{
					$data['ri']= 'Completed Rides';
				}
				
				$book=$this->Adminmodel->booking();
				foreach ($book as  $value) {
					if($value['status']==$status){
						$ride[]=$value;
					}
				}
				@$data['message'] = $ride;
				
				$this->load->view('Admin/booking.php',$data);

			}
			public function report(){
				is_protected();
				$vendorid = $this->uri->segment(3); 
				
				
				
				$data['message'] = $this->Adminmodel->Vendorbooking($vendorid);
				//pr($data);die;
				$this->load->view('Admin/report',$data);
				
			}
			public function car(){

				is_protected();
				$table='cars';

				$data['message']=$this->Adminmodel->list_common($table);
				//pr($data);die;
				$this->load->view('Admin/cars',$data);

			}
			public function Updatevendor(){
				is_protected();
				//pr($_POST);die;
               $table='car_owner';
               $where='owner_id';
			   $owner_id =$_POST['owner_id'];
			   $image = $_FILES['file']['name'];
			    $url = base_url();


			    $path = $url."image/".$image;
			    @unlink($path);
				

				$data= array(
						'owner_name' =>$_POST['owner_name'],
						'owner_type' =>$_POST['owner_type'],
						'email' =>$_POST['email'],
						'password' =>md5($_POST['password']),
                        'owner_image' =>$path,
						'phone_number' =>$_POST['phone_number']
							);
				 move_uploaded_file($_FILES["file"]["tmp_name"], "./image/".$image);

			    $this->Adminmodel->update_common($data,$table,$where,$owner_id);

			  

			    redirect('Admin/index');
			}
			public function Editmanager(){
				is_protected();
				$id = $this->uri->segment(3);	
				
				
				
				$data['message'] = $this->Adminmodel->Editvendor($id);
				//pr($data);die;
				$this->load->view('Admin/editvendor.php',$data);
				
			}
			public function ridestatus(){
				$bookid=$_POST['id'];
				$status=$_POST['status'];
				$data=array(
					'status' => $status
							);
				$this->Adminmodel->ridestatus($bookid,$data);
			}
			public function vendorstatus(){
				$ownerid=$_POST['id'];
				$status=$_POST['status'];
				$data=array(
					'owner_status' => $status
							);
				$this->Adminmodel->vendorstatus($ownerid,$data);
			}
			public function users(){

					is_protected();
					$table='users';

					$data['message']=$this->Adminmodel->list_common($table);
					//pr($data);die;
					$this->load->view('Admin/user',$data);

				}

			
			
			
		}