<?php
Class Meal_model extends CI_Model{
	public $my_meals;
	function __construct() {
        parent::__construct();
    }
	
	public function load_meals(){
		$this->my_meals = load_all_objects('Meal');
		//print_r($this->my_meals);
	}
}
?>