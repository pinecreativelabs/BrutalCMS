<?php session_start();
if(isset($_POST['edit'])){
	if($_POST['pup']=='proj'){
		$projects = simplexml_load_file('data/projects.xml');
		foreach($projects->project as $project){
			if($project['id'] == $_POST['id']){
				$project['owner'] = $_POST['owner'];
				if($_POST['title']!=''){$project['title'] = $_POST['title'];}else{$project['title'] = 'Untitled';}
				if(($_POST['status']=='not started')&&($_POST['progress']>0)){
					$project->status = 'in progress';
				}elseif($_POST['progress']==100){
					$project->status = 'completed';
				}else{$project->status = $_POST['status'];}
				if($_POST['status']=='completed'){$project->status['progress']=100;}else{$project->status['progress'] = $_POST['progress'];}
				$project->priority = $_POST['priority'];
				$project->description = $_POST['description'];
				if(!empty($_POST['deadline'])){$project->deadline = $_POST['deadline'];} else { $project->deadline = date('Y-m-d');}
				break;
			}
		}
		file_put_contents('data/projects.xml', $projects->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Project updated successfully</p>';
		header('location: page_edit_projects.php');
	} elseif($_POST['pup']=='role'){
		if($_POST['user']!=''){
			$roles = simplexml_load_file('data/roles.xml');
			foreach($roles->role as $role){
				if($role['id'] == $_POST['id']){
					$role['user'] = $_POST['user'];
					if($_POST['title']!=''){$role['title'] = $_POST['title'];}else{$role['title']='untitled';}
					$role['status'] = $_POST['status'];
					$role->description = $_POST['description'];
					break;
				}
			}
			file_put_contents('data/roles.xml', $roles->asXML());
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Role updated successfully</p>';
			header('location: page_edit_roles.php');
		} else {
			$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;"><strong>Role not updated.</strong><br />A user must be selected.</p>';
			header('location: page_edit_roles.php');
		}
	} else {
		$tasks = simplexml_load_file('data/tasks.xml');
		foreach($tasks->task as $task){
			if($task['id'] == $_POST['id']){
				if($_POST['owner']!=''){$task['owner'] = $_POST['owner'];}else{$task['owner']='';}
				if($_POST['title']!=''){$task['title'] = $_POST['title'];}else{$task['title']='untitled task #'.$_POST['id'].']';}
				if($_POST['project']){$task['project'] = $_POST['project'];}else{$task['project']='';}
				if(($_POST['workhrs']>=1)&&($_POST['status']=='not started')){
					$task->status = 'in progress';
				} else { $task->status = $_POST['status']; }
				$task->status['workhrs'] = $_POST['workhrs'];
				$task->status['esthrs'] = $_POST['esthrs'];
				$task->priority = $_POST['priority'];
				$task->description = $_POST['description'];
				if(!empty($_POST['deadline'])){$task->deadline = $_POST['deadline'];} else { $task->deadline = date('Y-m-d');}
				break;
			}
		}
		file_put_contents('data/tasks.xml', $tasks->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Task updated successfully</p>';
		header('location: page_edit_tasks.php');
	}
}else{
	$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
	if($_POST['pup']=='proj'){header('location: page_edit_projects.php');} 
	elseif($_POST['pup']=='role'){ header('location: page_edit_roles.php');}
	else{header('location: page_edit_tasks.php');}
}
?>