<?php session_start();
	if(isset($_POST['update_so_verify'])){
		$settings = simplexml_load_file('data/general.xml');
		foreach($settings->setting as $setting){
			if($setting['id'] == '11'){
				$setting->meta['scverify'] = $_POST['sc_verify_method'];
				if($_POST['sc_verify_method']=='tag'){$setting->scverifystring = $_POST['sc_verify_string'];}

				break;
			}
		}
		file_put_contents('data/general.xml', $settings->asXML());
		$_SESSION['message'] = 'Site Ownership Verification updated.';
		header('location: page_seo_settings.php');
	} else{
		$_SESSION['message'] = 'Select project to edit';
		header('location: page_seo_settings.php');
	}
?>