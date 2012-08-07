<?php
require_once "./application/libraries/Category.php";

Class Category_model extends CI_Model{
	public $my_categories;
	function __construct() {
        parent::__construct();
    }
	//TODO: add public function to load all categories
	public function load_categories(){
		$this->my_categories = load_all_objects('Category');
	}
	public function create_category($post_array){
     /*
      * Takes an array passed from the controlor of post form data after validation and inserts it into the db
      * 
      */
      //echo "in item model create item <br />";
      $tcategory = new Category;
      $return = $tcategory->create_category($post_array);
      return $return;   
    }
}
?>