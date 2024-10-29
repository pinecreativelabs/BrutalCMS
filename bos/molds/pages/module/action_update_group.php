<?php session_start();
	if(isset($_POST['edit'])){
		$pagegroups = simplexml_load_file('data/groups.xml');
		foreach($pagegroups->pagegroup as $pagegroup){
			if($pagegroup['id'] == $_POST['id']){
				$pagegroup['title'] = $_POST['title'];
				$pagegroup['description'] = $_POST['desc'];
				$pagegroup['type'] = $_POST['pagetype'];
				break;
			}
		}
		file_put_contents('data/groups.xml', $pagegroups->asXML());
		$_SESSION['message'] = 'Page group updated successfully';
		header('location: page_edit_groups.php');
	}
	else{
		$_SESSION['message'] = 'Select a page group to edit';
		header('location: page_edit_groups.php');
	}
?>