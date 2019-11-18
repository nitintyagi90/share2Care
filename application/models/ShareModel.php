<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShareModel extends CI_Model {
    public function submitform($data){
    $this->db->insert('form_details',$data);
    return $this->db->insert_id();
    }
     public function otp_login1($data)
            {
                $ads = array();
                $this->db->select('*');
                $this->db->where('otp',$data['otp']);
                $this->db->where('u_phone',$data['mobile']);
                $fetch_query= $this->db->get('Users');
                $query=$fetch_query->result();
                foreach ($query as $row)
                 {
                    $ads = $row;
                 }
                return $ads;
            }
             public function otp_login($data)
            {
                $ads = array();
                $this->db->select('*');
               /* $this->db->where('otp',$data['otp']);
               */ $this->db->where('u_phone',$data['mobile']);
                $this->db->where('u_email',$data['u_email']);
                $this->db->where('u_password',$data['u_password']);
                $fetch_query= $this->db->get('Users');
                $query=$fetch_query->result();
                foreach ($query as $row)
                 {
                    $ads = $row;
                 }
                return $ads;
            }
    public function checkform($mobile){
    $this->db->select('*');
    $this->db->where('mobile',$mobile);
    $this->db->from('form_details');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
    }
  public function checkid($mobile){
    $this->db->select('*');
    $this->db->where('id',$mobile);
    $this->db->from('form_details');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
    }
    public function vendor_log($data)
            {
                $ads = array();
                $this->db->select('*');
                $this->db->where('u_email',$data['u_email']);
                $this->db->where('u_password',$data['u_password']);

                $fetch_query= $this->db->get('Users');

                $query=$fetch_query->result();
                foreach ($query as $row)
                 {
                    $ads = $row;
                 }
                return $ads;
            }
                public function reset($data)

            {
              $ads = array();
             $this->db->select('*');
            $this->db->where('u_email',$data['email']);
               $fetch_query= $this->db->get('Users');
              $query=$fetch_query->result();
                foreach ($query as $row)

                 {

                    $ads = $row;

                 }

                return $ads;

            }

public function is_temp_pass_valid($data,$id){

    $this->db->where('id',$id);

        $this->db->update('Users',$data);

}
   
}