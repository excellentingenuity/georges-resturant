<div class="touch_menu_container span10">
<?php 
/*TODO: add a label option for a better looking representation
 * TODO: Use inverse logic to generate touch menu list and or accept menu list as an array in the vars array
 * 
 * 
 */
$nav_array = array('home', 'menu_item', 'orders', 'tables');
foreach ($nav_array as $item) {
	if ($item == 'home'){
		printf('<a class="touch_menu_block_a" href="' . base_url() . '"><div class="span2 touch_menu_block"><h2 class="touch_menu_h2">' . $item . '</h2></div></a>');
	}else {
		printf('<a class="touch_menu_block_a" href="' . base_url() . $item . '"><div class="span2 touch_menu_block"><h2 class="touch_menu_h2">' . $item . '</h2></div></a>');
	}
}
?>
</div>