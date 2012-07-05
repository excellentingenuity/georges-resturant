<?php
$data = array('Name' => $Name, 'Version' => $Version, 'Page' => "Home");
$this->load->view('header', $data);

?>
<div class="container main-content">
    <div class="row">
        <h1 class="welcome"><?php print($Name); ?></h1>
    </div>
    <div class="row">
     	<?php $this->load->view('touch_nav_menu', 'home');?>
        <?php $this->load->view('right_side_bar', 'home');?>
    </div>
</div>
<?php
$this->load->view('footer', $data);
//include_once 'footer.php';
?>