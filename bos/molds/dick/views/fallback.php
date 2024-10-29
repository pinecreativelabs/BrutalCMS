<?php 
// fallback style
$dick_fallback_style = '<style>'.PHP_EOL.'.new-day {background-color: '.$fb_pcolor.' !important; color: '.$fb_tcolor.';}'.PHP_EOL;
$dick_fallback_style.= '.new-day .media img {width: 100%; height: auto !important;}'.PHP_EOL;
$dick_fallback_style.= '.new-day .cta a:link, .new-day .cta a:visited {background-color: '.$fb_acolor.'; color: '.$fb_tcolor.'; border-color: '.$fb_scolor.';}'.PHP_EOL;
$dick_fallback_style.= '.new-day .cta a:hover {background-color: '.$fb_ocolor.';}'.PHP_EOL.'</style>';

// fallback content
$dick_fallback_content = '<div class="new-day">'.PHP_EOL;
$dick_fallback_content.= '<div class="cover"><div class="title"><h3>'.$fallback_title.'</h3></div></div>'.PHP_EOL;
$dick_fallback_content.='<div class="media">'.PHP_EOL;
if($fallback_type=='image'){
	if($fallback_link!=''){$dick_fallback_content.='<a href="'.$fallback_link.'" target="'.$fallback_link_target.'">'.PHP_EOL;}
	$dick_fallback_content.='<img src="'.$fallback_media.'" alt="'.$fallback_title.'" />'.PHP_EOL;
	if($fallback_link!=''){$dick_fallback_content.='</a>'.PHP_EOL;}
	$dick_fallback_content.='</div>'.PHP_EOL;
	$dick_fallback_content.='<div class="fallback-message">'.$fallback_message.'</div>'.PHP_EOL;
	if($fallback_link!=''){$dick_fallback_content.='<div class="cta"><a href="'.$fallback_link.'" target="'.$fallback_link_target.'">'.$fallback_link_text.'</a></div>'.PHP_EOL;}
} elseif($fallback_type=='video'){
	$dick_fallback_content.='<video style="width:100%; height: auto;" controls>'.PHP_EOL;
	$dick_fallback_content.='<source src="'.$fallback_media.'" type="video/mp4">'.PHP_EOL.'</video>'.PHP_EOL;
	$dick_fallback_content.='</div>'.PHP_EOL;
	$dick_fallback_content.='<div class="fallback-message">'.$fallback_message.'</div>'.PHP_EOL;
	if($fallback_link!=''){$dick_fallback_content.='<div class="cta"><a href="'.$fallback_link.'" target="'.$fallback_link_target.'">'.$fallback_link_text.'</a></div>'.PHP_EOL;}
} elseif($fallback_type=='audio'){
	$dick_fallback_content.='<audio class="baudio" data-title="'.$fallback_title.'" data-artist="Unknown">'.PHP_EOL;
	$dick_fallback_content.='<source src="'.$fallback_media.'" type="audio/mpeg">'.PHP_EOL.'</audio>'.PHP_EOL;
	$dick_fallback_content.='</div>'.PHP_EOL;
	$dick_fallback_content.='<div class="fallback-message">'.$fallback_message.'</div>'.PHP_EOL;
	if($fallback_link!=''){$dick_fallback_content.='<div class="cta"><a href="'.$fallback_link.'" target="'.$fallback_link_target.'">'.$fallback_link_text.'</a></div>'.PHP_EOL;}
} else {
	$dick_fallback_content.='</div>'.PHP_EOL;
	$dick_fallback_content.='<div class="fallback-message">'.$fallback_message.'</div>'.PHP_EOL;
	if($fallback_link!=''){$dick_fallback_content.='<div class="cta"><a href="'.$fallback_link.'" target="'.$fallback_link_target.'">'.$fallback_link_text.'</a></div>'.PHP_EOL;}
}
$dick_fallback_content.='</div>'.PHP_EOL;
$dick_fallback = $dick_fallback_style.$dick_fallback_content;
$daily_content .= $dick_fallback;
?>