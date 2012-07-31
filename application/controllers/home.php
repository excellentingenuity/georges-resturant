<?php
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
Class Home extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        session_start();
        $this->load->model('Config_model');
        $this->Config_model->load_config();
        if (!$this->session->userdata('username')){
            redirect('login');     
         }
        if ($this->Config_model->get_Single_login() == FALSE){
            //check for $_Session variable if staff is set else redirect to staff
            if(!$this->session->userdata('staff_name')){
                redirect('staff');
            }
        }
        
    }
    function index(){
        
                
        $Name = $this->Config_model->get_Name();
        $Version = $this->Config_model->get_Version();
       $data = array('Name' => $Name, 'Version' => $Version);
       //echo $data['Name'] . "<br />" . $data['Version'];
       $this->load->view('home_index', $data);
    }  

}

?>