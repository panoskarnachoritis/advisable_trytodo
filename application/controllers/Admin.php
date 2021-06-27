<?php
    class Admin extends CI_Controller{

        public function login(){
            $title['title'] = 'Login for Admin';

            if($this->session->userdata('logged_in')){
                redirect(''.$this->session->userdata('role').'/profile');
            }

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header', $title);
                $this->load->view('admin/login');
                $this->load->view('templates/footer');
            }
            else{
                $email = $this->input->post('email');

                $password = hash ( "sha256", $this->input->post('password') );

                $admin = $this->admin_model->login($email, $password);

                if($admin){

                    $admin_session = array(
                        'user_id' => $admin[0]['id'],
                        'firstname' => $admin[0]['firstname'],
                        'lastname' => $admin[0]['lastname'],
                        'email' => $admin[0]['email'],
                        'logged_in' => true,
                        'role' => 'admin'
                    );

                    $this->session->set_userdata($admin_session);

                    redirect('admin/profile');
                }
                else{
                    
                    $this->session->set_flashdata('login_failure', 'Your email or password is incorrect');
                    redirect('admin/login');
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

            redirect('admin/login');
        }

        public function profile(){
            $title['title'] = 'My Profile';

            if(!$this->session->userdata('logged_in')){
                redirect('admin/login');
            }

            if($this->session->userdata('role') == 'customer'){
                redirect('customer/login');
            }

            if(empty($this->session->userdata('firstname')) || empty($this->session->userdata('lastname'))){
                $logged_user['fullname'] = $this->session->userdata('email');
            }
            else{
                $logged_user['fullname'] = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
            }

            $admin = (array) $this->admin_model->get_data($this->session->userdata('user_id'));

            if($admin){
                $user = array(
                    'user_id' => $admin['id'],
                    'firstname' => $admin['firstname'],
                    'lastname' => $admin['lastname'],
                    'email' => $admin['email'],
                    'edit_customer' => FALSE
                );
                
                $this->load->view('templates/header', $title);
                $this->load->view('admin/navigation', $logged_user);
                $this->load->view('admin/profile', $user);
                $this->load->view('templates/footer');
            }
        }
        
        public function show_customers(){
            $title['title'] = 'Customers';

            if(!$this->session->userdata('logged_in')){
                redirect('admin/login');
            }

            if($this->session->userdata('role') == 'customer'){
                redirect('customer/login');
            }

            if(empty($this->session->userdata('firstname')) || empty($this->session->userdata('lastname'))){
                $logged_user['fullname'] = $this->session->userdata('email');
            }
            else{
                $logged_user['fullname'] = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
            }

            $data['customers'] = $this->customer_model->get_customers();

            $this->load->view('templates/header', $title);
            $this->load->view('admin/navigation',$logged_user);
            $this->load->view('admin/customer', $data);
            $this->load->view('templates/footer');
        }

        public function show_message_history($id){
            $title['title'] = 'Message History';

            if(!$this->session->userdata('logged_in')){
                redirect('admin/login');
            }

            if($this->session->userdata('role') == 'customer'){
                redirect('customer/login');
            }

            if(empty($this->session->userdata('firstname')) || empty($this->session->userdata('lastname'))){
                $logged_user['fullname'] = $this->session->userdata('email');
            }
            else{
                $logged_user['fullname'] = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
            }

            $data['messages'] = $this->customer_model->get_message_history($id);

            $customer = (array) $this->customer_model->get_data($id);

            if($customer){
                $user = array(
                    'firstname' => $customer['firstname'],
                    'lastname' => $customer['lastname'],
                    'email' => $customer['email']
                );
            }
            $data['user'] = $user;


            $this->load->view('templates/header', $title);
            $this->load->view('admin/navigation', $logged_user);
            $this->load->view('admin/message_history',$data);
            $this->load->view('templates/footer');
        }

        public function update(){

            if(!$this->session->userdata('logged_in')){
                redirect('admin/login');
            }

            if($this->session->userdata('role') == 'customer'){
                redirect('customer/login');
            }

            if($this->admin_model->update()){
                $this->session->set_userdata(
                    array(
                        'firstname' => $this->input->post('firstname'), 
                        'lastname' => $this->input->post('lastname')
                     )
                );
            }

            $this->session->set_flashdata('admin_updated', 'The info\'s has been updated');

            redirect('admin/profile');
        }

        public function edit_customer($id){
            $title['title'] = 'Customers';

            if(!$this->session->userdata('logged_in')){
                redirect('admin/login');
            }

            if($this->session->userdata('role') == 'customer'){
                redirect('customer/login');
            }

            if(empty($this->session->userdata('firstname')) || empty($this->session->userdata('lastname'))){
                $logged_user['fullname'] = $this->session->userdata('email');
            }
            else{
                $logged_user['fullname'] = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
            }

            $customer = (array) $this->customer_model->get_data($id);

            if($customer){
                $data = array(
                    'user_id' => $customer['id'],
                    'firstname' => $customer['firstname'],
                    'lastname' => $customer['lastname'],
                    'email' => $customer['email'],
                    'edit_customer' => TRUE
                );
                
                $this->load->view('templates/header', $title);
                $this->load->view('admin/navigation', $logged_user);
                $this->load->view('admin/profile', $data);
                $this->load->view('templates/footer');
            }
        }

        public function update_customer(){

            if(!$this->session->userdata('logged_in')){
                redirect('admin/login');
            }

            if($this->session->userdata('role') == 'customer'){
                redirect('customer/login');
            }

            if($this->customer_model->update()){
                $this->session->set_flashdata('customer_updated', 'The info\'s has been updated');

                redirect('admin/show_customers');
            }
            
        }

        public function delete_customer($id){

            if(!$this->session->userdata('logged_in')){
                redirect('admin/login');
            }

            if($this->session->userdata('role') == 'customer'){
                redirect('customer/login');
            }
            
            $this->admin_model->delete_customer($id);

            redirect('admin/show_customers');
        }
    }