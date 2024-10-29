<?php 
	switch(true) {
		case $dick_day == 'Monday' && $wd_file->day[0]['active'] == 'true':
				// define Monday data
				$active = $wd_file->day[0]['active'];
				$pcolor = $wd_file->day[0]->design['pcolor'];
				$scolor = $wd_file->day[0]->design['scolor'];
				$tcolor = $wd_file->day[0]->design['tcolor'];
				$acolor = $wd_file->day[0]->design['acolor'];
				$ocolor = $wd_file->day[0]->design['ocolor'];
				$cover = $wd_file->day[0]->design;
				$template = $wd_file->day[0]->design['template'];
				$skin = $wd_file->day[0]->design['skin'];
				$title = $wd_file->day[0]['title'];
				$dow = $wd_file->day[0]['dow'];
				$td = $wd_file->day[0]['td'];
				$mediafile = $wd_file->day[0]->media;
				$mediafile_path = pathinfo($mediafile);
				$extension = $mediafile_path['extension'];
				$mediatype = $wd_file->day[0]->media['type'];
				$vidtype = $wd_file->day[0]->media['vidtype'];
				if($vidtype=='yt'){$vid = $wd_file->day[0]->media['ytvid'];}
				elseif($vidtype=='vimeo'){$vid = $wd_file->day[0]->media['vvid'];}
				elseif($vidtype=='bc'){$vid = $wd_file->day[0]->media['bcvid'];}
				elseif($bidtype=='dm'){$vid = $wd_file->day[0]->media['dmvid'];} else {$vid=$newday->media['ytvid'];}
				$contentfile = $wd_file->day[0]->content;
				if((($contentfile!='')||(!empty($contentfile)))&&(file_exists($contentfile))){
					$content = file_get_contents($wd_file->day[0]->content);
				} else {$content='';}
				$link = $wd_file->day[0]->url;
				$target = $wd_file->day[0]->url['target'];
				$linktext = $wd_file->day[0]->url['linktext'];
				include 'templates/'.$template.'.php';
			break;
		case $dick_day == 'Tuesday' && $wd_file->day[1]['active'] == 'true':
			if($wd_tue==$day){
				// define Tuesday data
				$active = $wd_file->day[1]['active'];
				$pcolor = $wd_file->day[1]->design['pcolor'];
				$scolor = $wd_file->day[1]->design['scolor'];
				$tcolor = $wd_file->day[1]->design['tcolor'];
				$acolor = $wd_file->day[1]->design['acolor'];
				$ocolor = $wd_file->day[1]->design['ocolor'];
				$cover = $wd_file->day[1]->design;
				$template = $wd_file->day[1]->design['template'];
				$skin = $wd_file->day[1]->design['skin'];
				$title = $wd_file->day[1]['title'];
				$dow = $wd_file->day[1]['dow'];
				$td = $wd_file->day[1]['td'];
				$mediafile = $wd_file->day[1]->media;
				$mediafile_path = pathinfo($mediafile);
				$extension = $mediafile_path['extension'];
				$mediatype = $wd_file->day[1]->media['type'];
				$vidtype = $wd_file->day[1]->media['vidtype'];
				if($vidtype=='yt'){$vid = $wd_file->day[1]->media['ytvid'];}
				elseif($vidtype=='vimeo'){$vid = $wd_file->day[1]->media['vvid'];}
				elseif($vidtype=='bc'){$vid = $wd_file->day[1]->media['bcvid'];}
				elseif($bidtype=='dm'){$vid = $wd_file->day[1]->media['dmvid'];} else {$vid=$newday->media['ytvid'];}
				$contentfile = $wd_file->day[1]->content;
				if((($contentfile!='')||(!empty($contentfile)))&&(file_exists($contentfile))){
					$content = file_get_contents($wd_file->day[1]->content);
				} else {$content='';}
				$link = $wd_file->day[1]->url;
				$target = $wd_file->day[1]->url['target'];
				$linktext = $wd_file->day[1]->url['linktext'];
				include 'templates/'.$template.'.php';
			}
			break;
		case $dick_day == 'Wednesday' && $wd_file->day[2]['active'] == 'true':
				// define Wednesday data
				$active = $wd_file->day[2]['active'];
				$pcolor = $wd_file->day[2]->design['pcolor'];
				$scolor = $wd_file->day[2]->design['scolor'];
				$tcolor = $wd_file->day[2]->design['tcolor'];
				$acolor = $wd_file->day[2]->design['acolor'];
				$ocolor = $wd_file->day[2]->design['ocolor'];
				$cover = $wd_file->day[2]->design;
				$template = $wd_file->day[2]->design['template'];
				$skin = $wd_file->day[2]->design['skin'];
				$title = $wd_file->day[2]['title'];
				$dow = $wd_file->day[2]['dow'];
				$td = $wd_file->day[2]['td'];
				$mediafile = $wd_file->day[2]->media;
				$mediafile_path = pathinfo($mediafile);
				$extension = $mediafile_path['extension'];
				$mediatype = $wd_file->day[2]->media['type'];
				$vidtype = $wd_file->day[2]->media['vidtype'];
				if($vidtype=='yt'){$vid = $wd_file->day[2]->media['ytvid'];}
				elseif($vidtype=='vimeo'){$vid = $wd_file->day[2]->media['vvid'];}
				elseif($vidtype=='bc'){$vid = $wd_file->day[2]->media['bcvid'];}
				elseif($bidtype=='dm'){$vid = $wd_file->day[2]->media['dmvid'];} else {$vid=$newday->media['ytvid'];}
				$contentfile = $wd_file->day[2]->content;
				if((($contentfile!='')||(!empty($contentfile)))&&(file_exists($contentfile))){
					$content = file_get_contents($wd_file->day[2]->content);
				} else {$content='';}
				$link = $wd_file->day[2]->url;
				$target = $wd_file->day[2]->url['target'];
				$linktext = $wd_file->day[2]->url['linktext'];
				include 'templates/'.$template.'.php';
			break;
		case $dick_day == 'Thursday' && $wd_file->day[3]['active'] == 'true':
				// define Thursday data
				$active = $wd_file->day[3]['active'];
				$pcolor = $wd_file->day[3]->design['pcolor'];
				$scolor = $wd_file->day[3]->design['scolor'];
				$tcolor = $wd_file->day[3]->design['tcolor'];
				$acolor = $wd_file->day[3]->design['acolor'];
				$ocolor = $wd_file->day[3]->design['ocolor'];
				$cover = $wd_file->day[3]->design;
				$template = $wd_file->day[3]->design['template'];
				$skin = $wd_file->day[3]->design['skin'];
				$title = $wd_file->day[3]['title'];
				$dow = $wd_file->day[3]['dow'];
				$td = $wd_file->day[3]['td'];
				$mediafile = $wd_file->day[3]->media;
				$mediafile_path = pathinfo($mediafile);
				$extension = $mediafile_path['extension'];
				$mediatype = $wd_file->day[3]->media['type'];
				$vidtype = $wd_file->day[3]->media['vidtype'];
				if($vidtype=='yt'){$vid = $wd_file->day[3]->media['ytvid'];}
				elseif($vidtype=='vimeo'){$vid = $wd_file->day[3]->media['vvid'];}
				elseif($vidtype=='bc'){$vid = $wd_file->day[3]->media['bcvid'];}
				elseif($bidtype=='dm'){$vid = $wd_file->day[3]->media['dmvid'];} else {$vid=$newday->media['ytvid'];}
				$contentfile = $wd_file->day[3]->content;
				if((($contentfile!='')||(!empty($contentfile)))&&(file_exists($contentfile))){
					$content = file_get_contents($wd_file->day[3]->content);
				} else {$content='';}
				$link = $wd_file->day[3]->url;
				$target = $wd_file->day[3]->url['target'];
				$linktext = $wd_file->day[3]->url['linktext'];
				include 'templates/'.$template.'.php';
			break;
		case $dick_day == 'Friday' && $wd_file->day[4]['active'] == 'true':
				// define Friday data
				$active = $wd_file->day[4]['active'];
				$pcolor = $wd_file->day[4]->design['pcolor'];
				$scolor = $wd_file->day[4]->design['scolor'];
				$tcolor = $wd_file->day[4]->design['tcolor'];
				$acolor = $wd_file->day[4]->design['acolor'];
				$ocolor = $wd_file->day[4]->design['ocolor'];
				$cover = $wd_file->day[4]->design;
				$template = $wd_file->day[4]->design['template'];
				$skin = $wd_file->day[4]->design['skin'];
				$title = $wd_file->day[4]['title'];
				$dow = $wd_file->day[4]['dow'];
				$td = $wd_file->day[4]['td'];
				$mediafile = $wd_file->day[4]->media;
				$mediafile_path = pathinfo($mediafile);
				$extension = $mediafile_path['extension'];
				$mediatype = $wd_file->day[4]->media['type'];
				$vidtype = $wd_file->day[4]->media['vidtype'];
				if($vidtype=='yt'){$vid = $wd_file->day[4]->media['ytvid'];}
				elseif($vidtype=='vimeo'){$vid = $wd_file->day[4]->media['vvid'];}
				elseif($vidtype=='bc'){$vid = $wd_file->day[4]->media['bcvid'];}
				elseif($bidtype=='dm'){$vid = $wd_file->day[4]->media['dmvid'];} else {$vid=$newday->media['ytvid'];}
				$contentfile = $wd_file->day[4]->content;
				if((($contentfile!='')||(!empty($contentfile)))&&(file_exists($contentfile))){
					$content = file_get_contents($wd_file->day[4]->content);
				} else {$content='';}
				$link = $wd_file->day[4]->url;
				$target = $wd_file->day[4]->url['target'];
				$linktext = $wd_file->day[4]->url['linktext'];
				include 'templates/'.$template.'.php';
			break;
		case $dick_day == 'Saturday' && $wd_file->day[5]['active'] == 'true':
				// define Saturday data
				$active = $wd_file->day[5]['active'];
				$pcolor = $wd_file->day[5]->design['pcolor'];
				$scolor = $wd_file->day[5]->design['scolor'];
				$tcolor = $wd_file->day[5]->design['tcolor'];
				$acolor = $wd_file->day[5]->design['acolor'];
				$ocolor = $wd_file->day[5]->design['ocolor'];
				$cover = $wd_file->day[5]->design;
				$template = $wd_file->day[5]->design['template'];
				$skin = $wd_file->day[5]->design['skin'];
				$title = $wd_file->day[5]['title'];
				$dow = $wd_file->day[5]['dow'];
				$td = $wd_file->day[5]['td'];
				$mediafile = $wd_file->day[5]->media;
				$mediafile_path = pathinfo($mediafile);
				$extension = $mediafile_path['extension'];
				$mediatype = $wd_file->day[5]->media['type'];
				$vidtype = $wd_file->day[5]->media['vidtype'];
				if($vidtype=='yt'){$vid = $wd_file->day[5]->media['ytvid'];}
				elseif($vidtype=='vimeo'){$vid = $wd_file->day[5]->media['vvid'];}
				elseif($vidtype=='bc'){$vid = $wd_file->day[5]->media['bcvid'];}
				elseif($bidtype=='dm'){$vid = $wd_file->day[5]->media['dmvid'];} else {$vid=$newday->media['ytvid'];}
				$contentfile = $wd_file->day[5]->content;
				if((($contentfile!='')||(!empty($contentfile)))&&(file_exists($contentfile))){
					$content = file_get_contents($wd_file->day[5]->content);
				} else {$content='';}
				$link = $wd_file->day[5]->url;
				$target = $wd_file->day[5]->url['target'];
				$linktext = $wd_file->day[5]->url['linktext'];
				include 'templates/'.$template.'.php';
			break;
		case $dick_day == 'Sunday' && $wd_file->day[6]['active'] == 'true':
				// define Sunday data
				$active = $wd_file->day[6]['active'];
				$pcolor = $wd_file->day[6]->design['pcolor'];
				$scolor = $wd_file->day[6]->design['scolor'];
				$tcolor = $wd_file->day[6]->design['tcolor'];
				$acolor = $wd_file->day[6]->design['acolor'];
				$ocolor = $wd_file->day[6]->design['ocolor'];
				$cover = $wd_file->day[6]->design;
				$template = $wd_file->day[6]->design['template'];
				$skin = $wd_file->day[6]->design['skin'];
				$title = $wd_file->day[6]['title'];
				$dow = $wd_file->day[6]['dow'];
				$td = $wd_file->day[6]['td'];
				$mediafile = $wd_file->day[6]->media;
				$mediafile_path = pathinfo($mediafile);
				$extension = $mediafile_path['extension'];
				$mediatype = $wd_file->day[6]->media['type'];
				$vidtype = $wd_file->day[6]->media['vidtype'];
				if($vidtype=='yt'){$vid = $wd_file->day[6]->media['ytvid'];}
				elseif($vidtype=='vimeo'){$vid = $wd_file->day[6]->media['vvid'];}
				elseif($vidtype=='bc'){$vid = $wd_file->day[6]->media['bcvid'];}
				elseif($bidtype=='dm'){$vid = $wd_file->day[6]->media['dmvid'];} else {$vid=$newday->media['ytvid'];}
				$contentfile = $wd_file->day[6]->content;
				if((($contentfile!='')||(!empty($contentfile)))&&(file_exists($contentfile))){
					$content = file_get_contents($wd_file->day[6]->content);
				} else {$content='';}
				$link = $wd_file->day[6]->url;
				$target = $wd_file->day[6]->url['target'];
				$linktext = $wd_file->day[6]->url['linktext'];
				include 'templates/'.$template.'.php';
			break;
		default: include 'fallback.php';
	}
?>