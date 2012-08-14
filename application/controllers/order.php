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
		$this->load->model('Order_model');
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
			case ('menu'):
				$this->menu();
				break;
        }
    }
    public function index(){
    	$this->control();
		//echo $this->step;
	
	
        $hdata = array('Name' => $this->config_name, 'Version' => $this->config_version, 'Page' => 'Order');
        $this->load->view('partials/header', $hdata);
        $this->load->view('order/'.$this->step, $this->data);
        $this->load->view('partials/footer', $hdata); 
  
    }
    public function table(){
    	$complete = FALSE;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('table', 'Table', 'required');
		if($this->form_validation->run() != FALSE){
			$this->Order_model->new_order($this->input->post('table'), $this->staff_id);
			$complete = TRUE;
		}
		if ($complete == FALSE){ 
        $this->load->Model('Table_model');
        $tables = $this->Table_model->get_table_by_assigned($this->staff_id);//get a list of tables for that waitstaff based on waitstaff id
		
        $this->step_name = "Select Table";
        $this->data = array('Step' => $this->step_name, 'tables' => $tables);
		} else {
			//echo "in else stament loading category";
			$this->step = 'menu';
			$this->index();
		} 
    }
    public function category(){

    }
    public function meal(){
        
    }
	public function menu(){
		   			
   		$this->load->model('Category_model');
		$this->Category_model->load_categories();
		$this->load->model('Meal_model');
		$this->Meal_model->load_meals();
		$order_id = $this->Order_model->__get('my_id');
		$this->fb->log($order_id);
		
        $this->step_name = "Menu";
        $this->data = array('Step' => $this->step_name, 'categories'=>$this->Category_model->my_categories, 'meals'=>$this->Meal_model->my_meals, 'order_id'=>$order_id);
		

		
	}
    public function place_order(){
    	/*$my_orderid;
		$my_orderitems;
		$my_mealid;
		$my_orderoptions;
    	if(isset($_POST['id'])){
    		$my_orderid = $_POST['id'];
			$this->fb->log("order id in place order of order php" . $my_orderid);
    	}
		if(isset($_POST['items'])){
    		$my_orderitems = $_POST['items'];
			$this->fb->log("order items in place order of order php" . $my_orderitems);
    	}
		if(isset($_POST['options'])){
    		$my_orderoptions = $_POST['options'];
			$this->fb->log("order options in place order of order php" . $my_orderoptions);
    	}
		if(isset($_POST['mealid'])){
    		$my_mealid = $_POST['mealid'];
			$this->fb->log("order mealid in place order of order php" . $my_mealid);
    	}*/
    	$order;
		if(isset($_POST['order'])){
			$order = $_POST['order'];
			$this->fb->log("order is $order");;;
		}
		$return = $this->Order_model->place_order($order);
		return $return;
    }
    
}