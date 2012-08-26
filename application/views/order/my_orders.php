<div class="container-fluid myorders-container">

	<div class="myorders-row row-fluid">
		<div class="span10">
			<div class="row">
<?php
//check_page_permission(333);
$i = 0;
foreach($orders as $order){
	$ready = $order['isReady'];
	$served = $order['isServed'];
	$myclass = 'notready';
	if($ready == 1){
		$myclass = 'isready';
	}
	if($served == 1){
		$myclass = 'isserved';
	}
	$this->fb->log("orders given to  myorders view");
	$this->fb->log($orders);
	print('<div class="span4 myorder '.$myclass.'" id="'.$order['id'].'"><h2 class="myorder-num">    Order: ');
	$this->fb->log("this order is");
	$this->fb->log($order);
	print($order['id']);
	print('      Table: ');
	print($order['table']);
	print('</h2><h3>');
	$meals = $order['meals'];
	$this->fb->log("meals in this order are");
	$this->fb->log($meals);
	foreach($meals as $meal){
		
			$this->fb->log("this meal is");
			$this->fb->log($meal);
			print('<ul class="unstyled order-meal">');
			print($meal->title);
			$items = $meal->items;
			print('<li>Meal Items:</li>');
			foreach($items as $item){
				print('<li>');
				print($item->name);
				print('</li>');
			}
			$options = $meal->options;
			print('<li>Meal Options:</li>');
			foreach($options as $option){
				print('<li>');
				print($option->name);
				print('</li>');
			}
			
			print('</ul>');
		
	}
	print('</h3>');
	if($served == 1){
		print('<center><a class="btn btn-danger clear-order" id="'.$order['id'].'" href="#">Clear Order</a></center>');
	}
	print('</div>');
}

?>
</div>
</div>
<?php $this->load->view('partials/right_side_bar'); ?>
</div>
</div>
<script type="text/javascript">

</script>	
<script type="text/javascript">
	$(document).ready(function(){
		
			var base = '../order';
			var url = base + "/my_orders";
			setTimeout(function(){
				refresh_myorders(url);
			},60000);
	});
</script>