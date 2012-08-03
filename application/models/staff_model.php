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
  public function get_permission($staff_name){
      $this->db->select('idStaff');
      $staffid = $this->db->get_where('Staff', array('staff_name'=>$staff_name), 1);
      $my_staffid = $staffid->row();
      //echo $my_staffid->idStaff;
      $this->db->select('permission');
      $my_permission = $this->db->get_where('Permissions', array('staff_id'=>$my_staffid->idStaff), 1);
      if ($my_permission->num_rows > 0){
          return $my_permission->row();
      }
      return false;
  }  
}
?>