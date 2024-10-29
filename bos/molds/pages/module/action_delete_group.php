<?php session_start();
	$id = $_GET['id'];
	$pagegroups = simplexml_load_file('data/groups.xml');
	//we're are going to create iterator to assign to each theme
	$index = 0;
	$i = 0;

	foreach($pagegroups->pagegroup as $pagegroup){
		if($pagegroup['id'] == $id){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($pagegroups->pagegroup[$index]);
	file_put_contents('data/groups.xml', $pagegroups->asXML());
	$_SESSION['message'] = 'Page group deleted';
	header('location: page_edit_groups.php');
?>