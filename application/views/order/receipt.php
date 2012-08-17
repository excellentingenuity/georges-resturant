<?php
//header('Content-Type: text/plain');
//print($html);
$total = 0;
$tax = .08;
$tip = 0;
print('<h2>Order: '.$order['id'] . '&nbsp;&nbsp;&nbsp;Table: '. $order['table'].'</h2>');
$meals = $order['meals'];
foreach($meals as $meal){
	print($meal->title.' $'. $meal->price.'<br />');
	$total += $meal->price;
	$items = $meal->items;
	foreach($items as $item){
		if($item->name != 'None'){
			$total += $item->cost;
			print('&nbsp;&nbsp;'.$item->name.' $'.$item->cost.'<br />');
		}
	}
	$options = $meal->options;
	foreach($options as $option){
		if ($option->name != 'None'){
			$total += $option->cost_increase;
			print('&nbsp;&nbsp;'.$option->name.' $'.$option->cost_increase.'<br />');
		}
	print('<br />');
	}
}
	print('Subtotal: $'.$total.'<br />');
	$ptax = round($total * $tax, 2);
	print('Tax:      $'.$ptax.'<br />');
	print('Tip:________________<br />');
	$ptotal = round($ptax + $total, 2);
	print('Total:    $'.$ptotal.'<br />');
?>