<?php
$wallpapersfile = simplexml_load_file($droot_bos.'/molds/blueprint/module/data/wallpapers.xml');
$wallpapergroupsfile = simplexml_load_file($droot_bos.'/molds/blueprint/module/data/wallpapergroups.xml');
$tfile = simplexml_load_file($droot_bos.'/molds/blueprint/module/data/themes.xml');
$lfile = simplexml_load_file($droot_bos.'/molds/blueprint/module/data/layouts.xml');

$wallpaper_array = array();
$wallpapergroup_array = array();
$wpg_id_array = array();
$wpg_title_array = array();
foreach($wallpapersfile->wallpaper as $wpr){
	if($wpr['active']=='true'){
		$wallpaper_array[] = $wpr['id'];
		$wpg_id_array[] = $wpr['group'];
	} 
}
foreach($wallpapergroupsfile->wallpapergroup as $wpgr){
	if($wpgr['active']=='true'){
		$wallpapergroup_array[] = $wpgr['id'];
		if(in_array($wpgr['id'],$wpg_id_array)){$wpg_title_array[] = $wpgr['title'];}
	} 
}
$fc_wallpaper = count($wallpaper_array);
$fc_wallpapergroup = count($wallpapergroup_array);

// WALLPAPERS 
$wallpaper_css = '';
$wallpaper_class_list = '<ul class="wallpaper-list">'.PHP_EOL;
if($fc_wallpaper>0){
foreach($wallpapersfile->wallpaper as $wp){
	$wpclass = strtolower(str_replace(' ','-',$wp['title']));
	$wpgroup = $wp['group'];
	if($wp['active']=='true'){
		if(in_array($wpgroup,$wpg_id_array)){if($wpgroup!='none'){
			$wallpaper_css.='.'.$wpgroup.'.wallpaper.'.$wpclass;
			$wallpaper_class_list .= '<li>.'.$wpgroup.'.wallpaper.'.$wpclass.'</li>'.PHP_EOL;
		} else {
			$wallpaper_css.='.wallpaper.'.$wpclass;
			$wallpaper_class_list .= '<li>.wallpaper.'.$wpclass.'</li>'.PHP_EOL;
		}}
		$wallpaper_css.='{background-image: url(\''.$wp->url.'\');'.PHP_EOL;
		$wallpaper_css.='background-repeat: '.$wp->options['repeat'].'; background-position: '.$wp->options['position'].'; ';
		$wallpaper_css.='background-size: '.$wp->options['size'].'; ';
		if($wp->options['attach']=='1'){$wallpaper_css.='background-attachment: fixed;';}
		$wallpaper_css.='}'.PHP_EOL;
	}
}}
$wallpaper_class_list .= '</ul>'.PHP_EOL;

// WALLPAPER GROUPS
$new_wpg_array=array();
$wallpaper_groups_css='';
$wallpaper_group_class_list = '<ul class="wallpaper-group-list">'.PHP_EOL;
if($fc_wallpapergroup>0){
foreach($wallpapergroupsfile->wallpapergroup as $wpg){
	$wpgid = $wpg['id'];
	$wpg_classname = strtolower(str_replace(' ','-',$wpg['title']));
	if(($wpg['active']=='true')&&($wpg['type']=='slideshow')){
		$wallpaper_group_class_list.= '<li>.'.$wpg_classname.' ('.$wpg['fx'].')</li>'.PHP_EOL;
		$new_wpg_array[] = $wpgid;
	}
	
}}
$wallpaper_group_class_list .= '</ul>'.PHP_EOL;

$wpg_count = count($new_wpg_array);
if($wpg_count>0){
	$wallpaper_groups_css.='.xfade>figure{'.PHP_EOL;
	$wallpaper_groups_css.='backface-visibility: hidden; background-size: cover; background-position: center center; color: transparent;'.PHP_EOL;
	$wallpaper_groups_css.='height: 100%; left: 0px; opacity: 0; position: absolute; top: 0px; width: 100%; z-index: 0;'.PHP_EOL.'}'.PHP_EOL;
	$wallpaper_groups_css.='@keyframes xfade { 0% { animation-timing-function: ease-in; opacity: 0;}'.PHP_EOL.' 8% {animation-timing-function: ease-out; opacity: 1;} 17% {opacity: 1} 25% {opacity: 0} 100% {opacity: 0}}'.PHP_EOL;
}

// PUT IT ALL TOGETHER
$blueprint_css = '<style>'.PHP_EOL.$wallpaper_css.PHP_EOL.$wallpaper_groups_css.PHP_EOL.'</style>';

// THEMES list
$theme_list = '<ul class="theme-list">'.PHP_EOL;
foreach($tfile->theme as $theme){if($theme['active']=='true'){
	$theme_list .= '<li>'.$theme['title'].'</li>'.PHP_EOL;
}}
$theme_list .= '</ul>'.PHP_EOL;

// LAYOUTS list
$layout_list = '<ul class="layout-list">'.PHP_EOL;
foreach($lfile->layout as $layout){if($layout['active']=='true'){
	$layout_list.='<li>'.$layout['title'].'</li>'.PHP_EOL;
}}
$layout_list.='</ul>'.PHP_EOL;

?>