<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];

$caddatapath = 'data/articles.xml';
$file = simplexml_load_file('data/articles.xml');
$catfile = simplexml_load_file('data/cats.xml');
$tagfile = simplexml_load_file('data/tags.xml');
$cadcat_selector = '<select name="category">'.PHP_EOL;
$cadtag_selector = '<select name="tag">'.PHP_EOL;
if($catfile->cat->count()<=0){$cadcat_selector.='<option value="unspecified">unspecified</option>'.PHP_EOL;}else{ 
	foreach($catfile->cat as $cat){
		$cadcat_selector.='<option value="'.$cat['title'].'">'.$cat['title'].'</option>'.PHP_EOL;
	}
}
if($tagfile->tag->count()<=0){$cadtag_selector.='<option value="untagged">untagged</option>'.PHP_EOL;}else{ 
	foreach($tagfile->tag as $tag){
		$cadtag_selector.='<option value="'.$tag['title'].'">'.$tag['title'].'</option>'.PHP_EOL;
	}
}
$cadcat_selector .= '</select>'.PHP_EOL;
$cadtag_selector .= '</select>'.PHP_EOL;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CAD Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Article</a>
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
		<?php if($file->article->count()<=0){echo '<p><strong>[NO ARTICLES]</strong></p>';}else{ 
		foreach($file->article as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw60 xs-100 sm-100 md-100">
					<h4 class="title"><?php echo $row->title; ?></h4>
					<ul class="details">
						<li><small>AID:</small><br /><?php echo $row['aid'];?></li>
						<li><small>Author:</small><br /><?php echo $row['user']; ?></li>
						<li><small>Category:</small><br /><?php echo $row->post['cat']; ?></li>
						<li><small>Active:</small><br /><?php echo $row->post['active']; ?></li>
						<li><small>Posted:</small><br /><?php echo $row->post['dip']; ?></li>
						<?php if( (!empty($row->post['dep'])) && ($row->post['dep']>=date('Y-m-d')) ){ ?>
						<li><small>Expires:</small><br /><?php echo $row->post['dep'];?></li>
						<?php } elseif( ($row->post['dep']<date('Y-m-d'))&&(!empty($row->post['dep'])) ) { ?>
						<li><small>Expires:</small><br />[EXPIRED]</li><?php } else { ?><li><small>Expires:</small><br />[NEVER]</li>
						<?php } ?>
					</ul>
				</div>
				<div class="brick center" style="width: 160px;">
					<p><?php if(($row->pic !='')||(!empty($row->pic))){ ?><img src="<?php echo $row->pic;?>" class="small-thumb crop" /><?php } else { echo 'NO PIC';} ?></p>
				</div>
				<div class="brick center" style="width: 160px; margin-left: auto;">
					<?php if($current_user==$row['user']){ ?>
					<a href="#edit_<?php echo $row['aid']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#delete_<?php echo $row['aid']; ?>" data-modal-open class="del-btn">&#10006;</a><?php } ?>
				</div>
			</div>
			<?php include('inc/edit_article.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>';}?>	
	</div>
</div>  
<?php include('inc/add_article.php'); ?>

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