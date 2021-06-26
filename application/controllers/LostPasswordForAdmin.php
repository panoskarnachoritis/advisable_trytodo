<?php
    class LostPasswordForAdmin extends CI_Controller{
        public function index(){
            $title['title'] = 'Lost Password';

            $this->load->view('templates/header', $title);
            $this->load->view('admin/lost-password');
            $this->load->view('templates/footer');
        }
    }