<?php session_start();
	$id = $_GET['id'];
	$layouts = simplexml_load_file('data/layouts.xml');
	//we're are going to create iterator to assign to each theme
	$index = 0;
	$i = 0;

	foreach($layouts->layout as $layout){
		if($layout['id'] == $id){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($layouts->layout[$index]);
	file_put_contents('data/layouts.xml', $layouts->asXML());
	$_SESSION['message'] = 'Layout deleted';
	header('location: page_edit_layouts.php');
?>