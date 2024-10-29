<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$streamsdatapath = $bosdir.'app/users/'.$current_user.'/data/streams.xml';
$streamsfile = simplexml_load_file(realpath(__DIR__.'/../../../app/users/'.$current_user.'/data/streams.xml'));
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Stream Manager</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Stream</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>

<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $streamsdatapath;?>" target="_blank" class="link">streams.xml</a></p>
	<p><?php echo 'Editing as: <strong>'.$_SESSION['userName'].' (UID: '.$uid.')'; ?></strong></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
	<?php if($streamsfile->stream->count()<=0){echo '<p><strong>[NO CREATED STREAMS]</strong></p>';}else{
	foreach($streamsfile->stream as $stream){
		$sid = $stream['id'];
		$title = $stream['title'];
		$active = $stream['active'];
		$type = $stream['type'];
		$description = $stream->description;
	?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick">
					<h4><?php echo $title;?></h4>
					<ul class="details">
						<li><small>ID:</small><br /><?php echo $sid;?></li>
						<li><small>Type:</small><br /><?php echo $type;?></li>
						<li><small>Active:</small><br /><?php echo $active; ?></li>
					</ul>
				</div>
				<div class="brick" style="margin-left: auto;">
					<a href="#edit_<?php echo $sid; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#delete_<?php echo $sid; ?>" data-modal-open class="del-btn-o">&#10006;</a>
				</div>
			</div>
			<?php include('inc/edit_stream.php'); ?>
		</div>
	<?php } } ?>
	</div>
</div>  
<?php include('inc/add_stream.php'); ?>

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