<?php session_start();
	if(isset($_POST['edit'])){
		$themes = simplexml_load_file('data/themes.xml');
		foreach($themes->theme as $theme){
			if($theme['id'] == $_POST['id']){
				$theme['title'] = $_POST['title'];
				$theme['active'] = $_POST['active'];
				
				$theme->colors['primary'] = $_POST['pcolor'];
				$theme->colors['secondary'] = $_POST['scolor'];
				$theme->colors['tertiary'] = $_POST['tcolor'];
				$theme->colors['links'] = $_POST['lcolor'];
				$theme->colors['accent'] = $_POST['acolor'];
				$theme->colors['other'] = $_POST['ocolor'];
				
				$theme->font = str_replace(';','',$_POST['font-family']);
				$theme->font['size'] = $_POST['font-size'];
				$theme->font['unit'] = $_POST['font-unit'];
				$theme->font['type'] = $_POST['font-type'];
				
				$theme->background = $_POST['bgfile'];
				$theme->background['size'] = $_POST['bgsize'];
				$theme->background['position'] = $_POST['bgpos'];
				$theme->background['repeat'] = $_POST['repeat'];
				break;
			}
		}
		file_put_contents('data/themes.xml', $themes->asXML());
		$_SESSION['message'] = 'Theme updated successfully';
		header('location: page_edit_themes.php');
		
		// update theme root CSS file
		$updatedthemefolder = strtolower(str_replace(' ','-',$_POST['title']));
		$updatethemeroot = fopen(dirname(__FILE__, 4)."/rat/repo/themes/".$updatedthemefolder."/css/root.css","w");
		$writeroot = '/* '.$newthemefolder.' ROOT VARIABLES */'.PHP_EOL;
		$writeroot .= ':root{'.PHP_EOL.'--primary-color: '.$_POST['pcolor'].';'.PHP_EOL.'--secondary-color: '.$_POST['scolor'].';'.PHP_EOL;
		$writeroot .= '--tertiary-color: '.$_POST['tcolor'].';'.PHP_EOL.'--link-color: '.$_POST['lcolor'].';'.PHP_EOL;
		$writeroot .= '--accent-color: '.$_POST['acolor'].';'.PHP_EOL.'--other-color: '.$_POST['ocolor'].';'.PHP_EOL;
		if(!empty($_POST['font-size'])){
		$writeroot .= '--font-size: '.$_POST['font-size'].$_POST['font-unit'].';'.PHP_EOL;
		} else { $writeroot .= '--font-size: 1'.$_POST['font-unit'].';'.PHP_EOL;}
		if(!empty($_POST['font-family'])){
		$writeroot .= '--font-family: '.$_POST['font-family'].';'.PHP_EOL;
		} else { $writeroot .= '--font-family: \'Courier New\', monospace;'.PHP_EOL; }
		if(!empty($_POST['bgfile'])){ 
		$writeroot .= '--bg-image: url(\''.$_POST['bgfile'].'\');'.PHP_EOL.'--bg-pos: '.$_POST['bgpos'].';'.PHP_EOL.'--bg-size: '.$_POST['bgsize'].';'.PHP_EOL;
		$writeroot .= '--bg-repeat: '.$_POST['repeat'].';'.PHP_EOL;
		}
		$writeroot .= '}'.PHP_EOL;
		fwrite($updatethemeroot,$writeroot);
	}
	else{
		$_SESSION['message'] = 'Select a theme to edit';
		header('location: page_edit_themes.php');
	}
?>