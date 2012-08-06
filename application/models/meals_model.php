<?php
require_once "./application/libraries/Meal.php";

Class Meals_model extends CI_Model {
    public $meallist, $singelmeal; 
     function __construct() {
        parent::__construct();
        //$this->load->helper('object_autoloader');
        
        
    }
    function load_all_meals() {
        /*
         * function loads all the meals from the db and places them in meal objects contained in the meal array
         */
         echo "in load all meals inside meals model <br />";
        //$this->meallist['meals'] = load_all_objects('Meal');
        //$this->text_print();
        echo "in meal model before return of meallist to controller <br />";
        //return $this->meallist;
        return load_all_objects('Meal');
    }
    public function create_meal($post_array){
     /*
      * Takes an array passed from the controlor of post form data after validation and inserts it into the db
      * 
      */
      $tmeal = new Meal;
      $return = $tmeal->create_meal($post_array);
      return $return;   
    }
    public function text_print(){
        //printout meals in rough text format
        foreach ($this->meallist as $meal){
            $meal->print_meal();
        }
    }
    public function render(){
        //print to screen with formatting
        foreach ($this->meallist as $meal){
            $meal->render();
        }
    }
       
}
?>