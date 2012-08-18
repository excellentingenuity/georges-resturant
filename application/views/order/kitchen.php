<div class="container kitchen-container">

	<div class="kitchen-row row">
<?php
check_page_permission(444);
foreach($orders as $order){
	$i = 0;
	$this->fb->log("orders given to  kitchen view");
	$this->fb->log($orders);
	//print('<div class="span6 kitchen-order" id="'.$order['id'].'"><h2 class="kitchen-order-num">Order: ');
	$this->fb->log("this order is");
	$this->fb->log($order);
	//print($order['id']);
	//print('</h2><h3>');
	$meals = $order['meals'];
	$this->fb->log("meals in this order are");
	$this->fb->log($meals);
	
	foreach($meals as $meal){
		if($meal->category != 10 && $meal->category != 11 && $meal->category != 12){
			if($i == 0){
				print('<div class="span6 kitchen-order" id="'.$order['id'].'"><h2 class="kitchen-order-num">Order: ');
				print($order['id']);
				print('</h2><h3>');
			}
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
			$i++;
			print('</ul>');
		}
		
	}
	if($i > 0){
	print('</h3>');
	print('</div>');
	}
	/*if($i == 1){
		print('</div><div class="kitchen-row row-fluid">');
		$i=0;
	}else{
		$i++;
	}*/
}
?>
<script type="text/javascript">

</script>			
<script type="text/javascript">
	$(document).ready(function(){
		
			var base = '../order';
			var url = base + "/refresh_orders";
			setTimeout(function(){
				refresh_orders(url);
			},60000);
	});
</script>


	</div>
</div>