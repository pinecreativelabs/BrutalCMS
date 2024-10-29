<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$caddatapath = 'data/tags.xml';
$file = simplexml_load_file('data/tags.xml');
$catfile = simplexml_load_file('data/cats.xml');
$cadcat_selector = '<select name="category">'.PHP_EOL;
if($catfile->cat->count()<=0){$cadcat_selector.='<option value="Uncategorized">Uncategorized</option>'.PHP_EOL;}else{ 
	foreach($catfile->cat as $cat){
		$cadcat_selector.='<option value="'.$cat['title'].'">'.$cat['title'].'</option>'.PHP_EOL;
	}
}
$cadcat_selector .= '</select>'.PHP_EOL;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CAD Tags Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		.tag-block {display: inline-block; margin: 1rem; border: 1px solid #0f0; border-radius: 8px;}
	</style>
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Tag</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p><?php echo '<strong>Editing as: </strong>'.$current_user; ?></p>
	<p>Data: <a href="<?php echo $caddatapath;?>" target="_blank" class="link"><?php echo $caddatapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php if($file->tag->count()<=0){echo '<p><strong>[NO TAGS]</strong></p>';}else{ 
		foreach($file->tag as $row){ ?>
		<div class="tag-block record">
			<div class="brick-wrap">
				<div class="brick">
					<h4 class="title"><?php echo $row['title']; ?></h4>
					<ul class="details">
						<li><small>TAGID:</small><br /><?php echo $row['tagid'];?></li>
						<li><small>Category</small><br /><?php echo $row['cat'];?></li>
					</ul>
				</div>
				<div class="brick">
					<?php if($row['tagid']!='0'){?>
					<a href="#edit_<?php echo $row['tagid']; ?>" data-modal-open class="edit-btn">&#9998;</a><br />
					<a href="#delete_<?php echo $row['tagid']; ?>" data-modal-open class="del-btn">&#10006;</a>
					<?php } ?>
				</div>
			</div>
			<?php if($row['tagid']!='0'){include('inc/edit_tag.php');} ?>
		</div>
		<?php } }?>	
	</div>
</div>  
<?php include('inc/add_tag.php'); ?>

<!-- Initiate modal -->
<div class="modal"><div class="modal-inner">
	<span data-modal-close>&times;</span>
	<div class="modal-content"></div>
</div></div>

<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>

</body>
</html>