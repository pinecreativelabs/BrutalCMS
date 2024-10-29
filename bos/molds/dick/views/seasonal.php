<?php 
	switch(true) {
		case $dick_today >= $spring && $dick_today < $summer && $is_spring != '':
			if($is_spring=='1'){
				$daily_content.='<div class="season spring">'.PHP_EOL;
				include 'days.php';
				$daily_content.='</div>'.PHP_EOL;
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_today >= $summer && $dick_today < $fall && $is_summer != '':
			if($is_summer=='1'){
				$daily_content.='<div class="season summer">'.PHP_EOL;
				include 'days.php';
				$daily_content.='</div>'.PHP_EOL;
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_today >= $fall && $dick_today < $winter && $is_fall != '':
			if($is_fall=='1'){
				$daily_content.='<div class="season fall">'.PHP_EOL;
				include 'days.php';
				$daily_content.='</div>'.PHP_EOL;
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_today >= $winter && $dick_today < $spring && $is_winter != '':
			if($is_winter=='1'){
				$daily_content.='<div class="season winter">'.PHP_EOL;
				include 'days.php';
				$daily_content.='</div>'.PHP_EOL;
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		default: include 'days.php';
	}
?>