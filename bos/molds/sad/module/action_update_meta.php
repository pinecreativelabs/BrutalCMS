<?php session_start();
	if(isset($_POST['update_meta'])){
		$settings = simplexml_load_file('data/general.xml');
		foreach($settings->setting as $setting){
			if($setting['id'] == '11'){
				$setting->meta['adult'] = $_POST['rating'];
				$setting->meta['robots'] = $_POST['robots'];
				$setting->meta['nosearchbox'] = $_POST['nosearchbox'];
				$setting->meta['noreadaloud'] = $_POST['noreadaloud'];
				$setting->meta['notranslate'] = $_POST['notranslate'];
				$setting->og['enabled'] = $_POST['og'];
				$setting->tc['enabled'] = $_POST['tc'];
				$setting->tc['handle'] = str_replace('@','',$_POST['tc_handle']);
				$setting->og = $_POST['og_image'];
				$setting->tc = $_POST['tc_image'];
				break;
			}
		}
		file_put_contents('data/general.xml', $settings->asXML());
		$_SESSION['message'] = 'META tags updated.';
		header('location: page_seo_settings.php');
	} else{
		$_SESSION['message'] = 'Select project to edit';
		header('location: page_seo_settings.php');
	}
?>