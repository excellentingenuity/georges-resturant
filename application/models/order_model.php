<?php
/*
 * Order Class for the order object
 * Created by James Johnson of Excellent InGenuity LLC 2012
 * 
 */
Class Order_model extends CI_Model {
	protected $table_id, $staff_id, $my_id;
	
	function __construct() {
        parent::__construct();
    }
	public function __get($key){
		return $this->$key;
	}
	public function new_order($table, $staff){
		//table id number and staff id number
		if($table != NULL){
			$this->table_id = $table;
		}
		if ($staff != NULL){
			$this->staff_id = $staff;
		}
		$CI =& get_instance();
		$data = array('Staffid'=>$this->staff_id, 'Tableid'=> $this->table_id, 'isReady' => FALSE, 'isServed'=>FALSE, 'isPlaced'=>FALSE, 'isChanged'=>0);
		$CI->db->insert('Orders', $data);
		$this->my_id = $CI->db->insert_id();
		//return $this->my_id;
	}
	public function place_order($order){
		//add function to place order into db
		$CI =& get_instance();
		$my_order_id = $order[0];
		$CI->fb->log("my order id is " . $my_order_id);
		$meals = $order[1];
		$CI->fb->log($meals);
		$return = False;
		
		for($i = 0; $i < count($meals); $i++){
			$my_meal_id = $meals[$i]['id'];
			$my_items = $meals[$i]['items'];
			$my_options = $meals[$i]['options'];
			for ($j = 0; $j < count($my_items); $j++){
				$data = array('MealID' => $my_meal_id, 'ItemID' => $my_items[$j], 'OrderID' => $my_order_id);
				$return = $CI->db->insert('Order_Items', $data);
			}
				for ($j = 0; $j < count($my_options); $j++){
				$data = array('MealID' => $my_meal_id, 'OptionID' => $my_options[$j], 'OrderID' => $my_order_id);
				$return = $CI->db->insert('Order_Items', $data);
			}
			
			
		}

		return $return;
	}
}
?>