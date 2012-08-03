<?php 
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Home Class, this is the default controller and index is the default view
*  Version 1.0
*/
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
Class Home extends CI_Controller {
        
    protected $config_name, $config_version;
        
    function __construct(){
        parent::__construct();
        session_start();
        $this->load->model('Config_model');
        $this->Config_model->load_config();
        $this->config_name = $this->Config_model->get_Name();
        $this->config_version = $this->Config_model->get_Version();
        check_session();
    }
    public function index() {
        
    }    
}

?>