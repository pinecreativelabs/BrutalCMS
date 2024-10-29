<?php include('sysconfig.php');
include('paths.php');
include('helpers/dates.php');

// GET SYSTEM DATA
$sos_datapath_defaults = $bosdir.'/sat/sos/system/data/defaults.csv';
$sos_datapath_modules = $bosdir.'/sat/sos/system/data/modules.csv';
$sos_datapath_dev = $bosdir.'/sat/sos/system/data/dev.csv';
$sos_datapath_access = $bosdir.'/sat/sos/system/data/access.csv';
$sos_datapath_cc = $bosdir.'/sat/sos/system/data/cc.csv';
$sos_datapath_errors = $bosdir.'/sat/sos/system/data/errors.csv';
$sos_datapath_comingsoon = $bosdir.'/sat/sos/system/data/comingsoon.csv';
$sos_datapath_mmode = $bosdir.'/sat/sos/system/data/mmode.csv';
$sos_datapath_meta = $bosdir.'/sat/sos/system/data/meta.csv';
$sos_datapath_tracking = $bosdir.'/sat/sos/system/data/tracking.csv';

$row = 0;
// DEFAULT DATA
if (($dhandle = fopen($sos_datapath_defaults, "r")) !== FALSE) {
	while (($pdata = fgetcsv($dhandle, 1000, ",")) !== FALSE) {
		$row++;
		$appname = $pdata[0];
		$get_mailto = $pdata[1];
		$format_date = $pdata[2];
		$format_time = $pdata[3];
		$default_theme = $pdata[4];
		$get_fam_curl_mode = $pdata[5];
	} fclose($dhandle);
}	
$sitename = $appname;
$mailto = $get_mailto;
$ddf = $format_date;
$dtf = $format_time;
$theme = $default_theme;
$fam_curl_mode = $get_fam_curl_mode;
if($fam_curl_mode=='rel'){$fam_cm = 'relative';}else{$fam_cm = 'absolute';}

// ENABLED MODULES DATA
if (($handlemods = fopen($sos_datapath_modules, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlemods, 1000, ",")) !== FALSE) {
		$row++;
		$cad = $pdata[0];
		$crude = $pdata[1];
		$dick = $pdata[2];
		$edu = $pdata[3];
		$hapi = $pdata[4];
		$jack = $pdata[5];
		$mad = $pdata[6];
		$paws = $pdata[7];
		$ports = $pdata[8];
		$shop = $pdata[9];
		$slides = $pdata[10];
		$tilt = $pdata[11];
	} fclose($handlemods);
}

// DEVELOPER RESOURCES DATA
if (($devhandle = fopen($sos_datapath_dev, "r")) !== FALSE) {
	while (($pdata = fgetcsv($devhandle, 1000, ",")) !== FALSE) {
		$row++;
		$devmode = $pdata[0];
		$get_jquery = $pdata[1];
		$jqv = $pdata[2];
		$icon_lib = $pdata[3];
	} fclose($devhandle);
}
if(!isset($get_jquery)){$is_jquery = 'false';}else{$is_jquery = 'true';}
if($icon_lib=='md'){$ilib = 'Material Design';} elseif($icon_lib=='fa'){$ilib = 'Font Awesome';}else{$ilib='Native';}

// ACCESS RESTRICTIONS DATA
if (($accesshandle = fopen($sos_datapath_access, "r")) !== FALSE) {
	while (($pdata = fgetcsv($accesshandle, 1000, ",")) !== FALSE) {
		$row++;
		$get_registration = $pdata[0];
		$get_set_group = $pdata[1];
		$get_require_login = $pdata[2];
		$age_verify = $pdata[3];
		$get_min_age = $pdata[4];
		$get_pglock = $pdata[5];
	} fclose($accesshandle);
}
$registration = $get_registration;
$set_group = $get_set_group;
if($set_group==1){$group = 'admins';}elseif($set_group==2){$group = 'editors';}else{$group = 'members';}
$req_login = $get_require_login;
$age_restrict = $age_verify;
$age = $get_min_age;
$pglock = $get_pglock;
if((empty($pglock))||($pglock=='')){$plock='disabled';}else{$plock='enabled';}

// COOKIE CONSENT DATA
if (($cchandle = fopen($sos_datapath_cc, "r")) !== FALSE) {
	while (($pdata = fgetcsv($cchandle, 1000, ",")) !== FALSE) {
		$row++;
		$cc_mode = $pdata[0];
		$cc_duration = $pdata[1];
		$cc_textcolor = $pdata[2];
		$cc_bgcolor = $pdata[3];
		$cc_btn_textcolor = $pdata[4];
		$cc_btn_bgcolor = $pdata[5];
	} fclose($cchandle);
}

// ERROR PAGES DATA
if (($errhandle = fopen($sos_datapath_errors, "r")) !== FALSE) {
	while (($pdata = fgetcsv($errhandle, 1000, ",")) !== FALSE) {
		$row++;
		$errormode = $pdata[0];
		$error403 = $pdata[1];
		$error404 = $pdata[2];
		$error405 = $pdata[3];
		$error408 = $pdata[4];
		$error500 = $pdata[5];
		$error502 = $pdata[6];
		$error504 = $pdata[7];
	} fclose($errhandle);
}

// COMING SOON PAGE DATA
if (($cshandle = fopen($sos_datapath_comingsoon, "r")) !== FALSE) {
	while (($pdata = fgetcsv($cshandle, 1000, ",")) !== FALSE) {
		$row++;
		$cs_redir = $pdata[0];
		$cs_template = $pdata[1];
		$cs_header = $pdata[2];
		$cs_text = $pdata[3];
	} fclose($handlecs);
}

// MAINTENANCE MODE PAGE DATA
if (($mmhandle = fopen($sos_datapath_mmode, "r")) !== FALSE) {
	while (($pdata = fgetcsv($mmhandle, 1000, ",")) !== FALSE) {
		$row++;
		$mmode = $pdata[0];
		$mmtext = $pdata[1];
	} fclose($mmhandle);
}
// Default Meta Data Data
if (($metahandle = fopen($sos_datapath_meta, "r")) !== FALSE) {
	while (($pdata = fgetcsv($metahandle, 1000, ",")) !== FALSE) {
		$row++;
		$meta_title = $pdata[0];
		$meta_desc = $pdata[1];
		$is_tw_card = $pdata[2];
		$tw_handle = $pdata[3];
		$tw_img = $pdata[4];
		$is_og_data = $pdata[5];
		$og_img = $pdata[6];
	} fclose($metahandle);
}
if($is_tw_card=='true'){$tw_card='enabled';}else{$tw_card='disabled';}
$og_data = $get_ogdata;
if($is_og_data=='true'){$og_data='enabled';}else{$og_data='disabled';}

// Tracking Codes Data
if (($handletrkr = fopen($sos_datapath_tracking, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handletrkr, 1000, ",")) !== FALSE) {
		$row++;
		$tracking = $pdata[0];
		$tc_position = $pdata[1];
	} fclose($handletrkr);
}

// system config
$version = VERSION;
// get user IP 
$userIP = getHostByName(php_uname('n'));

// load jquery
$jquery = '<script src="'.$bosdir.'bat/jab/jquery.'.$jqver.'.js"></script>';
$jab = '<script src="'.$bosdir.'bat/jab/jab.js"></script>';

// load pagelock
$pagelock = '<script src="'.$bosdir.'sat/biscuit/pagelock.js"></script>';

// load age verify
$ageverify = '<script src="'.$bosdir.'sat/biscuit/age-verify.js"></script>';
$ageverify .= '
<script>
$(document).ready(function(){
	$.ageCheck({
		minAge: '.$age.',
		title: \'Verify Age\',
		copy:\'Must be '.$age.' or older to enter\',
		redirectTo:\'\',
		redirectOnFail:\'\',
		underAgeMsg:\'Not old enough!\'
	});
});
</script>';

?>