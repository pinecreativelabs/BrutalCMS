<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';

$common = realpath(__DIR__. '/../../..').'/pat/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SAD System Pages</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		.edit-btn, .del-btn, .mark-btn {min-width: initial;}
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
			<div class="limebox"><form method="POST" action="action_update_mm.php">
				<h4 class="flow-text"><strong><i class="bi bi-wrench"></i> Maintenance Mode</strong></h4>
				<details><summary>Settings</summary>
					<div class="details">
						<label for="mmode">Status</label><br />
						<input type="radio" name="mmode" value="off" <?php echo ($maintenance_mode == 'off') ? 'checked="checked"' : ''; ?>/> Off&nbsp;&nbsp;
						<input type="radio" name="mmode" value="on" <?php echo ($maintenance_mode == 'on') ? 'checked="checked"' : ''; ?>/> On&nbsp;&nbsp;<br /><br />
						<label for="mm_title">Title</label><br />
						<input type="text" name="mm_title" value="<?php echo $maintenance_mode_title; ?>" /><br />
						<label for="mm_message">Message</label><br />
						<textarea name="mm_message"><?php echo $maintenance_mode_message; ?></textarea><br />
					</div>
				</details>
				<button type="submit" name="update_mmode" class="add-btn brick">&#10004; Update</button>
			</form></div>
			<div class="limebox" style="margin-top: 1.5rem;"><form method="POST" action="action_update_comingsoon.php">
				<h4 class="flow-text"><strong><i class="bi bi-danger"></i> Coming Soon</strong></h4>
				<details><summary>Settings</summary>
					<div class="details">
						<label for="cs_status">Status</label><br />
						<input type="radio" name="cs_status" value="off" <?php echo ($coming_soon == 'off') ? 'checked="checked"' : ''; ?>/> Off&nbsp;&nbsp;
						<input type="radio" name="cs_status" value="on" <?php echo ($coming_soon == 'on') ? 'checked="checked"' : ''; ?>/> On&nbsp;&nbsp;<br /><br />
						<label for="cs_template">Template</label><br />
						<select name="cs_template">
							<option value="capture" <?php echo ($coming_soon_template == 'capture') ? 'selected' : ''; ?>>Capture</option>
							<option value="construction" <?php echo ($coming_soon_template == 'construction') ? 'selected' : ''; ?>>Construction</option>
							<option value="countdown" <?php echo ($coming_soon_template == 'countdown') ? 'selected' : ''; ?>>Countdown</option>
						</select><br />
						<label for="cs_title">Title</label><br />
						<input type="text" name="cs_title" value="<?php echo $coming_soon_title; ?>" /><br />
						<label for="cs_message">Message</label><br />
						<textarea name="cs_message"><?php echo $coming_soon_message; ?></textarea><br />
						<label for="deadline">Deadline</label><br />
						<input type="datetime-local" name="deadline" value="<?php echo $coming_soon_deadline;?>" /><br />
					</div>
				</details>
				<button type="submit" name="update_comingsoon" class="add-btn brick">&#10004; Update</button>
			</form></div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_error_pages.php">
				<h4 class="flow-text"><strong><i class="bi bi-wrong"></i> Error Pages</strong></h4>
				<details><summary>403 Error</summary>
					<div class="details">
						<label for="error403">Title</label><br />
						<input type="text" name="error403" value="<?php echo $error403; ?>" /><br />
						<label for="error403_msg">Message</label><br />
						<textarea name="error403_msg"><?php echo $error403_message; ?></textarea><br />
					</div>
				</details>
				<details><summary>404 Error</summary>
					<div class="details">
						<label for="error404">Title</label><br />
						<input type="text" name="error404" value="<?php echo $error404; ?>" /><br />
						<label for="error404_msg">Message</label><br />
						<textarea name="error404_msg"><?php echo $error404_message; ?></textarea><br />
					</div>
				</details>
				<details><summary>405 Error</summary>
					<div class="details">
						<label for="error405">Title</label><br />
						<input type="text" name="error405" value="<?php echo $error405; ?>" /><br />
						<label for="error405_msg">Message</label><br />
						<textarea name="error405_msg"><?php echo $error405_message; ?></textarea><br />
					</div>
				</details>
				<details><summary>408 Error</summary>
					<div class="details">
						<label for="error408">Title</label><br />
						<input type="text" name="error408" value="<?php echo $error408; ?>" /><br />
						<label for="error408_msg">Message</label><br />
						<textarea name="error408_msg"><?php echo $error408_message; ?></textarea><br />
					</div>
				</details>
				<details><summary>500 Error</summary>
					<div class="details">
						<label for="error500">Title</label><br />
						<input type="text" name="error500" value="<?php echo $error500; ?>" /><br />
						<label for="error500_msg">Message</label><br />
						<textarea name="error500_msg"><?php echo $error500_message; ?></textarea><br />
					</div>
				</details>
				<details><summary>502 Error</summary>
					<div class="details">
						<label for="error502">Title</label><br />
						<input type="text" name="error502" value="<?php echo $error502; ?>" /><br />
						<label for="error502_msg">Message</label><br />
						<textarea name="error502_msg"><?php echo $error502_message; ?></textarea><br />
					</div>
				</details>
				<details><summary>504 Error</summary>
					<div class="details">
						<label for="error504">Title</label><br />
						<input type="text" name="error504" value="<?php echo $error504; ?>" /><br />
						<label for="error504_msg">Message</label><br />
						<textarea name="error504_msg"><?php echo $error504_message; ?></textarea><br />
					</div>
				</details>
				<button type="submit" name="update_errorpgs" class="add-btn brick">&#10004; Update</button>
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