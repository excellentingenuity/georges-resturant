<?php
/*
 * Order Class for the order object
 * Created by James Johnson of Excellent InGenuity LLC 2012
 * 
 */
Class Order_model extends CI_Model {
	protected $table_id, $staff_id;
	
	function __construct() {
        parent::__construct();
    }
	public function new_order($table, $staff){
		//table id number and staff id number
		if($table != NULL){
			$this->table_id = $table;
		}
		if ($staff != NULL){
			$this->staff_id = $staff;
		}
	}

}
?>