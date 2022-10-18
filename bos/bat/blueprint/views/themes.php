<?php
	echo '<style>'.PHP_EOL;
	foreach($themes->theme as $theme){
		// theme variables
		$themename = strtolower(preg_replace('/\s*/','',$theme['title'])); // theme class
		$is_active_theme = $theme['active']; // is the theme active?
		$pcolor = $theme->colors['primary'];
		$scolor = $theme->colors['secondary'];
		$tcolor = $theme->colors['tertiary'];
		$ocolor = $theme->colors['other'];
		$acolor = $theme->colors['accent'];
		$lcolor = $theme->colors['links'];
		$font_family = $theme->font; 
		$font_size = $theme->font['size'];
		$font_type = $theme->font['type'];
		$font_unit = $theme->font['unit'];
		$background = $theme->background; // url of background file
		$bg_size = $theme->background['size'];
		$bg_repeat = $theme->background['repeat'];
		$bg_position = $theme->background['position'];
			
		if($is_active_theme=='true'){
			// modify CSS style code here
			echo '.theme-'.$themename.' {background-color: '.$pcolor.'; color: '.$scolor.';'.PHP_EOL;
			echo 'font-family: '.$font_family.'; font-size: '.$font_size.$font_unit.';'.PHP_EOL;
			if($background!=''){
				echo 'background-image: url(\''.$background.'\');'.PHP_EOL;
				echo 'background-postion: '.$bg_position.'; background-size: '.$bg_size.'; background-repeat: '.$bg_repeat.';'.PHP_EOL;
			}
			echo '}'.PHP_EOL;
			echo '.theme-'.$themename.' a, .theme-'.$themename.' a:visited {color: '.$lcolor.'; border-bottom: 1px dotted '.$lcolor.';}'.PHP_EOL;
			echo '.theme-'.$themename.' a:hover {color: '.$ocolor.'; background-color: '.$lcolor.';}'.PHP_EOL;
			echo '.theme-'.$themename.' h2, .theme-'.$themename.' h3 {color: '.$tcolor.';}'.PHP_EOL;
			echo '.theme-'.$themename.'.border {border: 2px solid '.$acolor.';}'.PHP_EOL;
		}
	}
	echo '</style>'.PHP_EOL;
?>