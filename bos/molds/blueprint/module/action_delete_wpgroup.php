<?php session_start();
	$id = $_GET['id'];
	$wpgroups = simplexml_load_file('data/wallpapergroups.xml');
	$index = 0;
	$i = 0;
	foreach($wpgroups->wallpapergroup as $wpgroup){
		if($wpgroup['id'] == $id){
			$index = $i;
			break;
		} $i++;
	}
	unset($wpgroups->wallpapergroup[$index]);
	file_put_contents('data/wallpapergroups.xml', $wpgroups->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Wallpaper group deleted</p>';
	header('location: page_edit_wallpapers.php');
?>