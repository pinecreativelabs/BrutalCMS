<?php 
// get current dates
$dick_today = new DateTime();
$dick_month = date('m');
$dick_day = date('l');
// get the season dates
$spring = new DateTime('March 21');
$summer = new DateTime('June 21');
$fall = new DateTime('September 21');
$winter = new DateTime('December 21');

// $dickdatapath = 'module/data/defaults.csv';
// $wd_file = simplexml_load_file('module/data/weekdays.xml');
// $days_file = simplexml_load_file('module/data/days.xml');

// if loading from front-end page: 
$dickdatafile = simplexml_load_file('bos/molds/dick/module/data/defaults.xml');
$wd_file = simplexml_load_file('bos/molds/dick/module/data/weekdays.xml');
$days_file = simplexml_load_file('bos/molds/dick/module/data/days.xml');

foreach($dickdatafile->setting as $row){if($row['id']=='365'){
	$dick_displaymode = $row->displaymode;
	$persist = $row->displaymode['persist'];
	$dformat = $row->displaymode['dformat'];
	$jan = $row->months['jan'];
	$feb = $row->months['feb'];
	$mar = $row->months['mar'];
	$apr = $row->months['apr'];
	$may = $row->months['may'];
	$jun = $row->months['jun'];
	$jul = $row->months['jul'];
	$aug = $row->months['aug'];
	$sep = $row->months['sep'];
	$oct = $row->months['oct'];
	$nov = $row->months['nov'];
	$dec = $row->months['dec'];
	$is_spring = $row->seasons['spring'];
	$is_summer = $row->seasons['summer'];
	$is_fall = $row->seasons['fall'];
	$is_winter = $row->seasons['winter'];
	$fb_pcolor = $row->design['pcolor'];
	$fb_scolor = $row->design['scolor'];
	$fb_tcolor = $row->design['tcolor'];
	$fb_acolor = $row->design['acolor'];
	$fb_ocolor = $row->design['ocolor'];
	$fallback_title = $row->fallback['title'];
	$fallback_type = $row->fallback['type'];
	$fallback_media = $row->fallback;
	$fallback_message = $row->fallbackcontent;
	$fallback_link = $row->fallbacklink;
	$fallback_link_target = $row->fallbacklink['target'];
	$fallback_link_text = $row->fallbacklink['text'];
}}
// CONSTRUCT DICK CONFIGURATION INFO BLOCK
$dick_config = '<div class="dick-config"><p><strong>Display Mode:</strong> '.$dick_displaymode.'<br /><strong>Fallback Type:</strong> '.$fallback_type.'<br />';
$dick_config.= '<strong>Persist Days:</strong> '.$persist.'<br /><strong>Date Title Format:</strong> '.$dformat.'</p>'.PHP_EOL;
$dick_config .= '<p><strong>Active Months:</strong></p>'.PHP_EOL.'<ul>'.PHP_EOL;
if($jan=='1'){$dick_config.='<li>January</li>'.PHP_EOL;}
if($feb=='1'){$dick_config.='<li>February</li>'.PHP_EOL;}
if($mar=='1'){$dick_config.='<li>March</li>'.PHP_EOL;}
if($apr=='1'){$dick_config.='<li>April</li>'.PHP_EOL;}
if($may=='1'){$dick_config.='<li>May</li>'.PHP_EOL;}
if($jun=='1'){$dick_config.='<li>June</li>'.PHP_EOL;}
if($jul=='1'){$dick_config.='<li>July</li>'.PHP_EOL;}
if($aug=='1'){$dick_config.='<li>August</li>'.PHP_EOL;}
if($sep=='1'){$dick_config.='<li>September</li>'.PHP_EOL;}
if($oct=='1'){$dick_config.='<li>October</li>'.PHP_EOL;}
if($nov=='1'){$dick_config.='<li>November</li>'.PHP_EOL;}
if($dec=='1'){$dick_config.='<li>December</li>'.PHP_EOL;}
$dick_config.='</ul>'.PHP_EOL.'<p><strong>Active Seasons:</strong></p>'.PHP_EOL.'<ul>'.PHP_EOL;
if($is_spring=='1'){$dick_config.='<li>Spring</li>'.PHP_EOL;}
if($is_summer=='1'){$dick_config.='<li>Summer</li>'.PHP_EOL;}
if($is_fall=='1'){$dick_config.='<li>Fall</li>'.PHP_EOL;}
if($is_winter=='1'){$dick_config.='<li>Winter</li>'.PHP_EOL;}
$dick_config.='</ul></div>'.PHP_EOL;

// set default timezone 
//date_default_timezone_set($dick_tz);
// get timezone
//$tz = date_default_timezone_get();
//$server_tz = ini_get('date.timezone');

// set weekday days
$wd_mon = $wd_file->day[0]['dow'];
$wd_tue = $wd_file->day[1]['dow'];
$wd_wed = $wd_file->day[2]['dow'];
$wd_thu = $wd_file->day[3]['dow'];
$wd_fri = $wd_file->day[4]['dow'];
$wd_sat = $wd_file->day[5]['dow'];
$wd_sun = $wd_file->day[6]['dow'];

// CONSTRUCT DICK MODULE
$daily_content= '<div class="daily-content">'.PHP_EOL;
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
$daily_content.='</div>'.PHP_EOL;
?>