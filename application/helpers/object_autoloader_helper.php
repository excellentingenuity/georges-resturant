<?php
//require_once "./application/libraries/Meal.php";
//require_once "./application/libraries/Item.php";
//require_once "./application/libraries/Option.php";
require_once "./application/libraries/Category.php";

    function load_all_objects($object){
       // echo "inside load all objects helper function <br />";
       $t_obj = new $object;
       $t_array = $t_obj->Load_all(); 
       return $t_array;
    }

?>