<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendormodel extends CI_Model{
				
	public function admin_log($data,$table)
			{

				$ads = array();
				$this->db->select('*');
				$this->db->where('p_mobile',$data['p_mobile']);
				$this->db->where('p_email',$data['p_email']);
				//$this->db->where('p_password',$data['p_password']);
				//$this->db->where('otp',$data['otp']);

				$fetch_query= $this->db->get($table);

				$query=$fetch_query->result();
				foreach ($query as $row)
				 {
					$ads = $row;
				 }
				return $ads;
			}
	   public function otp_login1($data)
            {
                $ads = array();
                $this->db->select('*');
                $this->db->where('otp',$data['otp']);
                $this->db->where('p_mobile',$data['mobile']);
                $fetch_query= $this->db->get('proffesional');
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
 		public function select_comm_where($where,$id,$table){
 		
 		$this->db->select('*');
 		$this->db->where($where,$id);
		$this->db->from($table);
		$this->db->order_by('id','desc');
		
		$query = $this->db->get();

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
 	 public function reset($data)

            {
              $ads = array();
             $this->db->select('*');
            $this->db->where('p_email',$data['email']);
               $fetch_query= $this->db->get('proffesional');
              $query=$fetch_query->result();
                foreach ($query as $row)

                 {

                    $ads = $row;

                 }

                return $ads;

            }

public function is_temp_pass_valid($data,$id){

    $this->db->where('id',$id);

        $this->db->update('proffesional',$data);

}
}