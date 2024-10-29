<?php 
$daily_content.='<style>'.PHP_EOL;
list($r1, $g1, $b1) = sscanf($pcolor, "#%02x%02x%02x");
list($r2, $g2, $b2) = sscanf($scolor, "#%02x%02x%02x");
list($r3, $g3, $b3) = sscanf($tcolor, "#%02x%02x%02x");
$pcolor_rgba = $r1.','.$g1.','.$b1.',0.5';
$scolor_rgba = $r2.','.$g2.','.$b2.',0.5';
$tcolor_rgba = $r3.','.$g3.','.$b3.',0.5';

$daily_content.='.new-day .cover .title {-webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px);}'.PHP_EOL;
$daily_content.='.new-day .media {text-align: center;}'.PHP_EOL;
if($cover!=''){$daily_content.='.new-day .cover{background-image: url(\''.$cover.'\'); background-size: cover; background-position: center center; background-repeat: no-repeat;}'.PHP_EOL;}

if($mediatype=='image'){
	$daily_content.='.new-day .media img {width: 100%; height: auto !important;';
	if($skin!='nude'){$daily_content.=' border-color: '.$scolor.'; outline-color: '.$tcolor.';';}
	$daily_content.='}'.PHP_EOL;
}
if($mediatype=='video'){$daily_content.='.new-day .media iframe{aspect-ratio: 16 / 9; width: 100%;}'.PHP_EOL;}
if($mediatype=='audio'){$daily_content.='.new-day .media audio{width: 100%;}'.PHP_EOL;}
if($skin!='nude'){
	$daily_content.='.new-day .cover .title {color: '.$tcolor.'; background: rgba('.$pcolor_rgba.');}'.PHP_EOL;
	$daily_content.='.new-day .cover .title h3, .new-day .cover .title h4 {border-color: '.$scolor.'; outline-color: '.$tcolor.';}'.PHP_EOL;
	$daily_content.='.new-day .cta a:link, .new-day .cta a:visited{ background-color: '.$acolor.'; color: '.$tcolor.'; border-color: '.$scolor.';}'.PHP_EOL;
	$daily_content.='.new-day .cta a:hover {background-color: '.$tcolor.'; color: '.$acolor.';}'.PHP_EOL;
	$daily_content.='.new-day .media img, .new-day .media iframe, .new-day .media video, .new-day .media audio {border-color: '.$scolor.'; outline-color: '.$tcolor.';}'.PHP_EOL;
}

if($skin=='flat'){
	$daily_content.='.new-day{background-color: '.$pcolor.'; color: '.$tcolor.';}'.PHP_EOL;
} elseif($skin=='gradient'){
	$daily_content.='.new-day{background: '.$pcolor.'; color: '.$tcolor.'; background: -webkit-linear-gradient('.$pcolor.', '.$ocolor.');';
	$daily_content.='background: -o-linear-gradient('.$pcolor.', '.$ocolor.'); background: -moz-linear-gradient('.$pcolor.', '.$ocolor.');'; 
	$daily_content.='background: linear-gradient('.$pcolor.', '.$ocolor.');}'.PHP_EOL;
} elseif($skin=='radial') {
	$daily_content.='.new-day{background-color: '.$pcolor.'; color: '.$tcolor.';';
	$daily_content.='background-image: -webkit-radial-gradient('.$pcolor.', '.$ocolor.');'.PHP_EOL;
	$daily_content.='background-image: -moz-radial-gradient('.$pcolor.', '.$ocolor.');'.PHP_EOL;
	$daily_content.='background-image: -o-radial-gradient('.$pcolor.', '.$ocolor.');'.PHP_EOL;
	$daily_content.='background-image: radial-gradient('.$pcolor.', '.$ocolor.');}'.PHP_EOL;
} elseif($skin=='mesh') {
	$daily_content.='.new-day{background: '.$pcolor.'; color: '.$tcolor.';'.PHP_EOL;
	$daily_content.='background-image: -webkit-radial-gradient(at 48.0% 25.0%, '.$pcolor.' 0px, transparent 50%),';
	$daily_content.='-webkit-radial-gradient(at 56.0% 67.0%, '.$scolor.' 0px, transparent 50%),-webkit-radial-gradient(at 70.0% 86.0%, '.$tcolor.' 0px, transparent 50%),';
	$daily_content.='-webkit-radial-gradient(at 5.0% 50.0%, '.$acolor.' 0px, transparent 50%),-webkit-radial-gradient(at 91.0% 35.0%, '.$ocolor.' 0px, transparent 50%);'.PHP_EOL;
	$daily_content.='background-image: radial-gradient(at 48.0% 25.0%, '.$pcolor.' 0px, transparent 50%),';
	$daily_content.='radial-gradient(at 56.0% 67.0%, '.$scolor.' 0px, transparent 50%),radial-gradient(at 70.0% 86.0%, '.$tcolor.' 0px, transparent 50%),';
	$daily_content.='radial-gradient(at 5.0% 50.0%, '.$acolor.' 0px, transparent 50%),radial-gradient(at 91.0% 35.0%, '.$ocolor.' 0px, transparent 50%);}'.PHP_EOL;
	$daily_content.='.new-day .content {background: rgba('.$scolor_rgba.');}'.PHP_EOL;
} else {}

$daily_content.='</style>'.PHP_EOL;
?>