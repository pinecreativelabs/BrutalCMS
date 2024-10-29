<?php
	session_start();
	if(isset($_POST['edit'])){
		$tasks = simplexml_load_file('data/tasks.xml');
		foreach($tasks->task as $task){
			if($task['id'] == $_POST['id']){
				$task->status = $_POST['status'];
				break;
			}
		}
		file_put_contents('data/tasks.xml', $tasks->asXML());
		$_SESSION['message'] = 'Task Completed!';
		header('location: page_home.php');
	} else{
		$_SESSION['message'] = 'Task update failed.';
		header('location: page_home.php');
	}
?>