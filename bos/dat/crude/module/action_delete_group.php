<?php session_start();
	$id = $_GET['id'];
	$datagroups = simplexml_load_file('data/groups.xml');
	//we're are going to create iterator to assign to each theme
	$index = 0;
	$i = 0;

	foreach($datagroups->datagroup as $datagroup){
		if($datagroup['id'] == $id){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($datagroups->datagroup[$index]);
	file_put_contents('data/groups.xml', $datagroups->asXML());
	$_SESSION['message'] = 'Data group deleted';
	header('location: page_edit_groups.php');
?>