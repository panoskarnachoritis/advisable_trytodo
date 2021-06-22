<?php
    class Admin extends CI_Controller{
        public function index(){
            $data['title'] = 'Login for Admin';

            $this->load->view('templates/header', $data);
            $this->load->view('admin/login');
            $this->load->view('templates/footer');
        }

        public function login(){
            $data['title'] = 'My Profile';

            $this->load->view('templates/header', $data);
            $this->load->view('admin/navigation');
            $this->load->view('admin/profile');
            $this->load->view('templates/footer');
        }
        public function show_customers(){
            $data['title'] = 'Customers';

            $this->load->view('templates/header', $data);
            $this->load->view('admin/navigation');
            $this->load->view('admin/customer');
            $this->load->view('templates/footer');
        }
        public function show_message_history(){
            $data['title'] = 'Message History';

            $this->load->view('templates/header', $data);
            $this->load->view('admin/navigation');
            $this->load->view('admin/message_history');
            $this->load->view('templates/footer');
        }


    }