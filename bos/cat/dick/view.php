<?php 
// get current dates
$today = new DateTime();
$month = date('m');
$day = date('l');
// get the season dates
$spring = new DateTime('March 20');
$summer = new DateTime('June 20');
$fall = new DateTime('September 22');
$winter = new DateTime('December 21');

// $dickdatapath = 'module/data/defaults.csv';
// $wd_file = simplexml_load_file('module/data/weekdays.xml');
// $days_file = simplexml_load_file('module/data/days.xml');

// if loading from front-end page: 
$dickdatapath = 'bos/cat/dick/module/data/defaults.csv';
$wd_file = simplexml_load_file('bos/cat/dick/module/data/weekdays.xml');
$days_file = simplexml_load_file('bos/cat/dick/module/data/days.xml');

$row = 0;
// get module default data
if (($handlemydick = fopen($dickdatapath, "r")) !== FALSE) {
	while (($ddata = fgetcsv($handlemydick, 1000, ",")) !== FALSE) {
		$row++;
		$dick_tz = $ddata[0];
		$dick_template = $ddata[1];
		$dick_displaymode = $ddata[2];
		$dm01 = $ddata[3];
		$dm02 = $ddata[4];
		$dm03 = $ddata[5];
		$dm04 = $ddata[6];
		$dm05 = $ddata[7];
		$dm06 = $ddata[8];
		$dm07 = $ddata[9];
		$dm08 = $ddata[10];
		$dm09 = $ddata[11];
		$dm10 = $ddata[12];
		$dm11 = $ddata[13];
		$dm12 = $ddata[14];
		$is_spring = $ddata[15];
		$is_summer = $ddata[16];
		$is_fall = $ddata[17];
		$is_winter = $ddata[18];
		$fb_text = $ddata[19];
		$fb_dpic = $ddata[20];
		$fb_link = $ddata[21];
		$fb_linktext = $ddata[22];
		$fb_target = $ddata[23];
		$fb_pcolor = $ddata[24];
		$fb_scolor = $ddata[25];
		$fb_tcolor = $ddata[26];
	} fclose($handlemydick);
}

// set default timezone 
//date_default_timezone_set($dick_tz);
// get timezone
$tz = date_default_timezone_get();
$server_tz = ini_get('date.timezone');

// set weekday days
$wd_mon = $wd_file->day[0]['dow'];
$wd_tue = $wd_file->day[1]['dow'];
$wd_wed = $wd_file->day[2]['dow'];
$wd_thu = $wd_file->day[3]['dow'];
$wd_fri = $wd_file->day[4]['dow'];
$wd_sat = $wd_file->day[5]['dow'];
$wd_sun = $wd_file->day[6]['dow'];

echo '<div class="daily-content-wrapper">';
if($dick_displaymode=='season'){
	// SEASONAL MODE
	include 'views/seasonal.php';
} elseif($dick_displaymode=='month'){
	// MONTHLY MODE
	include 'views/monthly.php';
} elseif($dick_displaymode=='week'){
	// WEEKLY MODE
	include 'views/weekly.php';
} elseif($dick_displaymode=='always'){
	// ALWAYS MODE
	include 'views/days.php';
} else {
	// fallback content
	include 'views/fallback.php';
}
echo '</div>';
?>