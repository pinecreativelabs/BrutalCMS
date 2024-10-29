<?php session_start();
	$id = $_GET['id'];
	$wallpapers = simplexml_load_file('data/wallpapers.xml');
	$index = 0;
	$i = 0;
	foreach($wallpapers->wallpaper as $wallpaper){
		if($wallpaper['id'] == $id){
			$index = $i;
			break;
		} $i++;
	}
	unset($wallpapers->wallpaper[$index]);
	file_put_contents('data/wallpapers.xml', $wallpapers->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Wallpaper deleted</p>';
	header('location: page_edit_wallpapers.php');
?>