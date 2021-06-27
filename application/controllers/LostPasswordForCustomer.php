<?php
    class LostPasswordForCustomer extends CI_Controller{
        
        public function send_request(){
            $title['title'] = 'Lost Password';

            if($this->session->userdata('logged_in')){
                redirect(''.$this->session->userdata('role').'/profile');
            }

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if($this->form_validation->run() ===FALSE){
                $this->load->view('templates/header', $title);
                $this->load->view('customer/lost-password');
                $this->load->view('templates/footer');
            }
            else{

                if($this->customer_model->check_email($this->input->post('email'))){

                    if($this->recovery_model->lost_password($this->input->post('email'), FALSE)){

                        $this->session->set_flashdata('send_request', 'Please check your email to create a new password');
                    
                        redirect('lostPasswordForCustomer/send_request');
                    }
                }
                else{
                    redirect('lostPasswordForCustomer/send_request');
                }

            }

            
        }

    }