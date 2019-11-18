<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminmodel extends CI_Model{

	public function admin_log($data,$table)
	{

		$ads = array();
		$this->db->select('*');
		$this->db->where('name',$data['name']);
		$this->db->where('pass',$data['pass']);

		$fetch_query= $this->db->get($table);

		$query=$fetch_query->result();
		foreach ($query as $row)
		{
			$ads = $row;
		}
		return $ads;
	}
	
	public function Proffesional(){

		$this->db->select('*');
		$this->db->from('proffesional');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}
	public function User(){

		$this->db->select('*');
		$this->db->from('Users');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}



	public function protype($id,$data){
		$this->db->where('id',$id);
		$this->db->update('form_details',$data);
	}
	public function select_comm($table){

		$this->db->select('*');
		$this->db->from($table);
		
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}
	public function dashquery(){

		$this->db->select('*');
		$this->db->from('query');
		$this->db->order_by("id", "desc");
		
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}

	
	public function select_comm_where($where,$id,$table){
		$this->db->select('*');
		$this->db->where($where,$id);
		$this->db->order_by("id", "desc");
		$this->db->from($table);
		$query = $this->db->get();
		$str = $this->db->last_query();
		$result = $query->result_array();
		return $result;
	}


	public function select_comm_where_not_in($where,$id,$table){
		$this->db->select('*');
		$this->db->where_not_in($where,$id);
		$this->db->order_by("id", "desc");
		$this->db->from($table);
		$query = $this->db->get();
		$str = $this->db->last_query();
		$result = $query->result_array();
		return $result;
	}


	public function select_comm_where1($where,$id,$table){
		$this->db->select('*');
		$this->db->where($where,$id);
		$this->db->from($table);
		$query = $this->db->get();
		$str = $this->db->last_query();
		$result = $query->result_array();
		return $result;
	}


	public function insert_comm($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	public function delete_comm($where,$id,$table){

		$this->db->where($where,$id);

		$this->db->delete($table);

	}
	public function update_comm($table,$data,$where,$id){
		$this->db->where($where,$id);
		$this->db->update($table,$data);
	}
	public function commentdata($data){
		$this->db->select('q.*,q.date as create,u.*,p.*,c.*');       
		$this->db->from('comment as c');
		$this->db->join('Users as u','u.id=c.user_id');
		$this->db->join('proffesional as p','p.id=c.pro_id','left');
		$this->db->join('query as q','q.id=c.query_id');
		$this->db->order_by('q.date', "asc");
		$this->db->order_by('c.date', "asc");
		$this->db->where('c.query_id',$data);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}


	public function commentdatashare($data){
		$this->db->select('q.*,q.date as create,u.*,p.*,c.*');       
		$this->db->from('comment as c');
		$this->db->join('Users as u','u.id=c.user_id');
		$this->db->join('proffesional as p','p.id=c.pro_id','left');
		$this->db->join('query as q','q.id=c.query_id' );
		$this->db->order_by('q.date', "desc");
		$this->db->order_by('c.date', "desc");
		$this->db->where('c.query_id',$data);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}


	
	public function commentdatauser($data){
		$this->db->select('q.*,q.date as create,u.*,p.*,c.*');       
		$this->db->from('comment as c');
		$this->db->join('Users as u','u.id=c.user_id');
		$this->db->join('proffesional as p','p.id=c.pro_id','left');
		$this->db->join('query as q','q.id=c.query_id' );

		$this->db->where('c.query_id',$data);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function admincomment($data){
		$this->db->select('*');
		$this->db->where('query_id',$data);
		$this->db->where('is_comment','1');
		$this->db->from('comment');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function countuser($id){
		$this->db->select('*');
		$this->db->where('query_id',$id);
		$this->db->where('is_comment','0');
		$this->db->from('comment');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function is_temp_pass_valid($data,$id){
		$this->db->where('id',$id);
		$this->db->update('admin',$data);
	}
	public function filter($cat,$alloted,$status){
	//echo $cat;echo $alloted;echo $status;die;
		$this->db->select('*');
		if(!empty($cat)){
			$this->db->where('category',$cat);
		}
		if(!empty($alloted)){
			$this->db->where('is_assigned',$alloted);
		}
		if(!empty($status)){
			$this->db->where('is_active',$status);
		}
		$this->db->where('pro_enquiry',1);
		$this->db->from('query');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}
	public function filter1($cat,$alloted,$status){
	//echo $cat;echo $alloted;echo $status;die;
		$this->db->select('*');
		if(!empty($cat)){
			$this->db->where('category',$cat);
		}
		if(!empty($alloted)){
			$this->db->where('is_assigned',$alloted);
		}
		if(!empty($status)){
			$this->db->where('is_active',$status);
		}
		$this->db->where('pro_enquiry',2);
		$this->db->from('query');
		$query = $this->db->get();
//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}
	public function filter2($cat,$alloted,$status){
	//echo $cat;echo $alloted;echo $status;die;
		$this->db->select('*');
		if(!empty($cat)){
			$this->db->where('category',$cat);
		}
		if(!empty($alloted)){
			$this->db->where('is_assigned',$alloted);
		}
		if(!empty($status)){
			$this->db->where('is_active',$status);
		}
		$this->db->from('query');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}
}