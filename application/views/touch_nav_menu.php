<?php 
$nav_array = array('home', 'menu_item', 'orders');
foreach ($nav_array as $item) {
	if ($item == 'home'){
		printf('<a class="touch_menu_block_a" href="' . base_url() . '"><div class="span3 touch_menu_block"><h2 class="touch_menu_h2">' . $item . '</h2></div></a>');
	}else {
		printf('<a class="touch_menu_block_a" href="' . base_url() . "/" . $item . '"><div class="span3 touch_menu_block"><h2 class="touch_menu_h2">' . $item . '</h2></div></a>');
	}
}
?>