<?php
/*
 * TODO: Add ajax functions to pull in statuses and alerts of tables, orders, and resrvations depending on the screen calling
 */


?>
<div class="span2 pull-right well right_side_bar_container">
  <span class="span12 right-sidebar-label">Status</span>  
    
    <!-- TODO add ajax to php to get messages -->
    
</div>
<script type="text/javascript">
    $(document).ready(function() {
        if($('.breadcrumb').length != 0){
            sizer("right_side_bar_container", .70);
        }else {
            sizer("right_side_bar_container", .80);
        }
    });
</script>