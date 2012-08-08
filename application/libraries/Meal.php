<?php
/*
 * Created by James Johnson of Excellent InGenuity 2012
 * A Object to hold meal information
 * 
 */
require_once "Option.php";
require_once "Item.php";

 Class Meal {
     protected $title, $id, $description, $price, $category, $options, $items;
     
     public function __construct() {
         //echo "in meal constructor <br />";
         $this->options = array();
         $this->items = array();
         
     }
     
     public function __set ($name, $value){
         $this->$name = $value;
     }
     public function __get($name){
         return $this->$name;
     }
     public function Load_all(){
         //echo "meal in load all <br />";
         $result;
         $t_array = array();
         $CI =& get_instance();
         $result = $CI->db->get('Meals');
         if($result->num_rows() > 0){
             $i = 0;
             //echo "number of meals in load all meals: $result->num_rows";
             foreach($result->result_array() as $row){
                $t_obj = new self;
                $t_obj->load_meal($row);
                //$t_obj->print_meal();
                array_push($t_array, $t_obj);
                //echo "i is $i <br />";
                $i++;
             }
         }
         //echo "returning array to meals <br />";
         return $t_array;
         
     }
	 public function load ($idnum){
	 	 if($idnum != NULL){
             $this->id = $idnum;
			 //echo "this id is $this->id";
             $this->my_load();
			// $this->fb->log($this->id);
         }
	 }
	 public function my_load(){
         $CI =& get_instance();
		 $CI->db->where('idMeals', $this->id);
         $result = $CI->db->get('Meals');
         if($result->num_rows() > 0){
			    $t_obj = new self;
			 	$args= $result->row();
                $this->object_ini($args);
             	$this->get_items();
         		$this->get_options();
         }
	 }
     public function load_meal ($param){
        /*
         *function loads a meal by array and loads the meals options and items 
         */         
         //echo "in load_meal <br />";
         $this->array_ini($param);
         //echo "after array ini <br />";
         $this->get_items();
         $this->get_options();
     }
     public function ini($new_name, $new_id, $new_desc, $new_price, $new_cat){
         /*
          * Takes 5 parameters 
          * 
          */
         $this->title = $new_name;
         $this->id = $new_id;
         $this->description = $new_desc;
         $this->price = $new_price;
         $this->category = $new_cat;
         //echo "in meal ini";
     }
     public function object_ini($row){
         //echo "in object ini <br />";
         $this->id = $row->idMeals;
         $this->title = $row->Title;
         $this->description = $row->Description;
         $this->price = $row->Price;
         $this->category = $row->Categoryid;
     }
     public function array_ini($param){
         /*
          * function loads a meal object from a key value array
          * 
          */
         
         foreach ($param as $key => $value){
             //echo "$key is $value <br />";
             switch ($key){
                 case "idMeals":
                     $this->id = $value;
                     break;
                 case "Title":
                     $this->title = $value;
                     break;
                 case "Description":
                     $this->description = $value;
                     break;
                 case "Price":
                     $this->price = $value;
                     break;
                case "Categoryid":
                    $this->category = $value;
                    break;
                case "Items":
					foreach($value as $id){
						array_push($this->items, $id);
					}
					//print_r($this->items);
                     //$this->items = $value;
                     break;
				case "Options":
					foreach($value as $id){
						array_push($this->options, $id);
					}
					//$this->options = $value;
					break;
            }
         }
         
         
     }
     public function create_meal($data_array){
         $return = FALSE;
         $this->array_ini($data_array);
         //$this->category = 1;//hard coded for now
         $t_array = array(
            'Title' => $this->title,
            'Description' => $this->description,
            'Price' => $this->price,
            'Categoryid' => $this->category,
         );
         $CI =& get_instance();
         if($CI->db->insert('Meals', $t_array)){
         	$this->id = $CI->db->insert_id();
         	$return = TRUE;    
         	//echo "meal db insert is $return";
         }
        $return = $this->create_child_items();
        
		// echo "return after insert child items  is  $return";
		 if($return == 1){
		 	$return = TRUE;	
		 }	else {
		 	$return = FALSE;
		 }
         return $return;
     }
	public function create_child_items(){
		$qr1 = False;
		$qr2 = FALSE;
		$CI =& get_instance();
		$myid = $this->id;
		foreach ($this->items as $my_item){
			$q = array('Mealid'=>$myid, 'Itemid'=>$my_item);
			$qr1 = $CI->db->insert('MenuOptionList', $q);
		}
		foreach ($this->options as $my_option){
			$q = array('Mealid'=>$myid, 'Optionid'=>$my_option);
			$qr2 = $CI->db->insert('MenuOptionList', $q);
		}
		if ($qr1 == TRUE && $qr2 == TRUE){
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	
     public function get_options() {
         /*
          * function fetches the options assiciated with the meal based on mealid
          */
          $t_itemarray = array();
          $CI =& get_instance();
          
          //echo "this id in item is $this->id";
          $CI->db->select('MenuOptionList.Optionid');
          $CI->db->where('MenuOptionList.Mealid', $this->id);//$this->id
          $CI->db->where('MenuOptionList.Optionid IS NOT ', "NULL", FALSE);
          $result = $CI->db->get('MenuOptionList');
		  //print_r("result is" . $result->result());
          foreach ($result->result() as $row){
              //echo "Option id for meal id $this->id :" . $row->Optionid . "<br />";
              array_push($t_itemarray, $row->Optionid);
          }
         foreach ($t_itemarray as $idnum){
             $myoption = new Option;
			 $myoption->load($idnum);
              array_push($this->options, $myoption);
          }
     }
     public function get_items() {
         /*
          * function fetches the options assiciated with the meal based on mealid
          */
          $t_itemarray = array();
          $CI =& get_instance();
          $CI->db->select('MenuOptionList.Itemid');
          $CI->db->where('MenuOptionList.Mealid', $this->id);//$this->id
          $CI->db->where('MenuOptionList.Itemid IS NOT ', "NULL", FALSE);
          $result = $CI->db->get('MenuOptionList');
          foreach ($result->result() as $row){
              //echo "Item id for meal id $this->id :" . $row->Itemid . "<br />";
              array_push($t_itemarray, $row->Itemid);
          }
         foreach ($t_itemarray as $idnum){
             $myitem = new Item;
			 $myitem->load($idnum);
              array_push($this->items, $myitem);
          }
     }
     public function print_meal(){
         /*
          * function prints out in serial form with no format a meal object
          */
         echo($this->title);
         echo($this->id);
         echo($this->description);
         echo($this->price);
         echo($this->category);
        foreach($this->items as $item){
             $item->print_item();
        }         
        foreach($this->options as $option){
             $option->print_option();
        }
     }
     public function render(){
         
     }
	 public function get_meal($id){
	 	//echo "id is $id";
	 	   $t_obj = new self;
           $t_obj->load($id);
		   return $t_obj;
	 }
 }
?>