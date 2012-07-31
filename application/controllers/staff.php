<?php
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Staff extends CI_Controller {
    protected $Name = "", $Version = "";    
    function __construct(){
        parent::__construct();

         
        $this->load->model('Config_model');
        $this->Config_model->load_config();
        $this->load->model('Staff_model');
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
        
    }
     
     function index() {
         
         if($this->session->userdata('staff_name')){
             redirect('home');
         }
         
         $this->load->library('form_validation');
         $this->form_validation->set_rules('staff_name', 'Staff Name', 'required');
         $this->form_validation->set_rules('passcode', 'Passcode', 'required|min_length[4]');
         
         if ($this->form_validation->run() !== false) {
            $authen =  $this->Staff_model->authenticate_staff($this->input->post('staff_name'), $this->input->post('passcode'));
                    echo $authen;
                      if ($authen !== false ){
                            $this->session->set_userdata('staff_name', $this->input->post('staff_name'));
                            redirect('home');
                 }
         }
         
         $data['all_staff'] = $this->Staff_model->get_staff();
         $hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Staff Login');
         $this->load->view('header', $hdata);
         $this->load->view('staff_login', $data);
         $this->load->view('footer', $hdata);
         //else login staff
         ///change to check for config variable first then check session

     }
     public function staff_logout() {
        //only remove staff variable from session
        $this->session->unset_userdata('staff_name');
        redirect('home');
     }
 }