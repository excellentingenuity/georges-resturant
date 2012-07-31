<?php

 if (! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
    protected $Name = "", $Version = "";
	function __construct(){
		parent::__construct();
        $this->load->model('Config_model');
		//$this->load->model('Menu_item_model');
        $this->Config_model->load_config();
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
        $this->load->helper('session_check');
        //print_r($this->session->all_userdata());
        check_session();
	}
	
	function index(){

		//$data['query'] = $this->Menu_item_model->get_all_items();
        $hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Orders');
        $this->load->view('header', $hdata);
        $this->load->view('orders_index'/*, $data*/);
        $this->load->view('footer', $hdata);
	}  

	
}
?>