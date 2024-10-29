<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$dickdaysdatapath = 'data/days.xml';
$file = simplexml_load_file('data/days.xml');
$last_item = $file->xpath('//day[last()]');
$last_dayid = (int) $last_item[0]['id'];
$new_dayid = $last_dayid + 1;
$dickdatafile = simplexml_load_file('data/defaults.xml');
foreach($dickdatafile->setting as $row){if($row['id']=='365'){
	$dformat = $row->displaymode['dformat'];
	$fb_pcolor = $row->design['pcolor'];
	$fb_scolor = $row->design['scolor'];
	$fb_tcolor = $row->design['tcolor'];
	$fb_acolor = $row->design['acolor'];
	$fb_ocolor = $row->design['ocolor'];
}}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DICK Days Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Day</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $dickdaysdatapath;?>" target="_blank" class="link"><?php echo $dickdaysdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php if($file->day->count()<=0){echo '<p><strong>[NO DAYS SET]</strong></p>';}else{ 
		foreach($file->day as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw50 xs-100 sm-100 md-100">
				<?php $datetitle=date_create($row['ddate']);?>
					<h4><?php echo date_format($datetitle,$dformat);?></h4>
					<ul class="details">
						<li><small>ID:</small><br /><?php echo $row['id'];?></li>
						<li><small>Active:</small><br /><?php echo $row['active'];?></li>
						<li><small>Template:</small><br /><?php echo $row->design['template'];?></li>
						<li><small>Color Scheme:</small><br />
						<span class="color-sample" style="background: <?php echo $row->design['pcolor'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->design['scolor'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->design['tcolor'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->design['acolor'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->design['ocolor'];?>;"></span>
						</li>
						<?php if(!empty($row->url)){?><li><a href="<?php echo $row->url;?>" target="_blank"><small>[<?php echo $row->url['target']; ?>]</small><br />HYPERLINK</a></li><?php } ?>
					</ul>
				</div>
				<div class="brick" style="min-width: 150px; text-align: center;">
					<p><?php 
					if($row->media['type'] == 'video'){
						if($row->media['vidtype']=='yt'){ echo '<strong>YouTube:</strong><br /><a href="https://youtu.be/'.$row->media['ytvid'].'" target="_blank">'.$row->media['ytvid'].'</a>';}
						elseif($row->media['vidtype']=='vimeo'){ echo '<strong>Vimeo:</strong><br /><a href="https://vimeo.com/'.$row->media['vvid'].'" target="_blank">'.$row->media['vvid'].'</a>';}
						elseif($row->media['vidtype']=='dm'){echo '<strong>Dailymotion:</strong><br /><a href="https://dailymotion.com/video/'.$row->media['dmvid'].'" target="_blank">'.$row->media['dmvid'].'</a>';}
						elseif($row->media['vidtype']=='bc'){echo '<strong>BitChute:</strong><br /><a href="https://bitchute.com/video/'.$row->media['bcvid'].'" target="_blank">'.$row->media['bcvid'].'</a>';}
						elseif($row->media['vidtype']=='ovid'){echo '<strong>Video<br /><a href="'.$row->media.'" target="_blank">FILE</a></strong>';}
						else {echo 'video<br />not specified';}
					} elseif($row->media['type'] == 'image'){
						if(($row->media !='')||(!empty($row->media))){
							echo '<a href="'.$row->media.'" target="_blank" style="border-bottom: none;"><img src="'.$row->media.'" class="small-thumb crop" /></a>';
						} else { echo 'NO PIC';}
					} else {
						if(($row->media !='')||(!empty($row->media))){
							echo '<strong>Audio<br /><a href="'.$row->media.'" target="_blank">FILE</a></strong>';
						} else { echo 'AUDIO<br /><small>[not specified]</small>';}
					} ?>
					</p>
				</div>
				<div class="brick center" style="width: 160px; margin-left: auto;">
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
				</div>
			</div>
			<?php include('inc/edit_day.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>';}?>	
	</div>
</div>  
<?php include('inc/add_day.php'); ?>

<!-- Initiate modal -->
<div class="modal">
	<div class="modal-inner">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="<?php echo $bosdir; ?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>

</body>
</html>