<?php session_start();
if(isset($_POST['add'])){
	
	if($_POST['pw1']!=$_POST['pw2']){
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Passwords do not match.</p>';
		header('location: page_edit_users.php');
	} else {
		
		$users = simplexml_load_file('data/users.xml');
		$newusers=array();
		foreach($users->user as $user){
			if($user['username'] == trim($_POST['uname'])){
				$newusers[] = $user['username'];
			} 
		}
		if(count($newusers)>=1){$createuser=false;} else {$createuser=true;}

		if($createuser==false){
			$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">That user already exists. Try another username.</p>';
			header('location: page_edit_users.php');
		} else {
			$uid = $_POST['uid'];
			$uname = trim(str_replace(' ','_',$_POST['uname']));
			$user = $users->addChild('user');
			$user->addAttribute('id', $_POST['uid']);
			$user->addAttribute('username', $uname);
			$user->addAttribute('pal', $_POST['pal']);
			$user->addAttribute('group', $_POST['usergroup']);
			if($_POST['active']=='true'){$user->addAttribute('active', $_POST['active']);} else {$user->addAttribute('active','false');}
			$user->addAttribute('status',$_POST['status']);
			$user->addAttribute('visibility',$_POST['visibility']);
			$user->addAttribute('blocked','0');
			if($_POST['pwe']=='md5'){
				$new_pw = md5($_POST['pw1']);
				$new_pin = md5($_POST['pin']);
			} else {
				$new_pw = sha1($_POST['pw1']);
				$new_pin = sha1($_POST['pin']);
			}
			$password = $user->addChild('password', $new_pw);
			$password->addAttribute('pin', $new_pin);
			$email = $user->addChild('email', $_POST['email']);
			$profile = $user->addChild('profile','');
			$profile->addAttribute('name','');
			$profile->addAttribute('sex','');
			$profile->addAttribute('birthday','');
			$locale = $user->addChild('locale','');
			$locale->addAttribute('country',$_POST['country']);
			$locale->addAttribute('region',$_POST['region']);
			$locale->addAttribute('city',$_POST['city']);
			$locale->addAttribute('timezone',$_POST['timezone']);
			$locale->addAttribute('language',$_POST['language']);
			$locale->addAttribute('curc',$_POST['curc']);
			$locale->addAttribute('curs',$_POST['curs']);
			$contact = $user->addChild('contact','');
			$contact->addAttribute('phone','');
			$contact->addAttribute('url','');
			$contact->addAttribute('ig','');
			$contact->addAttribute('tw','');
			$bio = $user->addChild('bio','');
		
			// Save to file
			$dom = new DomDocument();
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			$dom->loadXML($users->asXML());
			$dom->save('data/users.xml');
		
			// create user folders
			mkdir(realpath(__DIR__. '/../../..').'/backup/users/'.$uname, 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/files', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/trash', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data/paws', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data/paws/blog', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data/paws/events', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data/paws/gallery', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data/paws/podcasts', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data/paws/products', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data/paws/tv', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data/storyboard', 0777,true);
			mkdir(realpath(__DIR__. '/../../..').'/app/users/'.$uname.'/data/storyboard/images', 0777,true);
		
			// create user files
			$unotepad = fopen(realpath(__DIR__. '/../../..')."/app/users/".$uname."/data/notepad.txt","a+");
			fwrite($unotepad, "Note to self: ");
		
			$streams = realpath(__DIR__. '/../../..')."/core/data/xml/streams.xml";
			$mystreams = realpath(__DIR__. '/../../..')."/app/users/".$uname."/data/streams.xml";
			$notif = realpath(__DIR__. '/../../..')."/core/data/xml/notifications.xml";
			$mynotif = realpath(__DIR__. '/../../..')."/app/users/".$uname."/data/paws/notifications.xml";
			$sboard = realpath(__DIR__.'/../../..')."/core/data/xml/storyboards.xml";
			$mysboard = realpath(__DIR__.'/../../..')."/app/users/".$uname."/data/storyboards.xml";
			$stories = realpath(__DIR__.'/../../..')."/core/data/xml/stories.xml";
			$mystories = realpath(__DIR__.'/../../..')."/app/users/".$uname."/data/stories.xml";
			$blogposts = realpath(__DIR__.'/../../..')."/core/data/xml/blogposts.xml";
			$myblogposts = realpath(__DIR__.'/../../..')."/app/users/".$uname."/data/paws/blogposts.xml";
			$eventposts = realpath(__DIR__.'/../../..')."/core/data/xml/events.xml";
			$myeventposts = realpath(__DIR__.'/../../..')."/app/users/".$uname."/data/paws/eventts.xml";
			$photos = realpath(__DIR__.'/../../..')."/core/data/xml/photos.xml";
			$myphotos = realpath(__DIR__.'/../../..')."/app/users/".$uname."/data/paws/photos.xml";
			$podcasts = realpath(__DIR__.'/../../..')."/core/data/xml/podcasts.xml";
			$mypodcasts = realpath(__DIR__.'/../../..')."/app/users/".$uname."/data/paws/podcasts.xml";
			$products = realpath(__DIR__.'/../../..')."/core/data/xml/products.xml";
			$myproducts = realpath(__DIR__.'/../../..')."/app/users/".$uname."/data/paws/products.xml";
			$tvshows = realpath(__DIR__.'/../../..')."/core/data/xml/tvshows.xml";
			$mytvshows = realpath(__DIR__.'/../../..')."/app/users/".$uname."/data/paws/tvshows.xml";
		
			copy($notif,$mynotif);
			copy($streams,$mystreams);
			copy($sboard,$mysboard);
			copy($stories,$mystories);
			copy($blogposts,$myblogposts);
			copy($eventposts,$myeventposts);
			copy($photos,$myphotos);
			copy($podcasts,$mypodcasts);
			copy($products,$myproducts);
			copy($tvshows,$mytvshows);
		
			// success message
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; User created successfully</p>';
			header('location: page_edit_users.php');
		}
	}
} else{
	$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;"> ERROR. Failed to create user.</p>';
	header('location: page_edit_users.php');
}
?>