<?php
Class Tables extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Config_model');
        $this->load->model('Table_model');
        $this->Config_model->load_config();
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
        
    }
    function index(){
        $data['query'] = $this->Table_model->get_all_items();
        $hdata = array('Name' => $this->Name, 'Version' => $this->Version);
        $this->load->view('header', $hdata);
        $this->load->view('table_index', $data);
        $this->load->view('footer', $hdata);
     
    }  

}

?>