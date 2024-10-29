<?php session_start();
	$id = $_GET['id'];
	$roles = simplexml_load_file('data/roles.xml');
	$index = 0;
	$i = 0;
	foreach($roles->role as $role){
		if($role['id'] == $id){
			$index = $i;
			break;
		} $i++;
	}
	unset($roles->role[$index]);
	file_put_contents('data/roles.xml', $roles->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Role deleted</p>';
	header('location: page_home.php');
?>