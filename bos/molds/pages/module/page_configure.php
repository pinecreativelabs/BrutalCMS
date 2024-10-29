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
				<label for="pages_genmode">Generation Mode</label><br /><span class="smoke-t"><small><em>partial</em> = data-only<br /><em>full</em> = data + create empty pages</small></span><br />
				<select name="pages_genmode">
					<option value="partial" <?php echo ($pages_genmode == 'partial') ? 'selected' : ''; ?>>partial</option>
					<option value="full" <?php echo ($pages_genmode == 'full') ? 'selected' : ''; ?>>full</option>
				</select><br /><br />
				<label for="pages_location">Pages Location</label><br /><span class="smoke-t"><small><em>base</em> = <?php echo $bdir; ?><br />
					<em>bos</em> = <?php echo $bosdir; ?></small></span><br />
				<select name="pages_location">
					<option value="base" <?php echo ($pages_location == 'base') ? 'selected' : ''; ?>>base</option>
					<option value="bos" <?php echo ($pages_location == 'bos') ? 'selected' : ''; ?>>bos</option>
				</select>
			</div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox">
				<label for="pagespal">Permission Level</label><br /><span class="smoke-t"><small><em>limited</em> = only administrators can manage pages<br />
					<em>extended</em> = administrators &amp; editors can manage pages</small></span><br />
				<select name="pagespal">
					<option value="limited" <?php echo ($pages_pal == 'limited') ? 'selected' : ''; ?>>limited</option>
					<option value="extended" <?php echo ($pages_pal == 'extended') ? 'selected' : ''; ?>>extended</option>
				</select><br /><br />
				<label for="pagesmeta">META Data</label><br /><span class="smoke-t"><small>Include META tags in new pages?</small></span><br />
				<select name="pagesmeta">
					<option value="true" <?php echo ($pages_meta == 'true') ? 'selected' : ''; ?>>yes</option>
					<option value="false" <?php echo ($pages_meta == 'false') ? 'selected' : ''; ?>>no</option>
				</select>
			</div>
		</div></div>
	</div>
	<button type="submit" name="update_pgsconfig" class="add-btn brick">&#10004; Update</button>
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