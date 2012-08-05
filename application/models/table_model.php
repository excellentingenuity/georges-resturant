<?php
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Table Model is the table object.
*  Version 1.0
*/

class Table_model extends CI_Model {
	function __construct() {
        parent::__construct();
    }
	public function get_table_by_assigned($staff_id){
		//echo $staff_id;
		$this->db->where('Staff_id', $staff_id);//Table_Assignments
		$this->db->select('Table_id');
		$qr = $this->db->get('Table_Assignments');
		$result = $qr->result();

		return $result;
	}
	
}
?>    