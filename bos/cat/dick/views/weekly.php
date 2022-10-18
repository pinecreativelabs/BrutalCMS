<?php 
	switch(true) {
		case $day == 'Monday' && $wd_file->day[0]->active == 'true':
				// define Monday data
				$pcolor = $wd_file->day[0]->colors['pcolor'];
				$scolor = $wd_file->day[0]->colors['scolor'];
				$tcolor = $wd_file->day[0]->colors['tcolor'];
				$title = $wd_file->day[0]->title;
				$dpic = $wd_file->day[0]->dpic;
				$content = $wd_file->day[0]->content;
				$link = $wd_file->day[0]->link;
				$target = $wd_file->day[0]->target;
				$linktext = $wd_file->day[0]->linktext;
				$vtype = $wd_file->day[0]->vtype;
				$vid = $wd_file->day[0]->vid;
				include 'templates/'.$dick_template.'.php';
			break;
		case $day == 'Tuesday' && $wd_file->day[1]->active == 'true':
			if($wd_tue==$day){
				// define Tuesday data
				$pcolor = $wd_file->day[1]->colors['pcolor'];
				$scolor = $wd_file->day[1]->colors['scolor'];
				$tcolor = $wd_file->day[1]->colors['tcolor'];
				$title = $wd_file->day[1]->title;
				$dpic = $wd_file->day[1]->dpic;
				$content = $wd_file->day[1]->content;
				$link = $wd_file->day[1]->link;
				$target = $wd_file->day[1]->target;
				$linktext = $wd_file->day[1]->linktext;
				$vtype = $wd_file->day[1]->vtype;
				$vid = $wd_file->day[1]->vid;
				include 'templates/'.$dick_template.'.php';
			}
			break;
		case $day == 'Wednesday' && $wd_file->day[2]->active == 'true':
				// define Wednesday data
				$pcolor = $wd_file->day[2]->colors['pcolor'];
				$scolor = $wd_file->day[2]->colors['scolor'];
				$tcolor = $wd_file->day[2]->colors['tcolor'];
				$title = $wd_file->day[2]->title;
				$dpic = $wd_file->day[2]->dpic;
				$content = $wd_file->day[2]->content;
				$link = $wd_file->day[2]->link;
				$target = $wd_file->day[2]->target;
				$linktext = $wd_file->day[2]->linktext;
				$vtype = $wd_file->day[2]->vtype;
				$vid = $wd_file->day[2]->vid;
				include 'templates/'.$dick_template.'.php';
			break;
		case $day == 'Thursday' && $wd_file->day[3]->active == 'true':
				// define Thursday data
				$pcolor = $wd_file->day[3]->colors['pcolor'];
				$scolor = $wd_file->day[3]->colors['scolor'];
				$tcolor = $wd_file->day[3]->colors['tcolor'];
				$title = $wd_file->day[3]->title;
				$dpic = $wd_file->day[3]->dpic;
				$content = $wd_file->day[3]->content;
				$link = $wd_file->day[3]->link;
				$target = $wd_file->day[3]->target;
				$linktext = $wd_file->day[3]->linktext;
				$vtype = $wd_file->day[3]->vtype;
				$vid = $wd_file->day[3]->vid;
				include 'templates/'.$dick_template.'.php';
			break;
		case $day == 'Friday' && $wd_file->day[4]->active == 'true':
				// define Friday data
				$pcolor = $wd_file->day[4]->colors['pcolor'];
				$scolor = $wd_file->day[4]->colors['scolor'];
				$tcolor = $wd_file->day[4]->colors['tcolor'];
				$title = $wd_file->day[4]->title;
				$dpic = $wd_file->day[4]->dpic;
				$content = $wd_file->day[4]->content;
				$link = $wd_file->day[4]->link;
				$target = $wd_file->day[4]->target;
				$linktext = $wd_file->day[4]->linktext;
				$vtype = $wd_file->day[4]->vtype;
				$vid = $wd_file->day[4]->vid;
				include 'templates/'.$dick_template.'.php';
			break;
		case $day == 'Saturday' && $wd_file->day[5]->active == 'true':
				// define Saturday data
				$pcolor = $wd_file->day[5]->colors['pcolor'];
				$scolor = $wd_file->day[5]->colors['scolor'];
				$tcolor = $wd_file->day[5]->colors['tcolor'];
				$title = $wd_file->day[5]->title;
				$dpic = $wd_file->day[5]->dpic;
				$content = $wd_file->day[5]->content;
				$link = $wd_file->day[5]->link;
				$target = $wd_file->day[5]->target;
				$linktext = $wd_file->day[5]->linktext;
				$vtype = $wd_file->day[5]->vtype;
				$vid = $wd_file->day[5]->vid;
				include 'templates/'.$dick_template.'.php';
			break;
		case $day == 'Sunday' && $wd_file->day[6]->active == 'true':
				// define Sunday data
				$pcolor = $wd_file->day[6]->colors['pcolor'];
				$scolor = $wd_file->day[6]->colors['scolor'];
				$tcolor = $wd_file->day[6]->colors['tcolor'];
				$title = $wd_file->day[6]->title;
				$dpic = $wd_file->day[6]->dpic;
				$content = $wd_file->day[6]->content;
				$link = $wd_file->day[6]->link;
				$linktext = $wd_file->day[6]->linktext;
				$target = $wd_file->day[6]->target;
				$vtype = $wd_file->day[6]->vtype;
				$vid = $wd_file->day[6]->vid;
				include 'templates/'.$dick_template.'.php';
			break;
		default: include 'fallback.php';
	}
?>