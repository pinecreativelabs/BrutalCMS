<?php
	session_start();
	if(isset($_POST['edit_ai']) || isset($_POST['edit_deets']) || isset($_POST['edit_lc']) || isset($_POST['edit_ci'])){
		$users = simplexml_load_file('data/users.xml');
		foreach($users->user as $user){
			if(($user['id'] == $_POST['uid'])&&($user['username']==$_POST['uname'])){
				
				if($_POST['pup']=='ai'){
					$user['status'] = $_POST['userstatus'];
					$user['visibility'] = $_POST['uservis'];
				} elseif($_POST['pup']=='de'){
					$user->bio = $_POST['bio'];
					$user->profile['sex'] = $_POST['usersex'];
					$user->profile['name'] = $_POST['name'];
					$user->profile['birthday'] = $_POST['userbday'];
				} elseif($_POST['pup']=='lc') {
					$user->locale['country'] = $_POST['country'];
					$user->locale['region'] = $_POST['region'];
					$user->locale['city'] = $_POST['city'];
					$user->locale['timezone'] = $_POST['timezone'];
					$user->locale['language'] = $_POST['language'];
					$user->locale['curc'] = $_POST['curc'];
					$user->locale['curs'] = $_POST['curs'];
				} else {
					$user->email = $_POST['email'];
					$user->contact['phone'] = $_POST['phone'];
					$user->contact['url'] = $_POST['uurl'];
					$user->contact['ig'] = $_POST['ig_handle'];
					$user->contact['tw'] = $_POST['tw_handle'];
				}
				break;
			}
		}
		file_put_contents('data/users.xml', $users->asXML());
		$_SESSION['message'] = 'Account updated successfully.';
		header('location: page_profile.php');
	} else{
		$_SESSION['message'] = 'Select group to edit';
		header('location: page_profile.php');
	}
?>