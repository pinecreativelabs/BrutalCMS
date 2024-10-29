<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];

$themesdatapath = 'data/themes.xml';
$file = simplexml_load_file('data/themes.xml');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blueprint Themes Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Theme</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $themesdatapath;?>" target="_blank" class="link"><?php echo $themesdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php foreach($file->theme as $row){ 
			$etagsarray = $row->elementags;
			if($row->elementags!=''){ $newetagsarray = explode(',',$row->elementags);}else {$newetagsarray = array();}
			$etagscount = count($newetagsarray);
		?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw40 xs-100 sm-100 md-100">
					<h4><?php echo $row['title'];?></h4>
					<ul class="details" style="display: flex; align-items: flex-start;">
						<li><small>ID:</small><br /><?php echo $row['id'];?></li>
						<li><small>Active:</small><br /><?php echo $row['active'];?></li>
						<li><small>Type:</small><br /><?php echo $row['type'];?></li>
						<li><small>Colors:</small><br /><span class="color-sample" style="background: <?php echo $row->colors['primary'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->colors['secondary'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->colors['tertiary'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->colors['links'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->colors['accent'];?>;"></span>
						<span class="color-sample" style="background: <?php echo $row->colors['other'];?>;"></span>
						</li>
					</ul>
				</div>
				<div class="brick" style="width: 160px; margin-left: auto;">
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<?php if (++$i > 4){?><a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a><?php } ?>
				</div>
			</div>
			<?php include('inc/edit_theme.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>'?>	
	</div>
</div>  
<?php include('inc/add_theme.php'); ?>

<!-- Initiate modal -->
<div class="modal"><div class="modal-inner">
	<span data-modal-close>&times;</span>
	<div class="modal-content"></div>
</div></div>

<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>

</body>
</html>