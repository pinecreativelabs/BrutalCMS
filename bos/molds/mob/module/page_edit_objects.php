<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$objectsdatapath = 'data/objects.xml';
$propertydatapath = 'data/properties.xml';
$file = simplexml_load_file('data/objects.xml');
$properties = simplexml_load_file('data/properties.xml');
$fc = $file->count();
$pfc = $properties->count();
// create property checklist 
$property_checklist = '<div class="form-group"><ul class="checkbox-group">'.PHP_EOL;
foreach($properties->property as $pcrow){ if($pcrow['active']=='true'){if($pcrow['id']!='mop-0'){
	$property_checklist.='<li><input type="checkbox" name="mops[]" value="'.$pcrow['id'].'" />'.$pcrow['title'].'</li>';
}}}
$property_checklist.='</ul></div>'.PHP_EOL;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MOB Objects</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		small{font-size: 80%;}
		.limebox{border-radius: 1rem; border: 1px solid #00ff00; padding: 1rem;}
		.limebox h3 {font-weight: 600; margin: 0; padding: 8px; background: #00ff00; color: #000;}
		.edit-btn, .del-btn, .mark-btn {min-width: initial;}
		details summary {background: #00ff00; color: #000; font-weight: 600; text-transform: uppercase;}
		.details {padding: 8px 8px 32px 8px;}
		a,a:link,a:visited{color: #ffff00; border-bottom: 1px dotted #ffff00;}
		a:hover{color: #ff0000; border-bottom: 1px dotted #ff0000;}
		.tabs label {font-weight: 900; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0; background: #0f0; color: #000;}
		.tabs .tab {background: #000; color: #0f0; padding: 1em; border: none;}
		.modal-content .tabs .tab {background:#fff;}
	</style>
</head>
<body class="scrollable">
<a href="#addobject" class="add-btn brick" data-modal-open>&#10010; Object</a>
<a href="#addproperty" class="add-btn brick" data-modal-open>&#10010; Property</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Object Data: <a href="<?php echo $objectsdatapath;?>" target="_blank" class="link"><?php echo $objectsdatapath;?></a><br />
	Property Data: <a href="<?php echo $propertydatapath;?>" target="_blank" class="link"><?php echo $propertydatapath;?></a></p>
	<p><?php echo 'Editing as: <strong>'.$current_user; ?></strong></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		
		<div class="block bw100"><div style="padding: 1rem;"><div class="tabs">
			<input type="radio" name="sadtabs" id="tab1" checked="checked">
			<label for="tab1">Objects (<?php echo $fc;?>)</label>
			<div class="tab"><div class="limebox">
				<?php if($fc==0){echo $fc.' objects';}else{
					foreach($file->object as $row){ 
						$mopsarray = $row->mops;
						if($row->mops!=''){ $newmoparray = explode(',',$row->mops);}else {$newmoparray = array();}
						$mopcount = count($newmoparray);
					?>
				<div class="block bw100 record">
					<div class="brick-wrap">
						<div class="brick">
							<h4><?php echo $row['title'];?></h4>
							<ul class="details">
								<?php if($row['active']=='false'){?><li><small><span style="color:red;">inactive</span></small></li><?php } ?>
								<li><small><?php echo $row['type'];?></small></li>
								<li><small><?php echo $mopcount;?> properties</small></li>
							</ul>
						</div>
						<div class="brick" style="width: 160px; margin-left: auto;">
							<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
							<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
						</div>
					</div>
					<?php include('inc/edit_object.php'); ?>
				</div>
				<?php }} ?>
			</div></div>
			<input type="radio" name="sadtabs" id="tab2">
			<label for="tab2">Properties (<?php echo $pfc;?>)</label>
			<div class="tab"><div class="limebox">
				<?php if($pfc==0){echo $pfc.' properties';}else{
					$multiopts = array('checkbox','select','radio');
					foreach($properties->property as $prow){ 
						if(in_array($prow['type'],$multiopts)){
							$is_opts=true;
							$optarray = $prow->options;
							if($prow->options!=''){ $newoptarray = explode(',',$prow->options);}else {$newoptarray = array();}
							$noac = count($newoptarray);
							$newoptlist = '<select name="'.$prow['handle'].'">'.PHP_EOL;
							for($i=0; $i < count($newoptarray); $i++) {
								$newoptlist .='<option value="'.$newoptarray[$i].'">'.$newoptarray[$i].'</option>'.PHP_EOL;
							}
							$newoptlist.='</select>'.PHP_EOL;
						} else {$is_opts=false;}
					?>
				<div class="block bw100 record">
					<div class="brick-wrap">
						<div class="brick">
							<h4><?php echo $prow['title'];?></h4>
							<ul class="details">
								<?php if($prow['active']=='false'){?><li><small><span style="color:red;">inactive</span></small></li><?php } ?>
								<li><small><?php echo $prow['type'];?></small></li>
								<?php if(($prow['req']=='y')||($prow['ro']=='1')){ if($prow['req']=='y'){?>
								<li><small>required</small></li><?php } if($prow['ro']=='1'){?>
								<li><small>readonly</small></li>
								<?php }} ?>
								<?php if($is_opts==true){ ?><li><small><?php echo $noac;?> options</small></li><?php } ?>
								<?php if($prow['type']=='hidden'){if($prow['hit']!='none'){ ?><li><small><?php echo $prow['hit'];?></small></li><?php }} ?>
							</ul>
							<?php if($is_opts==true){ if($noac>0){echo $newoptlist;}}?>
						</div>
						<div class="brick" style="width: 160px; margin-left: auto;">
							<a href="#edit_<?php echo $prow['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
							<?php if($prow['id']!='mop-0'){?><a href="#delete_<?php echo $prow['id']; ?>" data-modal-open class="del-btn">&#10006;</a><?php } ?>
						</div>
					</div>
					<?php include('inc/edit_property.php'); ?>
				</div>
				<?php }} ?>
			</div></div>


		</div></div></div>
	</div>
</div>
<?php include('inc/add_object.php');
include('inc/add_property.php'); ?>
<div style="display: none;" id="nopageavail">
	<div class="container" style="max-width: 468px;"><div class="padded">
		<p class="warningbox center"><span class="flow-text"><strong>PAGE UNAVAILABLE.</strong></span><br />This page has not been generated yet.</p>
	</div></div>
</div>
<!-- Initiate modal -->
<div class="modal"><div class="modal-inner">
	<span data-modal-close>&times;</span>
	<div class="modal-content"></div>
</div></div>
<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>
</body>
</html>