     public function create_child_items($data_array){
         //echo $this->items;
         //echo $data_array->Items;
         /*$myreturn = FALSE;
         $my_items = $data_array->Items;
         foreach ($my_items as $litem){
             $CI =& get_instance();
             $ldata = array('Mealid'=>$this->id, 'Itemid'=>$litem->id);
             if($CI->db->insert('MenuOptionList', $ldata)){*/
              $myreturn = TRUE;   
            /* }
             
         }*/
         return $myreturn;
     }