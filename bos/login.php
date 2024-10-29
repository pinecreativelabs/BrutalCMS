<?php 
require_once 'build/constructor.php';
require_once('molds/pad/module/common.php');
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
	<!-- CORE CSS -->
	<link href="core/css/construct.css" type="text/css" rel="stylesheet" />
	<!-- BOS UI CSS -->
	<link href="core/css/bos-ui.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="core/jab/jquery.3.js"></script>
</head>
<body>
<div class="block-wrap center">
	<div class="neon-card">
		<div class="brick-wrap">
			<div class="brick bw100">
				<h1 class="red-neon-t-s monolisk heavy">BOS Login</h1>
			</div>
		<?php if ($error != '') {?>
			<div class="brick bw100 scan-wrap bitstream">
				<div class="inner"><div class="line"><div class="scanner"></div></div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
					<label for="username" class="chonk">Username</label>
					<input class="text" name="username" type="text"  />
					<label for="password" class="chonk">Password</label>
					<input class="text" name="password" type="password" />
					<input class="pill concretebtn" type="submit" name="submitBtn" value="Login" />  
				</form>
				</div>
			</div>
			<div class="brick bw100"><a href="backdoor-login.php" class="lime-t black lime-b b-s-t nb-btn-small">BOS BACKDOOR</a></div>
			<?php if ($registration=='enabled'){ ?>
			<div class="brick bw100">
				<a href="register.php" class="white-t purple-neon-t-s hue-h" style="background: rgba(0,0,0,0.7); padding: 8px;">Register &raquo;</a>
			</div><?php } ?>
			<?php } 
			if (isset($_POST['submitBtn'])){ ?>
			<div class="brick bw100 scan-wrap bitstream">
			<?php if ($error == '') {
					echo '<div class="unset-bg b-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 0;"><span class="lime-t bold">$'.$username.'</span></div>
					<div class="black b-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 2em;"><span class="lime-t">user verified</span><br />
					<span class="lime-t blink">system ready...></span></div>
					<div class="pwr-btn" style="margin: 0 auto;"><a href="index.php" class="purple-neon-t-s">BOOT BOS</a></div>
					<p style="margin: 1.5em 0 0 0;"><a href="backdoor.php" class="lime-t black lime-b b-s-t nb-btn-small">BOS BACKDOOR</a></p>';
				} else echo $error;
			?>
			</div>
		<?php } ?>
		</div>
	</div>
</div>

</body>   
</html>