<?php
class Menu_Item extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Menu_item_model');
	}
	
	function index(){
		$data['query'] = $this->Menu_item_model->get_all_items();
		
		$this->load->view('menu_item_list', $data);
	}
	
}
?>