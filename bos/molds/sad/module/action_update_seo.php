<?php session_start();
	if(isset($_POST['update_seo'])){
		$settings = simplexml_load_file('data/general.xml');
		foreach($settings->setting as $setting){
			if($setting['id'] == '11'){
				$setting->meta['tracking'] = $_POST['tracking'];
				$setting->meta['canonical'] = $_POST['canonical'];
				if($_POST['meta_title']!=''){$setting->metatitle = $_POST['meta_title'];}else{$setting->metatitle='Brutal CMS';}
				$setting->metadesc = $_POST['meta_desc'];
				break;
			}
		}
		file_put_contents('data/general.xml', $settings->asXML());
		$_SESSION['message'] = 'SEO settings updated.';
		header('location: page_seo_settings.php');
	} else{
		$_SESSION['message'] = 'Select project to edit';
		header('location: page_seo_settings.php');
	}
?>