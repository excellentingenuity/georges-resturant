<?php
$data = array('Name' => $Name, 'Version' => $Version);
$this->load->view('header', $data);

?>
<div class="container main-content">
    <div class="row">
        <h1 class="welcome"><?php print($Name); ?></h1>
    </div>
    <div class="row">
     	<?php $this->load->view('touch_nav_menu', 'home')?>
        <!--add default touch menu -->
    </div>
</div>
<?php
$this->load->view('footer', $data);
//include_once 'footer.php';
?>