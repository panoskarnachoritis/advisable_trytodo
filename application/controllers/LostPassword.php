<?php
    class LostPassword extends CI_Controller{
        public function index(){
            $data['title'] = 'Lost Password';

            $this->load->view('templates/header', $data);
            $this->load->view('lost-password');
            $this->load->view('templates/footer');
        }
    }