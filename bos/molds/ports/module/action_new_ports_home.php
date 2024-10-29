<?php session_start();
if(isset($_POST['add'])){
	if($_POST['pup']=='proj'){
		$projects = simplexml_load_file('data/projects.xml');
		$project = $projects->addChild('project');
		$project->addAttribute('id', $_POST['id']);
		if($_POST['title']!=''){$project->addAttribute('title', $_POST['title']);}else{$project->addAttribute('title', 'untitled project');}
		$project->addAttribute('owner', $_POST['user']);
		$status = $project->addChild('status',$_POST['status']);
		$progress = $status->addAttribute('progress', $_POST['progress']);
		$priority = $project->addChild('priority',$_POST['priority']);
		$description = $project->addChild('description',$_POST['description']);
		if(!empty($_POST['deadline'])){
			$deadline = $project->addChild('deadline',$_POST['deadline']);
		} else {$deadline = $project->addChild('deadline',date('Y-m-d'));}
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($projects->asXML());
		$dom->save('data/projects.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Project created successfully</p>';
		header('location: page_home.php');
	} elseif($_POST['pup']=='role'){
		if($_POST['user']!=''){
			$roles = simplexml_load_file('data/roles.xml');
			$role = $roles->addChild('role');
			$role->addAttribute('id', $_POST['id']);
			if($_POST['title']!=''){$role->addAttribute('title', $_POST['title']);}else{$role->addAttribute('title','untitled');}
			$role->addAttribute('user', $_POST['user']);
			$role->addAttribute('status', $_POST['status']);
			$description = $role->addChild('description',$_POST['description']);
			$dom = new DomDocument();
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			$dom->loadXML($roles->asXML());
			$dom->save('data/roles.xml');
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Role created successfully</p>';
			header('location: page_home.php');
		} else {
			$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">User selection required.</p>';
			header('location: page_home.php');
		}
	} else {
		$tasks = simplexml_load_file('data/tasks.xml');
		$task = $tasks->addChild('task');
		$task->addAttribute('id', $_POST['id']);
		if($_POST['title']!=''){$task->addAttribute('title', $_POST['title']);}else{$task->addAttribute('title', '[untitled task]');}
		$task->addAttribute('owner', $_POST['user']);
		if($_POST['project']!=''){$task->addAttribute('project', $_POST['project']);}else{$task->addAttribute('project','n/a');}
		$status = $task->addChild('status',$_POST['status']);
		$status->addAttribute('esthrs', $_POST['esthrs']);
		$status->addAttribute('workhrs',$_POST['workhrs']);
		$priority = $task->addChild('priority',$_POST['priority']);
		$description = $task->addChild('description',$_POST['description']);
		if(!empty($_POST['deadline'])){
			$task->addChild('deadline',$_POST['deadline']);
		} else {
			$curdate=date_create(date("Y-m-d"));
			if($_POST['priority']=='low'){
				date_add($curdate,date_interval_create_from_date_string("56 days"));
			}elseif($_POST['priority']=='medium'){
				date_add($curdate,date_interval_create_from_date_string("28 days"));
			}elseif($_POST['priority']=='high'){
				date_add($curdate,date_interval_create_from_date_string("14 days"));
			} else {
				date_add($curdate,date_interval_create_from_date_string("7 days"));
			}
			$setdate = date_format($curdate,"Y-m-d");
			$task->addChild('deadline',$setdate);
		}
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($tasks->asXML());
		$dom->save('data/tasks.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Task created successfully</p>';
		header('location: page_home.php');
	}
} else{
	$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
	header('location: page_home.php');
}
?>