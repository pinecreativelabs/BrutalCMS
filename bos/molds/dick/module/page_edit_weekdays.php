<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$dickweekdaysdatapath = 'data/weekdays.xml';
$file = simplexml_load_file('data/weekdays.xml'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DICK Weekdays Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header>
	<div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $dickweekdaysdatapath;?>" target="_blank" class="link"><?php echo $dickweekdaysdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php foreach($file->day as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw50 xs-100 sm-100">
					<h4><?php echo $row['dow'];?></h4>
					<p><strong>TITLE: </strong><?php echo $row['title']; ?><br />
						<strong><?php if($row['active']=='true'){?>&#10004;active<?php } else { ?><span style="color: #ff0000;">inactive</span><?php } ?></strong><br />
						<?php if(!empty($row->link)){?><a href="<?php echo $row->link; ?>" target="_blank">HYPERLINK</a> <small>[<?php echo $row->target; ?>]</small><?php } ?>
					</p>
				</div>
				<div class="brick">
					<p><small>Color Scheme:</small><br />
						<span class="color-sample" style="background: <?php echo $row->design['pcolor'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->design['scolor'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->design['tcolor'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->design['acolor'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->design['ocolor'];?>;"></span>
					</p>
				</div>
				<div class="brick" style="min-width: 150px; text-align: center;">
					<p><?php 
					if($row->media['type'] == 'video'){
						if($row->media['vidtype']=='yt'){ echo '<strong>YouTube:</strong><br /><a href="https://youtu.be/'.$row->media['ytvid'].'" target="_blank">'.$row->media['ytvid'].'</a>';}
						elseif($row->media['vidtype']=='vimeo'){ echo '<strong>Vimeo:</strong><br /><a href="https://vimeo.com/'.$row->media['vvid'].'" target="_blank">'.$row->media['vvid'].'</a>';}
						elseif($row->media['vidtype']=='dm'){echo '<strong>Dailymotion:</strong><br /><a href="https://dailymotion.com/video/'.$row->media['dmvid'].'" target="_blank">'.$row->media['dmvid'].'</a>';}
						elseif($row->media['vidtype']=='bc'){echo '<strong>BitChute:</strong><br /><a href="https://bitchute.com/video/'.$row->media['bcvid'].'" target="_blank">'.$row->media['bcvid'].'</a>';}
						elseif(($row->media['vidtype']=='ovid')&&($row->media!='')){echo '<strong>Video<br /><a href="'.$row->media.'" target="_blank">FILE</a></strong>';}
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
				<div class="brick">
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<!--<a href="#delete_<?php echo $row->id; ?>" data-modal-open class="del-btn">&#10006; Delete</a>-->
				</div>
			</div>
			<?php include('inc/edit_weekday.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>'?>	
	</div>
</div>  
<?php include('add_record.php'); ?>

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