<?php session_start();
	$id = $_GET['id'];
	$objects = simplexml_load_file('data/objects.xml');
	$index = 0;
	$i = 0;
	foreach($objects->object as $object){
		if($object['id'] == $id){
			$index = $i;
			break;
		} $i++;
	}
	unset($objects->object[$index]);
	file_put_contents('data/objects.xml', $objects->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Object deleted</p>';
	header('location: page_edit_objects.php');
?>