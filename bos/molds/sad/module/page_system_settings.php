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
    <title>SAD System Settings</title>
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
	<div class="block-wrap">
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_bos.php">
				<input type="hidden" name="pup" value="sysd" />
				<h4 class="flow-text"><strong><i class="bi bi-loz"></i> System Defaults</strong></h4>
				<details><summary>General</summary>
					<div class="details">
						<label for="sitename">Sitename:</label><br />
						<input type="text" name="sitename" value="<?php echo $sitename; ?>" /><br />
						<label for="mailto">Mailto <small>(email)</small>:</label><br />
						<input type="email" name="mailto" value="<?php echo $mailto;?>" /><br />
						<div class="form-group">
							<label for="df">Date Format</label> <small><?php echo date($df);?></small><br />
							<select name="df">
								<option value="Y-m-d" <?php echo ($df == 'Y-m-d') ? 'selected' : ''; ?>>Y-m-d</option>
								<option value="m-d-Y" <?php echo ($df == 'm-d-Y') ? 'selected' : ''; ?>>m-d-Y</option>
								<option value="d-m-Y" <?php echo ($df == 'd-m-Y') ? 'selected' : ''; ?>>d-m-Y</option>
								<option value="Y/m/d" <?php echo ($df == 'Y/m/d') ? 'selected' : ''; ?>>Y/m/d</option>
								<option value="m/d/Y" <?php echo ($df == 'm/d/Y') ? 'selected' : ''; ?>>m/d/Y</option>
								<option value="d/m/Y" <?php echo ($df == 'd/m/Y') ? 'selected' : ''; ?>>d/m/Y</option>
							</select><br />
							<label for="tf">Time Format</label> <small><?php echo date($tf);?></small><br />
							<select name="tf">
								<option value="g:i" <?php echo ($tf == 'g:i') ? 'selected' : ''; ?>>g:i</option>
								<option value="g:i a" <?php echo ($tf == 'g:i a') ? 'selected' : ''; ?>>g:i a</option>
								<option value="g:i A" <?php echo ($tf == 'g:i A') ? 'selected' : ''; ?>>g:i A</option>
								<option value="g:i:s" <?php echo ($tf == 'g:i:s') ? 'selected' : ''; ?>>g:i:s</option>
								<option value="g:i:s a" <?php echo ($tf == 'g:i:s a') ? 'selected' : ''; ?>>g:i:s a</option>
								<option value="g:i:s A" <?php echo ($tf == 'g:i:s A') ? 'selected' : ''; ?>>g:i:s A</option>
							</select>
						</div>
					</div>
				</details>
				<details><summary>Locale</summary>
					<div class="details">
						<div class="form-group">
							<label for="country">Country</label><br />
							<?php echo $country_select;?><br />
							<label for="language">Language</label><br />
							<?php echo $language_select;?><br />
							<label for="region">Region:</label><br />
							<input type="text" name="region" value="<?php echo $region; ?>" /><br />
							<label for="city">City:</label><br />
							<input type="text" name="city" value="<?php echo $city; ?>" /><br />
						</div>
						<div class="form-group">
							<label for="tzmode">TZ Mode</label><br />
							<select name="tzmode">
								<option value="user" <?php echo ($tz_mode == 'user') ? 'selected' : ''; ?>>User</option>
								<option value="system" <?php echo ($tz_mode == 'system') ? 'selected' : '';?>>System</option>
							</select><br />
							<?php if($tz_mode=='user'){ ?>
							<p><small>The timezone will be based on the user's current location.</small><br /><br />
							<strong>Your Timezone:</strong> <?php echo $user_tz;?><br /><br /></p>
							<?php } ?>
							<label for="timezone">Timezone</label> <small>(system default)</small><br />
							<?php echo $timezone_select; ?>
						</div>
					</div>
				</details>
				<details><summary>Developer</summary>
					<div class="details">
						<label for="devmode">Development Mode</label><br />
						<select name="devmode">
							<option value="off" <?php echo ($dev_mode == 'off') ? 'selected':''; ?>>Off</option>
							<option value="on" <?php echo ($dev_mode == 'on') ? 'selected':'';?>>On</option>
						</select><br />
						<label for="icon_lib">Icon Library</label><br />
						<select name="icon_lib">
							<option value="none" <?php echo ($icons == 'none') ? 'selected' : ''; ?>>None</option>
							<option value="fa" <?php echo ($icons == 'fa') ? 'selected' : ''; ?>>Font Awesome</option>
							<option value="md" <?php echo ($icons == 'md') ? 'selected' : ''; ?>>Material Design</option>
						</select><br />
						<div class="form-group">
							<label><input type="checkbox" name="jq" value="true" class="set-jq" <?php echo ($jq !== '') ? 'checked="checked"' : ''; ?>/><span>jQuery</span></label>
							<br /><br /><strong>jQuery Version:</strong><br />
							<input type="radio" name="jqv" value="1" <?php echo ($jqv == '1') ? 'checked="checked"' : ''; ?>/> 1&nbsp;&nbsp;
							<input type="radio" name="jqv" value="2" <?php echo ($jqv == '2') ? 'checked="checked"' : ''; ?>/> 2&nbsp;&nbsp;
							<input type="radio" name="jqv" value="3" <?php echo ($jqv == '3') ? 'checked="checked"' : ''; ?>/> 3&nbsp;<br /><br />
						</div>
					</div>
				</details>
				<button type="submit" name="update_general" class="add-btn brick">&#10004; Update</button>
			</form></div>
			<div class="limebox" style="margin-top: 1.5rem;"><form method="POST" action="action_update_bos.php">
				<input type="hidden" name="pup" value="bos" />
				<h4 class="flow-text"><strong><i class="bi bi-mining"></i> BOS Settings</strong></h4>
				<details><summary>BOS UI</summary>
					<div class="details">
						<label for="fcum">FAM: Copy Files to Private Folder</label><br />
						<select name="fcum">
							<option value="true" <?php echo ($famcopy == 'true') ? 'selected' : ''; ?>>true</option>
							<option value="false" <?php echo ($famcopy == 'false') ? 'selected' : ''; ?>>false</option>
						</select><br />
						<label for="draggable">Draggable Mode</label><br />
						<select name="draggable">
							<option value="off" <?php echo ($draggable == 'off') ? 'selected':''; ?>>Off</option>
							<option value="on" <?php echo ($draggable == 'on') ? 'selected':'';?>>On</option>
						</select><br />
					</div>
				</details>
				<details><summary>Enabled Modules</summary>
					<div class="details">
						<table class="modz">
							<tr><td><input type="checkbox" name="cad" value="true" <?php echo ($cad == 'true') ? 'checked="checked"' : ''; ?>/></td><td>CAD</td>
								<td>PAL: </td><td><input type="number" name="cad_pal" value="<?php echo $cad_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="crude" value="true" <?php echo ($crude == 'true') ? 'checked="checked"' : ''; ?>/></td><td>CRUDE</td>
								<td>PAL: </td><td><input type="number" name="crude_pal" value="<?php echo $crude_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="dick" value="true" <?php echo ($dick == 'true') ? 'checked="checked"' : ''; ?>/></td><td>DICK</td>
								<td>PAL: </td><td><input type="number" name="dick_pal" value="<?php echo $dick_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="edu" value="true" <?php echo ($edu == 'true') ? 'checked="checked"' : ''; ?>/></td><td>EDU</td>
								<td>PAL: </td><td><input type="number" name="edu_pal" value="<?php echo $edu_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="hapi" value="true" <?php echo ($hapi == 'true') ? 'checked="checked"' : ''; ?>/></td><td>HAPI</td>
								<td>PAL: </td><td><input type="number" name="hapi_pal" value="<?php echo $hapi_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="jack" value="true" <?php echo ($jack == 'true') ? 'checked="checked"' : ''; ?>/></td><td>JACK</td>
								<td>PAL: </td><td><input type="number" name="jack_pal" value="<?php echo $jack_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="mad" value="true" <?php echo ($mad == 'true') ? 'checked="checked"' : ''; ?>/></td><td>MAD</td>
								<td>PAL: </td><td><input type="number" name="mad_pal" value="<?php echo $mad_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="map" value="true" <?php echo ($map == 'true') ? 'checked="checked"' : ''; ?>/></td><td>MAP</td>
								<td>PAL: </td><td><input type="number" name="map_pal" value="<?php echo $map_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="mydid" value="true" <?php echo ($mydid == 'true') ? 'checked="checked"' : ''; ?>/></td><td>MyDID</td>
								<td>PAL: </td><td><input type="number" name="mydid_pal" value="<?php echo $mydid_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="paws" value="true" <?php echo ($paws == 'true') ? 'checked="checked"' : ''; ?>/></td><td>PAWS</td>
								<td>PAL: </td><td><input type="number" name="paws_pal" value="<?php echo $paws_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="ports" value="true" <?php echo ($ports == 'true') ? 'checked="checked"' : ''; ?>/></td><td>PORTS</td>
								<td>PAL: </td><td><input type="number" name="ports_pal" value="<?php echo $ports_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="shop" value="true" <?php echo ($shop == 'true') ? 'checked="checked"' : ''; ?>/></td><td>SHOP</td>
								<td>PAL: </td><td><input type="number" name="shop_pal" value="<?php echo $shop_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="storyboard" value="true" <?php echo ($storyboard == 'true') ? 'checked="checked"' : ''; ?>/></td><td>STORYboard</td>
								<td>PAL: </td><td><input type="number" name="storyboard_pal" value="<?php echo $storyboard_pal; ?>" min="0" max="3" step="1" /></td></tr>
							<tr><td><input type="checkbox" name="tilt" value="true" <?php echo ($tilt == 'true') ? 'checked="checked"' : ''; ?>/></td><td>TILT</td>
								<td>PAL: </td><td><input type="number" name="tilt_pal" value="<?php echo $tilt_pal; ?>" min="0" max="3" step="1" /></td></tr>
						</table>
					</div>
				</details>
				<button type="submit" name="update_bosui" class="add-btn brick">&#10004; Update</button>
			</form></div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_bos.php">
				<input type="hidden" name="pup" value="access" />
				<h4 class="flow-text"><strong><i class="bi bi-restricted"></i> Access Restrictions</strong></h4>
				<details><summary>User Access</summary>
					<div class="details">
						<div class="form-group">
							<label for="register">Registration</label><br />
							<select name="register">
								<option value="true" <?php echo ($register == 'true') ? 'selected' : ''; ?>>Enabled</option>
								<option value="false" <?php echo ($register == 'false') ? 'selected' : ''; ?>>Disabled</option>
							</select><br />
							<label for="pwstrength">Password Strength</label><br />
							<select name="pwstrength">
								<option value="simple" <?php echo ($pw_strength == 'simple') ? 'selected' : ''; ?>>Simple</option>
								<option value="standard" <?php echo ($pw_strength == 'standard') ? 'selected' : ''; ?>>Standard</option>
								<option value="strong" <?php echo ($pw_strength == 'strong') ? 'selected' : ''; ?>>Strong</option>
								<option value="secure" <?php echo ($pw_strength == 'secure') ? 'selected' : ''; ?>>Secure</option>
							</select><br />
							<label for="pwencrypt">Password Encryption</label><br />
							<select name="pwencrypt">
								<option value="md5" <?php echo ($pw_encrypt == 'md5') ? 'selected' : ''; ?>>md5</option>
								<option value="sha1" <?php echo ($pw_encrypt == 'sha1') ? 'selected' : ''; ?>>sha1</option>
							</select><br />
							<label for="loginmode">Login Mode</label><br />
							<select name="loginmode">
								<option value="none" <?php echo ($login_mode == 'none') ? 'selected' : ''; ?>>None</option>
								<option value="sitewide" <?php echo ($login_mode == 'sitewide') ? 'selected' : ''; ?>>Sitewide</option>
							</select><br />
							<label for="timeout">Session Timeout</label><br />
							<select name="timeout">
								<option value="300" <?php echo ($session_timeout == '300') ? 'selected' : ''; ?>>5 Minutes</option>
								<option value="600" <?php echo ($session_timeout == '600') ? 'selected' : ''; ?>>10 Minutes</option>
								<option value="900" <?php echo ($session_timeout == '900') ? 'selected' : ''; ?>>15 Minutes</option>
								<option value="1800" <?php echo ($session_timeout == '1800') ? 'selected' : ''; ?>>30 Minutes</option>
								<option value="3600" <?php echo ($session_timeout == '3600') ? 'selected' : ''; ?>>1 Hour</option>
								<option value="7200" <?php echo ($session_timeout == '7200') ? 'selected' : ''; ?>>2 Hours</option>
							</select><br />
							<label for="paldefault">PAL Default</label><br />
							<input type="number" name="pal_default" value="<?php echo $pal_default; ?>" min="0" max="3" step="1" /><br />
						</div>
						<div class="form-group">
							<label for="pagelock">Pagelock</label><br />
							<select name="pagelock">
								<option value="true" <?php echo ($set_pagelock == 'true') ? 'selected' : ''; ?>>Enabled</option>
								<option value="false" <?php echo ($set_pagelock == 'false') ? 'selected' : ''; ?>>Disabled</option>
							</select>
						</div>
					</div>
				</details>
				<details><summary>Age Restriction</summary>
					<div class="details">
						<label for="agerestrict">Age Restrict</label><br />
						<select name="agerestrict">
							<option value="on" <?php echo ($age_restrict == 'on') ? 'selected' : ''; ?>>Enabled</option>
							<option value="off" <?php echo ($age_restrict == 'off') ? 'selected' : ''; ?>>Disabled</option>
						</select><br />
						<label for="min_age">Min Age</label><br />
						<input type="number" name="min_age" value="<?php echo $min_age; ?>" min="0" max="99" step="1" /><br />
						<label for="ar_redirect">Redirect URL</label> <small>(optional)</small><br />
						<input type="url" name="ar_redirect" value="<?php echo $age_restrict_redirect;?>" /><br />
						<label for="title">Title</label><br />
						<input type="text" name="ar_title" value="<?php echo $age_restrict_title;?>" /><br />
						<label for="ar_copy">Copy</label><br />
						<textarea name="ar_copy"><?php echo $age_restrict_copy; ?></textarea><br />
						<div class="form-group">
							<label for="uaredirmode">Under Age Redirect Mode</label><br />
							<select name="uaredirmode">
								<option value="home" <?php echo ($under_age_redirect == 'home') ? 'selected' : ''; ?>>Home</option>
								<option value="uapage" <?php echo ($under_age_redirect == 'uapage') ? 'selected' : ''; ?>>Under Age Page</option>
								<option value="custom" <?php echo ($under_age_redirect == 'custom') ? 'selected' : ''; ?>>Custom</option>
							</select><br />
							<label for="uaredirurl">Under Age Redirect URL</label><br />
							<input type="url" name="uaredirurl" value="<?php echo $under_age_redirect_url;?>" /><br />
							<label for="ua_message">Under Age Message</label><br />
							<textarea name="ua_message"><?php echo $under_age_message; ?></textarea><br />
						</div>
					</div>
				</details>
				<button type="submit" name="update_access" class="add-btn brick">&#10004; Update</button>
			</form></div>
			
			<div class="limebox" style="margin-top: 1.5rem;"><form method="POST" action="action_update_bos.php">
				<input type="hidden" name="pup" value="cc" />
				<h4 class="flow-text"><strong><i class="bi bi-cookie"></i> Cookie Consent</strong></h4>
				<details><summary>Settings</summary>
					<div class="details">
						<label for="cc_mode">Mode</label><br />
						<select name="cc_mode">
							<option value="off" <?php echo ($cc_mode == 'off') ? 'selected' : ''; ?>>off</option>
							<option value="on" <?php echo ($cc_mode == 'on') ? 'selected' : ''; ?>>on</option>
							<option value="global" <?php echo ($cc_mode == 'global') ? 'selected' : ''; ?>>global</option>
						</select><br />
						<label for="cc_dur">Cookie Duration</label><br />
						<select name="cc_dur">
							<option value="1" <?php echo ($cc_dur == '1') ? 'selected' : ''; ?>>1 day</option>
							<option value="7" <?php echo ($cc_dur == '7') ? 'selected' : ''; ?>>1 week</option>
							<option value="30" <?php echo ($cc_dur == '30') ? 'selected' : ''; ?>>1 month</option>
							<option value="365" <?php echo ($cc_dur == '365') ? 'selected' : ''; ?>>1 year</option>
						</select><br />
					</div>
				</details>
				<details><summary>Design</summary>
					<div class="details">
						<label>Text Color</label><br />
						<input type="color" name="cc_text_color" value="<?php echo $cc_text_color; ?>" /><br /><br />
						<label>Background Color</label><br />
						<input type="color" name="cc_bg_color" value="<?php echo $cc_bg_color; ?>" /><br /><br />
						<label>Button Text Color</label><br />
						<input type="color" name="cc_btn_text_color" value="<?php echo $cc_btn_text_color; ?>" /><br /><br />
						<label>Button Background Color</label><br />
						<input type="color" name="cc_btn_bg" value="<?php echo $cc_btn_bg; ?>" /><br /><br />
						<label for="cc_position">Position</label><br />
						<select name="cc_position">
							<option value="top" <?php echo ($cc_position == 'top') ? 'selected' : ''; ?>>top</option>
							<option value="bottom" <?php echo ($cc_position == 'bottom') ? 'selected' : ''; ?>>bottom</option>
						</select><br />
					</div>
				</details>
				<details><summary>Content</summary>
					<div class="details">
						<label for="cc_title">Title:</label><br />
						<input type="text" name="cc_title" value="<?php echo $cc_title; ?>" /><br />
						<label for="cc_copy">Copy:</label><br />
						<textarea name="cc_copy"><?php echo $cc_copy; ?></textarea><br />
						<label for="cc_btn_text">Button Text:</label><br />
						<input type="text" name="cc_btn_text" value="<?php echo $cc_btn_text; ?>" /><br />
						<label for="cc_policy_url">Policy URL:</label><br />
						<input type="url" name="cc_policy_url" value="<?php echo $cc_policy_url; ?>" /><br />
						<label for="cc_policy_text">Policy Link Text:</label><br />
						<input type="text" name="cc_policy_text" value="<?php echo $cc_policy_text; ?>" /><br />
					</div>
				</details>
				<button type="submit" name="update_cookies" class="add-btn brick">&#10004; Update</button>
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