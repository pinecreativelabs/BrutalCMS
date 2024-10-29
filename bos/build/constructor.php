<? 
/* BUILD CONSTRUCTOR 
 * version 3.1
 */
require_once('sysconfig.php');
$version = VERSION;

require_once('paths.php');
require_once('helpers/get_system_settings.php');
require_once('helpers/environment.php');
require_once('key-arrays.php');

// get bicons library
require_once('helpers/get_bicons_data.php');

// get user info
require_once('helpers/get_user_data.php');

// get modules config info
require_once('helpers/get_modules_config.php');

// set timezone
if($tz_mode=='user'){
	date_default_timezone_set($user_tz);
} else { 
	date_default_timezone_set($timezone);
}
// load date helper
require_once('helpers/dates.php');

$header = '';
/* maintenance mode */
if($maintenance_mode=='on'){
	if(($system_page!=true)||(!isset($system_page))){
		header("Location: ".$bdir."bos/maintenance-mode.php");
		exit;
	}
}elseif($coming_soon=='on'){
	if(($system_page!=true)||(!isset($system_page))){
		header("Location: ".$bdir."bos/coming-soon.php");
		exit;
	}
} else {
	// start constructing page header here
}

include('constructors/meta-header.php');
include('constructors/favicons.php');
include('constructors/select-inputs.php');

// construct CSS references
include('constructors/css.php');
$bos_editor_css = '../../../core/css/construct-bosui.css';
include('constructors/blueprint-constructor.php');

// construct javascript references
include('constructors/jab.php');

include('constructors/system-select-lists.php');

if($dev_mode=='on'){
	// remove header
	header_remove('ETag');
	header_remove('Pragma');
	header_remove('Cache-Control');
	header_remove('Last-Modified');
	header_remove('Expires');
	// set header
	header('Expires: Thu, 22 Apr 1985 00:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
	header('Cache-Control: post-check=0, pre-check=0',false);
	header('Pragma: no-cache');
	// load CSS
	$load_css = $deconstruct_core_css . $deconstruct_molds_css;
} else { 
	$load_css = $core_css;
}

/* Password Requirements */
if($pw_strength=='standard'){
	$pw_reqs = '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$';
	$pin_req = '[0-9]{4,8}';
	$pw_req_msg = 'Minimum 6 characters, at least one uppercase letter, one lowercase letter and one number';
	$pin_req_msg = "Enter a 4-8 digit numeric PIN";
} elseif($pw_strength=='strong'){
	$pw_reqs = '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$';
	$pin_req = '[0-9]{6,8}';
	$pw_req_msg = 'Minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character';
	$pin_req_msg = "Enter a 6-8 digit numeric PIN";
} elseif($pw_strength=='secure'){
	$pw_reqs = '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$';
	$pin_req = '[0-9]{8,8}';
	$pw_req_msg = 'Minimum 10 characters, at least one uppercase letter, one lowercase letter, one number and one special character';
	$pin_req_msg = "Enter an 8 digit numeric PIN";
} else { 
	$pw_reqs='^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$';
	$pin_req = '[0-9]{4,8}';
	$pw_req_msg = 'Minimum 6 characters, at least one letter and one number';
	$pin_req_msg = "Enter a 4-8 digit numeric PIN";
}

/* WIDGETS */
include('constructors/instant-search.php');

// clean text function
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

?>