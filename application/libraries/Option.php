<?php
/*
 * Created by James Johnson of Excellent InGenuity LLC 2012
 * Meal and Menu Item Options Class
 * Reads itself in from the DB by the supplied Option ID number supplied to load
 */
 
 Class Option {
     protected $id, $name, $description, $cost_increase, $order_by;    
     public function __construct(){
         //echo "inside options constructor <br />";

     }
	 public function Load_all(){
	 	//echo "inside options load all <br />";
         $result;
         $t_array = array();
         $CI =& get_instance();
         $result = $CI->db->get('Menu_Options');
         if($result->num_rows() > 0){
             foreach($result->result() as $row){
                $t_obj = new self;
                $t_obj->array_ini($row);
                array_push($t_array, $t_obj);
             }
         }
         return $t_array;
	 }    
     public function array_ini($row){
	 	$this->id = $row->Menu_Optionsid;
		$this->name = $row->Name;
		$this->description = $row->Description;
		$this->cost_increase = $row->Cost_Increase;
		$this->order_by = $row->Order_By;
	 }
     public function load($idnum){
         //echo "inside options load <br />";
         if($idnum != NULL){
             $this->id = $idnum;
             $this->myload();
         }
     }
     protected function myload(){
         //echo "inside options myload <br />";
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
	public function create_option($data_array){
     	//echo "in option create function <br />";
     	$return = FALSE;
		$this->create_ini($data_array);
		$t_array = array(
            'Name' => $this->name,
            'Description' => $this->description,
            'Cost_Increase' => $this->cost,
            'Order_by'=>$this->order_by,
         );
         $CI =& get_instance();
         if($CI->db->insert('Menu_Options', $t_array)){
         	$this->id = $CI->db->insert_id();
         	$return = TRUE;
		 }
		 return $return;
		
     }
	 public function create_ini($data_array){
	 	//echo "inside create ini <br />";
	 	 foreach ($data_array as $key => $value){
	 	 	switch ($key){
				case "idMenu_Item":
					$this->id = $value;
					break;
				case "Name":
					$this->name = $value;
					break;
				case "Description":
					$this->description = $value;
					break;
				case "Order_by":
					$this->order_by = $value;
					break;
				case "Cost":
					$this->cost = $value;
					break;
	
			}
		 }
	 }
     
     
 }
?>