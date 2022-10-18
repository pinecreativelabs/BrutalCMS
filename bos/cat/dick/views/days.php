<?php 
if($days_file->day->count()>0){
	foreach($days_file->day as $new_day){
		if(($new_day['ddate']==date('Y-m-d'))&&($new_day->active=='true')){
			$isday = true;
		}
	}
	if(isset($isday)){
		// $i=0;
		foreach($days_file->day as $newday){
			if(($newday->active=='true')&&($newday['ddate']==date('Y-m-d'))){
				$id = $newday['id'];
				$ddate = $newday['ddate'];
				$title = $newday['title'];
				$content = $newday->content;
				$dpic = $newday->dpic;
				$link = $newday->url;
				$linktext = $newday->linktext;
				$target = $newday->url['target'];
				$pcolor = $newday->colors['pcolor'];
				$scolor = $newday->colors['scolor'];
				$tcolor = $newday->colors['tcolor'];
				$vid = $newday->vid;
				$vtype = $newday->vtype;
				include 'templates/'.$dick_template.'.php';
				break;
			} 
			// if (++$i == 1) break;			
		}
	} else {include 'weekly.php';}

} else {include 'weekly.php';}
?>