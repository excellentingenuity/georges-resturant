<?php
/*
 * Created by James Johnson of Excellent InGenuity LLC 2012
 * Meal and Menu Item Options Class
 * Reads itself in from the DB by the supplied Item ID number supplied at construct
 */
 
 require_once "Option.php";
 Class Item {
     protected $id, $name, $description, $order_by, $category_id, $cost, $prep_time, $options;
     public function __construct(){
         $this->options = array();

     }
     public function load($idnum){
         echo "inside load item by idnum <br />";
          if($idnum != NULL){
             $this->id = $idnum;
             $this->myload();
         } 
     }
     protected function myload(){
         echo  "inside item my load <br />";
         $CI =& get_instance();
         $CI->db->where('idMenu_Items', $this->id);
         $result = $CI->db->get('Menu_Items');
         if($result->num_rows() > 0){
             $my_row = $result->row();
             $this->name = $my_row->Name;
             $this->description = $my_row->Description;
             $this->category_id = $my_row->Category_id;
             $this->cost = $my_row->Cost;
             $this->order_by = $my_row->Order_by;
             $this->prep_time = $my_row->Prep_Time;
             //$this->print_item();
             
             $this->get_options();
         }   
     }
     public function array_ini($my_row){
             $this->id = $my_row->idMenu_Items;
             $this->name = $my_row->Name;
             $this->description = $my_row->Description;
             $this->category_id = $my_row->Category_id;
             $this->cost = $my_row->Cost;
             $this->order_by = $my_row->Order_by;
             $this->prep_time = $my_row->Prep_Time;
             $this->get_options();
         
     }
     public function Load_all(){
         $result;
         $t_array = array();
         $CI =& get_instance();
         $result = $CI->db->get('Menu_Items');
         if($result->num_rows() > 0){
             foreach($result->result() as $row){
                $t_obj = new self;
                $t_obj->array_ini($row);
                array_push($t_array, $t_obj);
             }
         }
         return $t_array;
         
     }
     public function __get($tname){
         return $this->$tname;
     }
     public function print_item(){
         echo $this->id;
         echo $this->name;
         echo $this->description;
         echo $this->category_id;
         echo $this->cost;
         echo $this->order_by;
         echo $this->prep_time;
         
         foreach($this->options as $option){
             $option->print_option();
        }
     }
      public function get_options() {
         /*
          * function fetches the options assiciated with the item based on itemid
          */
          echo "inside item get options <br />";
          $t_itemarray = array();
          $CI =& get_instance();
          $CI->db->select('MenuOptionList.Optionid');
          $CI->db->where('MenuOptionList.Itemid', $this->id);//$this->id
          $CI->db->where('MenuOptionList.Optionid IS NOT ', "NULL", FALSE);
          $result = $CI->db->get('MenuOptionList');
          foreach ($result->result() as $row){
              //echo "Option id for item id $this->id :" . $row->Optionid . "<br />";
              array_push($t_itemarray, $row->Optionid);
          }
         foreach ($t_itemarray as $idnum){
             echo "inside item get options add to array <br />";
             $myoption = new Option;
              array_push($this->options, $myoption->load($idnum));
          }
     }
     public function render(){
         
     }
     
 }
