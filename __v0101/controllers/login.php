<?php
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Login extends CI_Controller {
        
    function __construct(){
        parent::__construct();

         
        $this->load->model('Config_model');
        $this->Config_model->load_config();
        $this->load->model('Login_model');
        
    }
     
     function index() {
         if($this->session->userdata('username'))
        {
         redirect('home');   
        }

         $this->load->library('form_validation');
         $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
         $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
         
         if ($this->form_validation->run() !== false) {
            $authen =  $this->Login_model->verify_user($this->input->post('username'), $this->input->post('password'));
                      if ($authen !== false ){
                            $this->session->set_userdata('username', $this->input->post('username'));
                            redirect('home');
                 }
         }
         

         $this->load->view('login_view');
     }
     function logout() {
         //$this->session->unset_userdata('username');
         //$this->session->unset_userdata('staff_name');
         $this->session->sess_destroy();
         redirect(base_url());
     }
 }

?>