<?php
check_page_permission(666);
?>
<div class="container-fluid main-content">
    <div class="row-fluid">
        <div class="span10">
            <h1>Create Meal</h1>
          <?php
            echo '<div class="span5">';
            echo form_open('meals/create');  
            echo form_label('Title', 'title');
            echo form_input('title', '', 'id="title"');
            echo form_label('Category','category');
            echo form_dropdown('category', $categories);
            echo form_label('Description', 'description');
            echo form_input('description', '', 'id="descripton"');
            echo form_label('Price', 'price');
            echo form_input('price', '', 'id="price"');
            echo '</div>';
            echo '<div class="span6">';
            echo form_label('Items', 'items[]');
            echo form_multiselect('items[]', $items, '1');
			echo form_label('Options', 'options[]');
            echo form_multiselect('options[]', $options, '1');
            echo '</div>';
            echo "<br />";
            echo form_submit('submit', 'Create Meal', 'class="btn btn-large btn-success login-btn"');
            echo form_close(); 
         ?>
        </div>
        <?php $this->load->view('partials/right_side_bar');?> 
    </div>
</div>