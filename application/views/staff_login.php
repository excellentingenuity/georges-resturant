<?php
$view_staff = array();
   foreach ($all_staff as $row){
       $view_staff[$row->staff_name] = $row->staff_name;
      //array_push($view_staff, $row->staff_name => $row->staff_name); 
 //echo $row->staff_name . '<br />';   
} 


?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4">&nbsp;</div>
        <div class="span4 outer-form">
            <h1>Staff Member</h1>
            <?php echo form_open('staff'); ?>
            <div class="login-form">
                <?php 
                echo form_label('Staff Name:', 'staff_name');
                echo form_dropdown('staff_name', $view_staff, '','id="staff_name"');
                echo form_label('Passcode:', 'passcode');
                echo form_password('passcode', '', 'id="passcode"');
                echo("<br />");
                echo form_submit('submit', 'Staff', 'class="btn btn-large login-btn"');
                echo form_close();
                ?>
            </div>
            <div class="errors"><?php echo validation_errors(); ?></div>
        </div>
        <div class="span4">&nbsp;</div>
    </div>
    </div>
