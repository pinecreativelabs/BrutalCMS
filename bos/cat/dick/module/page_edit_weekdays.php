<?php 
include realpath(__DIR__. '/../../..').'/sat/sos/paths.php';
$getbasestyle = $bosdir.'bat/css/brutalist.lite.css';
$geteditor = $bosdir.'bat/css/editor.css';
$getgrid = $bosdir.'bat/css/blueprintgrid/minified/b3grid.min.css';
$dickweekdaysdatapath = 'data/weekdays.xml'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DICK Weekdays Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $getbasestyle;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $geteditor;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $getgrid;?>">

</head>
<body>
<?php $file = simplexml_load_file('data/weekdays.xml'); ?>
<!--<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New</a>
<h1 class="brick"><?php echo $file->day->count().' days'; ?></h1>-->
<header>
	<div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $dickweekdaysdatapath;?>" target="_blank" class="link"><?php echo $dickweekdaysdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php foreach($file->day as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw50 xs-100 sm-100">
					<h4><?php echo $row['dow'];?></h4>
					<p><strong>ID: </strong><?php echo $row->id; ?><br />
						<strong>TITLE: </strong><?php echo $row->title; ?><br />
						<strong>Active: </strong><?php echo $row->active; ?><br />
						<?php if(!empty($row->link)){?><a href="<?php echo $row->link; ?>" target="_blank">HYPERLINK</a> <small>[<?php echo $row->target; ?>]</small><?php } ?>
					</p>
				</div>
				<div class="brick">
					<p><strong>COLORS</strong><br /><span class="color-sample" style="background: <?php echo $row->colors['pcolor'];?>;"></span> Primary<br />
					<span class="color-sample" style="background: <?php echo $row->colors['scolor'];?>;"></span> Secondary<br />
					<span class="color-sample" style="background: <?php echo $row->colors['tcolor'];?>;"></span> Tertiary
					</p>
				</div>
				<div class="brick" style="min-width: 150px; text-align: center;">
					<p><?php if($row->vtype == 'yt'){ echo 'YouTube<br /><strong>VID:</strong><br /><a href="https://youtu.be/'.$row->vid.'" target="_blank">'.$row->vid.'</a>';}
					elseif($row->vtype =='vimeo'){ echo 'Vimeo<br /><strong>VID:</strong><br /><a href="https://vimeo.com/'.$row->vid.'" target="_blank">'.$row->vid.'</a>';}
					elseif($row->vtype=='other'){echo 'Video<br /><a href="'.$row->dpic.'" target="_blank"><strong>FILE</strong></a>';}
					else { if(($row->dpic !='')||(!empty($row->dpic))){ ?>
					<img src="<?php echo $row->dpic;?>" class="medium-thumb crop" />
					<?php } else { echo 'NO PIC';}} ?></p>
				</div>
				<div class="brick">
					<a href="#edit_<?php echo $row->id; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
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
	<div class="modal-inner draggable">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="<?php echo $bosdir; ?>bat/jab/functions/modal.js"></script>

</body>
</html>