<?php
class Permission_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	public function get_permissions(){
		$qr = $this->db->get('Permission_list');
		if($qr->num_rows > 0){
			$result = $qr->result();
			return $result;
		}
	}
	public function get_permission_list(){
		$qr = $this->db->get('Permission_list');
		if($qr->num_rows > 0){
			$result = $qr->result();
			return $result;
		}
	}
}