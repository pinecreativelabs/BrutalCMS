<?php 
require_once('sat/sos/sos.php');
require_once('pat/pad/module/common.php');

$error = '0';
if (isset($_POST['submitBtn'])){
	// Get user input
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	// Try to login the user
	$error = loginUser($username,$password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>BOS Login</title>
	
	<link href="bat/css/brutalist.min.css" type="text/css" rel="stylesheet" media="all"/>
	<link href="bat/css/blueprintgrid.min.css" type="text/css" rel="stylesheet" />
	<link href="css/fonts/monolisk/font.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="bat/css/bos-ui.css" type="text/css" />
	
	<script type="text/javascript" src="bat/jab/jquery.3.js"></script>
</head>
<body>
<div class="block-wrap center">
	<div class="neon-card lucida">
		<div class="brick-wrap">
			<div class="brick bw100">
				<h1 class="flow-text red-neon-t-s">BOS Login</h1>
			</div>
		<?php if ($error != '') {?>
			<div class="brick bw100 scan-wrap">
				<div class="inner"><div class="line"><div class="scanner"></div></div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
					<label for="username" class="chonk">Username</label>
					<input class="text" name="username" type="text"  />
					<label for="password" class="chonk">Password</label>
					<input class="text" name="password" type="password" />
					<input class="glow-btn" type="submit" name="submitBtn" value="Login" />  
				</form>
				</div>
			</div>
			<?php if ($registration=='enabled'){ ?>
			<div class="brick bw100">
				<a href="register.php" class="white-t purple-neon-t-s hue-h" style="background: rgba(0,0,0,0.7); padding: 8px;">Register &raquo;</a>
			</div><?php } ?>
			<?php } 
			if (isset($_POST['submitBtn'])){ ?>
			<div class="brick bw100 scan-wrap">
			<?php if ($error == '') {
					echo '<div class="unset-bg brdr-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 1em;"><span class="lime-t bold">$'.$username.'</span></div>
					<div class="black brdr-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 1em;"><span class="lime-t">user verified</span></div>
					<div class="black brdr-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 2em;"><span class="lime-t blink">system ready...></span></div>
					<div class="pwr-btn lucida" style="margin: 0 auto;"><a href="index.php" class="purple-neon-t-s">BOOT BOS</a></div>';
				} else echo $error;
			?>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php if($plock==true){echo $pagelock;}?>
</body>   
</html>