<?php
/*
 * Created by James Johnson of Excellent InGenuity LLC 2012
 * Meal and Menu Item Options Class
 * Reads itself in from the DB by the supplied Option ID number supplied to load
 */
 
 Class Option {
     protected $id, $name, $description, $cost_increase, $order_by;    
     public function __construct(){
         echo "inside options constructor <br />";

     }
     public function load($idnum){
         echo "inside options load <br />";
         if($idnum != NULL){
             $this->id = $idnum;
             $this->myload();
         }
     }
     protected function myload(){
         echo "inside options myload <br />";
         $CI =& get_instance();
         $CI->db->where('Menu_Optionsid', $this->id);
         $result = $CI->db->get('Menu_Options');
         if($result->num_rows() > 0){
             $my_row = $result->row();
             $this->name = $my_row->Name;
             $this->description = $my_row->Description;
             $this->cost_increase = $my_row->Cost_Increase;
             $this->order_by = $my_row->Order_By;
             //$this->print_option();
         }
     }
     
     public function __get($tname){
         return $this->$tname;
     }
     public function print_option(){
         echo $this->id;
         echo $this->name;
         echo $this->description;
         echo $this->cost_increase;
         echo $this->order_by;
     }
     public function render(){
         
     }
     
     
 }
?>