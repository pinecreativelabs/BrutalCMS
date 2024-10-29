<?php session_start();
	$id = $_GET['id'];
	$projects = simplexml_load_file('data/projects.xml');
	$index = 0;
	$i = 0;
	foreach($projects->project as $project){
		if($project['id'] == $id){
			$index = $i;
			break;
		} $i++;
	}
	unset($projects->project[$index]);
	file_put_contents('data/projects.xml', $projects->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Project deleted</p>';
	header('location: page_home.php');
?>