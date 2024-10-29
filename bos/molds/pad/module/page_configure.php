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
    <title>PAD Configuration</title>
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
			<div class="limebox"><form method="POST" action="action_update_defaults.php">
				<h4 class="flow-text"><strong>Profiles</strong></h4>
				<details><summary>Settings</summary>
					<div class="details">
						<strong>Public Profiles:</strong><br />
						<input type="radio" name="profiles" value="on" <?php echo ($profiles == 'on') ? 'checked="checked"' : ''; ?>/> On&nbsp;&nbsp;
						<input type="radio" name="profiles" value="off" <?php echo ($profiles == 'off') ? 'checked="checked"' : ''; ?>/> Off&nbsp;<br /><br />
						<strong>User List Layout:</strong><br />
						<input type="radio" name="ulistlayout" value="grid" <?php echo ($userlist_layout == 'grid') ? 'checked="checked"' : ''; ?>/> Grid&nbsp;&nbsp;
						<input type="radio" name="ulistlayout" value="list" <?php echo ($userlist_layout == 'list') ? 'checked="checked"' : ''; ?>/> List&nbsp;<br /><br />
						<label for="layout">Profile Layout</label><br />
						<select name="layout">
							<option value="bento" <?php echo ($profile_layout == 'bento') ? 'selected' : ''; ?>>bento grid</option>
							<option value="simple" <?php echo ($profile_layout == 'simple') ? 'selected' : ''; ?>>simple</option>
							<option value="two-col" <?php echo ($profile_layout == 'two-col') ? 'selected' : ''; ?>>two column</option>
						</select><br />
						<label for="theme">Profile Theme</label><br />
						<select name="theme">
							<option value="custom" <?php echo ($profile_theme == 'custom') ? 'selected' : ''; ?>>[custom]</option>
							<option value="mbi" <?php echo ($profile_theme == 'mbi') ? 'selected' : ''; ?>>mbi</option>
							<option value="vixen" <?php echo ($profile_theme == 'vixen') ? 'selected' : ''; ?>>vixen</option>
						</select><br />
						<div class="form-group">
							<strong>DISPLAY MODULES:</strong><br />
							<input type="checkbox" name="fam" value="true" <?php echo ($profile_fam == 'true') ? 'checked="checked"' : ''; ?>/> FAM<br /><br />
							<input type="checkbox" name="paws" value="true" <?php echo ($profile_paws == 'true') ? 'checked="checked"' : ''; ?>/> PAWS<br /><br />
							<input type="checkbox" name="ports" value="true" <?php echo ($profile_ports == 'true') ? 'checked="checked"' : ''; ?>/> PORTS<br /><br />
							<input type="checkbox" name="storyboard" value="true" <?php echo ($profile_storyboard == 'true') ? 'checked="checked"' : ''; ?>/> STORYboard<br /><br />
						</div>
					</div>
				</details>
				<button type="submit" name="update_profiles" class="add-btn brick">&#10004; Update</button>
			</form></div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_access.php">
				<h4 class="flow-text"><strong><i class="bi bi-restricted"></i> Blocked Users</strong></h4>
				<details><summary>Settings</summary>
					<div class="details">
						<label for="bur">Redirect Blocked Users</label><br />
						<select name="bur">
							<option value="home" <?php echo ($blocked_redirect == 'home') ? 'selected' : ''; ?>>Home Page</option>
							<option value="system" <?php echo ($blocked_redirect == 'system') ? 'selected' : ''; ?>>System Page</option>
						</select><br />
						<label for="bum">Blocked User Message</label><br />
						<textarea name="bum"><?php echo $blocked_user_message; ?></textarea><br />
					</div>
				</details>
				<button type="submit" name="update_blocked" class="add-btn brick">&#10004; Update</button>
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