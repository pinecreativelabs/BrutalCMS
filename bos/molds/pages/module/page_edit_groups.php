<?php  
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$datagroupsdatapath = 'data/groups.xml';
$file = simplexml_load_file('data/groups.xml');
$last_group = $file->xpath('//pagegroup[last()]');
$last_gid = (int) $last_group[0]['id'];
$new_gid = $last_gid + 1; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUDE Groups Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Group</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $datagroupsdatapath;?>" target="_blank" class="link"><?php echo $datagroupsdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php foreach($file->pagegroup as $row){ ?>
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
					<?php if (++$i > 1){?><a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a><?php } ?>
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
	<div class="modal-inner">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>

</body>
</html>