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
        $tables = $this->Table_model->get_all_tables();//$tables = $this->Table_model->get_table_by_assigned($this->staff_id);//get a list of tables for that waitstaff based on waitstaff id
		
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

    	$order;
		if(isset($_POST['order'])){
			$order = $_POST['order'];
			$this->fb->log("order is $order");
		}
		$return = $this->Order_model->place_order($order);
		return $return;
    }
	public function kitchen(){
		$mydata = array('orders'=>$this->Order_model->get_orders());
		$this->fb->log("orders returned to controller");
		$this->fb->log($mydata);
		$hdata = array('Name' => $this->config_name, 'Version' => $this->config_version, 'Page' => 'Kitchen');
        $this->load->view('partials/header', $hdata);
		$this->load->view('order/kitchen', $mydata);
        $this->load->view('partials/footer', $hdata); 
	}
	public function oven(){
		$mydata = array('orders'=>$this->Order_model->get_orders());
		$this->fb->log("orders returned to controller");
		$this->fb->log($mydata);
		$hdata = array('Name' => $this->config_name, 'Version' => $this->config_version, 'Page' => 'Oven');
        $this->load->view('partials/header', $hdata);
		$this->load->view('order/oven', $mydata);
        $this->load->view('partials/footer', $hdata); 
	}
	public function order_set_ready(){
		$id;
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$this->fb->log("order id is $id");
		}
		$return = $this->Order_model->order_ready($id);
		$this->load->model('Message_model');
		$data = $this->Order_model->get_order_specs($id);
		$message = "Order: " . $data->idOrders . " for table: " . $data->Tableid . " is ready to be served.";
		$this->fb->log($message);
		$this->Message_model->send_message($data->Staffid, $message);
		return $return;
	}
	public function refresh_orders(){
		$mydata = array('orders'=>$this->Order_model->get_orders());
		$this->fb->log("orders returned to controller");
		$this->fb->log($mydata);
		$this->load->view('order/kitchen', $mydata);
	}
	public function my_orders(){
		$refresh = false;
		if(isset($_POST['refresh'])){
			$refresh = true;
		}
		$myid = $this->session->userdata['staff_id'];
		$mydata = array('orders'=>$this->Order_model->get_my_orders($myid));
		$hdata = array('Name' => $this->config_name, 'Version' => $this->config_version, 'Page' => 'My Orders');
		if($refresh == true){
			$this->load->view('order/my_orders', $mydata);
		}else {
	        $this->load->view('partials/header', $hdata);
			$this->load->view('order/my_orders', $mydata);
	        $this->load->view('partials/footer', $hdata); 
		}
	}
	public function order_served(){
		$id;
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$this->fb->log("order id is $id");
		}
		$return = $this->Order_model->order_served($id);
		/*$this->load->model('Message_model');
		$data = $this->Order_model->get_order_specs($id);
		$message = "Order: " . $data->idOrders . " for table: " . $data->Tableid . " is ready to be served.";
		$this->fb->log($message);
		$this->Message_model->send_message($data->Staffid, $message);*/
		return $return;
	}
	public function print_reciept(){
		$id;
		$myhtml;
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$this->fb->log("order id is $id");
			$mydata = $this->Order_model->get_order($id);
			$this->fb->log("mydata in print recipet returned from the model is");
			$this->fb->log($mydata);
			$my_order = array('order'=>$mydata);
			//$myhtml = '<h2>Order: '.$my_order['id'] . '&nbsp;&nbsp;&nbsp;Table: '. $my_order['table'].'</h2><br />';
			//$html = array('html'=>$myhtml);
			$this->load->view('order/receipt', $my_order);
		}
	}
	public function get_all_orders(){
		$refresh = false;
		if(isset($_POST['refresh'])){
			$refresh = true;
		}
		//$myid = $this->session->userdata['staff_id'];
		$mydata = array('orders'=>$this->Order_model->get_all_orders());
		$hdata = array('Name' => $this->config_name, 'Version' => $this->config_version, 'Page' => 'All Orders');
		if($refresh == true){
			$this->load->view('order/all_orders', $mydata);
		}else {
	        $this->load->view('partials/header', $hdata);
			$this->load->view('order/all_orders', $mydata);
	        $this->load->view('partials/footer', $hdata); 
		}	
	}
	public function clear_order(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$return = $this->Order_model->clear_order($id);
			return $return;
		}
	}
    
}