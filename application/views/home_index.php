<?php
$data = array('Name' => $Name, 'Version' => $Version, 'Page' => "Home");
$this->load->view('header', $data);

?>
<div class="container-fluid main-content">
    <div class="row-fluid">
        
    </div>
    <div class="row-fluid">
     	<?php $this->load->view('touch_nav_menu', 'home');?>
        <?php $this->load->view('right_side_bar', 'home');?>
    </div>
</div>
<?php
$this->load->view('footer', $data);
//include_once 'footer.php';
?>