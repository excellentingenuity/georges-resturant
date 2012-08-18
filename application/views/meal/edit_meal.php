<?php
check_page_permission(666);
?>
<h1>Edit Meal</h1>
<?php
			echo '<div>';
            echo form_open('meals/edit');  
			echo form_hidden('id', $id);
            echo form_label('Title', 'title');
            echo form_input('title', $title, 'id="title"');
            echo form_label('Category','category');
            echo form_dropdown('category', $categories);
            echo form_label('Description', 'description');
            echo form_input('description', $description, 'id="descripton"');
            echo form_label('Price', 'price');
            echo form_input('price', $price, 'id="price"');
            echo form_label('Items', 'items[]');
            echo form_multiselect('items[]', $items, '1');
			echo form_label('Options', 'options[]');
            echo form_multiselect('options[]', $options, '1');
            echo "<br /><br />";
            echo form_submit('submit', 'Save Meal', 'class="btn btn-large btn-success login-btn"');
            echo form_close(); 
			echo '</div>';
         ?>
