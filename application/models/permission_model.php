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
	public function get_my_permission($id){
		$myperm;
		$this->db->select('permission');
		$this->db->where('staff_id', $id);
		$qr = $this->db->get('Permissions');
		if($qr->num_rows > 0){
			$myperm = $qr->row();
			$this->fb->log($myperm);
			return $myperm;
		}
	}
}