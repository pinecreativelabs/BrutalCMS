<?php 
	switch(true) {
		case $today >= $spring && $today < $summer && $is_spring != '':
			echo '<div class="season spring">';
			include 'days.php';
			echo '</div>';
			break;
		case $today >= $summer && $today < $fall && $is_summer != '':
			echo '<div class="season summer">';
			include 'days.php';
			echo '</div>';
			break;
		case $today >= $fall && $today < $winter && $is_fall != '':
			echo '<div class="season fall">';
			include 'days.php';
			echo '</div>';
			break;
		case $today >= $winter && $today < $spring && $is_winter != '':
			echo '<div class="season winter">';
			include 'days.php';
			echo '</div>';
			break;
		default: include 'days.php';
	}
?>