<?php
    class LostPasswordForCustomer extends CI_Controller{
        public function index(){
            $title['title'] = 'Lost Password';

            $this->load->view('templates/header', $title);
            $this->load->view('customer/lost-password');
            $this->load->view('templates/footer');
        }
    }