<?php


$data = array('Name' => $Name, 'Version' => $Version, 'Page' => $Page);

?>
<div class="container main-content">
    <div class="row">
        <div class="span10">
            &nbsp;
        </div>
        <?php $this->load->view('right_side_bar', $data);?>
    </div>
</div>
<?php

?>