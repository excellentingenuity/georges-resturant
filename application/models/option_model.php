<?php
require_once "./application/libraries/Option.php";

Class Option_model extends CI_Model {
    //public $meallist, $singelmeal; 
     function __construct() {
        parent::__construct();
        //$this->load->helper('object_autoloader');
        
        
    }
    public function create_option($post_array){
     /*
      * Takes an array passed from the controlor of post form data after validation and inserts it into the db
      * 
      */
      //echo "in item model create item <br />";
      $toption = new Option;
      $return = $toption->create_option($post_array);
      return $return;   
    }
}
?>