<?php 
	echo '<div class="daily-content" style="background: '.$fb_pcolor.'; color: '.$fb_scolor.'; max-width: 468px;">
	<h4 class="date">'.$day.'</h4>
	<div class="fb-cover"><img src="'.$fb_dpic.'" style="width: 100%; height: auto;" alt="'.$day.'" /></div>
	<div class="fb-text">'.$fb_text.'</div>
	<div class="fb-link"><a href="'.$fb_link.'" target="'.$fb_target.'" style="color: '.$fb_tcolor.';">'.$fb_linktext.'</a></div>
	</div>';
?>