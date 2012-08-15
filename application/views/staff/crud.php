<?php
$view_permission = array();
   foreach ($mypermissions as $row){
       $view_permission[$row->Permission] = $row->Position;  
} 
$this->fb->log($mypermissions);
?>
<div class="container">
	<div class="row">
		<div class="span2">&nbsp;</div>
		<div class="span3 members">
			<ul class="members-ul"><h2>Staff Members</h2>
			<?php
				foreach ($staff as $member){
					print('<li class="member">');
					print('<h3 class="staff-name">');
					print($member->staff_name);
					print('</h3>');
					print('&nbsp;<a id="'.$member->idStaff.'" class="edit-member btn btn-success" href="#"><i class="icon-plus icon-white"></i></a></li>');
				}
			?>
			</ul>
		</div>
		<div class="span1">&nbsp;</div>
		<div class="span4 member-form-shell">
			<h2>Create/Edit Form</h2>
			<?php echo form_open('staff/crud'); ?>
			<div class="member-form">
				<?php
				echo form_label('First Name:', 'first_name');
                echo form_input('first_name', '','id="first_name"');
				echo form_label('Last Name:', 'last_name');
                echo form_input('last_name', '','id="last_name"');
				echo form_label('Staff Name:', 'staff_name');
                echo form_input('staff_name', '','id="staff_name"');
				echo form_label('Position:', 'permission');
				echo form_dropdown('permission', $view_permission, '', 'id="permission"');
				echo form_label('Passcode:', 'passcode');
                echo form_password('passcode', '', 'id="passcode"');
                echo("<br />");
                echo form_submit('submit', 'Save', 'class="btn btn-large login-btn"');
				echo form_close();
				?>
			</div>
		</div>
	</div>
</div>
