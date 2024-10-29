<?php 
	switch(true) {
		case $dick_month == '01' && $jan != '':
			if($jan=='1'){
				$daily_content.='<div class="month january">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '02' && $feb != '':
			if($feb=='1'){
				$daily_content.='<div class="month february">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '03' && $mar != '':
			if($mar=='1'){
				$daily_content.='<div class="month march">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '04' && $apr != '':
			if($apr=='1'){
				$daily_content.='<div class="month april">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '05' && $may != '':
			if($may=='1'){
				$daily_content.='<div class="month may">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '06' && $jun != '':
			if($jun=='1'){
				$daily_content.='<div class="month june">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '07' && $jul != '':
			if($jul=='1'){
				$daily_content.='<div class="month july">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '08' && $aug != '':
			if($aug=='1'){
				$daily_content.='<div class="month august">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '09' && $sep != '':
			if($sep=='1'){
				$daily_content.='<div class="month september">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '10' && $oct != '':
			if($oct=='1'){
				$daily_content.='<div class="month october">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '11' && $nov != '':
			if($nov=='1'){
				$daily_content.='<div class="month november">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		case $dick_month == '12' && $dec != '':
			if($dec=='1'){
				$daily_content.='<div class="month december">';
				include 'days.php';
				$daily_content.='</div>';
			} elseif($persist=='true') {include 'days.php';}else{include 'fallback.php';}
			break;
		default: include 'days.php';
	}
?>