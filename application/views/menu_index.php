<?php
/*
 * Created by James Johnson of Excellent InGenuity LLC 2012
 */

?>
<div class="container-fluid main-content">
    <div class="row-fluid">
        <div class="span10">
          <?php
          /*
           * function to display menu items
           * 
           */
           echo $meals[14]->__get('title');
            foreach($meals as $meal){
                $meal_items = $meal->__get("items");
                echo "meal items is $meal_items <br />";
                echo "meal item name" . $meal_items->__get('name') ."<br />";
                $meal_options = $meal->__get("options");
                print('<div class="span3 menu-block">');
                print('<h3 class="meal">' .  $meal->__get("title") . '</h3>');
                print('<ul class="unstyled">');
                print('<li>' . $meal->__get("description") . '</li>');
                print('<li>$' . $meal->__get("price") . '</li>');
                print('</ul>');
                
                foreach($meal_items as $item){
                    echo "inside mealitems item <br />";
                    $item_options = $item->__get("options");
                    print('<h4>Addon Meal Items</h4>');
                    print('<h4 class="item">' .  $item->__get("name") .'&nbsp;&nbsp;' . anchor('/orders', '<i class="icon-plus icon-white"></i>', 'class="order-btn btn btn-success"'). '</h4>');
                    print('<ul class="unstyled">');
                    print('<li>' . $item->__get("description") . '</li>');
                    print('<li>Meal Cost with this Item: $' . $item->__get("cost") . '</li>');
                    print('</ul>');
                    foreach($item_options as $option){
                        print('<h5>Addon Meal Item Option</h5>');
                        print('<h5 class="item">' .  $option->__get("name") . '</h5>');
                        print('<ul class="unstyled">');
                        print('<li>' . $option->__get("description") . '</li>');
                        print('<li>Meal Cost with this Item and Option: $' . $option->__get("cost_increase") . '</li>');
                        print('</ul>');    
                    }
                    
                }
                foreach($meal_options as $option){
                    print('<h4>Addon Meal Option</h4>');
                    print('<h4 class="item">' .  $option->__get("name") . '</h4>');
                    print('<ul class="unstyled">');
                    print('<li>' . $option->__get("description") . '</li>');
                    print('<li>Meal Cost Option: $' . $option->__get("cost_increase") . '</li>');
                    print('</ul>'); 
                }
                print('</div>');
            }
        ?>
        </div>
        <?php $this->load->view('right_side_bar');?> 
    </div>
</div>