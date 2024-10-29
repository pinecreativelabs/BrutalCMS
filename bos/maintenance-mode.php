<?php
$system_page=true;
$ignore_tracking = true;
require_once('build/constructor.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title><?php echo $maintenance_mode_title;?></title>
	<meta name="description" content="PHP boilerplate blank starter page." />
	
	<link href="core/css/construct.css" type="text/css" rel="stylesheet" media="all" />

</head>
<body>

<div class="wrap-960 smoke padded rounded courier center" style="margin-top: 3rem; margin-bottom: 3rem;">
	<i class="bi bi-wrench bi-4x charcoal-t-s"></i>
	<h1><strong><?php echo $maintenance_mode_title;?></strong></h1>
	<div class="message flow-text">
		<?php echo $maintenance_mode_message;?>
		<p class="spacer"></p>
	</div>
</div>

</body>
</html>