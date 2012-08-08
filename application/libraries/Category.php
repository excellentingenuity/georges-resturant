<?php
/*
 * Created by James Johnson of Excellent InGenuity LLC 2012
 * Object to hold Categories for the menu
 */
 
 class Category{
     
     protected $idCategories, $Name, $Ordered_By=0, $group;
     
     public function __construct(){
         
     }
     public function __set ($name, $value){
         $this->$name = $value;
     }
     public function __get($name){
         return $this->$name;
     }
     public function array_ini($param){
         /*
          * function loads a category object from a key value array
          * 
          */
         
         foreach ($param as $key => $value){
             $this->$key = $value;
          }
     }
     
     public function Load_all(){
         $result;
         $t_array = array();
         $CI =& get_instance();
         $result = $CI->db->get('Categories');
         if($result->num_rows() > 0){
             foreach($result->result_array() as $row){
                $t_obj = new self;
                $t_obj->array_ini($row);
                array_push($t_array, $t_obj);
             }
         }
         return $t_array;
         
     }
     public function load($id_num){
         //load a single category by id number
         $CI =& get_instance();
         if($id_num != NULL && $id_num >= 0){
             $this->idCategories = $id_num;
             $CI->db->where('idCategories', $this->idCategories);
             $result = $CI->db->get('Categories');
             if($result->num_rows() > 0){
                $this->array_ini($result-row());   
             }
         }
     }
     public function load_by_name($cat_name){
         //load a single category by name
         $CI =& get_instance();
        if($cat_name != NULL){
             $this->Name = $cat_name;
             $CI->db->where('Name', $this->Name);
             $result = $CI->db->get('Categories');
             if($result->num_rows() > 0){
                $this->array_ini($result-row());   
             }
         }
     }
	 public function create_category($data_array){
	 	$this->array_ini($data_array);
		$t_array = array(
            'Name' => $this->Name,
            'Ordered_By' => $this->Ordered_By
         );
		 $CI =& get_instance();
         if($CI->db->insert('Categories', $t_array)){
         	$this->id = $CI->db->insert_id();
         	$return = TRUE;
		 }
		 return $return;
		 
	 }

     public function echo_all(){
         echo $this->idCategories;
         echo $this->Name;
         echo $this->Ordered_By;
     }

 }
?>