<?php 
if($days_file->day->count()>0){
	foreach($days_file->day as $new_day){
		if(($new_day['ddate']==date('Y-m-d'))&&($new_day['active']=='true')){
			$isday = true;
		}
	}
	if(isset($isday)){
		// $i=0;
		foreach($days_file->day as $newday){
			if(($newday['active']=='true')&&($newday['ddate']==date('Y-m-d'))){
				$id = $newday['id'];
				$ddate = $newday['ddate'];
				$title = $newday['title'];
				$td = $newday['td'];
				$content = file_get_contents($newday->content);
				$contentfile = $newday->content;
				if((($contentfile!='')||(!empty($contentfile)))&&(file_exists($contentfile))){
					$content = file_get_contents($newday->content);
				} else {$content='';}
				$template = $newday->design['template'];
				$skin = $newday->design['skin'];
				$cover = $newday->design;
				$pcolor = $newday->design['pcolor'];
				$scolor = $newday->design['scolor'];
				$tcolor = $newday->design['tcolor'];
				$acolor = $newday->design['acolor'];
				$ocolor = $newday->design['ocolor'];
				$mediafile = $newday->media;
				$mediafile_path = pathinfo($mediafile);
				$extension = $mediafile_path['extension'];
				$mediatype = $newday->media['type'];
				$vidtype = $newday->media['vidtype'];
				if($vidtype=='yt'){$vid = $newday->media['ytvid'];}
				elseif($vidtype=='vimeo'){$vid = $newday->media['vvid'];}
				elseif($vidtype=='bc'){$vid = $newday->media['bcvid'];}
				elseif($bidtype=='dm'){$vid = $newday->media['dmvid'];} else {$vid=$newday->media['ytvid'];}
				$link = $newday->url;
				$linktext = $newday->url['linktext'];
				$target = $newday->url['target'];
				include 'templates/'.$template.'.php';
				break;
			} // if (++$i == 1) break;			
		}
	} else {include 'weekly.php';}
} else {include 'weekly.php';}
?>