<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$datapath = 'data/ugroups.xml';
$ugroupsfile = simplexml_load_file('data/ugroups.xml');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Groups Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Group</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>

<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $datapath;?>" target="_blank" class="link"><?php echo $datapath;?></a></p>
	<p><?php echo 'Editing as: <strong>'.$current_user; ?></strong></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		
	<?php foreach($ugroupsfile->ugroup as $ugroup){
		$ugid = $ugroup['id'];
		$title = $ugroup['title'];
		$active = $ugroup['active'];
		$pal = $ugroup['pal'];
		$type = $ugroup['type'];
		$desc = $ugroup->description;
	?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick">
					<h4><?php echo $title;?></h4>
					<ul class="details">
						<li><small>ID:</small><br /><?php echo $ugid;?></li>
						<li><small>Active:</small><br /><?php echo $active; ?></li>
						<li><small>PAL:</small><br /><?php echo $pal;?></li>
						<li><small>Type:</small><br /><?php echo $type;?></li>
					</ul>
				</div>
				<div class="brick" style="margin-left: auto;">
					<a href="#edit_<?php echo $ugid; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<?php if(($ugid!='0')&&($ugid!='1')&&($ugid!='2')&&($ugid!='3')){?><a href="#delete_<?php echo $ugid; ?>" data-modal-open class="del-btn-o">&#10006;</a><?php } ?>
				</div>
			</div>
			<?php include('inc/edit_ugroup.php'); ?>
		</div>
	<?php } ?>
		
		
	</div>
	
</div>  
<?php include('inc/add_ugroup.php'); ?>

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