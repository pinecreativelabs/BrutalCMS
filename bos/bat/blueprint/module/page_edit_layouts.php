<?php 
include realpath(__DIR__. '/../../..').'/sat/sos/paths.php';
$getbasestyle = $bosdir.'bat/css/brutalist.lite.css';
$geteditor = $bosdir.'bat/css/editor.css';
$getgrid = $bosdir.'bat/css/blueprintgrid/minified/b3grid.min.css';
$layoutsdatapath = 'data/layouts.xml'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blueprint Themes Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $getbasestyle;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $geteditor;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $getgrid;?>">

</head>
<body>
<?php $file = simplexml_load_file('data/layouts.xml'); ?>
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Layout</a>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $layoutsdatapath;?>" target="_blank" class="link"><?php echo $layoutsdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php foreach($file->layout as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw25 xs-100 sm-100 md-100">
					<h4><?php echo $row['title'];?></h4>
					<ul class="details">
						<li><small>ID:</small><br /><?php echo $row['id'];?></li>
						<li><small>Method:</small><br /><?php echo $row['method'];?></li>
						<li><small>CxR:</small><br /><?php echo $row['cols'].'x'.$row['rows'];?></li>
					</ul>
				</div>
				<div class="brick bw15 xs-100 sm-100">
					<p style="margin-top: 10px;"><strong>Units</strong></p>
					<ul class="details">
						<li><small>Col-width:</small><br /><?php echo $row->column['width'].$row->column['x-unit'];?></li>
						<?php if(!empty($row->column['height'])){?><li><small>Row-height:</small><br /><?php echo $row->column['height'].$row->column['y-unit'];?></li><?php } ?>
					</ul>
				</div>
				<div class="brick">
					<p style="margin-top: 10px;"><strong>Responsive Rules</strong></p>
					<ul class="details">
						<?php if(!empty($row->rules['xxs'])){?><li><small>XXS:</small><br /><?php echo $row->rules['xs'];?></li><?php } ?>
						<?php if(!empty($row->rules['xs'])){?><li><small>XS:</small><br /><?php echo $row->rules['xs'];?></li><?php } ?>
						<?php if(!empty($row->rules['sm'])){?><li><small>SM:</small><br /><?php echo $row->rules['sm'];?></li><?php } ?>
						<?php if(!empty($row->rules['md'])){?><li><small>MD:</small><br /><?php echo $row->rules['md'];?></li><?php } ?>
						<?php if(!empty($row->rules['lg'])){?><li><small>LG:</small><br /><?php echo $row->rules['lg'];?></li><?php } ?>
						<?php if(!empty($row->rules['xl'])){?><li><small>XL:</small><br /><?php echo $row->rules['xl'];?></li><?php } ?>
						<?php if(!empty($row->rules['xxl'])){?><li><small>XXL:</small><br /><?php echo $row->rules['xxl'];?></li><?php } ?>
					</ul>
				</div>
				<div class="brick" style="width: 160px; margin-left: auto;">
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a><br />
					<?php if (++$i != 1){?><a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006; Delete</a><?php } ?>
				</div>
			</div>
			<?php include('inc/edit_layout.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>'?>	
	</div>
</div>  
<?php include('inc/add_layout.php'); ?>

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