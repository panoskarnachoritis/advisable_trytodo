<?php
    class Verification extends CI_Controller{
        public function verify_email($token){

            $recovery = $this->recovery_model->verify_email($token, 'email');

            if($this->customer_model->account_activation($recovery[0]['email'])){

                $this->recovery_model->delete_verify_email($recovery[0]['id']);

                $this->session->set_flashdata('account_activated', 'The account has been activated');
                    
                redirect('customer/login');
            }
        }

        public function retrieve_password($token,$admin){

            $title['title'] = 'Restore Password';

            if($this->session->userdata('logged_in')){
                redirect(''.$this->session->userdata('role').'/profile');
            }

            if($admin){
                $recovery = $this->recovery_model->verify_email($token, 'admin');
            }
            else{
                $recovery = $this->recovery_model->verify_email($token, 'password');
            }


            $token = $recovery[0]['token'];

            $data = array(
                'token' => $token
            );

            $this->form_validation->set_rules('password', 'Password', 'required|min_length[1]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
    
            if($this->form_validation->run() ===FALSE){
                $this->load->view('templates/header', $title);
                $this->load->view('restore_password', $data);
                $this->load->view('templates/footer');
            }

        }

        public function update(){

            $result = $this->recovery_model->get_info($this->input->post('token'));

            $enc_password = hash ( "sha256", $this->input->post('password') );

            if($result[0]['reason'] == 'admin'){
                $this->admin_model->update_password($result[0]['email'], $enc_password);
            }
            else{
                $this->customer_model->update_password($result[0]['email'], $enc_password);
            }

            $this->recovery_model->delete_lost_password($result[0]['id']);

            $this->session->set_flashdata('password_restored', 'Your password has been change successfully');

            redirect('customer/login');
        }
    }