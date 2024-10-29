<?php session_start();
function registerUser($user,$uemail,$pass1,$pass2){
	$errorText = '';
	
	// Check passwords
	if ($pass1 != $pass2) $errorText = '<span class="red black-t blink">Passwords are not identical!</span>';
	elseif (strlen($pass1) < 6) $errorText = '<div class="black brdr-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 1em;"><span class="red-t blink">Password must be at least 6 characters.</span></div>';
	
	// generate a user ID
	//$dir = "pat/profiles/";
	//$profilecount = 0;
	//$profiles = glob($dir . "*");
	//if ($profiles){
	//	$profilecount = count($profiles);
	//	$uid = $profilecount+1;
	//	$uid_si = 0;
	//}
	$uid = date('zGis');
	
	// get system settings
	if (($getsysdata = fopen("sat/sos/system/data/access.csv", "r")) !== FALSE) {
		while (($pdata = fgetcsv($getsysdata, 900, ",")) !== FALSE) {
		$row++;
		$set_dgroup = $pdata[1];
		} fclose($getsysdata);
	}
	// Check user existance	
	$pfile = fopen("pat/pad/module/data/users.csv","a+");
	$profile = fopen("pat/profiles/".$user.".csv","a+");
	$userlist = fopen("pat/pad/module/data/userlist.csv","a+");
    rewind($pfile);
    while (!feof($pfile)) {
        $line = fgets($pfile);
        $tmp = explode(',', $line);
        if ($tmp[0] == $user) {
            $errorText = '<div class="black brdr-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 1em;"><span class="red-t blink">The selected username is taken!</span></div>';
            break;
        }
    }
	
    // If everything is OK -> store user data and create user profile
    if ($errorText == ''){
		// Secure password string
		$userpass = md5($pass1);
		fwrite($pfile, "\r\n$user,$userpass");
		// create user files directory
		mkdir("pat/users/".$user, 0777,true);
		mkdir("pat/users/".$user."/files", 0777,true);
		mkdir("pat/users/".$user."/photos", 0777,true);
		mkdir("pat/users/".$user."/audio", 0777,true);
		mkdir("pat/users/".$user."/video", 0777,true);
		mkdir("pat/users/".$user."/data", 0777,true);
		mkdir("pat/users/".$user."/data/paws",0777,true);
		mkdir("pat/users/".$user."/data/paws/csv",0777,true);
		mkdir("pat/users/".$user."/data/paws/xml",0777,true);
		$uprofile = fopen("pat/users/".$user."/data/profile.csv","a+");
		$ustreams = fopen("pat/users/".$user."/data/streams.csv","a+");
		$uchannels = fopen("pat/users/".$user."/data/channels.csv","a+");
		$notepad = fopen("pat/users/".$user."/data/notepad.txt", "a+");
		$blogpostlog = fopen("pat/users/".$user."/data/paws/csv/blog_postlog.csv","a+");
		$eventpostlog = fopen("pat/users/".$user."/data/paws/csv/events_postlog.csv","a+");
		$galpostlog = fopen("pat/users/".$user."/data/paws/csv/gallery_postlog.csv","a+");
		$mediapostlog = fopen("pat/users/".$user."/data/paws/csv/media_postlog.csv","a+");
		$podpostlog = fopen("pat/users/".$user."/data/paws/csv/podcast_postlog.csv","a+");
		$prodpostlog = fopen("pat/users/".$user."/data/paws/csv/product_postlog.csv","a+");
		// copy PAWS data files to new user folders
		$blog = "rat/repo/data/xml/blog.xml";
		$ublog = "pat/users/".$user."/data/paws/xml/blog.xml";
		copy($blog,$ublog);
		$events = "rat/repo/data/xml/events.xml";
		$uevents = "pat/users/".$user."/data/paws/xml/events.xml";
		copy($events,$uevents);
		$podcasts = "rat/repo/data/xml/podcasts.xml";
		$upodcasts = "pat/users/".$user."/data/paws/xml/podcasts.xml";
		copy($podcasts,$upodcasts);
		$gallery = "rat/repo/data/xml/gallery.xml";
		$ugallery = "pat/users/".$user."/data/paws/xml/gallery.xml";
		copy($gallery,$ugallery);
		$media = "rat/repo/data/xml/media.xml";
		$umedia = "pat/users/".$user."/data/paws/xml/media.xml";
		copy($media,$umedia);
		$products = "rat/repo/data/xml/products.xml";
		$uproducts = "pat/users/".$user."/data/paws/xml/products.xml";
		copy($products,$uproducts);
		// write user data files
		fwrite($profile, "uid,username,email,is_active,group"."\r\n"."$uid,$user,$uemail,true,".$set_dgroup);
		fwrite($uprofile, "visibility,status,first_name,last_name,sex,birthday,email,phone,website,bio"."\r\n"."public,available,,,,,$uemail,,,");
		fwrite($ustreams,"sid,stream_title,stream_desc\r\n".
		$uid."-0,Default,My default stream\r\n".$uid."-1,Blog,Blogging stream for $user.\r\n".
		$uid."-2,Podcasts,Podcast stream for $user.\r\n".$uid."-3,Products,Product stream for $user.\r\n".
		$uid."-4,Events,Event stream for $user.\r\n".$uid."-5,Gallery,Gallery stream for $user.\r\n".
		$uid."-6,Media,Media stream for $user.\r\n".$uid."-7,Data,Data stream for $user.");
		fwrite($notepad,"Welcome, $user!\r\n\r\nAdd your notes here.");
		fwrite($userlist, "\r\n$uid,$user,$userpass,$uemail,true,".$set_dgroup);
		fwrite($blogpostlog, "pid,sid,cid,title,dip,data_location");
		fwrite($eventpostlog, "pid,sid,cid,title,dip,data_location");
		fwrite($galpostlog, "pid,sid,cid,title,dip,data_location");
		fwrite($mediapostlog, "pid,sid,cid,title,dip,data_location");
		fwrite($podpostlog, "pid,sid,cid,title,dip,data_location");
		fwrite($prodpostlog, "pid,sid,cid,title,dip,data_location");
		fwrite($uchannels,"cid,channel_title,channel_desc"."\r\n"."$uid"."0,\"Channel $user\",\"My default channel\""."\r\n".
		"$uid"."1,\"News\",\"$user news channel.\"");
    }
    fclose($pfile);
	return $errorText;
}

function loginUser($user,$pass){
	$errorText = '';
	$validUser = false;
	// Check user existance	
	$pfile = fopen("pat/pad/module/data/users.csv","r");
    rewind($pfile);
    while (!feof($pfile)) {
        $line = fgets($pfile);
        $tmp = explode(',', $line);
        if ($tmp[0] == $user) {
            // User exists, check password
            if (trim($tmp[1]) == trim(md5($pass))){
            	$validUser= true;
            	$_SESSION['userName'] = $user;
			} break;
        }
    }
    fclose($pfile);

    if ($validUser != true) $errorText = '<div class="black brdr-s-t charcoal-b" style="padding: 4px; width: 100%; margin-bottom: 1em;"><span class="red-t blink">Invalid username or password!</span></div>';
    if ($validUser == true) $_SESSION['validUser'] = true;
    else $_SESSION['validUser'] = false;
	return $errorText;	
}

function logoutUser(){
	unset($_SESSION['validUser']);
	unset($_SESSION['userName']);
}

function checkUser(){
	if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true)){
		header('Location: login.php');
	}
}
function checkUserBackdoor(){
	if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true)){
		header('Location: backdoor-login.php');
	}
}
?>