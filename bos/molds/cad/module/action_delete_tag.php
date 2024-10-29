<?php session_start();
	$tagid = $_GET['tagid'];
	$cadtags = simplexml_load_file('data/tags.xml');
	$index = 0;
	$i = 0;
	foreach($cadtags->tag as $tag){
		if($tag['tagid'] == $tagid){
			$index = $i;
			break;
		} $i++;
	}
	unset($cadtags->tag[$index]);
	file_put_contents('data/tags.xml', $cadtags->asXML());
	$_SESSION['message'] = 'Tag deleted';
	header('location: page_edit_tags.php');
?>