<?php
check_page_permission(666);
?>
<div class="container-fluid main-content">
    <div class="row-fluid">
        <div class="span10">
            <h1>Create Option</h1>
          <?php
            echo '<div class="span5">';
            echo form_open('options/create');  
            echo form_label('Name', 'name');
            echo form_input('name', '', 'id="name"');
            echo form_label('Description', 'description');
            echo form_input('description', '', 'id="descripton"');
            echo form_label('Price', 'price');
            echo form_input('price', '', 'id="price"');
            echo "<br /><br />";
            echo form_submit('submit', 'Create Option', 'class="btn btn-large btn-success login-btn"');
            echo form_close(); 
			echo '</div>';
         ?>
        </div>
        <?php $this->load->view('partials/right_side_bar');?> 
    </div>
</div>