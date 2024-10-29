<?php session_start();
	$id = $_POST['id'];
	$uname = $_POST['uname'];
	$folder = $_POST['folder'];
	$fpath = realpath(__DIR__. '/../..').'/users/'.$uname;
	
	if($folder=='all'){
		// delete all files from all user folders
		$files = glob($fpath.'/files/*');
		$photos = glob($fpath.'/photos/*');
		$audios = glob($fpath.'/audio/*');
		$videos = glob($fpath.'/video/*');
		foreach($files as $file) {
			if(is_file($file)){unlink($file);}
		}
		foreach($photos as $photo) {
			if(is_file($photo)){unlink($photo);}
		}
		foreach($audios as $audio) {
			if(is_file($audio)){unlink($audio);}
		}
		foreach($videos as $video) {
			if(is_file($video)){unlink($video);}
		}
	} else {
		// delete all files from specified folder
		$files = glob($fpath.'/'.$folder.'/*');
		foreach($files as $file) {
			if(is_file($file)){unlink($file);}
		}
	}
	
	$_SESSION['message'] = 'User files deleted';
	header('location: page_edit_users.php');
?>