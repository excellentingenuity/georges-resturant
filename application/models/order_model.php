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
		$data = array('Staffid'=>$this->staff_id, 'Tableid'=> $this->table_id, 'isReady' => FALSE, 'isServed'=>FALSE, 'isPlaced'=>FALSE, 'isChanged'=>0);
		$this->db->insert('Orders', $data);
		$this->my_id = $this->db->insert_id();
		//return $this->my_id;
	}

}
?>