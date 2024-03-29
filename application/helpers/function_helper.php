<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Form Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/form_helper.html
 */

// ------------------------------------------------------------------------

// ------------------------------------------------------------------------

if ( ! function_exists('pr'))
{
	/**
	 *
	 * print the array
	 *
	 * @return	array
	 */
	function pr($array)
	{
		echo '<pre>';

		print_r($array);
	}
}

if ( ! function_exists('is_protected'))
{
	/**
	 * Check user login
	 *
	 * Determines user is login or not
	 *
	 * @return	mixed
	 */
	function is_protected()
	{
		$CI= &get_Instance();
		$userinfo=$CI->session->all_userdata();
		if(!isset($userinfo['session_id']))
		{
			redirect('Admin');
		}
	}
}
if ( ! function_exists('is_proffesional'))
{
	/**
	 * Check user login
	 *
	 * Determines user is login or not
	 *
	 * @return	mixed
	 */
	function is_proffesional()
	{
		$CI= &get_Instance();
		$userinfo=$CI->session->all_userdata();
		if(!isset($userinfo['proffessional_id']))
		{
			redirect('Vendor');
		}
	}
}
if ( ! function_exists('get_usertype'))
{
	/**
	 * Check user type
	 *
	 * Determines user type
	 *
	 * @return	usertype
	 */
	function get_usertype()
	{
		$CI= &get_Instance();
		$userinfo=$CI->session->all_userdata();

		if(!isset($userinfo['userinfo']))
		{
			redirect(base_url());
		}else{
			return $userinfo['userinfo'];
			//return $userinfo
		}
	}
}

if ( ! function_exists('print_bridcrumb'))
{
	/**
	 * print_bridcrumb
	 *
	 * print bridcrumb
	 *
	 * 
	 */
	function print_bridcrumb($breadcrumb)
	{

		if ($breadcrumb) {
			
			$output = '<ol class="breadcrumb">';
			$array_keys=array_keys($breadcrumb);
			
			foreach ($breadcrumb as $key => $crumb) 
			{
				if (end($array_keys) == $key)
				{
					$output .= '<li class="active">' . $crumb['title'] . '</li>';   
				} else 
				{
					$output .= '<li><a href="' . $crumb['href'] . '">' . $crumb['title'] . '</a></li>';
				}
			}
			$output .= '</ol>';
			echo $output ;
		}
		
		echo '';
	}
}

//function for getting latlong from address
function getLatLong($address){
	if(!empty($address)){
		$add=$address;
        //Formatted address
		$formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
		$geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
		$output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
		$data['latitude']  = isset($output->results[0]->geometry->location->lat)?$output->results[0]->geometry->location->lat:''; 
		$data['longitude'] = isset($output->results[0]->geometry->location->lng)?$output->results[0]->geometry->location->lng:'';
        //Return latitude and longitude of the given address
		if( !empty($data['latitude'] && $data['longitude'])){
			
			return $data;
		}else
		{
			getLatLong($address);   
		}

	}else{
		return false;   
	}
}

function get_userdata()
{
	$CI=&get_Instance();
	$userinfo=$CI->session->all_userdata();
	$user_id=$userinfo['session_id'];

	$CI->db->select('User.id,User.username,User.email,User.image,ProviderProfile.location_detail,company,company_email,contact_detail,payment_detail');
	$CI->db->from('User');
	$CI->db->join('ProviderProfile','User.id=ProviderProfile.user_id','LEFT');
	$CI->db->where('User.id',$user_id);
	$query=$CI->db->get();
	if($query->num_rows())
	{
		$data=$query->row();
		
	}
	return $data;

}
function sms91($mob,$otp){
	$message_content = $otp." is your OTP to login to your Share2Care Account. Please do not share this with anyone";
	$url="http://mysmsshop.in/http-api.php?username=sanj18304&password=Singh$999&senderid=OBAAZO&route=1&number=".$mob."&authkey=G8ydXcyFnFZQSlyU&message=".urlencode($message_content)."";
	$res = curl_init();
	curl_setopt( $res, CURLOPT_URL, $url );
	curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); 
	$result = curl_exec( $res );
	}

function sms911($mob,$enqid){	
// $message_content = "Thank u for submit your enquiry. your enquiry number is " .$enqid;
	$message_content = $enqid. " is your enquiry no. Thank you for submitting enquiry.";
	$url="http://mysmsshop.in/http-api.php?username=sanj18304&password=Singh$999&senderid=OBAAZO&route=1&number=".$mob."&authkey=G8ydXcyFnFZQSlyU&message=".urlencode($message_content)."";
	$res = curl_init();
	curl_setopt( $res, CURLOPT_URL, $url );
	curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); 
	$result = curl_exec( $res );
}

function expert13($mob,$ename){	
// $message_content = "Thank u for submit your enquiry. your enquiry number is " .$enqid;
	$message_content = "Hello " .$ename.", Your expert account created on www.share2care.co. Please login now";
	$url="http://mysmsshop.in/http-api.php?username=sanj18304&password=Singh$999&senderid=OBAAZO&route=1&number=".$mob."&authkey=G8ydXcyFnFZQSlyU&message=".urlencode($message_content)."";
	$res = curl_init();
	curl_setopt( $res, CURLOPT_URL, $url );
	curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); 
	$result = curl_exec( $res );
}

function exprtaprve($mob,$ename){	
$message_content = "Hello " .$ename.", Your expert account approved by admin. Please login now on www.share2care.co. ";
$url="http://mysmsshop.in/http-api.php?username=sanj18304&password=Singh$999&senderid=OBAAZO&route=1&number=".$mob."&authkey=G8ydXcyFnFZQSlyU&message=".urlencode($message_content)."";
$res = curl_init();
curl_setopt( $res, CURLOPT_URL, $url );
curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); 
$result = curl_exec( $res );
}

function adminreply($umob,$uname){	
$message_content = "Hello " .$uname.", Expert Replied to your Query No. ".$uenq." Please login your account on www.share2care.co";
$url="http://mysmsshop.in/http-api.php?username=sanj18304&password=Singh$999&senderid=OBAAZO&route=1&number=".$umob."&authkey=G8ydXcyFnFZQSlyU&message=".urlencode($message_content)."";
$res = curl_init();
curl_setopt( $res, CURLOPT_URL, $url );
curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); 
$result = curl_exec( $res );
}

function enqapproved($mob,$enq){
	$message_content = "Enquiry Number S2C-".$enq. "is Approved . Please Login your account to reply.";
	$url="http://mysmsshop.in/http-api.php?username=sanj18304&password=Singh$999&senderid=OBAAZO&route=1&number=".$mob."&authkey=G8ydXcyFnFZQSlyU&message=".urlencode($message_content)."";
	$res = curl_init();
	curl_setopt( $res, CURLOPT_URL, $url );
	curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); 
	$result = curl_exec( $res );	
}

function ureply($pmob,$enqid){
	$message_content = "Hello Expert, User asked a question for Enquiry No. ".$enqid. ". Please Login your account to reply.";
	$url="http://mysmsshop.in/http-api.php?username=sanj18304&password=Singh$999&senderid=OBAAZO&route=1&number=".$pmob."&authkey=G8ydXcyFnFZQSlyU&message=".urlencode($message_content)."";
	$res = curl_init();
	curl_setopt( $res, CURLOPT_URL, $url );
	curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); 
	$result = curl_exec( $res );	
}
