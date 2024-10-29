<?php session_start();
	$id = $_GET['id'];
	$entities = simplexml_load_file('data/entities.xml');
	$index = 0;
	$i = 0;
	foreach($entities->entity as $entity){
		if($entity['id'] == $id){
			$index = $i;
			$dfile = $entity->datafile['title'];
			break;
		} $i++;
	}
	unlink(dirname(__FILE__,4).'/app/data/csv/entities/'.$dfile);
	unset($entities->entity[$index]);
	file_put_contents('data/entities.xml', $entities->asXML());
	$_SESSION['message'] = 'Entity deleted';
	header('location: page_edit_entities.php');
?>