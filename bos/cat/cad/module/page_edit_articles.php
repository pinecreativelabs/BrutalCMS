<?php 
include realpath(__DIR__. '/../../..').'/sat/sos/paths.php';
$getbasestyle = $bosdir.'bat/css/brutalist.lite.css';
$geteditor = $bosdir.'bat/css/editor.css';
$getgrid = $bosdir.'bat/css/blueprintgrid/minified/b3grid.min.css';
$ggdir = realpath(__DIR__. '/../../..').'/pat/pad/module/common.php';
require_once($ggdir);
checkUser();
$caddatapath = 'data/articles.xml'; 
$cadtopixpath = 'data/topics.csv';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CAD Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $getbasestyle;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $geteditor;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $getgrid;?>">

</head>
<body>
<?php $file = simplexml_load_file('data/articles.xml'); ?>
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Article</a>
<!--<h1 class="brick"><?php echo $file->article->count().' articles'; ?></h1>-->
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p><?php echo '<strong>Editing as: </strong>'.$_SESSION['userName']; ?></p>
	<p>Data: <a href="<?php echo $caddatapath;?>" target="_blank" class="link"><?php echo $caddatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php if($file->article->count()<=0){echo '<p><strong>[NO ARTICLES]</strong></p>';}else{ 
		foreach($file->article as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw60 xs-100 sm-100 md-100">
					<h4 class="title"><?php echo $row->title; ?></h4>
					<ul class="details">
						<li><small>AID:</small><br /><?php echo $row['aid'];?></li>
						<li><small>Author:</small><br /><?php echo $row['user']; ?></li>
						<li><small>Topic:</small><br /><?php echo $row->post['tag']; ?></li>
						<li><small>Active:</small><br /><?php echo $row->post['active']; ?></li>
						<li><small>Posted:</small><br /><?php echo $row->post['dip']; ?></li>
						<?php if( (!empty($row->post['dep'])) && ($row->post['dep']>=date('Y-m-d')) ){ ?>
						<li><small>Expires:</small><br /><?php echo $row->post['dep'];?></li>
						<?php } elseif( ($row->post['dep']<date('Y-m-d'))&&(!empty($row->post['dep'])) ) { ?>
						<li><small>Expires:</small><br />[EXPIRED]</li><?php } else { ?><li><small>Expires:</small><br />[NEVER]</li>
						<?php } ?>
					</ul>
				</div>
				<div class="brick center" style="width: 160px;">
					<p><?php if(($row->pic !='')||(!empty($row->pic))){ ?><img src="<?php echo $row->pic;?>" class="small-thumb crop" /><?php } else { echo 'NO PIC';} ?></p>
				</div>
				<div class="brick center" style="width: 160px; margin-left: auto;">
					<?php if($_SESSION['userName']==$row['user']){ ?>
					<a href="#edit_<?php echo $row['aid']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a><br />
					<a href="#delete_<?php echo $row['aid']; ?>" data-modal-open class="del-btn">&#10006; Delete</a><?php } ?>
				</div>
			</div>
			<?php include('inc/edit_article.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>';}?>	
	</div>
</div>  
<?php include('inc/add_article.php'); ?>

<!-- Initiate modal -->
<div class="modal">
	<div class="modal-inner draggable">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="<?php echo $bosdir;?>bat/jab/functions/modal.js"></script>

</body>
</html>