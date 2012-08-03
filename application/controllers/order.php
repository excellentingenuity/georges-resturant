<?php 
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Order Class, controls the order process from start to finish
*  Version 1.0
*/
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
Class Order extends CI_Controller {
        
    protected $config_name, $config_version, $step, $data, $step_name, $staff_id;
        
    function __construct(){
        parent::__construct();
        session_start();
        $this->load->model('Config_model');
        $this->Config_model->load_config();
        $this->config_name = $this->Config_model->get_Name();
        $this->config_version = $this->Config_model->get_Version();
        check_session();
        $this->load->model('Staff_model');
        $this->staff_id  = $this->Staff_model->get_my_id($this->session->userdata('staff_name'));
        //echo($this->staff_id);
        $this->step = 'table';
    }
    protected function control(){
        switch ($this->step){
            case ('table'):
                $this->table();
                break;
            case ('category'):
                $this->category();
                break;
            case ('meal'):
                $this->meal();
                break;
        }
    }
    public function index(){
        $this->control();
    
        $hdata = array('Name' => $this->config_name, 'Version' => $this->config_version, 'Page' => 'Order');
        $this->load->view('partials/header', $hdata);
        $this->load->view('order/'.$this->step, $this->data);
        $this->load->view('partials/footer', $hdata);    
    }
    public function table(){
        $this->load->Model('Table_model');
        //$this->Table_model->get_table_by_assigned();//get a list of tables for that waitstaff based on waitstaff id
        $this->step_name = "Select Table";
        $this->data = array('Step' => $this->step_name);
    }
    public function category(){
        
    }
    public function meal(){
        
    }
    
    
}