<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$moldsdatapath = 'data/molds.xml';
$file = simplexml_load_file('data/molds.xml');
$objects = simplexml_load_file('data/objects.xml');
$boards = simplexml_load_file('data/boards.xml');
$fc = $file->count();
$ofc = $objects->count();
$bfc = $boards->count();
// create object checklist 
$object_checklist = '<div class="form-group"><ul class="checkbox-group">'.PHP_EOL;
foreach($objects->object as $ocrow){ if($ocrow['active']=='true'){if($ocrow['id']!='mo-0'){
	$object_checklist.='<li><input type="checkbox" name="mos[]" value="'.$ocrow['id'].'" />'.$ocrow['title'].'</li>';
}}}
$object_checklist.='</ul></div>'.PHP_EOL;
// create board checklist
$board_checklist = '<div class="form-group"><ul class="checkbox-group">'.PHP_EOL;
foreach($boards->board as $bcrow){ if($bcrow['active']=='true'){if($bcrow['id']!='mob-0'){
	$board_checklist.='<li><input type="checkbox" name="mob[]" value="'.$bcrow['id'].'" />'.$bcrow['title'].'</li>';
}}}
$board_checklist.='</ul></div>'.PHP_EOL;
// count molds based on content type
$fc_ele_array = array();
$fc_form_array = array();
$fc_data_array = array();
$fc_ui_array = array();
$fc_other_array = array();
$fc_hid_array = array();
$fc_mm_array = array();
$fc_nav_array = array();
foreach($file->mold as $mold){
	if($mold['type']=='element'){
		$fc_ele_array[] = $mold['type'];
	} elseif($mold['type']=='form'){
		$fc_form_array[] = $mold['type'];
	} elseif($mold['type']=='data') {
		$fc_data_array[] = $mold['type'];
	} elseif($mold['type']=='ui'){
		$fc_ui_array[] = $mold['type'];
	} elseif($mold['type']=='other'){
		$fc_other_array[] = $mold['type'];
	}elseif($mold['type']=='hidden'){
		$fc_hid_array[] = $mold['type'];
	}elseif($mold['type']=='navigation'){
		$fc_nav_array[] = $mold['type'];
	}else{$fc_mm_array[] = $mold['type'];}
}
$fc_ele = count($fc_ele_array);
$fc_form = count($fc_form_array);
$fc_data = count($fc_data_array);
$fc_hid = count($fc_hid_array);
$fc_ui = count($fc_ui_array);
$fc_misc = count($fc_other_array);
$fc_nav = count($fc_nav_array);
$fc_mm = count($fc_mm_array);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MOB MOLDS</title>
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
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; Mold</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $moldsdatapath;?>" target="_blank" class="link"><?php echo $moldsdatapath;?></a></p>
	<p><?php echo 'Editing as: <strong>'.$current_user; ?></strong></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		<div class="block bw100"><div style="padding: 1rem;"><div class="tabs">
			
			<input type="radio" name="moldtabs" id="elements" checked="checked">
			<label for="elements">Elements (<?php echo $fc_ele;?>)</label>
			<div class="tab"><div class="limebox">
				<?php if($fc_ele<=0){echo 'No element molds.';} else {?>
				<div class="block-wrap">	
					<?php foreach($file->mold as $row){if($row['type']=='element'){ 
						if($row->objects!=''){ $newmoarray = explode(',',$row->objects);}else {$newmoarray = array();}
						if($row->boards!=''){ $newmbarray = explode(',',$row->boards);}else {$newmbarray = array();}
					?>
					<div class="block bw100 record">
						<div class="brick-wrap">
							<div class="brick">
								<h4><?php echo $row['title'];?></h4>
								<ul class="details">
									<li><small>ID: <?php echo $row['id'];?></small></li>
									<li><small><?php if($row['active']=='true'){echo 'active';}else {echo '<span style="color: red;">inactive</span>';}?></small></li>
									<li><small><?php echo $row['etype'];?></small></li>
								</ul>
							</div>
							<div class="brick" style="margin-left: auto;">
								<?php if($row['gem']=='0'){?><a href="#gen_<?php echo $row['id']; ?>" data-modal-open class="generate-btn">&#128171;</a><?php } ?>
								<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_mold.php'); ?>
					</div>
					<?php }} ?>	
				</div><?php } ?>
			</div></div>

			<?php if($fc_data>0){?>
			<input type="radio" name="moldtabs" id="datam">
			<label for="datam">Data (<?php echo $fc_data;?>)</label>
			<div class="tab"><div class="limebox">
				<div class="block-wrap">	
					<?php foreach($file->mold as $row){if($row['type']=='data'){
						if($row->objects!=''){ $newmoarray = explode(',',$row->objects);}else {$newmoarray = array();}
						if($row->boards!=''){ $newmbarray = explode(',',$row->boards);}else {$newmbarray = array();}
					?>
					<div class="block bw100 record">
						<div class="brick-wrap">
							<div class="brick">
								<h4><?php echo $row['title'];?></h4>
								<ul class="details">
									<li><small>ID: <?php echo $row['id'];?></small></li>
									<li><small><?php if($row['active']=='true'){echo 'active';}else {echo '<span style="color: red;">inactive</span>';}?></small></li>
									<li><small><?php echo $row['etype'];?></small></li>
								</ul>
							</div>
							<div class="brick" style="margin-left: auto;">
								<?php if($row['gem']=='0'){?><a href="#gen_<?php echo $row['id']; ?>" data-modal-open class="generate-btn">&#128171;</a><?php } ?>
								<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_mold.php'); ?>
					</div>
					<?php }} ?>	
				</div>
			</div></div>
			
			<?php } if($fc_form>0){?>
			<input type="radio" name="moldtabs" id="form">
			<label for="form">Forms (<?php echo $fc_form;?>)</label>
			<div class="tab"><div class="limebox">
				<div class="block-wrap">	
					<?php foreach($file->mold as $row){if($row['type']=='form'){ 
						if($row->objects!=''){ $newmoarray = explode(',',$row->objects);}else {$newmoarray = array();}
						if($row->boards!=''){ $newmbarray = explode(',',$row->boards);}else {$newmbarray = array();}
					?>
					<div class="block bw100 record">
						<div class="brick-wrap">
							<div class="brick">
								<h4><?php echo $row['title'];?></h4>
								<ul class="details">
									<li><small>ID: <?php echo $row['id'];?></small></li>
									<li><small><?php if($row['active']=='true'){echo 'active';}else {echo '<span style="color: red;">inactive</span>';}?></small></li>
									<li><small><?php echo $row['etype'];?></small></li>
								</ul>
							</div>
							<div class="brick" style="margin-left: auto;">
								<?php if($row['gem']=='0'){?><a href="#gen_<?php echo $row['id']; ?>" data-modal-open class="generate-btn">&#128171;</a><?php } ?>
								<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_mold.php'); ?>
					</div>
					<?php }} ?>	
				</div>
			</div></div>
			<?php } if($fc_hid>0){?>
			<input type="radio" name="moldtabs" id="hid">
			<label for="hid">Hidden (<?php echo $fc_hid;?>)</label>
			<div class="tab"><div class="limebox">
				<div class="block-wrap">	
					<?php foreach($file->mold as $row){if($row['type']=='hidden'){ 
						if($row->objects!=''){ $newmoarray = explode(',',$row->objects);}else {$newmoarray = array();}
						if($row->boards!=''){ $newmbarray = explode(',',$row->boards);}else {$newmbarray = array();}
					?>
					<div class="block bw100 record">
						<div class="brick-wrap">
							<div class="brick">
								<h4><?php echo $row['title'];?></h4>
								<ul class="details">
									<li><small>ID: <?php echo $row['id'];?></small></li>
									<li><small><?php if($row['active']=='true'){echo 'active';}else {echo '<span style="color: red;">inactive</span>';}?></small></li>
									<li><small><?php echo $row['etype'];?></small></li>
								</ul>
							</div>
							<div class="brick" style="margin-left: auto;">
								<?php if($row['gem']=='0'){?><a href="#gen_<?php echo $row['id']; ?>" data-modal-open class="generate-btn">&#128171;</a><?php } ?>
								<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_mold.php'); ?>
					</div>
					<?php }} ?>	
				</div>
			</div></div>
			<?php } if($fc_mm>0){?>
			<input type="radio" name="moldtabs" id="mm">
			<label for="mm">Multimedia (<?php echo $fc_mm;?>)</label>
			<div class="tab"><div class="limebox">
				<div class="block-wrap">	
					<?php foreach($file->mold as $row){if($row['type']=='multimedia'){ 
						if($row->objects!=''){ $newmoarray = explode(',',$row->objects);}else {$newmoarray = array();}
						if($row->boards!=''){ $newmbarray = explode(',',$row->boards);}else {$newmbarray = array();}
					?>
					<div class="block bw100 record">
						<div class="brick-wrap">
							<div class="brick">
								<h4><?php echo $row['title'];?></h4>
								<ul class="details">
									<li><small>ID: <?php echo $row['id'];?></small></li>
									<li><small><?php if($row['active']=='true'){echo 'active';}else {echo '<span style="color: red;">inactive</span>';}?></small></li>
									<li><small><?php echo $row['etype'];?></small></li>
								</ul>
							</div>
							<div class="brick" style="margin-left: auto;">
								<?php if($row['gem']=='0'){?><a href="#gen_<?php echo $row['id']; ?>" data-modal-open class="generate-btn">&#128171;</a><?php } ?>
								<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_mold.php'); ?>
					</div>
					<?php }} ?>	
				</div>
			</div></div>
			<?php } if($fc_nav>0){?>
			<input type="radio" name="moldtabs" id="nav">
			<label for="nav">Navigation (<?php echo $fc_nav;?>)</label>
			<div class="tab"><div class="limebox">
				<div class="block-wrap">	
					<?php foreach($file->mold as $row){if($row['type']=='navigation'){
						if($row->objects!=''){ $newmoarray = explode(',',$row->objects);}else {$newmoarray = array();}
						if($row->boards!=''){ $newmbarray = explode(',',$row->boards);}else {$newmbarray = array();}
					?>
					<div class="block bw100 record">
						<div class="brick-wrap">
							<div class="brick">
								<h4><?php echo $row['title'];?></h4>
								<ul class="details">
									<li><small>ID: <?php echo $row['id'];?></small></li>
									<li><small><?php if($row['active']=='true'){echo 'active';}else {echo '<span style="color: red;">inactive</span>';}?></small></li>
									<li><small><?php echo $row['etype'];?></small></li>
								</ul>
							</div>
							<div class="brick" style="margin-left: auto;">
								<?php if($row['gem']=='0'){?><a href="#gen_<?php echo $row['id']; ?>" data-modal-open class="generate-btn">&#128171;</a><?php } ?>
								<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_mold.php'); ?>
					</div>
					<?php }} ?>	
				</div>
			</div></div>
			<?php } if($fc_ui>0){?>
			<input type="radio" name="moldtabs" id="uim">
			<label for="uim">UI (<?php echo $fc_ui;?>)</label>
			<div class="tab"><div class="limebox">
				<div class="block-wrap">	
					<?php foreach($file->mold as $row){if($row['type']=='ui'){ 
						if($row->objects!=''){ $newmoarray = explode(',',$row->objects);}else {$newmoarray = array();}
						if($row->boards!=''){ $newmbarray = explode(',',$row->boards);}else {$newmbarray = array();}
					?>
					<div class="block bw100 record">
						<div class="brick-wrap">
							<div class="brick">
								<h4><?php echo $row['title'];?></h4>
								<ul class="details">
									<li><small>ID: <?php echo $row['id'];?></small></li>
									<li><small><?php if($row['active']=='true'){echo 'active';}else {echo '<span style="color: red;">inactive</span>';}?></small></li>
									<li><small><?php echo $row['etype'];?></small></li>
								</ul>
							</div>
							<div class="brick" style="margin-left: auto;">
								<?php if($row['gem']=='0'){?><a href="#gen_<?php echo $row['id']; ?>" data-modal-open class="generate-btn">&#128171;</a><?php } ?>
								<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_mold.php'); ?>
					</div>
					<?php }} ?>	
				</div>
			</div></div>
			<?php } ?>
			<input type="radio" name="moldtabs" id="misc">
			<label for="misc">Other / Misc. (<?php echo $fc_misc;?>)</label>
			<div class="tab"><div class="limebox">
				<?php if($fc_misc<=0){echo 'No miscellaneous molds.';} else { ?>
				<div class="block-wrap">	
					<?php foreach($file->mold as $row){if($row['type']=='other'){ 
						if($row->objects!=''){ $newmoarray = explode(',',$row->objects);}else {$newmoarray = array();}
						if($row->boards!=''){ $newmbarray = explode(',',$row->boards);}else {$newmbarray = array();}
					?>
					<div class="block bw100 record">
						<div class="brick-wrap">
							<div class="brick">
								<h4><?php echo $row['title'];?></h4>
								<ul class="details">
									<li><small>ID: <?php echo $row['id'];?></small></li>
									<li><small><?php if($row['active']=='true'){echo 'active';}else {echo '<span style="color: red;">inactive</span>';}?></small></li>
									<li><small><?php echo $row['etype'];?></small></li>
								</ul>
							</div>
							<div class="brick" style="margin-left: auto;">
								<?php if($row['gem']=='0'){?><a href="#gen_<?php echo $row['id']; ?>" data-modal-open class="generate-btn">&#128171;</a><?php } ?>
								<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_mold.php'); ?>
					</div>
					<?php }} ?>	
				</div>
				<?php } ?>
			</div></div>

		</div></div></div>
	</div>
</div>
<?php include('inc/add_mold.php'); ?>
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