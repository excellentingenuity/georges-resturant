<?php
Class Home extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Config_model');
        $this->Config_model->load_config();
        
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