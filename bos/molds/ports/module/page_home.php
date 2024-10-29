<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/molds/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$curdate = new DateTime();
function dateDiff($date1, $date2) { 
	$diff = strtotime($date2) - strtotime($date1); 
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 
$taskfile = simplexml_load_file('data/tasks.xml');
$projectsfile = simplexml_load_file('data/projects.xml');
$rolesfile = simplexml_load_file('data/roles.xml');

$project_options = '<option value="">[select project]</option>'.PHP_EOL;
foreach($projectsfile->project as $row){
	$project_options.='<option value="'.$row['title'].'">'.$row['title'].'</option>'.PHP_EOL;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PORTS Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		.taskbox,.rolebox,.projectbox{border: 1px solid #ffff00; padding: 1rem;}
		.taskbox h3, .rolebox h3, .projectbox h3, h3.mytasks {font-weight: 600; margin: 0; padding: 8px; background: #ffff00; color: #000;}
		.mytasks{ -webkit-border-radius: 8px 8px 0 0; border-radius: 8px 8px 0 0; }
		.item {border: 1px solid #ffff00; margin: 0.75rem 0 1rem 0; font-family: Arial, sans-serif; display: flex; box-shadow: 3px 3px #ffff00;
			-webkit-border-radius: 8px; border-radius: 8px;
		}
		.item h4 {font-size: 24px; font-weight: 600; padding: 6px; margin: 0 0 6px 0;}
		.item p.desc {font-size: 16px; line-height: 150%; padding: 6px;}
		.item.task, .item.proj {color: #ffff00;}
		.item .item-content{background: #1c1c1c; color: #ffff00; padding: 0 0 0 6px; flex-grow: 1; -webkit-border-radius: 0 7px 0 0; border-radius: 0 7px 0 0;}
		.item .actions {background: #ffff00; -webkit-border-radius: 0 7px 0 0; border-radius: 0 7px 0 0;}
		.item .priority, .item .rolestatus {width: 12px; padding: 0; margin: 0; -webkit-flex-basis: 12px; flex-basis: 12px;  height: 100%;}
		.item.task.low, .low-p, .item.proj.low, .item.role.active, .status-ac {background: #32cd32;}
		.item.task.medium, .med-p, .item.proj.medium {background: #00bfff;}
		.item.task.high, .hi-p, .item.proj.high, .item.role.away, .status-aw {background: #ff8000;}
		.item.task.critical, .critical-p, .item.proj.critical, .overdue {background: #ff0000;}
		.completed {background: #32cd32;}
		.item.role.inactive, .status-i {background: #d8d8d8;}
		.item .itemhead, .itemhead h4 {border-bottom: 1px solid #ffff00;}
		.item .itemhead .details {font-size: 16px; font-weight: 600; padding: 4px;}
		.item .itemhead .details span, .item.role .details span, .hi-p, .low-p, .critical-p, .med-p,
		.status-i, .status-aw, .status-ac{border-radius: 3px; -webkit-border-radius: 3px; padding: 3px;}
		.hi-p, .low-p, .critical-p, .med-p, .status-i, .status-aw, .status-ac{color: #000; font-weight: 600;}
		.item .itemhead .details span.duedate {background: #e8e8e8; color: #333;}
		.item .itemhead .details span.status {background: #000; color: #fff;}
		.progressbar.overdue{padding: 6px;}
		.item.role {color: #fff;}
		.item.role h4 {margin: 0 0 -6px 0;}
		.item.role p, .item.proj p {padding: 6px;}
		.item .del-btn {float: right;}
		.edit-btn, .del-btn, .mark-btn {min-width: initial;}
		.tabs label {font-weight: 900; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0; background: #0f0; color: #000;}
		.tabs .tab {background: #000; color: #0f0; padding: 0; border: none;}
		.tabs .tab .rolebox, .tabs .tab .projectbox, .projectbox {-webkit-border-radius: 0 1rem 1rem 1rem; border-radius: 0 1rem 1rem 1rem;}
		.modal-content .tabs .tab {border: 1px solid #000; background: #fff;}
	</style>
</head>
<body class="scrollable">
<a href="#addnew" class="add-btn brick" data-modal-open>&#10010; Task</a>
<a href="#addnewproj" class="add-btn brick" data-modal-open>&#10010; Project</a>
<a href="#addnewrole" class="add-btn brick" data-modal-open>&#10010; Role</a>
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p style="margin-bottom: 6px;"><?php echo '<strong>Editing as: </strong>'.$current_user.' (UID: '.$uid.')'; ?></p>
	<p><strong>Priority:</strong> <span class="low-p">low</span> <span class="med-p">medium</span> <span class="hi-p">high</span> <span class="critical-p">critical</span></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		<div class="block bw60 xs-100 sm-100 md-100"><div style="padding: 1rem;">
			<h3 class="mytasks">My Tasks</h3>
			<div class="taskbox">
				<?php 
				if($taskfile->task->count()<=0){echo '<p><strong>[NO TASKS]</strong></p>';}else{ 
				foreach($taskfile->task as $task){ 
					$t_deadline = new DateTime($task->deadline);
					if(($curdate>$t_deadline)&&($task->status!='completed')){ 
						$duedateclass = ' overdue';
					}elseif((($curdate>$t_deadline)||($curdate<=$t_deadline))&&($task->status=='completed')){
						$duedateclass=' completed';
					}else{$duedateclass='';}
					if($task['owner']==$current_user){
						$newduedate = date_create($task->deadline);
						$duedate = date_format($newduedate,'D, M jS, Y');
				?>
				<div class="item task <?php echo $task->priority;?>"><div class="priority"></div>
					<div class="item-content">
						<div class="itemhead">
							<h4><?php echo $task['title'];?></h4>
							<p class="details<?php echo $duedateclass;?>"><span class="duedate">Due: <em><?php echo $duedate;?></em></span> <span class="status"><?php echo $task->status;?></span></p>
						</div>
						<a href="#edit_<?php echo $task['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
						<?php if($task->status!='completed'){?><a href="#mark_<?php echo $task['id'];?>" data-modal-open class="mark-btn">&#10004;</a><?php } ?>
						<a href="#delete_<?php echo $task['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
					</div>
				</div>
				<?php include('inc/edit_task_home.php'); }}} ?>
			</div>
		</div></div>
		<div class="block bw40 xs-100 sm-100 md-100"><div style="padding: 1rem;">
			<div class="tabs">
				<input type="radio" name="myprojects" id="tab1" checked="checked">
				<label for="tab1">My Projects</label>
				<div class="tab">
					<div class="projectbox">
						<?php 
						if($projectsfile->project->count()<=0){echo '<p><strong>[NO PROJECTS]</strong></p>';}else{ 
						foreach($projectsfile->project as $row){ 
							$p_deadline = new DateTime($row->deadline);
							if($curdate>$p_deadline){ $duedateclass = ' overdue';}else{$duedateclass='';}
							if($row['owner']==$current_user){
						?>
						<div class="item proj <?php echo $row->priority;?>"><div class="priority"></div>
							<div class="item-content">
								<div class="itemhead">
									<h4><?php echo $row['title'];?></h4>
									<?php 
									if($row->status=='not started'){ echo '<p><strong>[not started]</strong></p>';}
									elseif(($row->status=='started')&&($row->status['progress']==0)) { echo '<p><strong>[project started]</strong></p>';}
									elseif($row->status=='on hold'){echo '<p><strong>[project on hold]</strong></p>';}
									elseif($row->status=='completed'){ echo '<p style="background: #32cd32; color: #000; padding: 3px;"><strong>&#10004; COMPLETED</strong></p>';} else { ?>
									<div class="progressbar<?php echo $duedateclass;?>"><progress value="<?php echo $row->status['progress'];?>" max="100"> <?php echo $row->status['progress'];?>% </progress></div>
									<?php } ?>
								</div>
								<a href="#edit_<?php echo $row['id']; ?>" data-modal-open class="edit-btn">&#9998; Edit</a>
								<?php if($row->status!='completed'){?><a href="#mark_<?php echo $row['id'];?>" data-modal-open class="mark-btn">&#10004;</a><?php } ?>
								<a href="#delete_<?php echo $row['id']; ?>" data-modal-open class="del-btn">&#10006;</a>
							</div>
						</div>
						<?php include('inc/edit_project_home.php'); }}} ?>
					</div>
				</div>
				
				<input type="radio" name="myprojects" id="tab2">
				<label for="tab2">My Roles</label>
				<div class="tab">
					<div class="rolebox">
						<p style="margin-top: 6px;"><strong>Status:</strong> <span class="status-ac">active</span> <span class="status-aw">away</span> <span class="status-i">inactive</span></p>
						<?php 
						if($rolesfile->role->count()<=0){echo '<p><strong>[NO ROLES]</strong></p>';}else{ 
						foreach($rolesfile->role as $role){ if($role['user']==$current_user){
						?>
						<div class="item role <?php echo $role['status'];?>"><div class="rolestatus"></div>
							<div class="item-content"><div class="itemhead">
								<h4><?php echo $role['title'];?></h4>
								<p><?php echo $role->description;?></p>
							</div></div>
							<div class="actions center middle"><a href="#edit_<?php echo $role['id']; ?>" data-modal-open class="edit-btn">&#9998;</a><br />
							<a href="#delete_<?php echo $role['id']; ?>" data-modal-open class="del-btn">&#10006;</a></div>
						</div>
						<?php include('inc/edit_role_home.php'); }}} ?>
					</div>
				</div>
			</div>

		</div></div>
	</div>
 
</div>  
<?php
include('inc/add_task_home.php');
include('inc/add_project_home.php');
include('inc/add_role_home.php');
?>

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