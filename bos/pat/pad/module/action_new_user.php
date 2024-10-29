<?php session_start();
	$usersfile = realpath(__DIR__. '/../..').'/pad/module/data/users.csv';
	$profilefolder = realpath(__DIR__. '/../..').'/profiles/';
	$userlistfile = realpath(__DIR__. '/../..').'/pad/module/data/userlist.csv';
	
	if(isset($_POST['add'])){
		$uid = $_POST['uid'];
		$user = $_POST['uname'];
		$pw1 = $_POST['pw1'];
		$pw2 = $_POST['pw2'];
		$email = $_POST['email'];
		if(isset($_POST['active'])){$active = $_POST['active'];}else{$active='true';}
		$group = $_POST['group'];
		
		// check if new user password is confirmed
		if($pw1==$pw2){
			
			// Check if new users already exists	
			$pfile = fopen($usersfile,"a+");
			$profile = fopen($profilefolder.$user.".csv","a+");
			$userlist = fopen($userlistfile,"a+");
			rewind($pfile);
			while (!feof($pfile)) {
				$line = fgets($pfile);
				$tmp = explode(',', $line);
				if ($tmp[0] == $user) {
					$_SESSION['message'] = 'User already exists!';
					$continueon = false; break;
				} else {$continueon=true;}
			}
			if($continueon==true){
				$userpass = md5($pw1);
				fwrite($pfile, "\r\n$user,$userpass");
				fwrite($userlist, "\r\n$uid,$user,$userpass,$email,$active,$group");
				// create user folders
				mkdir(realpath(__DIR__. '/../..')."/users/".$user, 0777,true);
				mkdir(realpath(__DIR__. '/../..')."/users/".$user."/files", 0777,true);
				mkdir(realpath(__DIR__. '/../..')."/users/".$user."/photos", 0777,true);
				mkdir(realpath(__DIR__. '/../..')."/users/".$user."/audio", 0777,true);
				mkdir(realpath(__DIR__. '/../..')."/users/".$user."/video", 0777,true);
				mkdir(realpath(__DIR__. '/../..')."/users/".$user."/data", 0777,true);
				mkdir(realpath(__DIR__. '/../..')."/users/".$user."/data/paws",0777,true);
				mkdir(realpath(__DIR__. '/../..')."/users/".$user."/data/paws/csv",0777,true);
				mkdir(realpath(__DIR__. '/../..')."/users/".$user."/data/paws/xml",0777,true);
				// create data files
				$uprofile = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/profile.csv","a+");
				$ustreams = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/streams.csv","a+");
				$uchannels = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/channels.csv","a+");
				$notepad = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/notepad.txt", "a+");
				$blogpostlog = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/paws/csv/blog_postlog.csv","a+");
				$eventpostlog = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/paws/csv/event_postlog.csv","a+");
				$galpostlog = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/paws/csv/gallery_postlog.csv","a+");
				$mediapostlog = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/paws/csv/media_postlog.csv","a+");
				$podpostlog = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/paws/csv/podcast_postlog.csv","a+");
				$prodpostlog = fopen(realpath(__DIR__. '/../..')."/users/".$user."/data/paws/csv/product_postlog.csv","a+");
				// copy PAWS data files to new user folders
				$blog = realpath(__DIR__. '/../../..')."/rat/repo/data/xml/blog.xml";
				$ublog = realpath(__DIR__. '/../..')."/users/".$user."/data/paws/xml/blog.xml";
				copy($blog,$ublog);
				$events = realpath(__DIR__. '/../../..')."/rat/repo/data/xml/events.xml";
				$uevents = realpath(__DIR__. '/../..')."/users/".$user."/data/paws/xml/events.xml";
				copy($events,$uevents);
				$podcasts = realpath(__DIR__. '/../../..')."/rat/repo/data/xml/podcasts.xml";
				$upodcasts = realpath(__DIR__. '/../..')."/users/".$user."/data/paws/xml/podcasts.xml";
				copy($podcasts,$upodcasts);
				$gallery = realpath(__DIR__. '/../../..')."/rat/repo/data/xml/gallery.xml";
				$ugallery = realpath(__DIR__. '/../..')."/users/".$user."/data/paws/xml/gallery.xml";
				copy($gallery,$ugallery);
				$media = realpath(__DIR__. '/../../..')."/rat/repo/data/xml/media.xml";
				$umedia = realpath(__DIR__. '/../..')."/users/".$user."/data/paws/xml/media.xml";
				copy($media,$umedia);
				$products = realpath(__DIR__. '/../../..')."/rat/repo/data/xml/products.xml";
				$uproducts = realpath(__DIR__. '/../..')."/users/".$user."/data/paws/xml/products.xml";
				copy($products,$uproducts);
				// write to data files
				fwrite($profile, "uid,username,email,is_active,group"."\r\n"."$uid,$user,$email,$active,$group");
				fwrite($uprofile, "visibility,status,first_name,last_name,sex,birthday,email,phone,website,bio"."\r\n"."public,available,,,,,$email,,,");
				fwrite($ustreams,"sid,stream_title,stream_desc\r\n".
				$uid."-0,Default,My default stream\r\n".$uid."-1,Blog,Blogging stream for $user.\r\n".
				$uid."-2,Podcasts,Podcast stream for $user.\r\n".$uid."-3,Products,Product stream for $user.\r\n".
				$uid."-4,Events,Event stream for $user.\r\n".$uid."-5,Gallery,Gallery stream for $user.\r\n".
				$uid."-6,Media,Media stream for $user.\r\n".$uid."-7,Data,Data stream for $user.");
				fwrite($notepad,"Welcome, $user!\r\n\r\nAdd your notes here.");
				fwrite($blogpostlog, "pid,sid,cid,title,dip,data_location");
				fwrite($eventpostlog, "pid,sid,cid,title,dip,data_location");
				fwrite($galpostlog, "pid,sid,cid,title,dip,data_location");
				fwrite($mediapostlog, "pid,sid,cid,title,dip,data_location");
				fwrite($podpostlog, "pid,sid,cid,title,dip,data_location");
				fwrite($prodpostlog, "pid,sid,cid,title,dip,data_location");
				fwrite($uchannels,"cid,channel_title,channel_desc"."\r\n"."$uid"."0,\"Channel $user\",\"My default channel\""."\r\n"."$uid"."1,\"News\",\"$user news channel.\"");
				fclose($pfile);
				$_SESSION['message'] = 'User added successfully';
				header('location: page_edit_users.php');
			} else {
				$_SESSION['message'] = 'User already exists!';
				header('location: page_edit_users.php');
			}

		} else {
			$_SESSION['message'] = 'Password not confirmed. User not added.';
			header('location: page_edit_users.php');
		}
	} else {
		$_SESSION['message'] = 'All fields required.';
		header('location: page_edit_users.php');
	}

?>