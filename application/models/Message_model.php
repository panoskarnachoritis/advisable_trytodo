<?php
    class Message_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function submit_form(){
            
            $data = array(
                'customer_id' => $this->session->userdata('user_id'),
                'message' => $this->input->post('message')
            );

            return $this->db->insert('messages', $data);
        }

        public function get_messages(){

            $this->db->order_by('messages.created_at', 'DESC');
            $query = $this->db->get_where('messages', array('customer_id' => $this->session->userdata('user_id')));

            return $query->result_array();
        }

       
    }