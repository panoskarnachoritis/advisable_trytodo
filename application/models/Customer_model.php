<?php
    class Customer_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function register($enc_password){

            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'password' => $enc_password
            );

            return $this->db->insert('customers', $data);
        }

        public function login($email, $password){
            
            $result = $this->db->get_where('customers', array('email' => $email, 'password' => $password));
            

            if($result->num_rows() == 1){
                return $result->result_array();
            }
            else{
                return false;
            }
        }

        public function get_data($id){

            $result = $this->db->get_where('customers', array('id' => $id));

            if($result->num_rows() == 1){
                return $result->row(0);
            }
            else{
                return false;
            }
        }

        public function update(){

            if(empty($this->input->post('password'))){
                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname')
                );

                $this->db->where('id', $this->input->post('id'));
                return $this->db->update('customers', $data);
            }
            else{
                $enc_password = hash ( "sha256", $this->input->post('password') );

                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'password' => $enc_password
                );

                $this->db->where('id', $this->input->post('id'));
                return $this->db->update('customers', $data);
            }
        }

        public function update_customer_time($id){

            $this->db->order_by('messages.created_at', 'DESC');
            $query = $this->db->get_where('messages', array('customer_id' => $id));
            
            $time = $query->result_array();
            $data = array(
                'updated_at' => $time[0]['created_at']
            );

            $this->db->where('id', $id);
            $this->db->update('customers', $data);
        }

        public function get_customers(){

            $this->db->order_by('customers.updated_at', 'DESC');
            $query = $this->db->get('customers');

            return $query->result_array();
        }

        public function get_message_history($id){

            $this->db->order_by('messages.created_at', 'DESC');
            $query = $this->db->get_where('messages', array('customer_id' => $id));
            return $query->result_array();
        }
    }