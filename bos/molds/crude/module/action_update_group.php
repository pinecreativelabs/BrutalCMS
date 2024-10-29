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
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Data group updated successfully</p>';
		header('location: page_edit_groups.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a data group to edit</p>';
		header('location: page_edit_groups.php');
	}
?>