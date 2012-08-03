<div class="touch_menu_container span10">
<?php 
/*TODO: add a label option for a better looking representation
 * TODO: Use inverse logic to generate touch menu list and or accept menu list as an array in the vars array
 * 
 * 
 */
$nav_array = array('home', 'menu', 'orders', 'tables', 'kitchen');
$nav_array_lables = array('Home', 'Menu', 'Orders', 'Tables', 'Kitchen');
$i = 0;
foreach ($nav_array as $item) {
    
	if ($item == 'home') {
	    if ($Page != 'Home'){
		printf('<div class="span3 touch_menu_block"><a class="touch_menu_block_a button" href="' . base_url() . '"><h2 class="touch_menu_h2">' . $nav_array_lables[$i] . '</h2></a></div>');
	}}else {
		printf('<div class="span3 touch_menu_block"><a class="touch_menu_block_a button" href="' . base_url() . $item . '"><h2 class="touch_menu_h2">' . $nav_array_lables[$i] . '</h2></a></div>');
	}
    $i++;
}
?>
</div>