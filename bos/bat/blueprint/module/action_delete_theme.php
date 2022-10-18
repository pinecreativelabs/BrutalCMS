<?php session_start();
	$id = $_GET['id'];
	$themes = simplexml_load_file('data/themes.xml');
	//we're are going to create iterator to assign to each theme
	$index = 0;
	$i = 0;

	foreach($themes->theme as $theme){
		if($theme['id'] == $id){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($themes->theme[$index]);
	file_put_contents('data/themes.xml', $themes->asXML());
	$_SESSION['message'] = 'Theme deleted';
	header('location: page_edit_themes.php');
?>