<!DOCTYPE HTML>
<html>
	<head>
		
	</head>
	<body>
		<h1>Menu Items List</h1>
		<ul>
		<?php
			foreach ($query as $row):
		?>
		<li><?php echo $row->Name; ?></li> <!--//TODO:add other data attributes -->
		<?php endforeach; ?>
		</ul>
	</body>
</html>