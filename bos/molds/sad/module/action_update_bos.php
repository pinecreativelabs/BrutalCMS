<?php session_start();
$settings = simplexml_load_file('data/general.xml');
if((isset($_POST['update_general']))&&($_POST['pup']=='sysd')){
	foreach($settings->setting as $setting){
		if($setting['id'] == '11'){
			if($_POST['sitename']!=''){$setting->sitename = $_POST['sitename'];}else{$setting->sitename='Brutal CMS';}
			$setting->mailto = $_POST['mailto'];
			$setting->formats['date'] = $_POST['df'];
			$setting->formats['timestamp'] = $_POST['tf'];
			$setting->locale['lang'] = $_POST['language'];
			$setting->locale['country'] = $_POST['country'];
			$setting->locale['region'] = $_POST['region'];
			$setting->locale['city'] = $_POST['city'];
			$setting->locale['mode'] = $_POST['tzmode'];
			if($_POST['tzmode']=='system'){$setting->locale['timezone'] = $_POST['timezone'];}
			$setting->dev['mode'] = $_POST['devmode'];
			$setting->dev['jquery'] = $_POST['jq'];
			$setting->dev['jqver'] = $_POST['jqv'];
			$setting->dev['icons'] = $_POST['icon_lib'];
			break;
		}
	}
	file_put_contents('data/general.xml', $settings->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; System Defaults updated.</p>';
	header('location: page_system_settings.php');
} elseif((isset($_POST['update_bosui']))&&($_POST['pup']=='bos')){
	foreach($settings->setting as $setting){
		if($setting['id'] == '11'){
			$setting->bosui['famcopy'] = $_POST['fcum'];
			$setting->bosui['draggable'] = $_POST['draggable'];
			$setting->cad['enabled'] = $_POST['cad'];
			$setting->cad['pal'] = $_POST['cad_pal'];
			$setting->crude['enabled'] = $_POST['crude'];
			$setting->crude['pal'] = $_POST['crude_pal'];
			$setting->dick['enabled'] = $_POST['dick'];
			$setting->dick['pal'] = $_POST['dick_pal'];
			$setting->edu['enabled'] = $_POST['edu'];
			$setting->edu['pal'] = $_POST['edu_pal'];
			$setting->hapi['enabled'] = $_POST['hapi'];
			$setting->hapi['pal'] = $_POST['hapi_pal'];
			$setting->jack['enabled'] = $_POST['jack'];
			$setting->jack['pal'] = $_POST['jack_pal'];
			$setting->mad['enabled'] = $_POST['mad'];
			$setting->mad['pal'] = $_POST['mad_pal'];
			$setting->map['enabled'] = $_POST['map'];
			$setting->map['pal'] = $_POST['map_pal'];
			$setting->mydid['enabled'] = $_POST['mydid'];
			$setting->mydid['pal'] = $_POST['mydid_pal'];
			$setting->paws['enabled'] = $_POST['paws'];
			$setting->paws['pal'] = $_POST['paws_pal'];
			$setting->ports['enabled'] = $_POST['ports'];
			$setting->ports['pal'] = $_POST['ports_pal'];
			$setting->shop['enabled'] = $_POST['shop'];
			$setting->shop['pal'] = $_POST['shop_pal'];
			$setting->storyboard['enabled'] = $_POST['storyboard'];
			$setting->storyboard['pal'] = $_POST['storyboard_pal'];
			$setting->tilt['enabled'] = $_POST['tilt'];
			$setting->tilt['pal'] = $_POST['tilt_pal'];
			break;
		}
	}
	file_put_contents('data/general.xml', $settings->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; BOS UI settings updated.</p>';
	header('location: page_system_settings.php');
} elseif((isset($_POST['update_access']))&&($_POST['pup']=='access')){
	foreach($settings->setting as $setting){
		if($setting['id'] == '11'){
			$setting->access['registration'] = $_POST['register'];
			$setting->access['pwstrength'] = $_POST['pwstrength'];
			$setting->access['pwencrypt'] = $_POST['pwencrypt'];
			$setting->access['login'] = $_POST['loginmode'];
			$setting->access['pal_default'] = $_POST['pal_default'];
			$setting->access['pagelock'] = $_POST['pagelock'];
			$setting->access['timeout'] = $_POST['timeout'];
			$setting->agerestrict['status'] = $_POST['agerestrict'];
			$setting->agerestrict['age'] = $_POST['min_age'];
			$setting->agerestrict['redirect'] = $_POST['ar_redirect'];
			if($_POST['ar_title']!=''){ $setting->agerestrict['title'] = $_POST['ar_title'];}else{$setting->agerestrict['title'] = 'Age Verification'; }
			if($_POST['ar_copy']!=''){$setting->agerestrict = $_POST['ar_copy'];} else { $setting->agerestrict = 'Must be 18 or older to enter.'; }
			$setting->underage['redirect'] = $_POST['uaredirmode'];
			$setting->underage['redirto'] = $_POST['uaredirurl'];
			if($_POST['ua_message']!=''){$setting->underage = $_POST['ua_message'];} else { $setting->underage = 'You are not old enough to enter.'; }
			break;
		}
	}
	file_put_contents('data/general.xml', $settings->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Access settings updated.</p>';
	header('location: page_system_settings.php');
} elseif((isset($_POST['update_cookies']))&&($_POST['pup']=='cc')){
	foreach($settings->setting as $setting){
		if($setting['id'] == '11'){
			$setting->cc['mode'] = $_POST['cc_mode'];
			$setting->cc['duration'] = $_POST['cc_dur'];
			$setting->cc['position'] = $_POST['cc_position'];
			$setting->cc['textcolor'] = $_POST['cc_text_color'];
			$setting->cc['bgcolor'] = $_POST['cc_bg_color'];
			$setting->cc['btnbg'] = $_POST['cc_btn_bg'];
			$setting->cc['btn_text_color'] = $_POST['cc_btn_text_color'];
			if($_POST['cc_title']!=''){ $setting->cccontent['title'] = $_POST['cc_title'];}else{$setting->cccontent['title'] = 'We Use Cookies';}
			if($_POST['cc_btn_text']!=''){$setting->cccontent['btn_text'] = $_POST['cc_btn_text'];}else{$setting->cccontent['btn_text'] = 'Accept';}
			if($_POST['cc_copy']!=''){$setting->cccontent = $_POST['cc_copy'];} else {
				$setting->cccontent = 'Cookies help us deliver the best experience on our website. By using our website, you agree to the use of cookies.';
			}
			if($_POST['cc_policy_text']!=''){
				$setting->cccontent['policytext'] = $_POST['cc_policy_text'];
			} else {$setting->cccontent['policytext'] = 'View Privacy Policy';}
			if($_POST['cc_policy_url']!=''){
				$setting->cccontent['policyurl'] = $_POST['cc_policy_url'];
			} else {$setting->cccontent['policyurl'] = 'https://gdpr.eu/tag/gdpr/';}
			break;
		}
	}
	file_put_contents('data/general.xml', $settings->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Cookie Consent settings updated.</p>';
	header('location: page_system_settings.php');
} else{
	$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Update failed.</p>';
	header('location: page_system_settings.php');
}
?>