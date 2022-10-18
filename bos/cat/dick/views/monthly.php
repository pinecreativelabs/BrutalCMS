<?php 
	switch(true) {
		case $month == '01' && $dm01 != '':
			echo '<div class="month january">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '02' && $dm02 != '':
			echo '<div class="month february">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '03' && $dm03 != '':
			echo '<div class="month march">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '04' && $dm04 != '':
			echo '<div class="month april">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '05' && $dm05 != '':
			echo '<div class="month may">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '06' && $dm06 != '':
			echo '<div class="month june">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '07' && $dm07 != '':
			echo '<div class="month july">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '08' && $dm08 != '':
			echo '<div class="month august">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '09' && $dm09 != '':
			echo '<div class="month september">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '10' && $dm10 != '':
			echo '<div class="month october">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '11' && $dm11 != '':
			echo '<div class="month november">';
			include 'days.php';
			echo '</div>';
			break;
		case $month == '12' && $dm12 != '':
			echo '<div class="month december">';
			include 'days.php';
			echo '</div>';
			break;
		default: include 'days.php';
	}
?>