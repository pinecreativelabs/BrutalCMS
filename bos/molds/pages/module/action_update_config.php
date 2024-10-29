<?php session_start();
	if(isset($_POST['update_pgsconfig'])){
		$settings = simplexml_load_file('data/config.xml');
		foreach($settings->pagesconfig as $setting){
			if($setting['id'] == '22'){
				$setting->options['location'] = $_POST['pages_location'];
				$setting->options['genmode'] = $_POST['pages_genmode'];
				$setting->options['pal'] = $_POST['pagespal'];
				$setting->options['meta'] = $_POST['pagesmeta'];
				break;
			}
		}
		file_put_contents('data/config.xml', $settings->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; PAGES settings updated.</p>';
		header('location: page_configure.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Update failed.</p>';
		header('location: page_configure.php');
	}
?>