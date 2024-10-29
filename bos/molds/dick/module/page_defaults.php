<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';

$common = realpath(__DIR__. '/../../..').'/pat/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$dickdefaultsdatapath = 'data/defaults.xml';
$file = simplexml_load_file('data/defaults.xml');
foreach($file->setting as $row){if($row['id']=='365'){
	$displaymode=$row->displaymode;
	$persist=$row->displaymode['persist'];
	$dformat=$row->displaymode['dformat'];
	$jan=$row->months['jan'];
	$feb=$row->months['feb'];
	$mar=$row->months['mar'];
	$apr=$row->months['apr'];
	$may=$row->months['may'];
	$jun=$row->months['jun'];
	$jul=$row->months['jul'];
	$aug=$row->months['aug'];
	$sep=$row->months['sep'];
	$oct=$row->months['oct'];
	$nov=$row->months['nov'];
	$dec=$row->months['dec'];
	$spring=$row->seasons['spring'];
	$summer=$row->seasons['summer'];
	$fall=$row->seasons['fall'];
	$winter=$row->seasons['winter'];
	$pcolor=$row->design['pcolor'];
	$scolor=$row->design['scolor'];
	$tcolor=$row->design['tcolor'];
	$acolor=$row->design['acolor'];
	$ocolor=$row->design['ocolor'];
	$fallback_title=$row->fallback['title'];
	$fallback_type=$row->fallback['type'];
	$fallback_media=$row->fallback;
	$fallback_message=$row->fallbackcontent;
	$fallback_link=$row->fallbacklink;
	$fallback_link_target=$row->fallbacklink['target'];
	$fallback_link_text=$row->fallbacklink['text'];
}}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SAD System Settings</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">

</head>
<body class="scrollable">
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p style="margin-bottom: 6px;"><?php echo '<strong>Logged in as: </strong>'.$current_user; ?></p>
	<p>Data: <a href="<?php echo $dickdefaultsdatapath;?>" target="_blank" class="link"><?php echo $dickdefaultsdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_defaults.php">
				<input type="hidden" name="pup" value="general"/>
				<h4 class="flow-text"><strong>General Settings</strong></h4>
				<details><summary>Options</summary>
					<div class="details">
						<label for="displaymode">Display Mode</label><br />
						<select name="displaymode">
							<option value="always" <?php echo ($displaymode == 'always') ? 'selected' : ''; ?>>Always</option>
							<option value="week" <?php echo ($displaymode == 'week') ? 'selected' : ''; ?>>Weekly</option>
							<option value="month" <?php echo ($displaymode == 'month') ? 'selected' : ''; ?>>Monthly</option>
							<option value="season" <?php echo ($displaymode == 'season') ? 'selected' : ''; ?>>Seasonal</option>
						</select><br />
						<label for="persist">Persist Days</label><br /><small>Display days even if a month or season is disabled:</small><br />
						<select name="persist">
							<option value="true" <?php echo ($persist == 'true') ? 'selected' : ''; ?>>true</option>
							<option value="false" <?php echo ($persist == 'false') ? 'selected' : ''; ?>>false</option>
						</select><br />
						<label for="dformat">Date Title Format</label><br />
						<select name="dformat">
							<option value="l, F jS, Y" <?php echo ($dformat == 'l, F jS, Y') ? 'selected' : ''; ?>><?php echo date('l, F jS, Y');?></option>
							<option value="l, jS F, Y" <?php echo ($dformat == 'l, jS F, Y') ? 'selected' : ''; ?>><?php echo date('l, jS F, Y');?></option>
							<option value="F jS, Y" <?php echo ($dformat == 'F jS, Y') ? 'selected' : ''; ?>><?php echo date('F jS, Y');?></option>
							<option value="jS F, Y" <?php echo ($dformat == 'jS F, Y') ? 'selected' : ''; ?>><?php echo date('jS F, Y');?></option>
							<option value="n/j/Y" <?php echo ($dformat == 'n/j/Y') ? 'selected' : ''; ?>><?php echo date('n/j/Y');?> (MM/DD/Y)</option>
							<option value="j/n/Y" <?php echo ($dformat == 'j/n/Y') ? 'selected' : ''; ?>><?php echo date('j/n/Y');?> (DD/MM/Y)</option>
							<option value="n-j-Y" <?php echo ($dformat == 'n-j-Y') ? 'selected' : ''; ?>><?php echo date('n-j-Y');?> (MM-DD-Y)</option>
							<option value="j-n-Y" <?php echo ($dformat == 'j-n-Y') ? 'selected' : ''; ?>><?php echo date('j-n-Y');?> (DD-MM-Y)</option>
						</select>
					</div>
				</details>
				<details><summary>Months</summary>
					<div class="details">
						<table class="modz">
							<tr><td><input type="checkbox" name="jan" value="1" <?php echo ($jan == '1') ? 'checked="checked"' : ''; ?>/></td><td width="140px">January</td>
								<td><input type="checkbox" name="jul" value="1" <?php echo ($jul == '1') ? 'checked="checked"' : ''; ?>/></td><td>July</td></tr>
							<tr><td><input type="checkbox" name="feb" value="1" <?php echo ($feb == '1') ? 'checked="checked"' : ''; ?>/></td><td>February</td>
								<td><input type="checkbox" name="aug" value="1" <?php echo ($aug == '1') ? 'checked="checked"' : ''; ?>/></td><td>August</td></tr>
							<tr><td><input type="checkbox" name="mar" value="1" <?php echo ($mar == '1') ? 'checked="checked"' : ''; ?>/></td><td>March</td>
								<td><input type="checkbox" name="sep" value="1" <?php echo ($sep == '1') ? 'checked="checked"' : ''; ?>/></td><td>September</td></tr>
							<tr><td><input type="checkbox" name="apr" value="1" <?php echo ($apr == '1') ? 'checked="checked"' : ''; ?>/></td><td>April</td>
								<td><input type="checkbox" name="oct" value="1" <?php echo ($oct == '1') ? 'checked="checked"' : ''; ?>/></td><td>October</td></tr>
							<tr><td><input type="checkbox" name="may" value="1" <?php echo ($may == '1') ? 'checked="checked"' : ''; ?>/></td><td>May</td>
								<td><input type="checkbox" name="nov" value="1" <?php echo ($nov == '1') ? 'checked="checked"' : ''; ?>/></td><td>November</td></tr>
							<tr><td><input type="checkbox" name="jun" value="1" <?php echo ($jun == '1') ? 'checked="checked"' : ''; ?>/></td><td>June</td>
								<td><input type="checkbox" name="dec" value="1" <?php echo ($dec == '1') ? 'checked="checked"' : ''; ?>/></td><td>December</td></tr>
						</table>
					</div>
				</details>
				<details><summary>Seasons</summary>
					<div class="details">
						<table class="modz">
							<tr><td><input type="checkbox" name="spring" value="1" <?php echo ($spring == '1') ? 'checked="checked"' : ''; ?>/></td><td width="140px">Spring</td>
								<td><input type="checkbox" name="summer" value="1" <?php echo ($summer == '1') ? 'checked="checked"' : ''; ?>/></td><td>Summer</td></tr>
							<tr><td><input type="checkbox" name="fall" value="1" <?php echo ($fall == '1') ? 'checked="checked"' : ''; ?>/></td><td>Fall</td>
								<td><input type="checkbox" name="winter" value="1" <?php echo ($winter == '1') ? 'checked="checked"' : ''; ?>/></td><td>Winter</td></tr>
						</table>	
					</div>
				</details>
				<button type="submit" name="update_general" class="add-btn brick">&#10004; Update</button>
			</form></div>
			
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox"><form method="POST" action="action_update_defaults.php">
				<input type="hidden" name="pup" value="fallback"/>
				<h4 class="flow-text"><strong>Fallback Content</strong></h4>
				<details><summary>General</summary>
					<div class="details">
						<label for="fallbacktype">Fallback Media Type</label><br />
						<select name="fallbacktype">
							<option value="image" <?php echo ($fallback_type == 'image') ? 'selected' : ''; ?>>Image</option>
							<option value="video" <?php echo ($fallback_type == 'video') ? 'selected' : ''; ?>>Video</option>
							<option value="audio" <?php echo ($fallback_type == 'audio') ? 'selected' : ''; ?>>Audio</option>
							<option value="text" <?php echo ($fallback_type == 'text') ? 'selected' : ''; ?>>Text Only</option> 
						</select><br />
						<label for="fallbackmedia">Media URL</label> <small>(image, MP3 audio, or MP4 video URL)</small><br />
						<input type="url" name="fallbackmedia" value="<?php echo $fallback_media;?>" /><br />
						<div class="form-group">
							<label for="fallbacklink">Link URL</label> <small>(optional)</small><br />
							<input type="url" name="fallbacklink" value="<?php echo $fallback_link;?>" /><br />
							<label for="fallbacklinktarget">Target</label><br />
							<select name="fallbacklinktarget">
								<option value="_blank" <?php echo ($fallback_link_target == '_blank') ? 'selected' : ''; ?>>New Window</option>
								<option value="_self" <?php echo ($fallback_link_target == '_self') ? 'selected' : ''; ?>>Same Window</option>
								<option value="_parent" <?php echo ($fallback_link_target == '_parent') ? 'selected' : ''; ?>>Parent Window</option>
							</select><br />
							<label for="fallbacklinktext">Link Text</label><br />
							<input type="text" name="fallbacklinktext" value="<?php echo $fallback_link_text;?>" /><br />
						</div>
					</div>
				</details>
				<details><summary>Design</summary>
					<div class="details">
						<label><i class="bi bi-palette"></i>Colors</label><br />
						<input type="color" name="pcolor" value="<?php echo $pcolor; ?>" /> Primary <small>(background)</small><br />
						<input type="color" name="scolor" value="<?php echo $scolor; ?>" /> Secondary <small>(text)</small><br />
						<input type="color" name="tcolor" value="<?php echo $tcolor; ?>" /> Tertiary <small>(border)</small><br />
						<input type="color" name="acolor" value="<?php echo $acolor; ?>" /> Accent <small>(link, shadows)</small><br />
						<input type="color" name="ocolor" value="<?php echo $ocolor; ?>" /> Other <small>(link hover)</small>
					</div>
				</details>
				<details><summary>Content</summary>
					<div class="details">
						<label for="fallbacktitle">Title</label><br />
						<input type="text" name="fallbacktitle" value="<?php echo $fallback_title;?>" /><br />
						<label for="fallbackmessage">Message</label><br />
						<textarea name="fallbackmessage" rows="4"><?php echo $fallback_message; ?></textarea><br />
					</div>
				</details>
				<button type="submit" name="update_general" class="add-btn brick">&#10004; Update</button>
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