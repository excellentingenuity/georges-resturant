<?php
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Table View for Order controller - allows waitstaff to select add menu items to the order.
*  Version 1.0
*/

$my_meals = array();
foreach($meals as $meal){
	array_push($my_meals, $meal);
}
?>
<div class="container-fluid main-content">
    <div class="row-fluid">
        <div class="span10">
           
            <div class="tabbable tabs-left">
            	<ul class="nav nav-tabs">
            		<?php 
            		$i = 0;
            		foreach ($categories as $category){
            			$lname = $category->__get("Name");
            			if($i = 0){
            				echo '<li class="active cat-tabs"><a href="#'.$lname.'" data-toggle="tab">'.$lname.'</a></li>'; 
            			}else{
            			echo '<li class="cat-tabs"><a href="#'.$lname .'" data-toggle="tab">'.$lname.'</a></li>';
						}
						$i++;
					}
            		?>
            		<!--add tab names here by category names -->
            		
            	</ul>
            	<div class="tab-content">
            	  <?php 
            		$i = 0;
					
            		foreach ($categories as $category){
            			$lname = $category->__get("Name");
						$tcat = $category->__get("idCategories");
            			if($i == 0){
            				echo '<div class="tab-pane cat-tab active" id="'.$lname.'">'; 
							//print("hello");
							foreach ($my_meals as $meal){
								$lcat = $meal->__get("category");
								$ldesc = $meal->__get("description");
								$tpop = '<p>'.$ldesc.'</p>';
								$titems = $meal->__get('items');
								print_r($titems);
								foreach($titems as $item){
									$item_name = $item->__get('name');
									$item_desc = $item->__get('description');
									$item_id = $item->__get('id');
									$tpop .= $item_name . $item_id . $item_desc;
								}
								if ($lcat == $tcat){
									$lmeal_title =  $meal->__get("title");
									print '<div class="span3 menu-block" id="'.$lmeal_title.'" rel="clickover" data-content="'.$tpop.'" data-original-title="'.$lmeal_title.'"><h2>'.$lmeal_title.'</h2>';
										print'<h3>$ '.$meal->__get('price').'</h3>';
									print '</div>';
									
								}
								
							}
							
							echo "</div>";
            			}else{
            			echo '<div class="tab-pane cat-tab" id="'.$lname .'">';
							foreach ($my_meals as $meal){
								$lcat = $meal->__get("category");
								$ldesc = $meal->__get("description");
								if ($lcat == $tcat){
									$lmeal_title =  $meal->__get("title");
									print '<div class="span3 menu-block" id="'.$lmeal_title.'" rel="clickover" data-content="'.$ldesc.'" data-original-title="'.$lmeal_title.'"><h2>'.$lmeal_title.'</h2>';
										print'<h3>$ '.$meal->__get('price').'</h3>';
									print '</div>';
								}
								
							}
						
						echo "</div>";
						}
						$i++;
					}

            		?>
            		<script type="text/javascript">
            		$('[rel="clickover"]').clickover()
            		//$('.menu-block').clickover();
            		
            		</script>
            		<!--add tab pane's here by categories -->
            	</div>
            </div>
        </div>
        <?php $this->load->view('partials/right_side_bar'); ?> 
    </div>
</div>