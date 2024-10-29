<?php 
//
$day = date("l");
$daya = date("D");
$month = date("F");
$mon = date("M");
$mo = date("n");
$mot = date("t");
$year = date("Y");
$yr = date("y");
$dom = date("j");
$dow = date("w");
$doy = date("z");
$week = date("W");
$nday = date('jS'); // nth day
$hms = date("H:i:s"); // hours: minutes: seconds
$datetime = date("Y-m-d H:i:s"); // 2001-03-10 17:16:18 (the MySQL DATETIME format)
$timezone = date_default_timezone_get();
$time = date("g:i a");
$today = date("F j, Y");

// common date formats
$dmy = date("d.m.y"); // DD.MM.YY
$ymd = date("y.m.d"); // YY.MM.DD
$mdy = date("m.d.y"); // MM.DD.YY
$mdyt = date("F j, Y, g:i a"); // March 10, 2001, 5:16 pm

// future and past dates
$tmrw = strtotime("tomorrow");
$tomorrow = date("l", $tmrw);
$ystrd = strtotime("yesterday");
$yesterday = date("l", $ystrd);
$lmonth = strtotime("last month");
$lastmonth = date("F",$lmonth);
$nmonth = strtotime("next month");
$nextmonth = date("F",$nmonth);
$lyear = strtotime("last year");
$lastyear = date("Y",$lyear);
$nyear = strtotime("next year");
$nextyear = date("Y",$nyear);
$lweek = strtotime("-7 days");
$lastweek = date("W",$lweek);
$nweek = strtotime("+7 days");
$nextweek = date("W",$nweek);

// days until New Years?
$unyd=strtotime("January 1 ".$nextyear);
$dunyd=ceil(($unyd-time())/60/60/24);

// days until Christmas?
$iuxmas=strtotime("December 25 ".$year);
$tuxmas=ceil(($iuxmas-time())/60/60/24);
if($tuxmas<=0){
	$uxmas=strtotime("December 25 ".$nextyear);
	$duxmas=ceil(($uxmas-time())/60/60/24);
} else {
	$uxmas=strtotime("December 25 ".$year);
	$duxmas=ceil(($uxmas-time())/60/60/24);
}

// days until halloween?
$iuhal=strtotime("October 31 ".$year);
$tuhal=ceil(($iuhal-time())/60/60/24);
if($tuhal<=0){
	$uhallo=strtotime("October 31 ".$nextyear);
	$duhallo=ceil(($uhallo-time())/60/60/24);
} else {
	$uhallo=strtotime("October 31 ".$year);
	$duhallo=ceil(($uhallo-time())/60/60/24);
}
// days until valentine's day?
$iuval=strtotime("February 14 ".$year);
$tuval=ceil(($iuval-time())/60/60/24);
if($tuval<=0){
	$uval=strtotime("February 14 ".$nextyear);
	$duval=ceil(($uval-time())/60/60/24);
} else {
	$uval=strtotime("February 14 ".$year);
	$duval=ceil(($uval-time())/60/60/24);
}

// days until Earth Day?
$iued=strtotime("April 22 ".$year);
$tued=ceil(($iued-time())/60/60/24);
if($tued<=0){
	$ued=strtotime("April 22 ".$nextyear);
	$dued=ceil(($ued-time())/60/60/24);
} else {
	$ued=strtotime("April 22 ".$year);
	$dued=ceil(($ued-time())/60/60/24);
}

// is it a leap year?
$isleapy = date("L");
if($isleapy==1) {$leapy="true"; $ly=1; $leap=true;} else {$leapy="false"; $ly=0; $leap=false;}

// last modified
$lastmod = date('F d, Y H:i:s.', getlastmod());

?>