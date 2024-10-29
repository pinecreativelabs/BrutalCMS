<?php require_once('sat/sos/sos.php');

echo $jquery;
echo $jab;
echo '<h3>Default Settings</h3>';
echo 'Sitename: '.$sitename.'<br />Mailto: '.$mailto.'<br />';
echo 'Default Date Format: '.$ddf.' <em>('.date($ddf).')</em><br />';
echo 'Default Timestamp Format: '.$dtf.' <em>('.date($dtf).')</em><br />';
echo 'Default theme: '.$theme.'<br />FAM Copy URL Mode: '.$fam_cm.'<br />';

echo '<h3>Developer Settings</h3>';
echo 'Development Mode: '.$dmode.'<br />';
echo 'jquery: '.$load_jquery.'<br />jquery version: '.$jqver.'<br />';
echo 'Icons: '.$ilib.'<br />';

echo '<h3>Accessibility Settings</h3>';
echo 'Registration: '.$registration.'<br />Default Group: '.$group.'<br />';
echo 'Age-Verify: '.$age_verify.'<br />Min Age: '.$age.'<br />';
echo 'Pagelock: '.$plock.'<br />';

echo '<h3>Cookie Consent (CC) Settings</h3>';
echo 'CC Mode: '.$cc_mode.'<br />CC Duration: '.$cc_duration.' days<br />';
echo 'CC Text Color: <span style="background: '.$cc_textcolor.';">&nbsp;&nbsp;&nbsp;</span> '.$cc_textcolor.'<br />';
echo 'CC Background Color: <span style="background: '.$cc_bgcolor.';">&nbsp;&nbsp;&nbsp;</span> '.$cc_bgcolor.'<br />';
echo 'CC Button Text Color: <span style="background: '.$cc_btntextcolor.';">&nbsp;&nbsp;&nbsp;</span> '.$cc_btntextcolor.'<br />';
echo 'CC Button Background Color: <span style="background: '.$cc_btnbgcolor.';">&nbsp;&nbsp;&nbsp;</span> '.$cc_btnbgcolor.'<br />';

echo '<h3>System Page Settings</h3>';
echo 'Error Pages: '.$errormode.'<br />Coming Soon Re-direct: '.$cs_redir.'<br />';
echo 'Coming Soon Template: '.$cs_template.'<br />';
echo 'Maintenance Mode: '.$mmode.'<br />';

/* PRINT PATHS */
echo '<h3>Paths</h3>';
echo 'HOST: '.$host.'<br />BURL: '.$burl.'<br />';
echo 'RURL: '.$rurl.'<br />CFILE: '.$cfile.'<br />';
echo 'URL: '.$url.'<br />FURL: '.$furl.'<br /><br />';
echo 'DROOT: '.$droot.'<br />CWDIR: '.$cwdir.'<br />';
echo 'CDIR: '.$cdir.'<br />CDIR2: '.$cdir2.'<br />';
echo 'PDIR: '.$pdir.'<br />GDIR: '.$gdir.'<br />GGDIR: '.$ggdir;
echo '<br /><br />';
echo '$basedir: '.$basedir.'<br />';
echo 'BDIR: '.$bdir.'<br />BOSDIR: '.$bosdir.'<br /><br />';

/* PRINT DATES (pre-formatted) */
echo '<h3>Date &amp; Time Constants</h3>';
echo '$day: '.$day.'<br />$nday:'.$nday.'<br />$month: '.$month.'<br />$mon: '.$mon.'<br />';
echo '$year: '.$year.'<br />$yr: '.$yr.'<br />';
echo '$doy <em>(day of Year)</em>: '.$doy.'<br />';
echo '$mot <em>(# of days this month)</em>: '.$mot.'<br />$mo <em>(month number)</em>: '.$mo.'<br />$dom <em>(day of month)</em>: '.$dom.'<br />';
echo '$time: '.$time.'<br />$timezone: '.$timezone.'<br />';
echo '$ly <em>(leap year: 0 = false, 1 = true)</em>: '.$ly.'<br />$leapy <em>(leap year prints logical true or false)</em>: '.$leapy.'<br />$leap: <em>leap year returns logical true or false</em>';
echo '<br /><br />';
echo '$dmy: '.$dmy.'<br />$mdy: '.$mdy.'<br />$ymd: '.$ymd;
echo '<br /><br />';
echo '$today: '.$today.'<br />';
echo '$tomorrow: '.$tomorrow.'<br />$yesterday: '.$yesterday.'<br />';
echo '$lastweek: '.$lastweek.'<br />$week: '.$week.'<br />$nextweek: '.$nextweek.'<br />';
echo '$lastmonth: '.$lastmonth.'<br />$nextmonth: '.$nextmonth.'<br />';
echo '$lastyear: '.$lastyear.'<br />$nextyear: '.$nextyear.'<br />';
echo '<br /><br /><h3>Date Countdown Constants</h3>';
echo '$duxmas <em>(days until Christmas)</em>: '.$duxmas.'<br />$dunyd <em>(days until New Year\'s Day)</em>: '.$dunyd.'<br />';
echo '$duhallo <em>(days until Halloween)</em>: '.$duhallo.'<br />$duval <em>(days until Valentine\'s Day)</em>: '.$duval.'<br />';
echo '$dued <em>(days until Earth Day)</em>: '.$dued;
echo '<br /><br /><h3>Miscellaneous Variables</h3>';
echo '$lastmod <em>(Last Modified)</em>: '.$lastmod.'<br />';
?>