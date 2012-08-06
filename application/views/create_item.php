<?php

?>
<div class="container-fluid main-content">
    <div class="row-fluid">
        <div class="span10">
            <h1>Create Item</h1>
          <?php
            echo '<div class="span5">';
            echo form_open('items/create');  
            echo form_label('Name', 'name');
            echo form_input('name', '', 'id="name"');
            echo form_label('Description', 'description');
            echo form_input('description', '', 'id="descripton"');
            echo form_label('Price', 'price');
            echo form_input('price', '', 'id="price"');
			echo form_label('Prep Time','prep');
            echo form_input('prep', '', 'id="prep"');
            echo "<br /><br />";
            echo form_submit('submit', 'Create Item', 'class="btn btn-large btn-success login-btn"');
            echo form_close(); 
			echo '</div>';
         ?>
        </div>
        <?php $this->load->view('partials/right_side_bar');?> 
    </div>
</div>