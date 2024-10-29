<?php
	session_start();
	if(isset($_POST['edit'])){
		$projects = simplexml_load_file('data/projects.xml');
		foreach($projects->project as $project){
			if($project['id'] == $_POST['id']){
				$project->status = $_POST['status'];
				break;
			}
		}
		file_put_contents('data/projects.xml', $projects->asXML());
		$_SESSION['message'] = 'Project Completed!';
		header('location: page_home.php');
	} else{
		$_SESSION['message'] = 'Project update failed.';
		header('location: page_home.php');
	}
?>