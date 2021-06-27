<?php
    class Customer extends CI_Controller{

        public function register(){
            $title['title'] = 'Register';

            if($this->session->userdata('logged_in')){
                redirect(''.$this->session->userdata('role').'/profile');
            }

            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customers.email]', array('is_unique' => 'This Email is already being used'));
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

            if($this->form_validation->run() ===FALSE){
                $this->load->view('templates/header', $title);
                $this->load->view('customer/register');
                $this->load->view('templates/footer');
            }
            else{

                $enc_password = hash ( "sha256", $this->input->post('password') );
                
                $this->customer_model->register($enc_password);

                redirect('customer/login');
            }
            
        }
        
        public function login(){
            $title['title'] = 'Login';

            if($this->session->userdata('logged_in')){
                redirect(''.$this->session->userdata('role').'/profile');
            }

            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header', $title);
                $this->load->view('customer/login');
                $this->load->view('templates/footer');
            }
            else{
                $email = $this->input->post('email');

                $password = hash ( "sha256", $this->input->post('password') );

                $customer = $this->customer_model->login($email, $password);

                if($customer){

                    $customer_session = array(
                        'user_id' => $customer[0]['id'],
                        'firstname' => $customer[0]['firstname'],
                        'lastname' => $customer[0]['lastname'],
                        'email' => $customer[0]['email'],
                        'logged_in' => true,
                        'role' => 'customer'

                    );

                    $this->session->set_userdata($customer_session);

                    redirect('customer/profile');
                    
                }
                else{
                    
                    redirect('customer/login');
                }
            }

        }

        public function logout(){

            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('firstname');
            $this->session->unset_userdata('lastname');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('role');

            redirect('customer/login');
        }

        public function profile(){
            $title['title'] = 'My Profile';

            if(!$this->session->userdata('logged_in')){
                redirect('customer/login');
            }

            if($this->session->userdata('role') == 'admin'){
                redirect('admin/login');
            }

            if(empty($this->session->userdata('firstname')) || empty($this->session->userdata('lastname'))){
                $logged_user['fullname'] = $this->session->userdata('email');
            }
            else{
                $logged_user['fullname'] = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
            }

            $customer = (array) $this->customer_model->get_data($this->session->userdata('user_id'));

            if($customer){
                $user = array(
                    'user_id' => $customer['id'],
                    'firstname' => $customer['firstname'],
                    'lastname' => $customer['lastname'],
                    'email' => $customer['email']
                );
                
                $this->load->view('templates/header', $title);
                $this->load->view('customer/navigation', $logged_user);
                $this->load->view('customer/profile', $user);
                $this->load->view('templates/footer');
            }
            
        }

        public function show_form(){
            $data['title'] = 'Submit New Form';

            if(!$this->session->userdata('logged_in')){
                redirect('customer/login');
            }

            if($this->session->userdata('role') == 'admin'){
                redirect('admin/login');
            }
            
            if(empty($this->session->userdata('firstname')) || empty($this->session->userdata('lastname'))){
                $logged_user['fullname'] = $this->session->userdata('email');
            }
            else{
                $logged_user['fullname'] = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
            }

            $this->load->view('templates/header', $data);
            $this->load->view('customer/navigation', $logged_user);
            $this->load->view('customer/form');
            $this->load->view('templates/footer');
        }

        public function show_message_history(){
            $title['title'] = 'Message History';

            if(!$this->session->userdata('logged_in')){
                redirect('customer/login');
            }

            if($this->session->userdata('role') == 'admin'){
                redirect('admin/login');
            }

            if(empty($this->session->userdata('firstname')) || empty($this->session->userdata('lastname'))){
                $logged_user['fullname'] = $this->session->userdata('email');
            }
            else{
                $logged_user['fullname'] = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
            }

            $data['messages'] = $this->message_model->get_messages();

            $this->load->view('templates/header', $title);
            $this->load->view('customer/navigation', $logged_user);
            $this->load->view('customer/message_history', $data);
            $this->load->view('templates/footer');
        }

        public function update(){

            if(!$this->session->userdata('logged_in')){
                redirect('customer/login');
            }

            if($this->session->userdata('role') == 'admin'){
                redirect('admin/login');
            }

            if($this->customer_model->update()){
                $this->session->set_userdata(
                    array(
                        'firstname' => $this->input->post('firstname'), 
                        'lastname' => $this->input->post('lastname')
                     )
                );
            }

            $this->session->set_flashdata('customer_updated', 'The info\'s has been updated');

            redirect('customer/profile');
        }

        public function submit_form(){

            if(!$this->session->userdata('logged_in')){
                redirect('customer/login');
            }

            if($this->session->userdata('role') == 'admin'){
                redirect('admin/login');
            }

            if($this->message_model->submit_form()){

                $this->customer_model->update_customer_time($this->session->userdata('user_id'));

                $this->session->set_flashdata('message_submitted', 'The message has been submitted');
            }

            redirect('customer/show_form');
        }
    }