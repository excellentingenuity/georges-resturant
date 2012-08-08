<?php
require_once "./application/libraries/Item.php";

Class Item_model extends CI_Model {
    //public $meallist, $singelmeal; 
     function __construct() {
        parent::__construct();
        //$this->load->helper('object_autoloader');
        
        
    }
    public function create_item($post_array){
     /*
      * Takes an array passed from the controlor of post form data after validation and inserts it into the db
      * 
      */
      //echo "in item model create item <br />";
      $titem = new Item;
      $return = $titem->create_item($post_array);
      return $return;   
    }
	public function get_item($id){
		$titem = new Item;
		$return = $titem->get_item($id);
		return $return;
	}
	public function update_item($post_array){
	  $titem = new Item;
      $return = $titem->update_item($post_array);
      return $return;
	}
}
?>