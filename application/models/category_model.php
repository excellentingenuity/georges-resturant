<?php
Class Category_model extends CI_Model{
	public $my_categories;
	function __construct() {
        parent::__construct();
    }
	//TODO: add public function to load all categories
	public function load_categories(){
		$this->my_categories = load_all_objects('Category');
	}
}
?>