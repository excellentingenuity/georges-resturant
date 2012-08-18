<?php
check_page_permission(666);
?>
<h1>Edit Option</h1>
          <?php
            echo '<div>';
            echo form_open('options/edit');  
			echo form_hidden('id', $id);
            echo form_label('Name', 'name');
            echo form_input('name', $name, 'id="name"');
            echo form_label('Description', 'description');
            echo form_input('description', $description, 'id="descripton"');
            echo form_label('Price', 'price');
            echo form_input('price', $price, 'id="price"');
            echo "<br /><br />";
            echo form_submit('submit', 'Save Option', 'class="btn btn-large btn-success login-btn"');
            echo form_close(); 
			echo '</div>';
         ?>