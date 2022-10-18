<?php 
// STYLE
echo '<style>';
echo '.daily-content {background: '.$pcolor.'; color: '.$scolor.'; padding: 1em; margin: 0 auto; width: 100%;}';
echo '.daily-content .header .title {background-color: '.$tcolor.'; color: '.$scolor.';}';
echo '.daily-content .cta a, .daily-content .cta a:visited {background-color: '.$tcolor.'; color: '.$scolor.';}';
echo '.daily-content .cta a:hover {background-color: '.$scolor.'; color: '.$tcolor.';}';
if($vtype!='none'){ echo '
.daily-content .media {position: relative; padding-bottom: 56.25%; height: 0;}
.daily-content .media iframe, .daily-content .media video {position: absolute; top: 0; left: 0; width: 100%; height: 100%;}';
}
echo '</style>';
// WRAPPER
echo '<div class="daily-content">';
// HEADER
echo '<div class="header">';
echo '<h3><span class="date">'.$day.', '.$today->format('F jS, Y').'</span></h3>';
echo '<h4 class="title">'.$title.'</h4>';
echo '</div>';
// MEDIA
echo '<div class="media">';
if($vtype=='yt'){
	echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$vid.'" title="'.$title.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
} elseif($vtype=='vimeo'){
	echo '<iframe src="https://player.vimeo.com/video/'.$vid.'" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
} elseif($vtype=='other'){
	echo '<video controls><source src="'.$dpic.'" type="video/mp4"></video>';
} else { echo '<img src="'.$dpic.'" style="width: 100%; height: auto;" alt="'.$title.'" />'; }
echo '</div>';
// CONTENT
echo '<div class="content">'.$content.'</div>';
// CTA (link)
if($link!=''){
echo '<div class="cta"><a href="'.$link.'" target="'.$target.'">'.$linktext.'</a></div>';
}
echo '</div>'; // END WRAPPER
?>