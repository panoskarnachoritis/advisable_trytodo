<?php
    class Recovery_model extends CI_Model{

        public function __construct(){
            $this->load->database();
        }

        public function verify_email($token, $reason){
            
            $result = $this->db->get_where('recoveries', array('token' => $token, 'reason' => $reason));

            return $result->result_array();
        }

        public function delete_verify_email($id){

            $this->db->where('id', $id);
			$this->db->delete('recoveries');
        }

        public function lost_password($email, $admin=FALSE){

            $token = md5($email);

            if($admin){
                $reason = 'admin';
            }
            else{
                $reason = 'password';
            }

            $data = array(
                'token' => $token,
                'email' => $email,
                'reason' => $reason
            );

            return $this->db->insert('recoveries', $data);
        }

        public function get_info($token){

            $result = $this->db->get_where('recoveries', array('token' => $token));

            return $result->result_array();
        }

        public function delete_lost_password($id){
            
            $this->db->where('id', $id);
			$this->db->delete('recoveries');
        }

    }