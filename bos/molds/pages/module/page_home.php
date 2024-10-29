<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/pat/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$pagesdatapath = 'data/pages.xml';
$themefile = simplexml_load_file (realpath(__DIR__. '/../../..').'/molds/blueprint/module/data/themes.xml');
$layoutfile = simplexml_load_file (realpath(__DIR__. '/../../..').'/molds/blueprint/module/data/layouts.xml');
$file = simplexml_load_file('data/pages.xml');
$pgcount = $file->page->count();
$fc = $file->count();
$pggroup = simplexml_load_file('data/groups.xml');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PAGES Home</title>
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
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Page</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p>Data: <a href="<?php echo $pagesdatapath;?>" target="_blank" class="link"><?php echo $pagesdatapath;?></a> | <strong><?php echo $pgcount; ?></strong> pages</p>
	<p><?php echo 'Editing as: <strong>'.$current_user; ?></strong> with PAL <?php echo $user_pal; ?> permissions</p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		
		<div class="block bw100"><div style="padding: 1rem;"><div class="tabs">
			<input type="radio" name="sadtabs" id="tab1" checked="checked">
			<label for="tab1">Public</label>
			<div class="tab"><div class="limebox">
				<?php if($fc==0){echo $fc.' pages';}else{
					foreach($file->page as $row){ if($row['type']=='public'){ ?>
				<div class="block bw100 record">
					<div class="brick-wrap">
						<div class="brick">			
							<h4><a href="<?php if($row->loc['generated'=='1']){echo $row->loc; }else{?>#nopageavail<?php }?>" <?php if($row->loc['generated'=='1']){ ?>target="_blank"<?php } else { ?>data-modal-open <?php } ?>><?php echo $row['title'];?></a></h4>
							<p><small>author: <?php echo $row['author']; ?></small></p>
						</div>
						<div class="brick" style="margin-left: auto;">
							<?php if($pages_pal=='1'){
							if(($user_pal=='2')||($user_pal=='3')||($user_pal=='1')){ ?>
							<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
							<?php if($pages_genmode=='full'){?><a href="#generate_<?php echo $row['id']; ?>" data-modal-open class="generate-btn<?php if($row->loc['generated']=='1'){echo ' disabled';} ?>">&#128171;</a><?php } ?>
							<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn-o">&#10006;</a>
							<?php } } else {if(($user_pal=='2')||($user_pal=='3')){ ?>
							<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
							<?php if($pages_genmode=='full'){?><a href="#generate_<?php echo $row['id']; ?>" data-modal-open class="generate-btn<?php if($row->loc['generated']=='1'){echo ' disabled';} ?>">&#128171;</a><?php } ?>
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
				<?php }}} ?>
			</div></div>
			<input type="radio" name="sadtabs" id="tab2">
			<label for="tab2">Private</label>
			<div class="tab"><div class="limebox">
				<?php if($fc==0){echo $fc.' pages';}else{
					foreach($file->page as $row){ if($row['type']=='private'){ ?>
				<div class="block bw100 record">
					<div class="brick-wrap">
						<div class="brick">			
							<h4><a href="<?php if($row->loc['generated'=='1']){echo $row->loc; }else{?>#nopageavail<?php }?>" <?php if($row->loc['generated'=='1']){ ?>target="_blank"<?php } else { ?>data-modal-open <?php } ?>><?php echo $row['title'];?></a></h4>
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
				<?php }}} ?>
			</div></div>
			<input type="radio" name="sadtabs" id="tab3">
			<label for="tab3">Hidden</label>
			<div class="tab"><div class="limebox">
				<?php if($fc==0){echo $fc.' pages';}else{
					foreach($file->page as $row){ if($row['type']=='hidden'){ ?>
				<div class="block bw100 record">
					<div class="brick-wrap">
						<div class="brick">			
							<h4><a href="<?php if($row->loc['generated'=='1']){echo $row->loc; }else{?>#nopageavail<?php }?>" <?php if($row->loc['generated'=='1']){ ?>target="_blank"<?php } else { ?>data-modal-open <?php } ?>><?php echo $row['title'];?></a></h4>
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
				<?php }}} ?>
			</div></div>
			<input type="radio" name="sadtabs" id="tab4">
			<label for="tab4">System</label>
			<div class="tab"><div class="limebox">
				<?php if($fc==0){echo $fc.' pages';}else{
					foreach($file->page as $row){ if($row['type']=='system'){ ?>
				<div class="block bw100 record">
					<div class="brick-wrap">
						<div class="brick">			
							<h4><a href="<?php if($row->loc['generated'=='1']){echo $row->loc; }else{?>#nopageavail<?php }?>" <?php if($row->loc['generated'=='1']){ ?>target="_blank"<?php } else { ?>data-modal-open <?php } ?>><?php echo $row['title'];?></a></h4>
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
				<?php }}} ?>
			</div></div>

		</div></div></div>
	</div>
</div>
<?php include('inc/add_page.php'); ?>
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