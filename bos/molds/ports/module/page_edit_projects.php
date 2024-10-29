<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$datapath = 'data/projects.xml';
$file = simplexml_load_file('data/projects.xml');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Project Manager</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Project</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<!--<h1 class="brick"><?php echo $file->project->count().' projects'; ?></h1>-->
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p><?php echo '<strong>Editing as: </strong>'.$current_user; ?></p>
	<p>Data: <a href="<?php echo $datapath;?>" target="_blank" class="link"><?php echo $datapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php if($file->project->count()<=0){echo '<p><strong>[NO PROJECTS]</strong></p>';}else{ 
		foreach($file->project as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw60 xs-100 sm-100 md-100">
					<h4 class="title"><?php echo ucwords($row['title']); ?></h4>
					<ul class="details">
						<li><small>ID:</small><br /><?php echo $row['id'];?></li>
						<li><small>Owner:</small><br /><?php echo $row['owner']; ?></li>
						<li><small>Status:</small><br /><?php echo $row->status; ?></li>
						<li><small>Progress:</small><br /><?php echo $row->status['progress'];?>%</li>
						<li><small>Deadline:</small><br /><?php echo $row->deadline;?></li>
						<li><small>Priority:</small><br /><?php echo $row->priority;?></li>
					</ul>
				</div>
				<div class="brick center" style="width: 160px; margin-left: auto;">
					<?php if($_SESSION['userName']==$row['owner']){ ?>
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a><?php } ?>
				</div>
			</div>
			<?php include('inc/edit_project.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>';}?>	
	</div>
</div>  
<?php include('inc/add_project.php'); ?>

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