<?php session_start();
	$catid = $_GET['catid'];
	$cadcats = simplexml_load_file('data/cats.xml');
	$index = 0;
	$i = 0;
	foreach($cadcats->cat as $cat){
		if($cat['catid'] == $catid){
			$index = $i;
			break;
		} $i++;
	}
	unset($cadcats->cat[$index]);
	file_put_contents('data/cats.xml', $cadcats->asXML());
	$_SESSION['message'] = 'Category deleted';
	header('location: page_edit_cats.php');
?>