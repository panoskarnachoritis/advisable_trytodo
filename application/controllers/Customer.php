<?php
    class Customer extends CI_Controller{

        public function index(){
            $data['title'] = 'Login';

            $this->load->view('templates/header', $data);
            $this->load->view('customer/login');
            $this->load->view('templates/footer');
        }

        public function register(){
            $data['title'] = 'Register';

            $this->load->view('templates/header', $data);
            $this->load->view('customer/register');
            $this->load->view('templates/footer');
        }

        public function login(){
            $data['title'] = 'My Profile';

            $this->load->view('templates/header', $data);
            $this->load->view('customer/navigation');
            $this->load->view('customer/profile');
            $this->load->view('templates/footer');
        }
        public function show_form(){
            $data['title'] = 'Submit New Form';

            $this->load->view('templates/header', $data);
            $this->load->view('customer/navigation');
            $this->load->view('customer/form');
            $this->load->view('templates/footer');
        }
        public function show_message_history(){
            $data['title'] = 'Message History';

            $this->load->view('templates/header', $data);
            $this->load->view('customer/navigation');
            $this->load->view('customer/message_history');
            $this->load->view('templates/footer');
        }
    }