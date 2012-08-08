<?php
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Table View for Order controller - allows waitstaff to select add menu items to the order.
*  Version 1.0
*/
$my_orderid;
$my_type = 'edit';
/*if (isset($order_id)){
	$my_orderid = $order_id;
	$my_type = 'order';
}*/
$my_meals = array();
foreach($meals as $meal){
	array_push($my_meals, $meal);
}
if($my_type === 'edit'){
	print('<div class="modal hide fade" id="editModal">'.
  '<div class="modal-header">'.
    '<button type="button" class="close" data-dismiss="modal">X</button>'.
    '<h3>Edit</h3>'.
 '</div>'.
  '<div class="modal-body">'.
 '</div>'.
'</div>');
}
?>
<div class="container-fluid main-content">
    <div class="row-fluid">
        <div class="span10 menu-container">
           
            <div class="tabbable tabs-left">
            	<ul class="nav nav-tabs">
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
										$item_html = "<br /><ul id='items' class='unstyled menu_item_selector'><b>". $item_name ."</b>&nbsp;<a class='".$my_type." btn btn-success' id='". $item_id ."' href='#'><i class='icon-plus icon-white'></i></a><li>". $item_desc ."</li><li>$" . $item_price . "</li></ul>";
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
										$option_html = "<br /><ul id='options' class='unstyled menu_item_selector'><b>". $option_name ."</b>&nbsp;<a class='".$my_type." btn btn-success' id='". $option_id ."' href='#'><i class='icon-plus icon-white'></i></a><li>". $option_desc ."</li><li>$" . $option_price . "</li></ul>";
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
										print("<div id='meals'><a class='".$my_type." btn btn-large btn-success' id='". $lid ."' href='#'><i class='icon-pencil icon-white'></i>&nbsp;Edit</a></div>");
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
							//if($r!=3){
							print("</div>");
							//}
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
										$item_html = "<br /><ul id='items' class='unstyled menu_item_selector'><b>". $item_name ."</b>&nbsp;<a class='".$my_type." btn btn-success' id='". $item_id ."' href='#'>&nbsp;<i class='icon-plus icon-white'></i></a><li>". $item_desc ."</li><li>$" . $item_price . "</li></ul>";
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
										$option_html = "<br /><ul id='options' class='unstyled menu_item_selector'><b>". $option_name ."</b>&nbsp;<a class='".$my_type." btn btn-success' id='". $option_id ."' href='#'><i class='icon-plus icon-white'></i></a><li>". $option_desc ."</li><li>$" . $option_price . "</li></ul>";
										}else {
											$option_html = "<br /><b>No available Options to add.</b>";
										}
										$tpop .= $option_html;
										// . $item_id . $item_desc;
									}
									print '<div class="span3 menu-block" id="'.$lid.'" rel="clickover" data-content="'.$tpop.'" data-original-title="'.$lmeal_title.'"><h2>'.$lmeal_title.'</h2>';
										print'<h3>$ '.$meal->__get('price').'</h3>';
										print("<div id='meals'><a class='".$my_type." btn btn-large btn-success' id='". $lid ."' href='#'><i class='icon-pencil icon-white'></i>&nbsp;Edit</a></div>");
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
            				var base = "http://demo.excellentingenuity.com/ERF/gr/";
            				var me = $(this).attr("id");
            				var parent = base + $(this).parent().attr("id") + "/edit";
            				$('.popover').hide();
            				edit_selected(me, parent);
            			});
            		</script>
            		<script type="text/javascript">
            			$('a.edit').click(function(e){
            				var base = "http://demo.excellentingenuity.com/ERF/gr/";
            				var me = $(this).attr("id");
            				var parent = base + $(this).parent().attr("id") + "/edit";
            				$('.popover').hide();
            				edit_selected(me, parent);
            			});
            		</script>
            		<!--add tab pane's here by categories -->
            	
            	</div>
            </div>
        </div>
        <?php $this->load->view('partials/right_side_bar'); ?> 
    </div>
</div>