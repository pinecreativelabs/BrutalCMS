<?php session_start();
if($_POST['pup']=='seo'){
	// GENERAL SEO
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
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; SEO settings updated.</p>';
		header('location: page_seo_settings.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select project to edit</p>';
		header('location: page_seo_settings.php');
	}
	
}elseif($_POST['pup']=='meta'){
	// META DATA
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
				$setting->og = $_POST['og_image'];
				break;
			}
		}
		file_put_contents('data/general.xml', $settings->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; META tags updated.</p>';
		header('location: page_seo_settings.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select project to edit</p>';
		header('location: page_seo_settings.php');
	}
	
} elseif($_POST['pup']=='so'){
	// SITE OWNERSHIP
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
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Site Ownership Verification updated.</p>';
		header('location: page_seo_settings.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select project to edit</p>';
		header('location: page_seo_settings.php');
	}
	
} elseif($_POST['pup']=='tc'){
	// TRACKING CODES
	if(isset($_POST['update_tracking_codes'])){
		$ga_tc_file = fopen("data/ga-tracking-code.txt","w");
		$tp_tc_file = fopen("data/tp-tracking-code.txt","w");
		$gatc = $_POST['ga_tracking_code'];
		$tptc = $_POST['tp_tracking_code'];
		if($_POST['ga_tracking_code']!=''){fwrite($ga_tc_file,$gatc);}else{fwrite($ga_tc_file,'');}
		if($_POST['tp_tracking_code']!=''){fwrite($tp_tc_file,$tptc);}else{fwrite($tp_tc_file,'');}
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Tracking Codes updated.</p>';
		header('location: page_seo_settings.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select project to edit</p>';
		header('location: page_seo_settings.php');
	}
	
} elseif($_POST['pup']=='cs') {
	// COMING SOON PAGE
	if(isset($_POST['update_comingsoon'])){
		$syspages = simplexml_load_file('data/syspages.xml');
		foreach($syspages->syspage as $syspage){
			if($syspage['id'] == '11'){
				$syspage->comingsoon['status'] = $_POST['cs_status'];
				$syspage->comingsoon['template'] = $_POST['cs_template'];
				$syspage->comingsoon['deadline'] = $_POST['deadline'];
				if($_POST['cs_title']!=''){ $syspage->comingsoon['title'] = $_POST['cs_title'];}else{$syspage->comingsoon['title'] = 'Coming Soon'; }
				if($_POST['cs_message']!=''){$syspage->comingsoon = $_POST['cs_message'];} else { $syspage->comingsoon = 'New brutality is being constructed!'; }
				break;
			}
		}
		file_put_contents('data/syspages.xml', $syspages->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Coming Soon page updated.</p>';
		header('location: page_system_pages.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Update failed.</p>';
		header('location: page_system_pages.php');
	}
	
} elseif($_POST['pup']=='mm'){
	// MAINTENANCE MODE
	if(isset($_POST['update_mmode'])){
		$syspages = simplexml_load_file('data/syspages.xml');
		foreach($syspages->syspage as $syspage){
			if($syspage['id'] == '11'){
				$syspage->mmode['status'] = $_POST['mmode'];
				if($_POST['mm_title']!=''){ $syspage->mmode['title'] = $_POST['mm_title'];}else{$syspage->mmode['title'] = 'Maintenance Mode'; }
				if($_POST['mm_message']!=''){$syspage->mmode = $_POST['mm_message'];} else { $syspage->mmode = 'This site is undergoing maintenance.'; }
				break;
			}
		}
		file_put_contents('data/syspages.xml', $syspages->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Maintenance Mode updated.</p>';
		header('location: page_system_pages.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Update failed.</p>';
		header('location: page_system_pages.php');
	}
} else {}
?>