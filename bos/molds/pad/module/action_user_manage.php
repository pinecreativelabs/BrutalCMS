<?php session_start();
	// update account info
	if((isset($_POST['edit']))&&($_POST['pup']=='editacct')){
		$users = simplexml_load_file('data/users.xml');
		foreach($users->user as $user){
			if($user['id'] == $_POST['uid']){
				$user->email = $_POST['email'];
				$user['active'] = $_POST['active'];
				if($_POST['active']=='true'){$user['active'] = $_POST['active'];} else {$user['active'] = 'false';}
				$user['pal'] = $_POST['pal'];
				$user['group'] = $_POST['usergroup'];
				$user['status'] = $_POST['status'];
				$user['visibility'] = $_POST['visibility'];
			}
		}
		file_put_contents('data/users.xml', $users->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; '.$_POST['uname'].' updated.</p>';
		header('location: page_edit_users.php');
	}
	
	// clear user files
	elseif((isset($_POST['clearfldr']))&&($_POST['pup']=='clearfiles')){
		if($_POST['clearaction']=='trashfiles'){
			// Get array of all source files
			$files = scandir($_POST['userfilespath']);
			// Identify directories
			$source = $_POST['userfilespath'];
			$destination = $_POST['usertrashpath'];
			// Cycle through all source files
			foreach ($files as $file) {
			  if (in_array($file, array(".",".."))) continue;
			  // If we copied this successfully, mark it for deletion
			  if (copy($source.$file, $destination.$file)){$delete[] = $source.$file;}
			}
			// Delete all successfully-copied files
			foreach ($delete as $file) {unlink($file);}
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; '.$_POST['uname'].' files moved to trash.</p>';
			header('location: page_edit_users.php');
		} else {
			$files = glob($_POST['usertrashpath'].'*'); 
			foreach($files as $file){if(is_file($file)){unlink($file);}}
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; '.$_POST['uname'].' trash files cleared.</p>';
			header('location: page_edit_users.php');
		}
	} 
	
	// user keys 
	elseif((isset($_POST['userkeys']))&&($_POST['pup']=='keys')){
		$pw1 = trim($_POST['pw1']);
		$pw2 = trim($_POST['pw2']);
		$pin = trim($_POST['pin']);
		if($pw1!=$pw2){
			$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">New passwords do not match.</p>';
			header('location: page_edit_users.php');
		} else {
			$users = simplexml_load_file('data/users.xml');
			foreach($users->user as $user){
				if($user['id'] == $_POST['uid']){
					if($_POST['pwe']=='md5'){
						if($pw1!=''){$user->password = md5($pw1);}
						if($pin!=''){$user->password['pin'] = md5($pin);}
					}else{
						if($pw1!=''){$user->password = sha1($_POST['pw1']);}
						if($pin!=''){$user->password['pin'] = sha1($pin);}
					}
					break;
				}
			}
			file_put_contents('data/users.xml', $users->asXML());
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; '.$_POST['uname'].' keys updated.</p>';
			header('location: page_edit_users.php');
		}
	}
	
	// account actions
	elseif((isset($_POST['useracct']))&&($_POST['pup']=='acct')){
		$users = simplexml_load_file('data/users.xml');
		if(($_POST['acctaction']=='block')||($_POST['acctaction']=='unblock')){
			// block user
			foreach($users->user as $user){
				if($user['id'] == $_POST['uid']){
					if($_POST['acctaction']=='block'){
						$user['blocked'] = '1';
						$user['active'] = 'false';
					}else{
						$user['blocked']='0';
						$user['active']='true';
					}
					break;
				}
			}
			file_put_contents('data/users.xml', $users->asXML());
			if($_POST['acctaction']=='block'){
				$_SESSION['message'] = '<p class="padded b-s-t">&#10004; '.$_POST['uname'].' blocked.</p>';
			} else {$_SESSION['message'] = '<p class="padded b-s-t">&#10004; '.$_POST['uname'].' unblocked.</p>';}
			header('location: page_edit_users.php');
		} elseif($_POST['acctaction']=='delete'){
			// delete user
			$uid=$_POST['uid'];
			$index = 0;
			$i = 0;
			foreach($users->user as $user){
				if($user['id'] == $_POST['uid']){
					$index = $i;
					break;
				} $i++;
			}
			unset($users->user[$index]);
			file_put_contents('data/users.xml', $users->asXML());		
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; '.$_POST['uname'].' deleted.</p>';
			header('location: page_edit_users.php');
		} else { 
			// destroy user
			$uid=$_POST['uid'];
			$index = 0;
			$i = 0;
			foreach($users->user as $user){
				if($user['id'] == $_POST['uid']){
					$index = $i;
					break;
				} $i++;
			}
			unset($users->user[$index]);
			file_put_contents('data/users.xml', $users->asXML());
			
			function deleteAll($str) { 
				if (is_file($str)) { return unlink($str);  } 
				elseif (is_dir($str)) { $scan = glob(rtrim($str, '/').'/*'); 
					foreach($scan as $index=>$path) { deleteAll($path); }  
					return @rmdir($str); 
				} 
			} 
			deleteAll($_POST['userdirpath']); 
			
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; '.$_POST['uname'].' destroyed.</p>';
			header('location: page_edit_users.php');
		}
	} else { 
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a user account.</p>';
		header('location: page_edit_users.php');
	}
	
?>