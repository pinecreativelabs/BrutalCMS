<?php session_start();

	$id = $_GET['id'];
	$pages = simplexml_load_file('data/pages.xml');
	//we're are going to create iterator to assign to each entity
	$index = 0;
	$i = 0;

	foreach($pages->page as $page){
		if($page['id'] == $id){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($pages->page[$index]);
	file_put_contents('data/pages.xml', $pages->asXML());
	$_SESSION['message'] = 'Page deleted';
	header('location: page_edit_pages.php');
?>