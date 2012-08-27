<?php
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Table View for Order controller - allows waitstaff to select add menu items to the order.
*  Version 1.0
*/
//check_page_permission(666);
$my_orderid;
$my_type = 'edit';

if (isset($order_id)){
	$my_orderid = $order_id;
	$my_type = 'order';
	$this->fb->log("this order id is" . $my_orderid);
	print('<span class="hidden order_id" id="'.$order_id.'"></span>');
}
$my_meals = array();
foreach($meals as $meal){
	array_push($my_meals, $meal);
}
if($my_type === 'edit'){
	print('<div class="modal hide" id="editModal">'.
  '<div class="modal-header">'.
    '<button type="button" class="close" data-dismiss="modal">X</button>'.
    '<h3>Edit</h3>'.
 '</div>'.
  '<div class="modal-body">'.
 '</div>'.
'</div>');
}
?>

<div class="alert alert-success hide">
    <a class="close" data-dismiss="alert" href="#">X</a>
    <h4 class="alert-heading">Success</h4>
    <p class="alert-message"></p>
</div>
<div class="container-fluid main-content">
	
    <div class="row-fluid">
        <div class="span8 menu-container">
            
            <div class="tabbable tabs-left">
            	<ul class="nav nav-tabs list-of-tabs">
            		<?php 
            		$i = 0;
            		foreach ($categories as $category){
            			$lname = $category->__get("Name");
						$tag_lname = str_replace(" ", "", $lname);
            			if($i == 0){
            				echo '<li class="active cat-tabs"><a href="#'.$tag_lname.'" data-toggle="tab">'.$lname.'</a></li>'; 
            			}else{
            			echo '<li class="cat-tabs"><a href="#'.$tag_lname .'" data-toggle="tab">'.$lname.'</a></li>';
						}
						$i++;
					}
            		?>
            		<!--add tab names here by category names -->
            		
            	</ul>
            	<div class="tab-content">
            		
            	  <?php 
            		$d = 0;
					$r = 0;
            		foreach ($categories as $category){
            			$lname = $category->__get("Name");
						$tcat = $category->__get("idCategories");
						$tag_lname = str_replace(" ", "", $lname);
						$r = 0;
            			if($d == 0){
            				echo '<div class="tab-pane cat-tab active" id="'.$tag_lname.'">'; 

							//print("hello");
							foreach ($my_meals as $meal){
								$lcat = $meal->__get("category");
								if ($lcat == $tcat){
									if($r==0){
										print('<div class="row-fluid menu-row">');
									}
									$lid = $meal->__get('id');
									$ldesc = $meal->__get("description");
									$tpop = '<p>'.$ldesc.'</p>';
									$titems = $meal->__get('items');
									$toptions = $meal->__get('options');
									$this->fb->log("toptions is $toptions");
									//print_r($titems);
									foreach($titems as $item){
										$item_name = $item->__get('name');
										$item_desc = $item->__get('description');
										$item_id = $item->__get('id');
										$item_price = $item->__get('cost');
										$item_html;
										//echo $item_name;
										if($item_name != "None"){
										$item_html = "<br /><ul id='items' class='unstyled menu_item_selector'><b>". $item_name ."</b>&nbsp;<a class='".$my_type." btn btn-success' id='". $item_id ."'  rel='". $lid ."' href='#'><i class='icon-plus icon-white'></i></a><li>". $item_desc ."</li><li>$" . $item_price . "</li></ul>";
										}else {
											$item_html = "<br /><b>No available Items to add.</b>";
										}
										$tpop .= $item_html;
										// . $item_id . $item_desc;
									}
									foreach($toptions as $option){
										$this->fb->log("inside options");
										$option_name = $option->__get('name');
										$option_desc = $option->__get('description');
										$option_id = $option->__get('id');
										$option_price = $option->__get('cost_increase');
										$option_html;
										//echo $item_name;
										if($option_name != "None"){
										$option_html = "<br /><ul id='options' class='unstyled menu_item_selector'><b>". $option_name ."</b>&nbsp;<a class='".$my_type." btn btn-success' id='". $option_id ."'  rel='". $lid ."' href='#'><i class='icon-plus icon-white'></i></a><li>". $option_desc ."</li><li>$" . $option_price . "</li></ul>";
										}else {
											$option_html = "<br /><b>No available Options to add.</b>";
										}
										$tpop .= $option_html;
										// . $item_id . $item_desc;
									}
									$lmeal_title =  $meal->__get("title");
									$tag_lmeal = str_replace(" ", "", $lmeal_title);
									print '<div class="span3 menu-block" id="'.$lid.'" rel="clickover" data-content="'.$tpop.'" data-original-title="'.$lmeal_title.'"><h2>'.$lmeal_title.'</h2>';
										print'<h3>$ '.$meal->__get('price').'</h3>';
										print("<div id='meals'><a class='".$my_type." btn btn-large btn-success' id='". $lid ."' href='#' rel='".$lmeal_title."'><i class='icon-pencil icon-white'></i>&nbsp;".$my_type."</a></div>");
										if($my_type === 'edit'){
											print("<div id='meals'><a class='delete btn btn-large btn-danger' id='". $lid ."' href='#' rel='".$lmeal_title."'><i class='icon-remove icon-white'></i>&nbsp;Delete</a></div>");
											}
									print '</div>';	
								
									if ($r == 3){
										print("</div>");
										//print('<div class=row-fluid>');
										$r = 0;
									}else {
										$r++;
									}
								}
							}
							if($r!=0){
							print("</div>");
							}
							echo "</div>";
            			}else{
            				$tag_lname = str_replace(" ", "", $lname);
            			echo '<div class="tab-pane cat-tab" id="'.$tag_lname .'">';
							foreach ($my_meals as $meal){
								$lcat = $meal->__get("category");
								if ($lcat == $tcat){
									if($r==0){
										print('<div class="row-fluid menu-row">');
									}
									$lid = $meal->__get('id');
									$ldesc = $meal->__get("description");
									$tpop = '<p>'.$ldesc.'</p>';
									$lmeal_title =  $meal->__get("title");
									$tag_lmeal = str_replace(" ", "", $lmeal_title);
									$titems = $meal->__get('items');
									$toptions = $meal->__get('options');
									$this->fb->log("toptions is $toptions");
									//print_r('$topions');
									//print_r($titems);
									foreach($titems as $item){
										$item_name = $item->__get('name');
										$item_desc = $item->__get('description');
										$item_id = $item->__get('id');
										$item_price = $item->__get('cost');
										$item_html;
										//echo $item_name;
										if($item_name != "None"){
										$item_html = "<br /><ul id='items' class='unstyled menu_item_selector'><b>". $item_name ."</b>&nbsp;<a class='".$my_type." btn btn-success' id='". $item_id ."'  rel='". $lid ."' href='#'>&nbsp;<i class='icon-plus icon-white'></i></a><li>". $item_desc ."</li><li>$" . $item_price . "</li></ul>";
										}else {
											$item_html = "<br /><b>No available Items to add.</b>";
										}
										$tpop .= $item_html;
										// . $item_id . $item_desc;
									}
									//print_r($toptions);
									foreach($toptions as $option){
										$this->fb->log("inside options");
										$option_name = $option->__get('name');
										$option_desc = $option->__get('description');
										$option_id = $option->__get('id');
										$option_price = $option->__get('cost_increase');
										$option_html;
										//echo $item_name;
										if($option_name != "None"){
										$option_html = "<br /><ul id='options' class='unstyled menu_item_selector'><b>". $option_name ."</b>&nbsp;<a class='".$my_type." btn btn-success' id='". $option_id ."' rel='". $lid ."' href='#'><i class='icon-plus icon-white'></i></a><li>". $option_desc ."</li><li>$" . $option_price . "</li></ul>";
										}else {
											$option_html = "<br /><b>No available Options to add.</b>";
										}
										$tpop .= $option_html;
										// . $item_id . $item_desc;
									}
									print '<div class="span3 menu-block" id="'.$lid.'" rel="clickover" data-content="'.$tpop.'" data-original-title="'.$lmeal_title.'"><h2>'.$lmeal_title.'</h2>';
										print'<h3>$ '.$meal->__get('price').'</h3>';
										print("<div id='meals'><a class='".$my_type." btn btn-large btn-success' id='". $lid ."' href='#' rel='".$lmeal_title."'><i class='icon-pencil icon-white'></i>&nbsp;".$my_type."</a></div>");
										if($my_type === 'edit'){
											print("<div id='meals'><a class='delete btn btn-large btn-danger' id='". $lid ."' href='#' rel='".$lmeal_title."'><i class='icon-remove icon-white'></i>&nbsp;Delete</a></div>");
											}
									print '</div>';
								
									if ($r == 3){
										print("</div>");
										//print('<div class=row-fluid>');
										$r = 0;
									}else {
										$r++;
									}
								}	
							}

						echo "</div>";
						$this->fb->log($r);
						if($r!=0){
							print("</div>");
						}
						}						

						$d++;

						
					}
					//echo "</div>";
            		?>
            		
            		<script type="text/javascript">
            		$('[rel="clickover"]').clickover({ global_close: true});
           			$('[rel="clickover"] a').click(function(e){
           				e.stopPropagation();
           			});
            		//$('.menu-block').clickover();
            		
            		</script>
            		<script type="text/javascript">
            			$('body').on("click", '.edit', function(e){
            				var base = $('.base_url').attr("id");//'../';//"http://demo.excellentingenuity.com/ERF/gr/";
            				var me = $(this).attr("id");
            				var parent = base + $(this).parent().attr("id") + "/edit";
            				$('.popover').hide();
            				edit_selected(me, parent);
            			});
            		</script>
            		<script type="text/javascript">
            			$('a.edit').click(function(e){
            				var base = $('.base_url').attr("id");//'../';//"http://demo.excellentingenuity.com/ERF/gr/";
            				var me = $(this).attr("id");
            				var parent = base + $(this).parent().attr("id") + "/edit";
            				$('.popover').hide();
            				edit_selected(me, parent);
            			});
            		</script>
            		<script type="text/javascript">
            		//order javascript
            		var my_order = new Array();
            		var my_meals = new Array();
            		var t_meals = new Array();
            		var n_meals = new Array();
            		var my_nmeals = new Array();
            		var d = 0;
            		var myorderid = $('.order_id').attr("id");
            			$('body').on("click", '.order', function(e){
            				var me = $(this).attr("id");
            				var parent = $(this).parent().attr("id");
							var found = false;
							if (t_meals.length > 0 ){
								for(i=0; i<t_meals.length; i++){
									if(t_meals[i].id == $(this).attr("rel")){
										if(parent == "items"){
											t_meals[i].items.push(me);
											n_meals[i].items.push($(this).prev().html());
											found = true;
										} else if(parent == "options"){
											t_meals[i].options.push(me);
											n_meals[i].options.push($(this).prev().html());
											found = true;
										}
									}
								}
							}
							if(found == false){
								var t_meal = new Meal();
								var n_meal = new Meal();
								t_meal.id = $(this).attr("rel");
								n_meal.id = $('#'+$(this).attr("rel")).attr("data-original-title");
								if(parent == "items"){
	            					t_meal.items.push(me);
	            					n_meal.items.push($(this).prev().html());
	            				} else if(parent == "options"){
	            					t_meal.options.push(me);
	            					n_meal.options.push($(this).prev().html());
	            				}
	            				t_meals.push(t_meal);
	            				n_meals.push(n_meal);
							}
            			});
            			
            		</script>
            		<script>
            			$('body').on("click", '.btn-large.order', function(e){
						var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
            			var url = base + "/place_order";
            			var found = false;
						if (t_meals.length > 0 ){
								for(i=0; i<t_meals.length; i++){
									if(t_meals[i].id == $(this).attr("id")){
										if(t_meals[i].items.length < 1){
			            					t_meals[i].items.push("7");
			            					n_meals[i].items.push("No Items");
			            				}
			            				if(t_meals[i].options.length < 1){
			            					t_meals[i].options.push("10");
			            					n_meals[i].options.push("No Options");
			            				}
										//check for items and options if null then add default
										my_meals.push(t_meals[i]);
										my_nmeals.push(n_meals[i]);
										myid =  i;
										d = i;
										my_html = '<div class="overview-meal">'+n_meals[i].id+'&nbsp;<a  id="'+my.id+'" class="remove btn btn-danger" href="#"><i class="icon-remove icon-white"></i></a><ul   class="unstyled">';
										for(v=0; v<n_meals[i].items.length; v++){
											my_html += '<li>'+n_meals[i].items[v]+'</li>';
										}
										for(v=0; v<n_meals[i].options.length; v++){
											my_html += '<li>'+n_meals[i].options[v]+'</li>';
										}
										my_html += '</ul></div>';
										t_meals.splice(d, 1);
										n_meals.splice(d, 1);
										found = true;
									}
								}
						}
						if (found == false){
							var t_meal = new Meal();
							var n_meal = new Meal();
							t_meal.id = $(this).attr("id");
							n_meal.id = $(this).attr("rel");
							if(t_meal.items.length < 1){
            					t_meal.items.push("7");
            					n_meal.items.push("No Items");
            				}
            				if(t_meal.options.length < 1){
            					t_meal.options.push("10");
            					n_meal.options.push("No Options");
            				}
            				my_meals.push(t_meal);
            				my_nmeals.push(n_meal);
            				myid = my_meals.length - 1;
            				d = myid;
							my_html = '<div class="overview-meal">'+n_meal.id+'&nbsp;<a  id="'+myid+'" class="remove btn btn-danger" href="#"><i class="icon-remove icon-white"></i></a><ul   class="unstyled">';
							for(v=0; v<n_meal.items.length; v++){
								my_html += '<li>'+n_meal.items[v]+'</li>';
							}
							for(v=0; v<n_meal.options.length; v++){
								my_html += '<li>'+n_meal.options[v]+'</li>';
							}
							my_html += '</ul></div>';
						}

						$('.overview-content').append(my_html);
            		});
            		</script>
            		<script>
            			$('.btn-large.order').click(function(e){
            			var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
            			var url = base + "/place_order";
            			var found = false;
						if (t_meals.length > 0 ){
								for(i=0; i<t_meals.length; i++){
									if(t_meals[i].id == $(this).attr("id")){
										if(t_meals[i].items.length < 1){
			            					t_meals[i].items.push("7");
			            					n_meals[i].items.push("No Items");
			            				}
			            				if(t_meals[i].options.length < 1){
			            					t_meals[i].options.push("10");
			            					n_meals[i].options.push("No Options");
			            				}
										//check for items and options if null then add default
										my_meals.push(t_meals[i]);
										my_nmeals.push(n_meals[i]);
										myid = i;
										d = i;
										my_html = '<div class="overview-meal">'+n_meals[i].id+'&nbsp;<a  id="'+myid+'" class="remove btn btn-danger" href="#"><i class="icon-remove icon-white"></i></a><ul   class="unstyled">';
										for(v=0; v<n_meals[i].items.length; v++){
											my_html += '<li>'+n_meals[i].items[v]+'</li>';
										}
										for(v=0; v<n_meals[i].options.length; v++){
											my_html += '<li>'+n_meals[i].options[v]+'</li>';
										}
										my_html += '</ul></div>';
										t_meals.splice(d, 1);
										n_meals.splice(d, 1);
										found = true;
									}
								}
						}
						if (found == false){
							var t_meal = new Meal();
							var n_meal = new Meal();
							t_meal.id = $(this).attr("id");
							n_meal.id = $(this).attr("rel");
							if(t_meal.items.length < 1){
            					t_meal.items.push("7");
            					n_meal.items.push("No Items");
            				}
            				if(t_meal.options.length < 1){
            					t_meal.options.push("10");
            					n_meal.options.push("No Options");
            				}
            				my_meals.push(t_meal);
            				my_nmeals.push(n_meal);
            				myid = my_meals.length - 1;
            				d = myid;
							my_html = '<div class="overview-meal">'+n_meal.id+'&nbsp;<a id="'+myid+'" class="remove btn btn-danger" href="#"><i class="icon-remove icon-white"></i></a><ul   class="unstyled">';
							for(v=0; v<n_meal.items.length; v++){
								my_html += '<li>'+n_meal.items[v]+'</li>';
							}
							for(v=0; v<n_meal.options.length; v++){
								my_html += '<li>'+n_meal.options[v]+'</li>';
							}
							my_html += '</ul></div>';
						}
						
						$('.overview-content').append(my_html);
            		});
            		</script>
            		<script>
            		$('body').on("click", '.remove', function(e){
            			///add remove button function here
            			var mid = $(this).attr("id");
            			my_meals.splice(mid, 1);
            			daddy = $(this).parent();
            			$(daddy).remove();
            				
            			
            		});
            		</script>
            		<script type="text/javascript">
            			$('body').on("click", '.delete', function(e){
            				var mid = $(this).attr("id");
            				var base = $('.base_url').attr("id");//'../menu';//"http://demo.excellentingenuity.com/ERF/gr/order";
        					var url = base + "menu/delete";
            				delete_meal(mid);
            			});
            		</script>
            		<script type="text/javascript">
            			$('a.delete').click(function(e){
            				var mid = $(this).attr("id");
            				var base = $('.base_url').attr("id");//'../menu';//"http://demo.excellentingenuity.com/ERF/gr/order";
        					var url = base + "menu/delete";
            				delete_meal(url, mid);
            			});
            		</script>
            		<!--add tab pane's here by categories -->
            	
            	</div>
            </div>
        </div>
        <div class="span2 well overview">
        	<?php if (isset($order_id)){
        		print('
        	<div class="overview-content">
        		&nbsp;
        	</div>
        	<a class="submit-order btn btn-success" href="#">Submit Order</a>');}
        	?>
        </div>
        <script type="text/javascript">
		    $(document).ready(function() {
		        
		            sizer("overview", .80);
		      		
		    });
		</script>
		<script type="text/javascript">
			$('.submit-order').click(function(e){
				var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
            	var url = base + "/place_order";
            	my_order[0] = myorderid;
            	my_order[1] = my_meals;
            	place_order(url, my_order);
			});
		</script>

        <?php $this->load->view('partials/right_side_bar'); ?> 
    </div>
</div>
<span id="<?php print(base_url()); ?>" class="hidden base_url"></span>