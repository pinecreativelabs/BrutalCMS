<?php 
/*
bpw-X = wallpaper
bpwg-X = wallpaper group
bpt-X = theme
bpl-X = layout
*/
$bp_method = substr($new_bpid, 0, 3);
if($bp_method=='bpt'){
	include_once 'views/themes.php';
} elseif($bp_method=='bpl'){
	include_once 'views/layouts.php';
} else {
	
}


$wallpapers = simplexml_load_file($droot_bos.'/molds/blueprint/module/data/wallpapers.xml');
$wpgroups = simplexml_load_file($droot_bos.'/molds/blueprint/module/data/wallpapergroups.xml');
$themes = simplexml_load_file($droot_bos.'/molds/blueprint/module/data/themes.xml');

$wparray = array();
$wpgarray = array();
$tarray = array();

foreach($wallpapers->wallpaper as $wp){if($wp['active']=='true'){
	$wparray[]=$wp['id'];
}}
foreach($wpgroups->wallpapergroup as $wpg){if($wpg['active']=='true'){
	$wpgarray[]=$wpg['id'];
}}
foreach($themes->theme as $theme){if($theme['active']=='true'){
	$tarray[]=$theme['id'];
}}

// count number of active Blueprint components
$wp_count = count($wparray);
$wpg_count = count($wpgarray);
$theme_count = count($tarray);

if($wp_count>0){
	include_once 'views/wallpapers.php';
}

if($wpg_count>0){
	include_once 'views/wallpaper-groups.php';
}

if($theme_count>0){
	include_once 'views/themes.php';
}

?>