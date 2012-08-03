<?php
class Menu_item_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function get_all_items() {
		$query = $this->db->get('Menu_Items');
		return $query->result();
	}
}
?> 