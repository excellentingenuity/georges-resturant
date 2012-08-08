<?php
//$this->fb->setEnabled(true);
//$this->fb->log("inside print Menu view");
$base = base_url();
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta name="viewport" content="user-scalable=no, width=device-width" />
        <meta charset="UTF-8" />
		
			<!-- CSS -->
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $base; ?>css/bootstrap.css" /> 
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $base; ?>css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $base; ?>css/paper.css" /> 
        
        <!-- js -->
        <script type="text/javascript" src="<?php echo $base; ?>js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="<?php echo $base; ?>js/bootstrap.js"></script>
		
		<title>Menu</title>
	</head>
	<body class="cover">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12 spacer15em">&nbsp;</div>
			</div>
			<div class="row-fluid">
				<div class="span2">&nbsp;</div>
				<img class="span8 logo" src="<?php echo $base; ?>img/logo1.png" />
				<div class="span2">&nbsp;</div>
			</div>
			<div class="row-fluid">
				<div class="span12 spacer30em">&nbsp;</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">			
				<h1>Italian</h1>
					<hr /><br />
					<?php 
						foreach($categories as $category){
							if ($category->__get('group') == 1){
								print('<h2 class="category">'.$category->__get('Name') .'</h2>');
								foreach($meals as $meal){
									if ($meal->__get('category') == $category->__get('idCategories')){
										print('<h3 class="meal-title">'.$meal->__get('title').' - $'.$meal->__get('price').'</h3>');
										print('<p class="meal-description">'.$meal->__get('description').'</p>');
										$items = $meal->__get('items');
										foreach($items as $item){
											if($item->__get('name')!='None'){
												$mprice = '';
												if($item->__get('cost')!='0.00'){
													$mprice = ' - $' . $item->__get('cost');
												}
												print('<h4 class="item-description">'.$item->__get('name') . $mprice .'</h4>');
												print('<p class="item-description">'.$item->__get('description').'</p>');
											}
										}
									}
								}
								print('<br /><br />');
							}
						}
					?>
			</div>
			<div class="span2">
				<img class="food-pic" src="<?php echo $base; ?>img/lasagna.png" />
			</div>
			</div>	
		</div>		
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">			
				<h1>Lebanese</h1>
					<hr /><br />
					<?php 
						foreach($categories as $category){
							if ($category->__get('group') == 2){
								print('<h2 class="category">'.$category->__get('Name') .'</h2>');
								foreach($meals as $meal){
									if ($meal->__get('category') == $category->__get('idCategories')){
										print('<h3 class="meal-title">'.$meal->__get('title').' - $'.$meal->__get('price').'</h3>');
										print('<p class="meal-description">'.$meal->__get('description').'</p>');
										$items = $meal->__get('items');
										foreach($items as $item){
											if($item->__get('name')!='None'){
												$mprice = '';
												if($item->__get('cost')!='0.00'){
													$mprice = ' - $' . $item->__get('cost');
												}
												print('<h4 class="item-description">'.$item->__get('name') . $mprice .'</h4>');
												print('<p class="item-description">'.$item->__get('description').'</p>');
											}
										}
									}
								}
								print('<br /><br />');
							}
						}
					?>
			</div>
			<div class="span2">
				<img class="food-pic" src="<?php echo $base; ?>img/mosaka.png" />
			</div>
			</div>	
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">			
				<h1>Sandwiches</h1>
					<hr /><br />
					<?php 
						foreach($categories as $category){
							if ($category->__get('group') == 3){
								print('<h2 class="category">'.$category->__get('Name') .'</h2>');
								foreach($meals as $meal){
									if ($meal->__get('category') == $category->__get('idCategories')){
										print('<h3 class="meal-title">'.$meal->__get('title').' - $'.$meal->__get('price').'</h3>');
										print('<p class="meal-description">'.$meal->__get('description').'</p>');
										$items = $meal->__get('items');
										foreach($items as $item){
											if($item->__get('name')!='None'){
												$mprice = '';
												if($item->__get('cost')!='0.00'){
													$mprice = ' - $' . $item->__get('cost');
												}
												print('<h4 class="item-description">'.$item->__get('name') . $mprice .'</h4>');
												print('<p class="item-description">'.$item->__get('description').'</p>');
											}
										}
									}
								}
								print('<br /><br />');
							}
						}
					?>
			</div>
			<div class="span2">
				<img class="food-pic" src="<?php echo $base; ?>img/meatball.png" />
			</div>
			</div>	
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">			
				<h1>Pizza</h1><br />
					<hr />
					<?php 
						foreach($categories as $category){
							if ($category->__get('group') == 4){
								print('<h2 class="category">'.$category->__get('Name') .'</h2>');
								foreach($meals as $meal){
									if ($meal->__get('category') == $category->__get('idCategories')){
										print('<h3 class="meal-title">'.$meal->__get('title').' - $'.$meal->__get('price').'</h3>');
										print('<p class="meal-description">'.$meal->__get('description').'</p>');
										$items = $meal->__get('items');
										foreach($items as $item){
											if($item->__get('name')!='None'){
												$mprice = '';
												if($item->__get('cost')!='0.00'){
													$mprice = ' - $' . $item->__get('cost');
												}
												print('<h4 class="item-description">'.$item->__get('name') . $mprice .'</h4>');
												print('<p class="item-description">'.$item->__get('description').'</p>');
											}
										}
									}
								}
								print('<br /><br />');
							}
						}
					?>
			</div>
			<div class="span2">
				<img class="food-pic" src="<?php echo $base; ?>img/pizza.png" />
			</div>
			</div>	
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">			
				<h1>Calzones</h1>
					<hr /><br />
					<?php 
						foreach($categories as $category){
							if ($category->__get('group') == 5){
								print('<h2 class="category">'.$category->__get('Name') .'</h2>');
								foreach($meals as $meal){
									if ($meal->__get('category') == $category->__get('idCategories')){
										print('<h3 class="meal-title">'.$meal->__get('title').' - $'.$meal->__get('price').'</h3>');
										print('<p class="meal-description">'.$meal->__get('description').'</p>');
										$items = $meal->__get('items');
										foreach($items as $item){
											if($item->__get('name')!='None'){
												$mprice = '';
												if($item->__get('cost')!='0.00'){
													$mprice = ' - $' . $item->__get('cost');
												}
												print('<h4 class="item-description">'.$item->__get('name') . $mprice .'</h4>');
												print('<p class="item-description">'.$item->__get('description').'</p>');
											}
										}
									}
								}
								print('<br /><br />');
							}
						}
					?>
			</div>
			<div class="span2">
				<img class="food-pic" src="<?php echo $base; ?>img/calzones.png" />
			</div>
			</div>	
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">			
				<h1>Kids Menu</h1>
					<hr /><br />
					<?php 
						foreach($categories as $category){
							if ($category->__get('group') == 6){
								print('<h2 class="category">'.$category->__get('Name') .'</h2>');
								foreach($meals as $meal){
									if ($meal->__get('category') == $category->__get('idCategories')){
										print('<h3 class="meal-title">'.$meal->__get('title').' - $'.$meal->__get('price').'</h3>');
										print('<p class="meal-description">'.$meal->__get('description').'</p>');
										$items = $meal->__get('items');
										foreach($items as $item){
											if($item->__get('name')!='None'){
												$mprice = '';
												if($item->__get('cost')!='0.00'){
													$mprice = ' - $' . $item->__get('cost');
												}
												print('<h4 class="item-description">'.$item->__get('name') . $mprice .'</h4>');
												print('<p class="item-description">'.$item->__get('description').'</p>');
											}
										}
									}
								}
								print('<br /><br />');
							}
						}
					?>
			</div>
			<div class="span2">
				<img class="food-pic" src="<?php echo $base; ?>img/speghetti.png" />
			</div>
			</div>	
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">			
				<h1>Sides and Desserts</h1>
					<hr /><br />
					<?php 
						foreach($categories as $category){
							if ($category->__get('group') == 7){
								print('<h2 class="category">'.$category->__get('Name') .'</h2>');
								foreach($meals as $meal){
									if ($meal->__get('category') == $category->__get('idCategories')){
										print('<h3 class="meal-title">'.$meal->__get('title').' - $'.$meal->__get('price').'</h3>');
										print('<p class="meal-description">'.$meal->__get('description').'</p>');
										$items = $meal->__get('items');
										foreach($items as $item){
											if($item->__get('name')!='None'){
												$mprice = '';
												if($item->__get('cost')!='0.00'){
													$mprice = ' - $' . $item->__get('cost');
												}
												print('<h4 class="item-description">'.$item->__get('name') . $mprice .'</h4>');
												print('<p class="item-description">'.$item->__get('description').'</p>');
											}
										}
									}
								}
								print('<br /><br />');
							}
						}
					?>
			</div>
			<div class="span2">
				<img class="food-pic" src="<?php echo $base; ?>img/baklava.png" />
			</div>
			</div>	
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">			
				<h1>Beverages</h1>
					<hr /><br />
					<?php 
						foreach($categories as $category){
							if ($category->__get('group') == 8){
								print('<h2 class="category">'.$category->__get('Name') .'</h2>');
								foreach($meals as $meal){
									if ($meal->__get('category') == $category->__get('idCategories')){
										print('<h3 class="meal-title">'.$meal->__get('title').' - $'.$meal->__get('price').'</h3>');
										print('<p class="meal-description">'.$meal->__get('description').'</p>');
										$items = $meal->__get('items');
										foreach($items as $item){
											if($item->__get('name')!='None'){
												$mprice = '';
												if($item->__get('cost')!='0.00'){
													$mprice = ' - $' . $item->__get('cost');
												}
												print('<h4 class="item-description">'.$item->__get('name') . $mprice .'</h4>');
												print('<p class="item-description">'.$item->__get('description').'</p>');
											}
										}
									}
								}
								print('<br /><br />');
							}
						}
					?>
			</div>
			<div class="span2">
				<img class="food-pic" src="<?php echo $base; ?>img/wine.png" />
			</div>
			</div>	
		</div>
	</body>
</html>

