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
    <title>My Avatar</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		.edit-btn, .del-btn, .mark-btn {min-width: initial;}
		table.modz td:nth-child(2){font-weight: 600; padding-right: 38px;}
	</style>
</head>
<body class="scrollable">
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p style="margin-bottom: 6px;"><?php echo '<strong>Logged in as: </strong>'.$current_user.'<br />session ID: '.session_id(); ?></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox">
				<h4 class="monolisk flow-text heavy" style="margin: 0; padding: 0.5em;">Upload Avatar Image</h4>
				<p><small>Only png or jpg/jpeg files accepted.</small></p>
				<div class="unset-bg padded">
					<div class="fu padded terminal b-s-t">
						<input class="FU" type="file" path="../../../app/users/<?php echo $_SESSION['userName'];?>/files/" startOn="manually" buttonCaption="Upload" buttonClass="fu-fb" multi="false" afterUpload="image" maxSize="<?php echo $maxFileSize; ?>" fileType="image/png,image/jpeg"/>
					</div>
				</div>
				<p class="info padded b-b-t"><strong>TO SET AN AVATAR:</strong><br />1) Open 'Private Files' in FAM module<br />
				2) Filter for image files only<br />
				3) Select the "Set as Avatar" button ()
				</p> 
			</div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox">
				<h4 class="monolisk flow-text heavy" style="margin: 0; padding: 0.5em;">Your Avatar</h4>
				
			</div>
		</div></div>
	</div>
 
</div>  

<script src="<?php echo $bosdir;?>core/jab/jquery.3.js" type="text/javascript"></script>
<script src="<?php echo $bosdir;?>core/jab/plugins/jquery.uploadifive.min.js" type="text/javascript"></script>
<script src="<?php echo $bosdir;?>core/jab/plugins/upload.js" type="text/javascript"></script>

<script type="text/javascript">function reloadPage() {window.location.reload(true);}</script>
</body>
</html>