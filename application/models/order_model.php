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
				$data = array('MealID' => $my_meal_id, 'ItemID' => $my_items[$j], 'OrderID' => $my_order_id, 'Meal_num'=>$i);
				$return = $CI->db->insert('Order_Items', $data);
			}
			for ($j = 0; $j < count($my_options); $j++){
				$data = array('MealID' => $my_meal_id, 'OptionID' => $my_options[$j], 'OrderID' => $my_order_id, 'Meal_num'=>$i);
				$return = $CI->db->insert('Order_Items', $data);
			}
			$CI->db->where('idOrders', $my_order_id);
			$mdata = array('isPlaced'=>1);
			$CI->db->update('Orders', $mdata, False);
			
		}


		return $return;
	}
	public function get_orders(){

		$CI =& get_instance();
		$CI->load->model('Meals_model');
		$CI->load->model('Item_model');
		$CI->load->model('Option_model');
		$CI->db->where('isPlaced',1);
		$CI->db->where('isReady',0);
		$CI->db->select('idOrders');
		$qr = $CI->db->get('Orders');
		$orders = array();
		if($qr->num_rows > 0){
			$r = $qr->result();
			$CI->fb->log("orders by id that are placed");
			$CI->fb->log($r);
			foreach($r as $oid){
				$last_meal_num = '';
				$last_order_id = '';
				$meals = array();
				$order = array();
				$CI->db->where('OrderID', $oid->idOrders);
				$q = $CI->db->get('Order_Items');
				if($q->num_rows > 0){
					$torders = $q->result();
					$CI->fb->log("order items by order id");
					$CI->fb->log($torders);
					usort($torders, array($this, "sort_meals"));
					foreach ($torders as $aorder){
						$CI->fb->log("this aorder items by order id");
						$CI->fb->log($aorder);
						if($last_meal_num == $aorder->Meal_num && $last_order_id == $aorder->OrderID){
							if($aorder->ItemID != Null && $aorder->ItemID != ''){
								$titem = $CI->Item_model->get_item($aorder->ItemID);
								$meals[$last_meal_num]->put_items($titem);
							}
							if($aorder->OptionID != Null && $aorder->OptionID != ''){
								$toption = $CI->Option_model->get_option($aorder->OptionID);
								$meals[$last_meal_num]->put_options($toption);
							}
							
						}else{
							$tmeal = $CI->Meals_model->get_meal($aorder->MealID);
							$tmeal->clear_children();
							if($aorder->ItemID != Null && $aorder->ItemID != ''){
								$titem = $CI->Item_model->get_item($aorder->ItemID);
								$tmeal->put_items($titem);
							}
							if($aorder->OptionID != Null && $aorder->OptionID != ''){
								$toption = $CI->Option_model->get_option($aorder->OptionID);
								$tmeal->put_options($toption);
							}
							array_push($meals, $tmeal);
						}
						$last_meal_num = $aorder->Meal_num;
						$last_order_id  = $aorder->OrderID;
					}
					$order = array ('id'=>$oid->idOrders,'meals'=>$meals);
				}
				array_push($orders, $order);
			}
		}
		return $orders;
	}
	static function sort_meals($a, $b){
		if($a->Meal_num == $b->Meal_num){
			return 0;
		}
		return ($a->Meal_num < $b->Meal_num) ? -1 : 1;
	}
	public function order_ready($id){
		$CI =& get_instance();
		$CI->db->where('idOrders', $id);
		$CI->db->select('isReady');
		$rdata = $CI->db->get('Orders');
		$CI->fb->log($rdata->row());
		$row = $rdata->row();
		$t = $rdata->isReady;
		$CI->fb->log($t);
		if($t == 0){
			$CI->db->where('idOrders', $id);
			$mdata = array('isReady'=>1);
			$return = $CI->db->update('Orders',$mdata);
		}else {
			return false;
		}
		return $return;
	}
	public function get_order_specs($id){
		$CI =& get_instance();
		$CI->db->where('idOrders', $id);
		$qr = $CI->db->get('Orders');
		$CI->fb->log($qr->result());
		return $qr->row();
	}
	public function get_my_orders($id){
		
		$CI =& get_instance();
		$CI->load->model('Meals_model');
		$CI->load->model('Item_model');
		$CI->load->model('Option_model');
		$CI->db->where('isPlaced',1);
		$CI->db->where('Staffid',$id);
		$CI->db->where('paid',0);
		$CI->db->select('idOrders, Tableid, isReady, isServed');
		$qr = $CI->db->get('Orders');
		$orders = array();
		if($qr->num_rows > 0){
			$r = $qr->result();
			$CI->fb->log("orders by id that are placed");
			$CI->fb->log($r);
			foreach($r as $oid){
				$last_meal_num = '';
				$last_order_id = '';
				$meals = array();
				$order = array();
				$CI->db->where('OrderID', $oid->idOrders);
				$q = $CI->db->get('Order_Items');
				if($q->num_rows > 0){
					$torders = $q->result();
					$CI->fb->log("order items by order id");
					$CI->fb->log($torders);
					usort($torders, array($this, "sort_meals"));
					foreach ($torders as $aorder){
						$CI->fb->log("this aorder items by order id");
						$CI->fb->log($aorder);
						if($last_meal_num == $aorder->Meal_num && $last_order_id == $aorder->OrderID){
							if($aorder->ItemID != Null && $aorder->ItemID != ''){
								$titem = $CI->Item_model->get_item($aorder->ItemID);
								$meals[$last_meal_num]->put_items($titem);
							}
							if($aorder->OptionID != Null && $aorder->OptionID != ''){
								$toption = $CI->Option_model->get_option($aorder->OptionID);
								$meals[$last_meal_num]->put_options($toption);
							}
							
						}else{
							$tmeal = $CI->Meals_model->get_meal($aorder->MealID);
							$tmeal->clear_children();
							if($aorder->ItemID != Null && $aorder->ItemID != ''){
								$titem = $CI->Item_model->get_item($aorder->ItemID);
								$tmeal->put_items($titem);
							}
							if($aorder->OptionID != Null && $aorder->OptionID != ''){
								$toption = $CI->Option_model->get_option($aorder->OptionID);
								$tmeal->put_options($toption);
							}
							array_push($meals, $tmeal);
						}
						$last_meal_num = $aorder->Meal_num;
						$last_order_id  = $aorder->OrderID;
					}
					$order = array ('id'=>$oid->idOrders, 'table'=>$oid->Tableid, 'isReady'=>$oid->isReady, 'isServed'=>$oid->isServed, 'meals'=>$meals);
				}
				array_push($orders, $order);
			}
		}
		return $orders;
	}
	public function get_order($id){
		
		$CI =& get_instance();
		$CI->load->model('Meals_model');
		$CI->load->model('Item_model');
		$CI->load->model('Option_model');
		$CI->db->where('isPlaced',1);
		$CI->db->where('idOrders',$id);
		$CI->db->where('isServed',0);
		$CI->db->select('idOrders, Tableid');
		$qr = $CI->db->get('Orders');
		$orders = array();
		if($qr->num_rows > 0){
			$r = $qr->result();
			$CI->fb->log("orders by id that are placed");
			$CI->fb->log($r);
			foreach($r as $oid){
				$last_meal_num = '';
				$last_order_id = '';
				$meals = array();
				$order = array();
				$CI->db->where('OrderID', $oid->idOrders);
				$q = $CI->db->get('Order_Items');
				if($q->num_rows > 0){
					$torders = $q->result();
					$CI->fb->log("order items by order id");
					$CI->fb->log($torders);
					usort($torders, array($this, "sort_meals"));
					foreach ($torders as $aorder){
						$CI->fb->log("this aorder items by order id");
						$CI->fb->log($aorder);
						if($last_meal_num == $aorder->Meal_num && $last_order_id == $aorder->OrderID){
							if($aorder->ItemID != Null && $aorder->ItemID != ''){
								$titem = $CI->Item_model->get_item($aorder->ItemID);
								$meals[$last_meal_num]->put_items($titem);
							}
							if($aorder->OptionID != Null && $aorder->OptionID != ''){
								$toption = $CI->Option_model->get_option($aorder->OptionID);
								$meals[$last_meal_num]->put_options($toption);
							}
							
						}else{
							$tmeal = $CI->Meals_model->get_meal($aorder->MealID);
							$tmeal->clear_children();
							if($aorder->ItemID != Null && $aorder->ItemID != ''){
								$titem = $CI->Item_model->get_item($aorder->ItemID);
								$tmeal->put_items($titem);
							}
							if($aorder->OptionID != Null && $aorder->OptionID != ''){
								$toption = $CI->Option_model->get_option($aorder->OptionID);
								$tmeal->put_options($toption);
							}
							array_push($meals, $tmeal);
						}
						$last_meal_num = $aorder->Meal_num;
						$last_order_id  = $aorder->OrderID;
					}
					$order = array ('id'=>$oid->idOrders, 'table'=>$oid->Tableid, 'meals'=>$meals);
				}
				array_push($orders, $order);
			}
		}
		return $orders;
	}
public function order_served($id){
		$CI =& get_instance();
		$CI->db->where('idOrders', $id);
		$CI->db->select('isServed');
		$rdata = $CI->db->get('Orders');
		$CI->fb->log($rdata->row());
		$row = $rdata->row();
		$t = $row->isServed;
		$CI->fb->log($t);
		if($t == 0){
			$CI->db->where('idOrders', $id);
			$mdata = array('isServed'=>1);
			$return = $CI->db->update('Orders',$mdata);
		}else {
			return false;
		}
		return $return;
	}
	public function get_all_orders(){

		$CI =& get_instance();
		$CI->load->model('Meals_model');
		$CI->load->model('Item_model');
		$CI->load->model('Option_model');
		$CI->db->where('isPlaced',1);
		$CI->db->select('idOrders, Tableid, isReady, isServed');
		$qr = $CI->db->get('Orders');
		$orders = array();
		if($qr->num_rows > 0){
			$r = $qr->result();
			$CI->fb->log("orders by id that are placed");
			$CI->fb->log($r);
			foreach($r as $oid){
				$last_meal_num = '';
				$last_order_id = '';
				$meals = array();
				$order = array();
				$CI->db->where('OrderID', $oid->idOrders);
				$q = $CI->db->get('Order_Items');
				if($q->num_rows > 0){
					$torders = $q->result();
					$CI->fb->log("order items by order id");
					$CI->fb->log($torders);
					usort($torders, array($this, "sort_meals"));
					foreach ($torders as $aorder){
						$CI->fb->log("this aorder items by order id");
						$CI->fb->log($aorder);
						if($last_meal_num == $aorder->Meal_num && $last_order_id == $aorder->OrderID){
							if($aorder->ItemID != Null && $aorder->ItemID != ''){
								$titem = $CI->Item_model->get_item($aorder->ItemID);
								$meals[$last_meal_num]->put_items($titem);
							}
							if($aorder->OptionID != Null && $aorder->OptionID != ''){
								$toption = $CI->Option_model->get_option($aorder->OptionID);
								$meals[$last_meal_num]->put_options($toption);
							}
							
						}else{
							$tmeal = $CI->Meals_model->get_meal($aorder->MealID);
							$tmeal->clear_children();
							if($aorder->ItemID != Null && $aorder->ItemID != ''){
								$titem = $CI->Item_model->get_item($aorder->ItemID);
								$tmeal->put_items($titem);
							}
							if($aorder->OptionID != Null && $aorder->OptionID != ''){
								$toption = $CI->Option_model->get_option($aorder->OptionID);
								$tmeal->put_options($toption);
							}
							array_push($meals, $tmeal);
						}
						$last_meal_num = $aorder->Meal_num;
						$last_order_id  = $aorder->OrderID;
					}
					$order = array ('id'=>$oid->idOrders, 'table'=>$oid->Tableid, 'isReady'=>$oid->isReady, 'isServed'=>$oid->isServed, 'meals'=>$meals);
				}
				array_push($orders, $order);
			}
		}
		return $orders;
	}
}
?>