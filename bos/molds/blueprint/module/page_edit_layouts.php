<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];

$layoutsdatapath = 'data/layouts.xml'; 
$file = simplexml_load_file('data/layouts.xml');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blueprint Themes Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		.modal-content .tabs .tab .brick-wrap {list-style-type: none; margin: 0; padding: 0;}
		.modal-content .tabs .tab .brick-wrap li {
			background: #fff; border: 1px solid #333;
			-webkit-border-radius: 6px; border-radius: 6px; margin: 4px;;
		}
		.modal-content .tabs .tab .brick-wrap.fullwidth li {width: 95%;}
		.modal-content .tabs .tab .brick-wrap li img {width: 60px; height: 60px; margin: 6px;}
		.modal-content .tabs .tab .brick-wrap li input[type="radio"]:checked ~ img {border: 3px solid #ff0000;}
		@media only screen and (max-width: 1199px){
			.modal-content .tabs .tab .brick-wrap li img {width: 50px; height: 50px; margin: 6px;}
		}
		@media only screen and (max-width: 760px){
			.modal-content .tabs .tab .brick-wrap li img {width: 40px; height: 40px; margin: 6px;}
		}
	</style>
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Layout</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $layoutsdatapath;?>" target="_blank" class="link"><?php echo $layoutsdatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php foreach($file->layout as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw25 xs-100 sm-100 md-100">
					<h4><?php echo $row['title'];?></h4>
					<ul class="details">
						<li><small>ID: <?php echo $row['id'];?></small></li>
						<li><small><?php echo $row['method'];?></small></li>
						<?php if(($row['method']!='bento')||($row['method']!='cssgrid')){?>
						<li><small><?php echo $row['cols'].'x'.$row['rows'];?></small></li><?php } ?>
					</ul>
				</div>
				<div class="brick" style="width: 160px; margin-left: auto;">
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<?php if (++$i != 1){?><a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a><?php } ?>
				</div>
			</div>
			<?php include('inc/edit_layout.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>'?>	
	</div>
</div>  
<?php include('inc/add_layout.php'); ?>

<!-- Initiate modal -->
<div class="modal"><div class="modal-inner">
	<span data-modal-close>&times;</span>
	<div class="modal-content"></div>
</div></div>
<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>

</body>
</html>