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
	<title>BOS Backdoor Login</title>
	<link href="core/css/construct.css" type="text/css" rel="stylesheet" media="all"/>
	<link rel="stylesheet" href="core/css/bos-ui.css" type="text/css" />
	
	<script type="text/javascript" src="core/jab/jquery.3.js"></script>
</head>
<body>
<div class="block-wrap center">
	<div class="neon-card">
		<div class="brick-wrap">
			<div class="brick bw100">
				<h1 class="black b-s-t lime-b lime-t black-o o-s-t depixel" style="padding: 8px; font-size: 28px;">BOS Backdoor Login</h1>
			</div>
		<?php if ($error != '') {?>
			<div class="brick bw100 scan-wrap bitstream">
				<div class="inner"><div class="line"><div class="scanner"></div></div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
					<label for="username" class="chonk">Username</label>
					<input class="text" name="username" type="text"  />
					<label for="password" class="chonk">Password</label>
					<input class="text" name="password" type="password" />
					<input class="concretebtn pill" type="submit" name="submitBtn" value="Login" />  
				</form>
				</div>
			</div>
			<div class="brick bw100"><a href="login.php" class="lime-t black lime-b b-s-t nb-btn-small">BOS LOGIN</a></div>
			<?php } 
			if (isset($_POST['submitBtn'])){ ?>
			<div class="brick bw100 scan-wrap bitstream">
			<?php if ($error == '') { 
					echo '<div class="unset-bg b-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 0;"><span class="lime-t bold">$'.$username.'</span></div>
					<div class="black b-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 2em;"><span class="lime-t">user verified</span><br />
					<span class="lime-t blink">system ready...></span></div>
					<div class="pwr-btn" style="margin: 0 auto;"><a href="backdoor.php" class="purple-neon-t-s">ENTER BACKDOOR</a></div>
					<p style="margin: 1.5em 0 0 0;"><a href="index.php" class="lime-t black lime-b b-s-t nb-btn-small">BOS</a></p>';
				} else echo $error;
			?>
			</div>
		<?php } ?>
		</div>
	</div>
</div>

</body>   
</html>