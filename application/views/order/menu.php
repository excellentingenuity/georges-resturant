<?php
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Table View for Order controller - allows waitstaff to select add menu items to the order.
*  Version 1.0
*/



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
            			echo '<li class="cat-tabs"><a href="#'.$lname .'" datat-toggle="tab">'.$lname.'</a></li>';
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
            			if($i = 0){
            				echo '<div class="tab-pane active cat-tab" id="'.$lname.'">'; 
							//do other processing
							echo "</div>";
            			}else{
            			echo '<div class="tab-pane cat-tab" id="'.$lname .'">';
						//do other processing
						echo "</div>";
						}
						$i++;
					}
            		?>
            		<!--add tab pane's here by categories -->
            	</div>
            </div>
        </div>
        <?php $this->load->view('partials/right_side_bar'); ?> 
    </div>
</div>