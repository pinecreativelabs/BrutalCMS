<?php 
include realpath(__DIR__. '/../../..').'/sat/sos/paths.php';
$getbasestyle = 'inc/css/brutalist.lite.css';
$geteditor = 'inc/css/editor.css';
$getgrid = 'inc/css/b3grid.min.css';
$common = 'common.php';
require_once($common);
checkUser();
$usersdatapath = 'data/users.csv';
$sysdefaultdata = realpath(__DIR__. '/../../..').'/sat/sos/system/data/defaults.csv';

if (($dhandle = fopen($sysdefaultdata, "r")) !== FALSE) {
	while (($pdata = fgetcsv($dhandle, 1000, ",")) !== FALSE) {
		$row++;
		$sitename = $pdata[0];
		$mailto = $pdata[1];
		$ddf = $pdata[2];
		$dtf = $pdata[3];
		$default_theme = $pdata[4];
		$fam_curl_mode = $pdata[5];
	} fclose($dhandle);
}

// user account
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
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>USERS Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $getbasestyle;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $geteditor;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $getgrid;?>">

</head>
<body>

<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New User</a>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $usersdatapath;?>" target="_blank" class="link"><?php echo $usersdatapath;?></a></p>
	<p><?php echo 'Editing as: <strong>'.$_SESSION['userName']; ?></strong> with <?php echo $ugroup; ?> permissions</p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		
		<?php $row = 0;
			$skip_row_number = array("1");
			if (($handle = fopen("data/userlist.csv", "r")) !== FALSE) {
				while (($pdata = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$uid = $pdata[0];
					$uname = $pdata[1];
					$pw = $pdata[2];
					$email = $pdata[3];
					$uactive = $pdata[4];
					$ug = $pdata[5];
					if($ug=='bos'){$userg='BOS Admin';}elseif($ug=='1'){$userg='Administrator';}elseif($ug=='2'){$userg='Editor';}else{$userg='Member';}
					$row++;
					if(in_array($row, $skip_row_number)){continue;} else { 
						if($pdata[0]!=''){ ?>
						<div class="block bw100 record"><div class="brick-wrap">
							<div class="brick">
								<h4><?php echo $uname;?></h4>
								<ul class="details">
									<li><small>ID:</small><br /><?php echo $uid;?></li>
									<li><small>Group:</small><br /><?php echo $userg;?></li>
									<li><small>Active:</small><br /><?php echo $uactive; ?></li>
								</ul>
							</div>
							<div class="brick" style="margin-left: auto;">
								<a href="#edit_<?php echo $uid; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<a href="#clear_<?php echo $uid; ?>" data-modal-open class="generate-btn">&#10062;</a>
								<a href="#delete_<?php echo $uid; ?>" data-modal-open class="del-btn-o">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_user.php');?>
						</div>
		<?php 		}}
				} fclose($handle);
			} 
		?>
	</div><p><strong><?php echo $row-1; ?></strong> users</p>
</div>  
<?php include('inc/add_user.php'); ?>

<!-- Initiate modal -->
<div class="modal">
	<div class="modal-inner draggable">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="<?php echo $bosdir; ?>bat/jab/functions/modal.js"></script>

</body>
</html>