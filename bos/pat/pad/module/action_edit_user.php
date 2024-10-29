<?php session_start();
	$profilefolder = realpath(__DIR__. '/../..').'/profiles/';
	$userlistfile = 'data/userlist.csv';
	
	if(isset($_POST['edit'])){
		$uid = $_POST['uid'];
		$user = $_POST['uname'];
		$email = $_POST['email'];
		if($_POST['active']==1){$active = 'true';} else {$active = 'false';}
		$group = $_POST['group'];
		$profile = fopen($profilefolder.$user.".csv","w");
		fwrite($profile, "uid,username,email,is_active,group"."\r\n"."$uid,$user,$email,$active,$group");

		$input = fopen($userlistfile, 'r');  //open for reading
		$output = fopen('data/ultemp.csv', 'w'); //open for writing
		
		while(($uldata = fgetcsv($input, 1000, ",")) !== FALSE){
		   //modify data here
		   if ($uldata[0] == $_POST['uid']) {
			  $uldata[0] = $_POST['uid'];
			  $uldata[1] = $_POST['uname'];
			  $uldata[2] = $_POST['password'];
			  $uldata[3] = $_POST['email'];
			  $uldata[4] = $_POST['active'];
			  $uldata[5] = $_POST['group'];
		   }
		   fputcsv($output, $uldata);
		}
		//close both files
		fclose($input);
		fclose($output);
		//clean up
		unlink('data/userlist.csv');// Delete obsolete BD
		$saved = rename('data/ultemp.csv', 'data/userlist.csv'); //Rename temporary to new
		
		$_SESSION['message'] = 'User updated.';
		header('location: page_edit_users.php');
		
	} else {
		$_SESSION['message'] = 'All fields required.';
		header('location: page_edit_users.php');
	}

?>