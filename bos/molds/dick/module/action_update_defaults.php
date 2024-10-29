<?php
	session_start();
	if(isset($_POST['update_general'])){
		$settings = simplexml_load_file('data/defaults.xml');
		if($_POST['pup']=='general'){
			foreach($settings->setting as $setting){if($setting['id']=='365'){
				$setting->displaymode = $_POST['displaymode'];
				$setting->displaymode['persist'] = $_POST['persist'];
				$setting->displaymode['dformat'] = $_POST['dformat'];
				if(isset($_POST['jan'])){$setting->months['jan'] = $_POST['jan'];}else{$setting->months['jan']='0';}
				if(isset($_POST['feb'])){$setting->months['feb'] = $_POST['feb'];}else{$setting->months['feb']='0';}
				if(isset($_POST['mar'])){$setting->months['mar'] = $_POST['mar'];}else{$setting->months['mar']='0';}
				if(isset($_POST['apr'])){$setting->months['apr'] = $_POST['apr'];}else{$setting->months['apr']='0';}
				if(isset($_POST['may'])){$setting->months['may'] = $_POST['may'];}else{$setting->months['may']='0';}
				if(isset($_POST['jun'])){$setting->months['jun'] = $_POST['jun'];}else{$setting->months['jun']='0';}
				if(isset($_POST['jul'])){$setting->months['jul'] = $_POST['jul'];}else{$setting->months['jul']='0';}
				if(isset($_POST['aug'])){$setting->months['aug'] = $_POST['aug'];}else{$setting->months['aug']='0';}
				if(isset($_POST['sep'])){$setting->months['sep'] = $_POST['sep'];}else{$setting->months['sep']='0';}
				if(isset($_POST['oct'])){$setting->months['oct'] = $_POST['oct'];}else{$setting->months['oct']='0';}
				if(isset($_POST['nov'])){$setting->months['nov'] = $_POST['nov'];}else{$setting->months['nov']='0';}
				if(isset($_POST['dec'])){$setting->months['dec'] = $_POST['dec'];}else{$setting->months['dec']='0';}
				if(isset($_POST['spring'])){$setting->seasons['spring'] = $_POST['spring'];}else{$setting->seasons['spring']='0';}
				if(isset($_POST['summer'])){$setting->seasons['summer'] = $_POST['summer'];}else{$setting->seasons['summer']='0';}
				if(isset($_POST['fall'])){$setting->seasons['fall'] = $_POST['fall'];}else{$setting->seasons['fall']='0';}
				if(isset($_POST['winter'])){$setting->seasons['winter'] = $_POST['winter'];}else{$setting->seasons['winter']='0';}
				break;
			}}
			file_put_contents('data/defaults.xml', $settings->asXML());
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; General data updated successfully</p>';
			header('location: page_defaults.php');
		} else {
			foreach($settings->setting as $setting){if($setting['id']=='365'){
				$setting->fallback['type'] = $_POST['fallbacktype'];
				$setting->fallback['title'] = $_POST['fallbacktitle'];
				$setting->fallback = $_POST['fallbackmedia'];
				$setting->fallbacklink = $_POST['fallbacklink'];
				$setting->fallbacklink['target'] = $_POST['fallbacklinktarget'];
				$setting->fallbacklink['text'] = $_POST['fallbacklinktext'];
				$setting->fallbackcontent = $_POST['fallbackmessage'];
				$setting->design['pcolor'] = $_POST['pcolor'];
				$setting->design['scolor'] = $_POST['scolor'];
				$setting->design['tcolor'] = $_POST['tcolor'];
				$setting->design['acolor'] = $_POST['acolor'];
				$setting->design['ocolor'] = $_POST['ocolor'];
			}}
			file_put_contents('data/defaults.xml', $settings->asXML());
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Fallback content updated successfully</p>';
			header('location: page_defaults.php');
		}

	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Data failed to update.</p>';
		header('location: page_system_settings.php');
	}
?>