<?php 
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
?>