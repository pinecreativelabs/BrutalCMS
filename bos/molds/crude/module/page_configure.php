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
    <title>PAGES Configuration</title>
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
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<form method="POST" action="action_update_config.php">
	<div class="block-wrap">
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox">
				<label for="addrec">Add New Records</label><br />
				<select name="addrec">
					<option value="true" <?php echo ($crude_addrecords == 'true') ? 'selected' : ''; ?>>enabled</option>
					<option value="false" <?php echo ($crude_addrecords == 'false') ? 'selected' : ''; ?>>disabled</option>
				</select><br />
				<label for="delrec">Delete Records</label><br />
				<select name="delrec">
					<option value="true" <?php echo ($crude_delrecords == 'true') ? 'selected' : ''; ?>>enabled</option>
					<option value="false" <?php echo ($crude_delrecords == 'false') ? 'selected' : ''; ?>>disabled</option>
				</select><br />
				<label for="readonly">Read-Only</label><br />
				<select name="readonly">
					<option value="true" <?php echo ($crude_readonly == 'true') ? 'selected' : ''; ?>>true</option>
					<option value="false" <?php echo ($crude_readonly == 'false') ? 'selected' : ''; ?>>false</option>
				</select>
			</div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">

		</div></div>
	</div>
	<button type="submit" name="update_crudeconfig" class="add-btn brick">&#10004; Update</button>
	</form>
 
</div>  

<!-- Initiate modal -->
<div class="modal"><div class="modal-inner">
	<span data-modal-close>&times;</span>
	<div class="modal-content"></div>
</div></div>

<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>
</body>
</html>