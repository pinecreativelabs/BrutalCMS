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
    <title>My PAD Profile</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		.edit-btn, .del-btn, .mark-btn {min-width: initial;}
		table.modz td:nth-child(2){font-weight: 600; padding-right: 38px;}
	</style>
</head>
<body class="scrollable">
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p style="margin-bottom: 6px;"><?php echo '<strong>Logged in as: </strong>'.$current_user.' (UID: '.$uid.')'; ?></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } 
$bdaydate = new DateTimeImmutable($user_birthday);
?>
<div class="padded">
	<div class="block-wrap">
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox">
				<h4 class="flow-text"><strong>Account Info</strong></h4>
				<p><strong>UID:</strong> <?php echo $uid;?><br /><strong>PAL:</strong> <?php echo $user_pal;?><br />
				<strong>Group:</strong> <?php echo $user_group;?><br /><strong>Active:</strong> <?php echo $user_active;?><br />
				<strong>Status:</strong> <?php echo $user_status;?><br /><strong>Visibility:</strong> <?php echo $user_visibility;?></p>
				<details style="margin-top: 1rem;"><summary>Edit</summary>
					<div class="details"><form method="POST" action="action_update_my_account.php">
						<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
						<input type="hidden" name="uname" value="<?php echo $current_user; ?>" />
						<input type="hidden" name="pup" value="ai" />
						<div class="form-group">
							<label for="userstatus">Status</label><br />
							<select name="userstatus">
								<option value="available" <?php echo ($user_status == 'available') ? 'selected' : ''; ?>>Available</option>
								<option value="away" <?php echo ($user_status == 'away') ? 'selected' : ''; ?>>Away</option>
								<option value="unavailable" <?php echo ($user_status == 'unavailable') ? 'selected' : ''; ?>>Unavailable</option>
							</select><br />
							<label for="uservis">Visibility</label><br />
							<select name="uservis">
								<option value="public" <?php echo ($user_visibility == 'public') ? 'selected' : ''; ?>>Public</option>
								<option value="private" <?php echo ($user_visibility == 'private') ? 'selected' : ''; ?>>Private</option>
								<option value="hidden" <?php echo ($user_visibility == 'hidden') ? 'selected' : ''; ?>>Hidden</option>
							</select>
						</div><button type="submit" name="edit_ai" class="add-btn brick">&#10004; Update</button>
					</form></div>
				</details>
			</div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox">
				<h4 class="flow-text"><strong>Details</strong></h4>
				<p><strong>Name:</strong> <?php echo $user_profile_name;?><br /><strong>Sex:</strong> <?php echo $user_sex;?><br />
				<strong>Birthday:</strong> <?php echo $bdaydate->format("jS F, Y");?><br />
				<strong>Bio:</strong> <?php echo $user_bio;?></p>
				<details style="margin-top: 1rem;"><summary>Edit</summary>
					<div class="details"><form method="POST" action="action_update_my_account.php">
						<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
						<input type="hidden" name="uname" value="<?php echo $current_user; ?>" />
						<input type="hidden" name="pup" value="de" />
						<div class="form-group">
							<label for="name">Name</label><br />
							<input type="text" name="name" value="<?php echo $user_profile_name; ?>" /><br />
							<label for="usersex">Sex</label><br />
							<select name="usersex">
								<option value="male" <?php echo ($user_sex == 'male') ? 'selected' : ''; ?>>Male</option>
								<option value="female" <?php echo ($user_sex == 'female') ? 'selected' : ''; ?>>Female</option>
								<option value="unspecified" <?php echo ($user_sex == 'unspecified') ? 'selected' : ''; ?>>Unspecified</option>
							</select><br />
							<label for="userbday">Birthday</label><br />
							<input type="date" name="userbday" value="<?php echo $user_birthday;?>" /><br /><br />
							<label for="bio">Bio</label><br />
							<textarea name="bio" rows="4"><?php echo $user_bio;?></textarea>
						</div><button type="submit" name="edit_deets" class="add-btn brick">&#10004; Update</button>
					</form></div>
				</details>
			</div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox">
				<h4 class="flow-text"><strong>Locale</strong></h4>
				<p><strong>Country:</strong> <?php echo $up_country;?><br /><strong>Region:</strong> <?php echo $up_region;?><br />
				<strong>City:</strong> <?php echo $up_city;?><br /><strong>Timezone:</strong> <?php echo $up_tz;?><br />
				<strong>Language:</strong> <?php echo $up_lang;?><br /><strong>Currency:</strong> <?php echo $up_curc . ' ('.$up_curs.')';?></p>
				<details style="margin-top: 1rem;"><summary>Edit</summary>
					<div class="details"><form method="POST" action="action_update_my_account.php">
						<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
						<input type="hidden" name="uname" value="<?php echo $current_user; ?>" />
						<input type="hidden" name="pup" value="lc" />
						<input type="hidden" name="curc" value="<?php echo $up_curc;?>" />
						<input type="hidden" name="curs" value="<?php echo $up_curs;?>" />
						<div class="form-group">
							<label for="country">Country</label><br />
							<?php echo $country_select_profile;?><br />
							<label for="region">Region</label><br />
							<input type="text" name="region" value="<?php echo $up_region; ?>" /><br />
							<label for="city">City</label><br />
							<input type="text" name="city" value="<?php echo $up_city; ?>" /><br />
						</div><div class="form-group">
							<label for="tz">Timezone</label><br />
							<?php echo $timezone_select_profile;?>
							<label for="lang">Language</label><br />
							<?php echo $language_select_profile;?><br />
						</div><button type="submit" name="edit_lc" class="add-btn brick">&#10004; Update</button>
					</form></div>
				</details>
			</div>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100 lg-100"><div style="padding: 1rem;">
			<div class="limebox">
				<h4 class="flow-text"><strong>Contact Info</strong></h4>
				<p><strong>Email:</strong> <?php echo $user_email;?><br /><strong>Phone:</strong><?php echo $user_phone;?><br />
				<strong>URL:</strong> <?php if($user_url!=''){ echo '<a href="'.$user_url.'" target="_blank">View Link &raquo;</a>';}else { echo '[not set]';} ?><br />
				<strong>IG:</strong> <?php if($user_ig!=''){echo '<a href="https://www.instagram.com/'.$user_ig.'" target="_blank">@'.$user_ig.'</a>';}else{echo '[not set]';}?><br />
				<strong>X:</strong> <?php if($user_tw!=''){echo '<a href="https://www.x.com/'.$user_tw.'" target="_blank">@'.$user_tw.'</a>';}else{echo '[not set]';}?></p>
				<details style="margin-top: 1rem;"><summary>Edit</summary>
					<div class="details"><form method="POST" action="action_update_my_account.php">
						<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
						<input type="hidden" name="uname" value="<?php echo $current_user; ?>" />
						<input type="hidden" name="pup" value="ci" />
						<div class="form-group">
							<label for="email">Email</label><br />
							<input type="email" name="email" value="<?php echo $user_email; ?>" /><br />
							<label for="phone">Phone</label><br />
							<input type="tel" name="phone" value="<?php echo $user_phone; ?>" /><br />
							<label for="uurl">URL</label><br />
							<input type="url" name="uurl" value="<?php echo $user_url;?>" /><br />
							<label for="ig_handle">Instagram Handle</label><br />
							<span class="left heavy flow-text">@</span><input type="text" name="ig_handle" value="<?php echo $user_ig;?>" /><br />
							<label for="tw_handle">X (Twitter) Handle</label><br />
							<span class="left heavy flow-text">@</span><input type="text" name="tw_handle" value="<?php echo $user_tw;?>" /><br />
						</div><button type="submit" name="edit_ci" class="add-btn brick">&#10004; Update</button>
					</form></div>
				</details>
			</div>
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