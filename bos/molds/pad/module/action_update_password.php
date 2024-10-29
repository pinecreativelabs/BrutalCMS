<?php session_start();
	if(isset($_POST['update_pw']) || isset($_POST['update_pin'])){
		$users = simplexml_load_file('data/users.xml');
		if($_POST['pup']=='pw'){
			if($_POST['pwe']=='md5'){
				$pw1 = md5($_POST['pw1']);
			} else { $pw1 = sha1($_POST['pw1']);}
			if($_POST['pw1']==$_POST['pw2']){
				foreach($users->user as $user){
					if(($user['id'] == $_POST['uid'])&&($user['username']==$_POST['uname'])){
						$user->password = $pw1;
						break;
					}
				}
				file_put_contents('data/users.xml', $users->asXML());
				$_SESSION['message'] = 'Password updated successfully.';
				header('location: page_my_pwpin.php');
			} else {
				$_SESSION['message'] = 'Passwords do not match!';
				header('location: page_my_pwpin.php');
			}
		} else {
			foreach($users->user as $user){
				if(($user['id'] == $_POST['uid'])&&($user['username']==$_POST['uname'])){
					if($_POST['pwe']=='md5'){
						$user->password['pin'] = md5($_POST['pin']);
					} else {
						$user->password['pin'] = sha1($_POST['pin']);
					} break;
				}
			}
			file_put_contents('data/users.xml', $users->asXML());
			$_SESSION['message'] = 'PIN updated successfully.';
			header('location: page_my_pwpin.php');
		}
	} else {
		$_SESSION['message'] = 'Update failed.';
		header('location: page_my_pwpin.php');
	}
?>