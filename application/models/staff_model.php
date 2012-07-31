<?php
class Staff_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    public function get_staff() {
        $this->db->select('staff_name');
        $my_staff = $this->db->get('Staff');
        return $my_staff->result();
    }
    public function authenticate_staff($staffname, $passcode){
           $qr = $this
            ->db
            ->where('staff_name', $staffname)
            ->where('passcode', $passcode)  
            ->limit(1)
            ->get('Staff');
    if ($qr->num_rows > 0){
        //echo $qr->row();
        return $qr->row();
    }
    return false;
  }
    
}
?>