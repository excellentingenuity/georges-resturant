<?php
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Table View for Order controller - allows waitstaff to select table of the order.
*  Version 1.0
*/
$view_array = array();
//print_r($tables);
foreach($tables as $row){
	array_push($view_array, $row->Table_id);
}
?>
<div class="container-fluid main-content">
    <div class="row-fluid">
        <div class="span10">
            &nbsp;
            <?php  
            echo form_open('order/table');
            echo form_label('Table', 'table');
			echo form_dropdown('table', $view_array, '', 'id="tables"');
			echo form_submit('Submit', 'table', 'class="btn btn-large login-btn"');
			echo "<br />";
            echo form_close();
            ?>
        </div>
        <?php $this->load->view('partials/right_side_bar'); ?> 
    </div>
</div>
