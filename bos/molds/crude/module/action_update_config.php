<?php session_start();
	if(isset($_POST['update_crudeconfig'])){
		$settings = simplexml_load_file('data/config.xml');
		foreach($settings->crudeconfig as $setting){
			if($setting['id'] == '27'){
				$setting->options['addrecords'] = $_POST['addrec'];
				$setting->options['delrecords'] = $_POST['delrec'];
				$setting->options['readonly'] = $_POST['readonly'];
				break;
			}
		}
		file_put_contents('data/config.xml', $settings->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; CRUDE settings updated.</p>';
		header('location: page_configure.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Update failed.</p>';
		header('location: page_configure.php');
	}
?>