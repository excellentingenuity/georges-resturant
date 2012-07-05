<?php

//$hdata = array('Name' => $Name, 'Version' => $Version);
//$this->load->view('header', $hdata);

//TODO:re-do this page to show in div blocks instead of a table
?>
<div class="container main-content">
    <div class="row">
        <table class="table-bordered">
        <thead><h1>Menu Items List</h1></thead>
             <?php 
             $i=0;
            foreach ($query as $row): ?>
            <tr><th> <?php printf("Menu Item");
        ?></th></tr>
        <?php if ($i==0) print("<tr>"); ?>
            <td><ul class="unstyled"><?php printf($row->Name); ?>

        <li><?php printf($row->Description); ?></li>
        <li><?php printf($row->Cost); ?></li>
        <li><?php printf($row->Prep_Time); ?></li> 
        
        </ul></td><?php
        if ($i == 5){
           print("</tr>");
            $i=0; 
        }else {
            $i++;
        }
        endforeach; ?>
        </table>
    </div>
</div>
<?php
//$this->load->view('footer', $hdata);
?>