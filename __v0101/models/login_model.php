<?php
class Login_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
 public function verify_user($username, $password) {
   $qr = $this
            ->db
            ->where('username', $username)
            ->where('password', sha1($password))  
            ->limit(1)
            ->get('users');
    if ($qr->num_rows > 0){
        return $qr->row();
    }
    return false;
  }
}
?>