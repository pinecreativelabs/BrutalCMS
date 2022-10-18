<?php 
require_once('sat/sos/sos.php');
require_once('pat/pad/module/common.php');

if (isset($_POST['submitBtn'])){
	// Get user input
	$username  = isset($_POST['username']) ? $_POST['username'] : '';
	$uemail  = isset($_POST['uemail']) ? $_POST['uemail'] : '';
	$password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
	$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
	// Try to register the user
	$error = registerUser($username,$uemail,$password1,$password2);
}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>BOS Registration</title>
   <!--<link href="pat/pos/css/style.css" rel="stylesheet" type="text/css" />-->
	
	<link href="bat/css/brutalist.min.css" type="text/css" rel="stylesheet" media="all"/>
	<link href="bat/css/blueprintgrid.min.css" type="text/css" rel="stylesheet" />
	<link href="css/fonts/monolisk/font.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="bat/css/bos-ui.css" type="text/css" />
	
	<script type="text/javascript" src="bat/jab/jquery.3.js"></script>
</head>
<body>
<div class="block-wrap center">
<?php if($registration=='enabled'){ ?>
	<div class="neon-card register lucida">
		<div class="brick-wrap">
			<div class="brick bw100">
				<h1 class="flow-text red-neon-t-s">BOS Registration</h1>
			</div>
			
			<?php if ((!isset($_POST['submitBtn'])) || ($error != '')) {?>
			<div class="brick bw100 scan-wrap">
				<div class="inner"><div class="line"><div class="scanner"></div></div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registerform">
					<label for="username" class="chonk">Username</label>
					<input class="text" name="username" type="text" />
					<label for="uemail" class="chonk">Email</label>
					<input class="text" name="uemail" type="email" />
					<label for="password1" class="chonk">Password</label>
					<input class="text" name="password1" type="password" />
					<label for="password" class="chonk">Confirm Password</label>
					<input class="text" name="password2" type="password" />
					<input class="glow-btn" type="submit" name="submitBtn" value="Register" />
				</form>
				</div>
			</div>
			<div class="brick bw100 center"><a href="login.php" class="white-t purple-neon-t-s hue-h" style="background: rgba(0,0,0,0.7); padding: 8px;">Login &raquo;</a></div>
			<?php }   
			if (isset($_POST['submitBtn'])){ ?>
			<div class="brick bw100">
			<?php if ($error == '') {
				echo "<strong>$username</strong> was registered successfully!<br/><br/>";
				echo ' <a href="login.php" class="glow-btn">Login &raquo;</a>';
			} else echo $error; ?>
			</div>
			<?php } ?>
		</div>
	</div>

<?php } else { ?>
<div class="neon-card lucida">
	<h1 class="flow-text red-neon-t-s">Registration Disabled</h1>
	<p><a href="login.php" class="glow-btn">Login &raquo;</a></p>
</div>
<?php } ?>
</div>
</body>   
</html>