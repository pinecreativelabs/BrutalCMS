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
    <title>SAD SEO Settings</title>
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
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_system.php">
				<input type="hidden" name="pup" value="seo"/>
				<h4 class="flow-text"><strong><i class="bi bi-zoom-right"></i> General SEO </strong></h4>
				<details><summary>Settings</summary>
					<div class="details">
						<label><input type="checkbox" name="canonical" value="on" <?php echo ($canonical == 'on') ? 'checked="checked"' : ''; ?>/> Canonical URLs </label><br /><br />
						<label for="tracking">Tracking Mode</label><br />
						<select name="tracking">
							<option value="off" <?php echo ($tracking == 'off') ? 'selected' : ''; ?>>Off</option>
							<option value="ga" <?php echo ($tracking == 'ga') ? 'selected' : ''; ?>>Google Analytics</option>
							<option value="tp" <?php echo ($tracking == 'tp') ? 'selected' : ''; ?>>Third Parties</option>
							<option value="all" <?php echo ($tracking == 'all') ? 'selected' : ''; ?>>All</option>
						</select><br />
						<div class="form-group">
							<label for="meta_title">Global Meta Title</label><br />
							<input type="text" name="meta_title" value="<?php echo $global_meta_title; ?>" /><br />
							<label for="meta_desc">Global Meta Description</label><br />
							<textarea name="meta_desc"><?php echo $global_meta_desc; ?></textarea><br />
						</div>
					</div>
				</details>
				<button type="submit" name="update_seo" class="add-btn brick">&#10004; Update</button>
			</form></div>
			<div class="limebox" style="margin-top: 1.5rem;"><form method="POST" action="action_update_system.php">
				<input type="hidden" name="pup" value="so" />
				<h4 class="flow-text"><strong><i class="bi bi-verify"></i> Verify Site Ownership </strong></h4>
				<details><summary>Settings</summary>
					<div class="details">
						<label for="sc_verify_method">Verification Method</label><br />
						<select name="sc_verify_method">
							<option value="off" <?php echo ($sc_verify == 'off') ? 'selected' : ''; ?>>None</option>
							<option value="tag" <?php echo ($sc_verify == 'tag') ? 'selected' : ''; ?>>META Tag</option>
							<option value="code" <?php echo ($sc_verify == 'code') ? 'selected' : ''; ?>>Tracking Code</option>
							<option value="html" <?php echo ($sc_verify == 'html') ? 'selected' : ''; ?>>HTML File</option>
						</select><br />
						<?php if($sc_verify=='off'){ ?>
						<p><strong>No Search Console verification is set.</strong>&nbsp;
						<a href="https://support.google.com/webmasters/answer/9008080" target="blank" class="help"><i class="bi bi-help"></i></a></p>
						<?php } elseif($sc_verify=='tag'){ ?>
						<label for="sc_verify_string">Search Console Verification String</label>
						<a href="https://youtu.be/RktlwdM3k1s?si=t2R5h0Idk0CBJJmQ" target="blank" class="help"><i class="bi bi-help"></i></a><br />
						<input type="text" name="sc_verify_string" value="<?php echo $sc_verify_string; ?>" /><br />
						<?php } elseif($sc_verify=='code'){ ?>
						<p><strong>Search Console will use your Google Analytics tracking code for site ownership verification.<br />Make sure this is set within <em>Tracking Codes</em>.</strong></p>
						<?php } else { ?>
						<p><strong>An HTML file will need to be uploaded for verification.</strong>&nbsp;
						<a href="https://youtu.be/p_ACRdZVYwk?si=Q3g_XOO-cagIPL68" target="blank" class="help"><i class="bi bi-help"></i></a></p>
						<?php } ?>
					</div>
				</details>
				<button type="submit" name="update_so_verify" class="add-btn brick">&#10004; Update</button>
			</form></div>
			<div class="limebox" style="margin-top: 1.5rem;"><form method="POST" action="action_update_system.php">
				<input type="hidden" name="pup" value="tc" />
				<h4 class="flow-text"><strong><i class="bi bi-spy"></i> Tracking Codes </strong></h4>
				<details><summary>Google Analytics</summary>
					<div class="details">
						<p><small><strong>Copy and paste your Google Analytics tracking code below.</strong></small>&nbsp;
						<a href="https://youtu.be/cxv0RCks7Ps?si=yo06I00qhNbCuVMl" target="blank" class="help"><i class="bi bi-help"></i></a></p>
						<textarea name="ga_tracking_code" rows="6"><?php echo $ga_tracking_code;?></textarea><br />
					</div>
				</details>
				<details><summary>Third Party</summary>
					<div class="details">
						<textarea name="tp_tracking_code" rows="6"><?php echo $tp_tracking_code;?></textarea><br />
					</div>
				</details>
				<button type="submit" name="update_tracking_codes" class="add-btn brick">&#10004; Update</button>
			</form></div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_system.php">
				<input type="hidden" name="pup" value="meta" />
				<h4 class="flow-text"><strong><i class="bi bi-robot"></i> META Tags</strong></h4>
				<details><summary>Search Bots</summary>
					<div class="details">
						<label><input type="checkbox" name="robots" value="true" <?php echo ($meta_robots == 'true') ? 'checked="checked"' : ''; ?>/> no-index, nofollow </label>
						<a href="https://developers.google.com/search/docs/crawling-indexing/robots-meta-tag" target="blank" class="help"><i class="bi bi-help"></i></a><br /><br />
						<label><input type="checkbox" name="rating" value="true" <?php echo ($meta_rating == 'true') ? 'checked="checked"' : ''; ?>/> adult content </label>
						<a href="https://developers.google.com/search/docs/crawling-indexing/safesearch" target="_blank" class="help"><i class="bi bi-help"></i></a><br /><br />
						<label><input type="checkbox" name="noreadaloud" value="true" <?php echo ($meta_noreadaloud == 'true') ? 'checked="checked"' : ''; ?>/> noreadaloud </label>
						<a href="https://developers.google.com/search/docs/crawling-indexing/read-aloud-user-agent" target="_blank" class="help"><i class="bi bi-help"></i></a><br /><br />
						<label><input type="checkbox" name="nosearchbox" value="true" <?php echo ($meta_nosearchbox == 'true') ? 'checked="checked"' : ''; ?>/> nosearchbox </label>
						<a href="https://developers.google.com/search/docs/appearance/structured-data/sitelinks-searchbox" target="_blank" class="help"><i class="bi bi-help"></i></a><br /><br />
						<label><input type="checkbox" name="notranslate" value="true" <?php echo ($meta_notranslate == 'true') ? 'checked="checked"' : ''; ?>/> notranslate </label>
						<a href="https://developers.google.com/search/docs/appearance/translated-results" target="_blank" class="help"><i class="bi bi-help"></i></a><br /><br />
					</div>
				</details>
				<details><summary>Open Graph</summary>
					<div class="details">
						<label><input type="checkbox" name="og" value="true" <?php echo ($og == 'true') ? 'checked="checked"' : ''; ?>/> enable OG tag </label><br /><br />
						<label for="og_image">Image URL</label><br />
						<input type="url" name="og_image" value="<?php echo $og_image;?>" /><br />
					</div>
				</details>
				<button type="submit" name="update_meta" class="add-btn brick">&#10004; Update</button>
			</form></div>
		</div></div>
	</div>
 
</div>  
<script>function reloadPage() {window.location.reload(true);}</script>
</body>
</html>