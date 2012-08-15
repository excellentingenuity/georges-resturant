<?php
/*
 * TODO: Add ajax functions to pull in statuses and alerts of tables, orders, and resrvations depending on the screen calling
 */
$myid = $this->session->userdata('staff_id');

?>

<div class="span2 pull-right well right_side_bar_container">
	
  <span class="span12 right-sidebar-label">Status</span>  
   <div id="<?php echo $myid;?>"class="span12 messages">
   	
   </div>
    <!-- TODO add ajax to php to get messages -->
    
</div>
<span id="<?php print(base_url()); ?>" class="span12 hidden my-url"></span>
<script type="text/javascript">
    $(document).ready(function() {
        if($('.breadcrumb').length != 0){
            sizer("right_side_bar_container", .70);
        }else {
            sizer("right_side_bar_container", .80);
        }
    });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var myid = $('.messages').attr("id");
		var base = $('.my-url').attr("id");
		var url = base + 'message/get_messages';
		get_messages(url, myid);
	});
</script>
<script type="text/javascript">
	$('body').on("click", '.my_message', function(e){
		var base = $('.my-url').attr("id");
		var url = base + 'message/mark_read';
		var myid = $(this).attr("id");
        message_read(url, myid);
	});
</script>	