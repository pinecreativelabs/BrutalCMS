<?php session_start();
	$id = $_GET['id'];
	$tasks = simplexml_load_file('data/tasks.xml');
	$index = 0;
	$i = 0;
	foreach($tasks->task as $task){
		if($task['id'] == $id){
			$index = $i;
			break;
		} $i++;
	}
	unset($tasks->task[$index]);
	file_put_contents('data/tasks.xml', $tasks->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Task deleted</p>';
	header('location: page_edit_tasks.php');
?>