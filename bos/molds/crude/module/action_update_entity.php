<?php session_start();
	if(isset($_POST['edit'])){
		$entities = simplexml_load_file('data/entities.xml');
		foreach($entities->entity as $entity){
			if($entity['id'] == $_POST['id']){
				$entity->description = $_POST['desc'];
				break;
			}
		}
		file_put_contents('data/entities.xml', $entities->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Entity updated successfully</p>';
		header('location: page_edit_entities.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a data group to edit</p>';
		header('location: page_edit_entities.php');
	}
?>