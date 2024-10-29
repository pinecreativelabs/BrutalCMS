<?php session_start();
	if(isset($_POST['update_tracking_codes'])){
		
		if($_POST['ga_tracking_code']!=''){
			$ga_tc_file = fopen("data/ga-tracking-code.txt","w");
			fwrite($ga_tc_file,$_POST['ga_tracking_code']);
		}
		if($_POST['tp_tracking_code']!=''){
			$tp_tc_file = fopen("data/tp-tracking-code.txt","w");
			fwrite($tp_tc_file,$_POST['tp_tracking_code']);
		}
		
		$_SESSION['message'] = 'Tracking Codes updated.';
		header('location: page_seo_settings.php');
	} else{
		$_SESSION['message'] = 'Select project to edit';
		header('location: page_seo_settings.php');
	}
?>