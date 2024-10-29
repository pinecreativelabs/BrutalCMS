<?php session_start();
	$id = $_GET['id'];
	$properties = simplexml_load_file('data/properties.xml');
	$index = 0;
	$i = 0;
	foreach($properties->property as $property){
		if($property['id'] == $id){
			$index = $i;
			break;
		} $i++;
	}
	unset($properties->property[$index]);
	file_put_contents('data/properties.xml', $properties->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Property deleted</p>';
	header('location: page_edit_objects.php');
?>