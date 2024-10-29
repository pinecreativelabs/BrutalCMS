<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];

$pagesdatapath = 'data/pages.xml';
$pagesconfigdata = 'data/config.csv';
$sysdefaultdata = realpath(__DIR__. '/../../..').'/sat/sos/system/data/defaults.csv';
$themefile = simplexml_load_file (realpath(__DIR__. '/../../..').'/bat/blueprint/module/data/themes.xml');
$layoutfile = simplexml_load_file (realpath(__DIR__. '/../../..').'/bat/blueprint/module/data/layouts.xml');
$getbasestyle = $bosdir.'bat/css/brutalist.lite.css';
$geteditor = $bosdir.'bat/css/editor.css';
$getgrid = $bosdir.'bat/css/blueprintgrid/minified/b3grid.min.css';

if (($dhandle = fopen($sysdefaultdata, "r")) !== FALSE) {
	while (($pdata = fgetcsv($dhandle, 1000, ",")) !== FALSE) {
		$row++;
		$sitename = $pdata[0];
		$mailto = $pdata[1];
		$ddf = $pdata[2];
		$dtf = $pdata[3];
		$default_theme = $pdata[4];
		$fam_curl_mode = $pdata[5];
	} fclose($dhandle);
}

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

$file = simplexml_load_file('data/pages.xml');
$pgcount = $file->page->count();
$pggroup = simplexml_load_file('data/groups.xml');
$fc = $file->count();
$last_item = $file->xpath('//page[last()]');
$last_pgid = (int) $last_item[0]['id'];
$new_pgid = $last_pgid + 1;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PAGES Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Page</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $pagesdatapath;?>" target="_blank" class="link"><?php echo $pagesdatapath;?></a> | <strong><?php echo $pgcount; ?></strong> pages</p>
	<p><?php echo 'Editing as: <strong>'.$current_user; ?></strong> with PAL <?php echo $user_pal; ?> permissions</p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php if($fc==0){echo $fc.' pages';}else{
		foreach($file->page as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick">
					<?php if($row['type']=='public'){$pgicon = '<i class="con">&#127760;</i>';}
					elseif($row['type']=='private'){$pgicon='<i class="con">&#128274;</i>';}
					elseif($row['type']=='hidden'){$pgicon='<i class="con">&#128373;</i>';} else{$pgicon='<i class="con">&#9965;</i>';}?>				
					<h4><?php echo $pgicon.' '.$row['title'];?></h4>
					<p><small>author: <?php echo $row['author']; ?></small></p>
				</div>
				<div class="brick" style="margin-left: auto;">
					<?php if($pgs_permission=='extended'){
					if(($user_pal=='2')||($user_pal=='3')||($user_pal=='1')){ ?>
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<?php if($pgs_genmode=='full'){?><a href="#generate_<?php echo $row['id']; ?>" data-modal-open class="generate-btn<?php if($row->loc['generated']=='1'){echo ' disabled';} ?>">&#128171;</a><?php } ?>
					<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn-o">&#10006;</a>
					<?php } } else {if(($user_pal=='2')||($user_pal=='3')){ ?>
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<?php if($pgs_genmode=='full'){?><a href="#generate_<?php echo $row['id']; ?>" data-modal-open class="generate-btn<?php if($row->loc['generated']=='1'){echo ' disabled';} ?>">&#128171;</a><?php } ?>
					<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn-o">&#10006;</a>
					<?php }} ?>
				</div>
			</div>
			<?php 
			if($pgs_permission=='extended'){
				if(($user_pal=='2')||($user_pal=='3')||($user_pal=='1')){
					include('inc/edit_page.php'); 
					if($pgs_genmode=='full'){ include ('inc/generate_page.php');} 
				} 
			} else {
				if(($user_pal=='2')||($user_pal=='3')){
					include('inc/edit_page.php'); 
					if($pgs_genmode=='full'){ include ('inc/generate_page.php');} 
				} 
			}
			?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>';}?>	
	</div>
</div>  
<?php include('inc/add_page.php'); ?>

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