<?php session_start();
	$uid = $_POST['uid'];
	$uname = $_POST['uname'];
	$delmethod = $_POST['delmethod'];
	$fpath = realpath(__DIR__. '/../..').'/users/'.$uname;
	$profile = realpath(__DIR__. '/../..').'/profiles/'.$uname.'.csv';
	$datafiles = glob($fpath.'/data/*');
	
	if($delmethod=='full'){
		// delete all user data and files
		if(is_file($profile)){unlink($profile);}
		$files = glob($fpath.'/files/*');
		foreach($files as $file) {if(is_file($file)){unlink($file);}}
		rmdir($fpath.'/files');
		$photos = glob($fpath.'/photos/*');
		foreach($photos as $photo) {if(is_file($photo)){unlink($photo);}}
		rmdir($fpath.'/photos');
		$audios = glob($fpath.'/audio/*');
		foreach($audios as $audio) {if(is_file($audio)){unlink($audio);}}
		rmdir($fpath.'/audio');
		$videos = glob($fpath.'/video/*');
		foreach($videos as $video) {if(is_file($video)){unlink($video);}}
		rmdir($fpath.'/video');
		$dfiles = glob($fpath.'/data/*');
		foreach($dfiles as $dfile) {if(is_file($dfile)){unlink($dfile);}}
		$dpfiles = glob($fpath.'/data/paws/*');
		foreach($dpfiles as $dpfile) {if(is_file($dpfile)){unlink($dpfile);}}
		rmdir($fpath.'/data/paws');
		rmdir($fpath.'/data');
		rmdir($fpath);
		
		$uinput = fopen('data/users.csv', 'r');  //open for reading
		$uoutput = fopen('data/temp.csv', 'w'); //open for writing
		$input = fopen('data/userlist.csv', 'r');
		$output = fopen('data/ultemp.csv', 'w');
		//echo 'path: '.$bufile.'<br />user: '.$_SESSION['userName'];
		while(($udata = fgetcsv($uinput, 1000, ",")) !== FALSE){
		   if($udata[0] == $_POST['uname']) {
			  $udata[0]='';
			  $udata[1]='';
		   }
		   fputcsv($uoutput, $udata);
		}
		while(($data = fgetcsv($input, 1000, ",")) !== FALSE){
		   if($data[0] == $_POST['uid']) {
			  $data[0]='';
			  $data[1]='';
			  $data[2]='';
			  $data[3]='';
			  $data[4]='';
			  $data[5]='';
		   }
		   fputcsv($output, $data);
		}
		fclose($input);
		fclose($output);
		fclose($uinput);
		fclose($uoutput);
		unlink('data/users.csv');
		unlink('data/userlist.csv');
		rename('data/ultemp.csv', 'data/userlist.csv');
		rename('data/temp.csv', 'data/users.csv');
	} else {
		// delete user profile data, remove account from userlist, but keep all user data and files
		if(is_file($profile)){unlink($profile);}
		$uinput = fopen('data/users.csv', 'r');  //open for reading
		$uoutput = fopen('data/temp.csv', 'w'); //open for writing
		$input = fopen('data/userlist.csv', 'r');
		$output = fopen('data/ultemp.csv', 'w');
		//echo 'path: '.$bufile.'<br />user: '.$_SESSION['userName'];
		while(($udata = fgetcsv($uinput, 1000, ",")) !== FALSE){
		   if($udata[0] == $_POST['uname']) {
			  $udata[0]='';
			  $udata[1]='';
		   }
		   fputcsv($uoutput, $udata);
		}
		while(($data = fgetcsv($input, 1000, ",")) !== FALSE){
		   if($data[0] == $_POST['uid']) {
			  $data[0]='';
			  $data[1]='';
			  $data[2]='';
			  $data[3]='';
			  $data[4]='';
			  $data[5]='';
		   }
		   fputcsv($output, $data);
		}
		fclose($input);
		fclose($output);
		fclose($uinput);
		fclose($uoutput);
		unlink('data/users.csv');
		unlink('data/userlist.csv');
		rename('data/ultemp.csv', 'data/userlist.csv');
		rename('data/temp.csv', 'data/users.csv');
	}
	$_SESSION['message'] = 'User deleted';
	header('location: page_edit_users.php');
?>