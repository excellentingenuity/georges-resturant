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
	public function get_all_staff(){
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
  public function get_permission_by_id($id){
  	$this->db->select('permission');
      $my_permission = $this->db->get_where('Permissions', array('staff_id'=>$id), 1);
      if ($my_permission->num_rows > 0){
          return $my_permission->row();
      }
      return false;
  }
  public function get_my_id($my_name){
         $qr = $this
            ->db
            ->select('idStaff')
            ->where('staff_name', $my_name)  
            ->limit(1)
            ->get('Staff');
         if($qr->num_rows > 0){
             //print_r($qr->result_array());
             $t_qr = $qr->row();
             return $t_qr->idStaff;
             
         }
  }
  public function get_staff_member($id){
  	         $qr = $this
            ->db
            ->where('idStaff', $id)  
            ->limit(1)
            ->get('Staff');
    if ($qr->num_rows > 0){
        //echo $qr->row();
        return $qr->row();
    }
    return false;
  }
  public function addupdate($data){
  	     $qr = $this
            ->db
            ->where('staff_name', $data['staff_name'])
            ->where('passcode', $data['passcode'])  
            ->limit(1)
            ->get('Staff');
    	if ($qr->num_rows() == 1){
    		$row = $qr->row();
			$mdata = array_slice($data, 0, 4, true);
			$this->fb->log($mdata);
			$this->db->where('staff_name', $data['staff_name']);
			$this->db->update('Staff', $mdata);
			$ndata = array('permission'=>$data['permission']);
			$this->db->where('staff_id', $row->idStaff);
			$this->db->update('Permissions', $ndata);

		}else {
			$mdata = array_slice($data, 0, 4, true);
			$this->db->insert('Staff', $mdata);
			$mid = $this->db->insert_id();
			$ndata = array('staff_id'=>$mid, 'permission'=>$data['permission']);
			$this->db->insert('Permissions', $ndata);
		}
  }
	public function delete($id){
			$this->db->where('idStaff', $id);
			$this->db->delete('Staff');

		
	}
}
?>