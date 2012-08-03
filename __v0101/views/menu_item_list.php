<?php


//TODO:re-do this page to show in div blocks instead of a table
?>
<div class="container-fluid main-content">
    <div class="row-fluid">
        <div class="span10">
        <?php foreach ($query as $row){
            print('<div class="span2 menu-block">');
            print('<h3>' . $row->Name . '</h3>');
            
            print('<ul class="unstyled">');
            print('<li>' . $row->Description . '</li>');
            print('<li>Cost: $' . $row->Cost . '</li>');
            print('<li>Preperation Time: ' . $row->Prep_Time . '</li>');
            print('</ul>');
            print('</div>');
        }
        ?>
        </div>
        <?php $this->load->view('right_side_bar');?> 
    </div>
</div>
<?php

?>