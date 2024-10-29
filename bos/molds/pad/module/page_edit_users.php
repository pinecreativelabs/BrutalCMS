<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];

$usersdatapath = 'data/users.xml';
$usersfile = simplexml_load_file('data/users.xml');

if($tz_mode=='system') {
	$input_tz = $timezone;
	$input_country = $country;
	$input_region = $region;
	$input_city = $city;
	$input_curc = $curc;
	$input_curs = $curs;
	$input_lang = $language;
} else {
	$input_tz = $user_tz;
	$input_country = $user_country;
	$input_region = $user_region;
	$input_city = $user_city;
	$input_curc = $user_curc;
	$input_curs = $user_curs;
	$input_lang = $browser_lang;
}

/* user account
$skip_row_number = array("1");
if (($handlep = fopen(realpath(__DIR__. '/../../..')."/pat/profiles/".$_SESSION['userName'].".csv", "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlep, 1000, ",")) !== FALSE) {
		$row++;
		if (in_array($row, $skip_row_number)){continue;} else {
			if($pdata[3]==1){$ugroup='administrator';}elseif($pdata[3]==2){$ugroup='editor';}elseif($pdata[3]==3){$ugroup='user';}else{$ugroup='BOS Admin';}
			$uid = $pdata[0];
			$uname = $pdata[1];
			if($pdata[2]==''){ $uemail = '[null]'; } else { $uemail = $pdata[2]; }
			$uactive = $pdata[3];
		}
	} fclose($handlep);
}*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>USERS Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New User</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>

<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $usersdatapath;?>" target="_blank" class="link"><?php echo $usersdatapath;?></a></p>
	<p><?php echo 'Editing as: <strong>'.$_SESSION['userName']; ?></strong></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
	<?php foreach($usersfile->user as $user){
		$uid = $user['id'];
		$username = $user['username'];
		$user_pal = $user['pal'];
		$user_blocked = $user['blocked'];
		$user_group = $user['group'];
		$user_active = $user['active'];
		$user_status = $user['status'];
		$user_visibility = $user['visibility'];
		$user_email = $user->email;
		$user_profile_name = $user->profile['name'];
		$user_sex = $user->profile['sex'];
		$user_birthday = $user->profile['birthday'];
		$user_bio = $user->bio;
		$user_phone = $user->contact['phone'];
		$user_url = $user->contact['url'];
		$user_profile_country = $user->locale['country'];
		$user_profile_city = $user->locale['city'];
		$user_profile_region = $user->locale['region'];
		$user_timezone = $user->locale['timezone'];
		$user_language = $user->locale['language'];
		$user_currency = $user->locale['cur'];
		$user_cs = $user->locale['curs'];
		// user file paths
		$user_dirpath = $droot_bos.'/app/users/'.$username;
		$user_filepath = $droot_bos.'/app/users/'.$username.'/files/';
		$user_trashpath = $droot_bos.'/app/users/'.$username.'/trash/';
		$user_files = scandir($user_filepath);
		$user_trashcan = scandir($user_trashpath);
		$fc_user_files = count($user_files)-2;
		$fc_user_trash = count($user_trashcan)-2;
	?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick">
					<h4><?php if($user_blocked=='1'){?>&#9940;<?php } echo $username;?></h4>
					<ul class="details">
						<li><small>ID:</small><br /><?php echo $uid;?></li>
						<li><small>Group:</small><br /><?php echo $user_group;?></li>
						<li><small>Active:</small><br /><?php echo $user_active; ?></li>
						<li><small>PAL:</small><br /><?php echo $user_pal;?></li>
					</ul>
				</div>
				<div class="brick" style="margin-left: auto;">
					<a href="#edit_<?php echo $uid; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#clear_<?php echo $uid; ?>" data-modal-open class="generate-btn">&#10062;</a>
					<a href="#keys_<?php echo $uid; ?>" data-modal-open class="restrict-btn">&#128272;</a>
					<?php if(($uid!='0')&&($uid!='1')){ ?><a href="#acct_<?php echo $uid; ?>" data-modal-open class="del-btn-o">&#10006;</a><?php } ?>
				</div>
			</div>
			<?php include('inc/edit_user.php'); ?>
		</div>
	<?php } ?>
		
	</div>
</div>  
<?php include('inc/add_user.php'); ?>

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