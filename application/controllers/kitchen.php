<?php
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
  class Kitchen extends CI_Controller {
    protected $Name = "", $Version = "";    
    function __construct(){
        parent::__construct();

         
        $this->load->model('Config_model');
        $this->Config_model->load_config();
        //$this->load->model('Kitchen_model');
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
        $this->load->helper('session_check');
        check_session();
    }
    public function index(){
        $hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Kitchen');
        $this->load->view('header', $hdata);
        $this->load->view('kitchen_index');
        $this->load->view('footer', $hdata);
    }
  }
     
?>