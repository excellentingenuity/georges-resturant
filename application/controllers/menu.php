<?php
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
 Class Menu extends CI_Controller {
    protected $Name, $Version, $data;
    
    function __construct(){
        parent::__construct();
        $this->load->model('Config_model');
        //$this->load->model('Menu_model');
        $this->Config_model->load_config();
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
		check_session();
    }
	function index(){
		$this->menu();
		$hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Menu');
        $this->load->view('partials/header', $hdata);
        $this->load->view('order/menu', $this->data);
        $this->load->view('partials/footer', $hdata);
	}
	public function menu(){
		   			
   		$this->load->model('Category_model');
		$this->Category_model->load_categories();
		$this->load->model('Meal_model');
		$this->Meal_model->load_meals();
		
		
        $this->step_name = "Menu";
        $this->data = array('Step' => $this->step_name, 'categories'=>$this->Category_model->my_categories, 'meals'=>$this->Meal_model->my_meals);
		

		
	}
}
 ?>