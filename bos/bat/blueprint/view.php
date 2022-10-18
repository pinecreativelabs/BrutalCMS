<?php 
/*
include this file within the <head> tag of your page,
preferrably after other stylesheets have been loaded
*/

$layouts = simplexml_load_file('bos/bat/blueprint/module/data/layouts.xml');
$themes = simplexml_load_file('bos/bat/blueprint/module/data/themes.xml');

if($themes->theme->count()>0){
	include 'views/themes.php';
}

// create list of active themes
$themelist = '<ul>'.PHP_EOL;
foreach($themes->theme as $theme){
	$themetitle = $theme['title'];
	$is_active_theme = $theme['active'];
	if($is_active_theme=='true'){
		$themelist .= '<li>'.$themetitle.'</li>'.PHP_EOL;
	}
}
$themelist .= '</ul>'.PHP_EOL;

// create list of all layouts
$layoutlist = '<ul>'.PHP_EOL;
foreach($layouts->layout as $layout){
	$layouttitle = $layout['title'];
	$layoutlist .= '<li>'.$layouttitle.'</li>'.PHP_EOL;
}
$layoutlist .= '</ul>'.PHP_EOL;

/* LAYOUTS
 * Copy and modify the code from the below file to a front-end page
 * 
 * bos/bat/blueprint/views/layouts.php
 * 
 */
?>