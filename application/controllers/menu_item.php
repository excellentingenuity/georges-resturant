<?php
class Menu_Item extends CI_Controller {
    protected $Name = "", $Version = "";
	function __construct(){
		parent::__construct();
        $this->load->model('Config_model');
		$this->load->model('Menu_item_model');
        $this->Config_model->load_config();
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
	}
	
	function index(){

		$data['query'] = $this->Menu_item_model->get_all_items();
        $hdata = array('Name' => $this->Name, 'Version' => $this->Version);
        $this->load->view('header', $hdata);
        $this->load->view('menu_item_list', $data);
        $this->load->view('footer', $hdata);
	}  

	
}
?>