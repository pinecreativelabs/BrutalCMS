<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$wpdatapath = 'data/wallpapers.xml';
$wpgdatapath = 'data/wallpapergroups.xml';
$file = simplexml_load_file('data/wallpapers.xml');
$wallpapergroups = simplexml_load_file('data/wallpapergroups.xml');
$fc = $file->count();
$pfc = $wallpapergroups->count();
// create property checklist 
$property_checklist = '<div class="form-group"><ul class="checkbox-group">'.PHP_EOL;
foreach($properties->property as $pcrow){ if($pcrow['active']=='true'){if($pcrow['id']!='mop-0'){
	$property_checklist.='<li><input type="checkbox" name="mops[]" value="'.$pcrow['id'].'" />'.$pcrow['title'].'</li>';
}}}
$property_checklist.='</ul></div>'.PHP_EOL;
// construct group selector
$group_optlist = '';
foreach($wallpapergroups->wallpapergroup as $wpgroup){ if($wpgroup['active']=='true'){
	$group_optlist.='<option value="'.$wpgroup['id'].'">'.$wpgroup['title'].'</option>'.PHP_EOL;
}}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Wallpapers</title>
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
		.modal-content .tabs .tab {background:#fff;}
	</style>
</head>
<body class="scrollable">
<a href="#add" class="add-btn brick" data-modal-open>&#10010; Wallpaper</a>
<a href="#addwpg" class="add-btn brick" data-modal-open>&#10010; Group</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Wallpaper Data: <a href="<?php echo $wpdatapath;?>" target="_blank" class="link"><?php echo $wpdatapath;?></a><br />
	Wallpaper Group Data: <a href="<?php echo $wpgdatapath;?>" target="_blank" class="link"><?php echo $wpgdatapath;?></a></p>
	<p><?php echo 'Editing as: <strong>'.$current_user; ?></strong></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		
		<div class="block bw100"><div style="padding: 1rem;"><div class="tabs">
			<input type="radio" name="sadtabs" id="tab1" checked="checked">
			<label for="tab1">Wallpapers (<?php echo $fc;?>)</label>
			<div class="tab"><div class="limebox">
				<?php if($fc==0){echo $fc.' wallpapers';}else{
					foreach($file->wallpaper as $row){ ?>
				<div class="block bw100 record">
					<div class="brick-wrap">
						<div class="brick bw50 xs-100 sm-100">
							<h4><?php echo $row['title'];?></h4>
							<ul class="details">
								<li><small>ID: <?php echo $row['id'];?></small></li>
								<?php if($row['active']=='false'){?><li><small><span style="color:red;">inactive</span></small></li><?php } ?>
							</ul>
						</div><div class="brick" style="min-width: 150px; text-align: center;">
						<?php if(($row->url !='')||(!empty($row->url))){
							echo '<a href="'.$row->url.'" target="_blank" style="border-bottom: none;"><img src="'.$row->url.'" class="small-thumb crop" /></a>';
						} else { echo 'NO PIC';}?>
						</div><div class="brick" style="width: 160px; margin-left: auto;">
							<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
							<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
						</div>
					</div>
					<?php include('inc/edit_wallpaper.php'); ?>
				</div>
				<?php }} ?>
			</div></div>
			<input type="radio" name="sadtabs" id="tab2">
			<label for="tab2">Groups (<?php echo $pfc;?>)</label>
			<div class="tab"><div class="limebox">
				<?php if($pfc==0){echo $pfc.' groups';}else{
					foreach($wallpapergroups->wallpapergroup as $grow){ ?>
				<div class="block bw100 record">
					<div class="brick-wrap">
						<div class="brick">
							<h4><?php echo $grow['title'];?></h4>
							<ul class="details">
								<li><small>ID: <?php echo $grow['id'];?></small></li>
								<?php if($grow['active']=='false'){?><li><small><span style="color:red;">inactive</span></small></li><?php } ?>
								<li><small><?php echo $grow['type'];?></small></li>
							</ul>
							<?php if($is_opts==true){ if($noac>0){echo $newoptlist;}}?>
						</div>
						<div class="brick" style="width: 160px; margin-left: auto;">
							<a href="#edit_<?php echo $grow['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
							<?php if($grow['id']!='mop-0'){?><a href="#delete_<?php echo $grow['id']; ?>" data-modal-open class="del-btn">&#10006;</a><?php } ?>
						</div>
					</div>
					<?php include('inc/edit_wallpapergroup.php'); ?>
				</div>
				<?php }} ?>
			</div></div>

		</div></div></div>
	</div>
</div>
<?php include('inc/add_wallpaper.php');
include('inc/add_wpgroup.php'); ?>

<!-- Initiate modal -->
<div class="modal"><div class="modal-inner">
	<span data-modal-close>&times;</span>
	<div class="modal-content"></div>
</div></div>
<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>
</body>
</html>