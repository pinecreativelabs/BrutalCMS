<?php session_start();
	if(isset($_POST['edit'])){
		$datagroups = simplexml_load_file('data/groups.xml');
		foreach($datagroups->datagroup as $datagroup){
			if($datagroup['id'] == $_POST['id']){
				$datagroup['title'] = $_POST['title'];
				$datagroup['description'] = $_POST['desc'];
				$datagroup['type'] = $_POST['datatype'];
				break;
			}
		}
		file_put_contents('data/groups.xml', $datagroups->asXML());
		$_SESSION['message'] = 'Data group updated successfully';
		header('location: page_edit_groups.php');
	}
	else{
		$_SESSION['message'] = 'Select a data group to edit';
		header('location: page_edit_groups.php');
	}
?>