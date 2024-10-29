<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];

$entitiesdatapath = 'data/entities.xml';
$csvdir = realpath(__DIR__. '/../../..').'/repo/data/csv/';
$file = simplexml_load_file('data/entities.xml');
$fc = $file->count();
$dgfile = simplexml_load_file('data/groups.xml');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUDE Entities Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Entity</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $entitiesdatapath;?>" target="_blank" class="link"><?php echo $entitiesdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php if($fc==0){echo $fc.' entities';}else{
		foreach($file->entity as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick">
					<h4><?php echo $row['title'];?></h4>
					<ul class="details">
						<li><small>ID:</small><br /><?php echo $row['id'];?></li>
						<li><small>Format:</small><br /><?php echo $row['format'];?></li>
						<li><small>Data Group:</small><br /><?php echo $row['dgroup'];?></li>
					</ul>
				</div>
				<div class="brick" style="width: 160px; margin-left: auto;">
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
				</div>
			</div>
			<?php include('inc/edit_entity.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>';}?>	
	</div>
</div>  
<?php include('inc/add_entity.php'); ?>

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