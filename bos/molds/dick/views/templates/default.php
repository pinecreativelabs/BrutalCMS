<?php 
// construct style 
include 'style_constructor.php';

// construct daily content
$daily_content.='<div class="new-day">'.PHP_EOL;

// cover & title
$newdatetitle=date_create($ddate);
$date_title=date_format($newdatetitle,$dformat);
$daily_content.='<div class="cover"><div class="title">'.PHP_EOL;
if($td=='td'){$daily_content .= '<h3>'.$title.'</h3>'.PHP_EOL.'<h4>'.$date_title.'</h4>'.PHP_EOL;}
elseif($td=='to'){$daily_content .= '<h3>'.$title.'</h3>'.PHP_EOL;} else {$daily_content .= '<h3>'.$date_title.'</h3>'.PHP_EOL;}
$daily_content.='</div></div>'.PHP_EOL;

// media 
$daily_content.='<div class="media">'.PHP_EOL;
if($mediatype=='image'){
	//$imgtypearray=array("bmp","BMP","gif","GIF","jpg","JPG","jpeg","JPEG","png","PNG","svg","SVG");
	//if(in_array($extension,$imgtypearray)){
		if($mediafile!=''){$daily_content.='<img src="'.$mediafile.'" alt="'.$title.'" />'.PHP_EOL;} 
	//} else {$daily_content.='<p class="non-media">The media file is unsupported.</p>'.PHP_EOL;}
} elseif($mediatype=='video'){
	if($vidtype=='yt'){
		$daily_content.='<iframe class="videoframe" src="https://www.youtube.com/embed/'.$vid.'" title="'.$title.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>'.PHP_EOL;
	} elseif($vidtype=='vimeo'){
		$daily_content.='<iframe src="https://player.vimeo.com/video/'.$vid.'" class="videoframe" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>'.PHP_EOL;
	} elseif($vidtype=='dm'){
		$daily_content.='<iframe frameborder="0" type="text/html" src="https://www.dailymotion.com/embed/video/'.$vid.'" class="videoframe" allowfullscreen="true" title="'.$title.'"> </iframe>'.PHP_EOL;
	} elseif($vidtype=='bc'){
		$daily_content.='<iframe allowfullscreen="true" class="videoframe" scrolling="no" frameborder="0" src="https://www.bitchute.com/embed/'.$vid.'"></iframe>'.PHP_EOL;
	} elseif(($vidtype=='ovid')&&($mediafile!='')) {
		$vidtypearray = array("mp4","MP4","ogg","OGG","webm","WebM","WEBM");
		if(in_array($extension,$vidtypearray)){
			$daily_content.='<video style="width:100%; height: auto;" poster="'.$cover.'" data-title="'.$title.'" datacolor="'.$acolor.'" data-skin="default" data-overlay="1" controls>'.PHP_EOL;
			if(($extension=='mp4')||($extension=='MP4')){
				$daily_content.='<source src="'.$mediafile.'" type="video/mp4">'.PHP_EOL;
			} elseif(($extension=='ogg')||($extension=='OGG')){
				$daily_content.='<source src="'.$mediafile.'" type="video/ogg">'.PHP_EOL;
			} else {
				$daily_content.='<source src="'.$mediafile.'" type="video/webm">'.PHP_EOL;
			}
			$daily_content.='</video>'.PHP_EOL;
		} else { $daily_content.='<p class="invalid-media">The media file is invalid.</p>'.PHP_EOL;}
	} else {$daily_content.='<p class="invalid-media">No video type specified.</p>'.PHP_EOL;}
} else {
	$audtypearray = array("mp3","MP3","mpeg","MPEG","ogg","OGG","wav","WAV");
	if(in_array($extension,$audtypearray)){
		$audfilename = basename(str_replace('_',' ',$mediafile));
		$audfiletitle = str_replace('.'.$extension,'',$audfilename);
		$daily_content.='<audio controls title="'.$audfiletitle.'">'.PHP_EOL;
		if(($extension=='mp3')||($extension=='MP3')||($extension=='mpeg')||($extension=='MPEG')){
			$daily_content.='<source src="'.$mediafile.'" type="audio/mpeg">'.PHP_EOL;
		} elseif(($extension=='ogg')||($extension=='OGG')){
			$daily_content.='<source src="'.$mediafile.'" type="audio/ogg">'.PHP_EOL;
		} else {
			$daily_content.='<source src="'.$mediafile.'" type="audio/wav">'.PHP_EOL;
		}
		$daily_content.='</audio>'.PHP_EOL;
	} else { $daily_content.='<p class="invalid-media">The media file is invalid.</p>'.PHP_EOL;}
}
$daily_content.='</div>'.PHP_EOL;

// render content if it exists
if($content!=''){$daily_content.='<div class="content">'.PHP_EOL.$content.PHP_EOL.'</div>'.PHP_EOL;}
// CTA Link & close block
if($link!=''){$daily_content.='<div class="cta"><a href="'.$link.'" target="'.$target.'">'.$linktext.'</a></div>'.PHP_EOL;}
$daily_content.='</div>'.PHP_EOL;

?>