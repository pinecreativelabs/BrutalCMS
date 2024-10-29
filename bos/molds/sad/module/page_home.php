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
    <title>SAD Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		small{font-size: 80%;}
		.limebox{border-radius: 1rem; border: 1px solid #00ff00; padding: 1rem;}
		.limebox h3 {font-weight: 600; margin: 0; padding: 8px; background: #00ff00; color: #000;}
		.edit-btn, .del-btn, .mark-btn {min-width: initial;}
		details summary {background: #00ff00; color: #000; font-weight: 600; text-transform: uppercase;}
		.details {padding: 8px 8px 32px 8px;}
		a,a:link,a:visited{color: #ffff00; border-bottom: 1px dotted #ffff00;}
		a:hover{color: #ff0000; border-bottom: 1px dotted #ff0000;}
		.tabs label {font-weight: 900; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0; background: #0f0; color: #000;}
		.tabs .tab {background: #000; color: #0f0; padding: 1em; border: none;}
		.tabs .tab .rolebox, .tabs .tab .projectbox, .projectbox {-webkit-border-radius: 0 1rem 1rem 1rem; border-radius: 0 1rem 1rem 1rem;}
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
		
		<div class="block bw100"><div style="padding: 1rem;"><div class="tabs">
			<input type="radio" name="sadtabs" id="tab1" checked="checked">
			<label for="tab1">General</label>
			<div class="tab"><div class="limebox">
				<p><strong>Sitename:</strong> <?php echo $sitename;?><br /><strong>Mailto:</strong> <?php echo $mailto;?><br /><br />
					<strong>Country:</strong> <?php echo $country;?><br />
					<strong>Currency:</strong> <?php echo $curc.' ('.$curs.')';?><br />
					<strong>Language:</strong> <?php echo $language;?><br />
					<strong>Timezone:</strong> <?php echo $timezone;?><br /><strong>TZ Mode:</strong> <?php echo $tz_mode;?><br /><br />
					<strong>Date Format:</strong> <?php echo $df;?><br /><strong>Time Format:</strong> <?php echo $tf;?><br /><br />
					<strong>Development Mode:</strong> <?php echo $dev_mode;?><br />
					<strong>jQuery:</strong> <?php echo $jq;?><br /><strong>jQuery Version:</strong> <?php echo $jqv;?><br />
					<strong>Icon Library:</strong> <?php echo $icons;?><br /><br />
					<strong>Cookie Consent Mode:</strong> <?php echo $cc_mode;?><br /><strong>Cookie Duration:</strong> <?php echo $cc_dur;?> days<br />
					<strong>CC Position:</strong> <?php echo $cc_position;?>
				</p>
			</div></div>
			<input type="radio" name="sadtabs" id="tab2">
			<label for="tab2">Access</label>
			<div class="tab"><div class="limebox">
				<p><strong>Registration:</strong> <?php echo $register;?><br /><strong>Password Strength:</strong> <?php echo $pw_strength;?><br />
					<strong>Password Encryption:</strong> <?php echo $pw_encrypt;?><br />
					<strong>Default PAL:</strong> <?php echo $pal_default;?><br /><strong>Login Mode:</strong> <?php echo $login_mode;?><br />
					<strong>Session Timeout:</strong> <?php echo ($session_timeout / 60);?> minutes<br /><br />
					<strong>Pagelock:</strong> <?php echo $set_pagelock;?><br /><br />
					<strong>Age Restrict:</strong> <?php echo $age_restrict;?><br /><strong> Min Age:</strong> <?php echo $min_age;?><br />
					<?php if($age_restrict_redirect != ''){?><strong>Redirect</strong> [<a href="<?php echo $age_restrict_redirect;?>" target="_blank">test link &raquo;</a>]<br /><?php } ?>
					<strong>Under Age Redirect Mode:</strong> <?php echo $under_age_redirect;?><br />
					<?php if($under_age_redirect == 'custom'){?><strong>Under Age Redirect to:</strong> [<a href="<?php echo $under_age_redirect_url;?>" target="_blank">test link &raquo;</a>]<?php } ?>
				</p>
				<div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
						<details><summary>Coming Soon</summary>
							<p class="details"><strong>Status:</strong> <?php echo $coming_soon;?><br />
							<strong>Template:</strong> <?php echo $coming_soon_template;?><br />
							<strong>Title:</strong> <?php echo $coming_soon_title;?><br /><strong>Message:</strong><br /><small><?php echo $coming_soon_message;?></small></p>
						</details>
					</div></div>
					<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
						<details><summary>Maintenance Mode</summary>
							<p class="details"><strong>Status:</strong> <?php echo $maintenance_mode;?><br />
							<strong>Title:</strong> <?php echo $maintenance_mode_title;?><br />
							<strong>Messge:</strong><br /><small><?php echo $maintenance_mode_message;?></small></p>
						</details>
					</div></div>
				</div>
			</div></div>
			<input type="radio" name="sadtabs" id="tab3">
			<label for="tab3">BOS UI</label>
			<div class="tab"><div class="limebox">
				<p><strong>FAM: <small>Copy files to private folder</small>:</strong> <?php echo $famcopy;?><br />
					<strong>Draggable Mode:</strong> <?php echo $draggable;?><br /><br />
					<strong>ENABLED MODULES:<br />Blueprint</strong> (pal: 2)<br />
					<?php if($cad=='true'){?><strong>CAD</strong> (pal: <?php echo $cad_pal;?>)<br /><?php } ?>
					<?php if($crude=='true'){?><strong>CRUDE</strong> (pal: <?php echo $crude_pal;?>)<br /><?php } ?>
					<?php if($dick=='true'){?><strong>DICK</strong> (pal: <?php echo $dick_pal;?>)<br /><?php } ?>
					<?php if($edu=='true'){?><strong>EDU</strong> (pal: <?php echo $edu_pal;?>)<br /><?php } ?>
					<strong>FAM</strong> (pal: 0)<br />
					<?php if($hapi=='true'){?><strong>HAPI</strong> (pal: <?php echo $hapi_pal;?>)<br /><?php } ?>
					<?php if($jack=='true'){?><strong>JACK</strong> (pal: <?php echo $jack_pal;?>)<br /><?php } ?>
					<?php if($mad=='true'){?><strong>MAD</strong> (pal: <?php echo $mad_pal;?>)<br /><?php } ?>
					<?php if($map=='true'){?><strong>MAP</strong> (pal: <?php echo $map_pal;?>)<br /><?php } ?>
					<strong>MOB</strong> (pal: 2)<br />
					<?php if($mydid=='true'){?><strong>MyDID</strong> (pal: <?php echo $mydid_pal;?>)<br /><?php } ?>
					<strong>PAD</strong> (pal: 2)<br /><strong>PAGES</strong> (pal: 2)<br />
					<?php if($paws=='true'){?><strong>PAWS</strong> (pal: <?php echo $paws_pal;?>)<br /><?php } ?>
					<?php if($ports=='true'){?><strong>PORTS</strong> (pal: <?php echo $ports_pal;?>)<br /><?php } ?>
					<strong>SAD</strong> (pal: 3)<br />
					<?php if($shop=='true'){?><strong>SHOP</strong> (pal: <?php echo $shop_pal;?>)<br /><?php } ?>
					<?php if($storyboard=='true'){?><strong>STORYboard</strong> (pal: <?php echo $storyboard_pal;?>)<br /><?php } ?>
					<?php if($tilt=='true'){?><strong>TILT</strong> (pal: <?php echo $tilt_pal;?>)<br /><?php } ?>
					</p>
			</div></div>
			<input type="radio" name="sadtabs" id="tab4">
			<label for="tab4">SEO</label>
			<div class="tab"><div class="limebox">
				<p><strong>Tracking Codes:</strong> <?php echo $tracking;?><br />
					<strong>Canonical URLs:</strong> <?php echo $canonical;?><br /><br />
					<strong>Global META Title:</strong><br /><small><?php echo $global_meta_title;?></small><br /><br />
					<strong>Global META Description:</strong><br /><small><?php echo $global_meta_desc;?></small><br /><br />
					<strong>Open Graph (OG):</strong> <?php echo $og;?><br />
					<strong>OG Image URL:</strong> [<a href="<?php echo $og_image;?>" target="_blank">test link &raquo;</a>]<br /><br />
					<strong>Twitter Card:</strong> <?php echo $tc;?><br /><strong>Handle:</strong> <?php echo $tc_handle;?><br />
					<strong>TC Image URL:</strong> [<a href="<?php echo $tc_image;?>" target="_blank">test link &raquo;</a>]
					<?php if($meta_rating=='true'){ ?><br /><br /><strong>Enabled Global Search Bot Tags:</strong><br />adult content rating<br /><?php } ?>
					<?php if($meta_robots=='true'){ ?>nofollow,noindex<br /><?php } ?>
					<?php if($meta_noreadaloud=='true'){ ?>noreadaloud<br /><?php } ?>
					<?php if($meta_nosearchbox=='true'){ ?>nosearchbox<br /><?php } ?>
					<?php if($meta_notranslate=='true'){ ?>noreadaloud<?php } ?>
				</p>
			</div></div>
			<input type="radio" name="sadtabs" id="tab5">
			<label for="tab5">Errors</label>
			<div class="tab"><div class="limebox">
				<details><summary>403 Error</summary>
					<p class="details"><strong>Title:</strong> <?php echo $error403;?><br />
					<strong>Message:</strong><br /><small><?php echo $error403_message;?></small></p>
				</details>
				<details><summary>404 Error</summary>
					<p class="details"><strong>Title:</strong> <?php echo $error404;?><br />
					<strong>Message:</strong><br /><small><?php echo $error404_message;?></small></p>
				</details>
				<details><summary>405 Error</summary>
					<p class="details"><strong>Title:</strong> <?php echo $error405;?><br />
					<strong>Message:</strong><br /><small><?php echo $error405_message;?></small></p>
				</details>
				<details><summary>408 Error</summary>
					<p class="details"><strong>Title:</strong> <?php echo $error408;?><br />
					<strong>Message:</strong><br /><small><?php echo $error408_message;?></small></p>
				</details>
				<details><summary>500 Error</summary>
					<p class="details"><strong>Title:</strong> <?php echo $error500;?><br />
					<strong>Message:</strong><br /><small><?php echo $error500_message;?></small></p>
				</details>
				<details><summary>502 Error</summary>
					<p class="details"><strong>Title:</strong> <?php echo $error502;?><br />
					<strong>Message:</strong><br /><small><?php echo $error502_message;?></small></p>
				</details>
				<details><summary>504 Error</summary>
					<p class="details"><strong>Title:</strong> <?php echo $error504;?><br />
					<strong>Message:</strong><br /><small><?php echo $error504_message;?></small></p>
				</details>
			</div></div>
		</div></div></div>
	</div>
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