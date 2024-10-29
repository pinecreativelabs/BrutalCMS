<?php 
include realpath(__DIR__. '/../../..').'/sat/sos/paths.php';
$getbasestyle = $bosdir.'bat/css/brutalist.lite.css';
$geteditor = $bosdir.'bat/css/editor.css';
$getgrid = $bosdir.'bat/css/blueprintgrid/minified/b3grid.min.css';
$ggdir = realpath(__DIR__. '/../../..').'/pat/pad/module/common.php';
require_once($ggdir);
checkUser();
$pagesconfigdata = 'data/config.csv';
$sitemapfile = realpath(__DIR__. '/../../../..').'/sitemap.xml';
$sitemap_url = $bdir.'/sitemap.xml';

$row = 0;
// get module default data
if (($handlepgscd = fopen($pagesconfigdata, "r")) !== FALSE) {
	while (($data = fgetcsv($handlepgscd, 1000, ",")) !== FALSE) {
		$row++;
		$pgs_genmode = $data[0];
		$pgs_loc = $data[1];
		$pgs_permission = $data[2];
		$pgs_meta = $data[3];
	} fclose($handlepgscd);
}

$pfile = simplexml_load_file('data/pages.xml');
$file = simplexml_load_file($sitemapfile);
$pgcount = $file->url->count();
$pggroup = simplexml_load_file('data/groups.xml');
$fc = $file->count();
$last_item = $file->xpath('//url[last()]');
$last_pgid = (int) $last_item[0]['id'];
$new_pgid = $last_pgid + 1;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SITEMAP Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body>
<a href="#addnew" class="add-btn brick" data-modal-open>&#10056; Generate</a>
<a href="#clearsitemap" class="danger-btn brick" data-modal-open>Clear Sitemap</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $sitemap_url;?>" target="_blank" class="link">../sitemap.xml</a> | <strong><?php echo $pgcount; ?></strong> pages</p>
	<p><?php echo 'Editing as: <strong>'.$_SESSION['userName']; ?></strong> with <?php echo $ugroup; ?> permissions</p>
	<p><?php echo $bdir;?></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php if($fc==0){echo $fc.' pages';}else{
		foreach($file->url as $row){
			$getlastmod = $row->lastmod;
			$lmodid = str_replace(str_split('-:+'),'',$getlastmod);
			$headers = @get_headers($row->loc.'.php');
			if($headers && strpos( $headers[0], '200')) { $status = 'live';}else{$status='<span style="color: #ff0000;">unavailable</span>';}?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick">			
					<h4><a href="<?php echo $row->loc.'.php';?>" target="_blank"><?php echo '/'.str_replace($bdir,'',$row->loc);?></a></h4>
					<ul class="details">
						<li><small>STATUS:</small><br /><?php echo $status; ?></li>
						<li><small>Change Frequency:</small><br /><?php echo $row->changefreq;?></li>
						<li><small>Priority:</small><br /><?php echo $row->priority;?></li>
						<li><small>Last Modified:</small><br /><?php echo substr($row->lastmod,0,10);?></li>
					</ul>
				</div>
				<div class="brick" style="margin-left: auto;">
					<?php if($pgs_permission=='extended'){
					if(($ugroup=='administrator')||($ugroup=='BOS Admin')||($ugroup=='editor')){ ?>
					<a href="#edit_<?php echo $lmodid; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#delete_<?php echo $lmodid; ?>" data-modal-open class="del-btn-o">&#10006;</a>
					<?php } } else {if(($ugroup=='administrator')||($ugroup=='BOS Admin')){ ?>
					<a href="#edit_<?php echo $lmodid; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#delete_<?php echo $lmodid; ?>" data-modal-open class="del-btn-o">&#10006;</a>
					<?php }} ?>
				</div>
			</div>
			<?php 
			if($pgs_permission=='extended'){
				if(($ugroup=='administrator')||($ugroup=='BOS Admin')||($ugroup=='editor')){
					include('inc/edit_url.php'); 
				} 
			} else {
				if(($ugroup=='administrator')||($ugroup=='BOS Admin')){
					include('inc/edit_url.php'); 
				} 
			}
			?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>';}?>	
	</div>
</div>  
<?php include('inc/generate_sitemap.php');
include('inc/clear_sitemap.php'); ?>

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