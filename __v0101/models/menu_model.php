<?php 
class Menu_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    public function __get($key){
        return $this->$key;
    }
}
?>