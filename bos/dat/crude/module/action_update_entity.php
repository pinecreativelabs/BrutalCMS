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
		$_SESSION['message'] = 'Entity updated successfully';
		header('location: page_edit_entities.php');
	}
	else{
		$_SESSION['message'] = 'Select a data group to edit';
		header('location: page_edit_entities.php');
	}
?>