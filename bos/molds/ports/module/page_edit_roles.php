<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$datapath = 'data/roles.xml';
$userlistdata = realpath(__DIR__.'/../../..').'/molds/pad/module/data/users.xml';
$ulistfile = simplexml_load_file($userlistdata);
$user_select = '<select name="user">'.PHP_EOL.'<option value="">[select user]</option>'.PHP_EOL;
$user_select_options = '<option value="">[select user]</option>'.PHP_EOL;
foreach($ulistfile->user as $user){
	if($user['active']=='true'){
		$user_select.='<option value="'.$user['username'].'">'.$user['username'].'</option>'.PHP_EOL;
		$user_select_options.='<option value="'.$user['username'].'">'.$user['username'].'</option>'.PHP_EOL;
	}
}
$user_select.='</select>'.PHP_EOL;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Roles Manager</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
</head>
<body class="scrollable">
<?php 
$file = simplexml_load_file('data/roles.xml');
 ?>
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; New Role</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<!--<h1 class="brick"><?php echo $file->role->count().' roles'; ?></h1>-->
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p><?php echo '<strong>Editing as: </strong>'.$current_user; ?></p>
	<p>Data: <a href="<?php echo $datapath;?>" target="_blank" class="link"><?php echo $datapath;?></a></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">	
		<?php if($file->role->count()<=0){echo '<p><strong>[NO ROLES]</strong></p>';}else{ 
		foreach($file->role as $row){ ?>
		<div class="block bw100 record">
			<div class="brick-wrap">
				<div class="brick bw60 xs-100 sm-100 md-100">
					<h4 class="title"><?php echo $row['title']; ?></h4>
					<ul class="details">
						<li><small>ID:</small><br /><?php echo $row['id'];?></li>
						<li><small>User:</small><br /><?php echo $row['user']; ?></li>
						<li><small>Status:</small><br /><?php echo $row['status']; ?></li>
					</ul>
				</div>
				<div class="brick center" style="width: 160px; margin-left: auto;">
					<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
					<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
				</div>
			</div>
			<?php include('inc/edit_role.php'); ?>
		</div>
		<?php } echo '<strong>'.$row->count().' elements / record</strong>';}?>	
	</div>
</div>  
<?php include('inc/add_role.php'); ?>

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