<?php $datagroupsdatapath = 'data/groups.xml';
include realpath(__DIR__. '/../../..').'/sat/sos/paths.php';
$getbasestyle = $bosdir.'bat/css/brutalist.lite.css';
$geteditor = $bosdir.'bat/css/editor.css';
$getgrid = $bosdir.'bat/css/blueprintgrid/minified/b3grid.min.css';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUDE Groups Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $getbasestyle;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $geteditor;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $getgrid;?>">

</head>
<body>
<?php $file = simplexml_load_file('data/groups.xml'); ?>
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Group</a>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $datagroupsdatapath;?>" target="_blank" class="link"><?php echo $datagroupsdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php foreach($file->datagroup as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick">
					<h4><?php echo $row['title'];?></h4>
					<ul class="details">
						<li><small>ID:</small><br /><?php echo $row['id'];?></li>
						<li><small>Description:</small><br /><?php echo $row['description'];?></li>
						<li><small>Type:</small><br /><?php echo $row['type'];?></li>
					</ul>
				</div>
				<div class="brick" style="width: 160px; margin-left: auto;">
					<?php if (++$i != 1){?><a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a><br />
					<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006; Delete</a><?php } ?>
				</div>
			</div>
			<?php include('inc/edit_group.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>'?>	
	</div>
</div>  
<?php include('inc/add_group.php'); ?>

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