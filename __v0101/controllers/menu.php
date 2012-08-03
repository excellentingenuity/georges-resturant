<?php
 if (! defined('BASEPATH')) exit('No direct script access allowed');

Class Menu extends CI_Controller {
    protected $Name, $Version;
    
    function __construct(){
        parent::__construct();
        $this->load->model('Config_model');
        $this->load->model('Menu_model');
        $this->Config_model->load_config();
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
        $this->load->helper('session_check');
        //check_session();
    }
    
    function index(){
        
        
        $hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Menu');
        $this->load->view('header', $hdata);
        
        $this->load->view('footer', $hdata);
    }
    
}
?>
