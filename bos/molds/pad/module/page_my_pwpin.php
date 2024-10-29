<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My PAD Password</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		.edit-btn, .del-btn, .mark-btn {min-width: initial;}
		table.modz td:nth-child(2){font-weight: 600; padding-right: 38px;}
	</style>
</head>
<body class="scrollable">
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p style="margin-bottom: 6px;"><?php echo '<strong>Logged in as: </strong>'.$current_user; ?></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_password.php">
				<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
				<input type="hidden" name="uname" value="<?php echo $current_user; ?>" />
				<input type="hidden" name="pwe" value="<?php echo $pw_encrypt;?>" />
				<input type="hidden" name="pup" value="pw" />
				<h4 class="flow-text"><strong><i class="bi bi-key"></i> Password</strong></h4>
				<p style="margin: 18px 0 18px 0; color: #ff0000; font-size: 1rem; max-width: 80%;"><strong><?php echo ucfirst($pw_strength);?> Requirements:</strong><br /><?php echo $pw_req_msg;?></p>
				<label>New Password</label><br />
				<input type="password" name="pw1" id="pw1" class="form-control" required pattern="<?php echo $pw_reqs;?>" title="<?php echo $pw_req_msg;?>" autocomplete="new-password" /><br />
				<label>Confirm New Password</label><br />
				<input type="password" name="pw2" id="pw2" class="form-control" required pattern="<?php echo $pw_reqs;?>" title="<?php echo $pw_req_msg;?>" />
				<button type="submit" name="update_pw" class="add-btn brick">&#10004; Update</button>
			</form></div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_password.php">
				<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
				<input type="hidden" name="uname" value="<?php echo $current_user; ?>" />
				<input type="hidden" name="pwe" value="<?php echo $pw_encrypt;?>" />
				<input type="hidden" name="pup" value="pin" />
				<h4 class="flow-text"><strong><i class="bi bi-pk"></i> PIN</strong></h4>
				<p style="margin: 18px 0 18px 0; color: #ff0000; font-size: 1rem; max-width: 80%;"><strong><?php echo ucfirst($pw_strength);?> Requirements:</strong><br /><?php echo $pin_req_msg;?></p>
				<input id="pin" name="pin" type="password" required pattern="<?php echo $pin_req;?>" minlength="4" maxlength="8" size="8" autocomplete="new-password" title="<?php echo $pin_req_msg;?>" style="max-width: 150px;" />
				<button type="submit" name="update_pin" class="add-btn brick">&#10004; Update</button>
			</form></div>
			
		</div></div>
	</div>
 
</div>  

<!-- Initiate modal -->
<div class="modal">
	<div class="modal-inner">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>
</body>
</html>