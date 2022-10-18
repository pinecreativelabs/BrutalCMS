<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$themes = simplexml_load_file('data/themes.xml');
		$theme = $themes->addChild('theme');
		$theme->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){
			$theme->addAttribute('title', $_POST['title']);
			$newthemefolder = strtolower(str_replace(' ','-',$_POST['title']));
		}else{
			$theme->addAttribute('title','Theme-'.$_POST['id']);
			$newthemefolder = 'theme-'.$_POST['id'];
		}
		if(isset($_POST['active'])){$theme->addAttribute('active', $_POST['active']);}else{$theme->addAttribute('active', 'true');}
		
		$colors = $theme->addChild('colors');
		$colors->addAttribute('primary', $_POST['pcolor']);
		$colors->addAttribute('secondary', $_POST['scolor']);
		$colors->addAttribute('tertiary', $_POST['tcolor']);
		$colors->addAttribute('links', $_POST['lcolor']);
		$colors->addAttribute('accent', $_POST['acolor']);
		$colors->addAttribute('other', $_POST['ocolor']);
		
		if(!empty($_POST['font-family'])){$font = $theme->addChild('font', str_replace(';','',$_POST['font-family']));}else{$font = $theme->addChild('font', '\'Courier New\',monospace');}
		if(!empty($_POST['font-size'])){$font->addAttribute('size', $_POST['font-size']);}else{$font->addAttribute('size', '1');}
		$font->addAttribute('unit', $_POST['font-unit']);
		$font->addAttribute('type', $_POST['font-type']);
		
		$background = $theme->addchild('background', $_POST['bgfile']);
		$background->addAttribute('size', $_POST['bgsize']);
		$background->addAttribute('position', $_POST['bgpos']);
		$background->addAttribute('repeat', $_POST['repeat']);
		
		// Save to file
		//file_put_contents('data/themes.xml', $days->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($themes->asXML());
		$dom->save('data/themes.xml');
		
		// create new theme folder
		mkdir(dirname(__FILE__, 4)."/rat/repo/themes/".$newthemefolder, 0777,true);
		mkdir(dirname(__FILE__, 4)."/rat/repo/themes/".$newthemefolder."/css", 0777,true);
		mkdir(dirname(__FILE__, 4)."/rat/repo/themes/".$newthemefolder."/js", 0777,true);
		// write new theme CSS files
		$newthemeroot = fopen(dirname(__FILE__, 4)."/rat/repo/themes/".$newthemefolder."/css/root.css","w");
		$newthemecss = fopen(dirname(__FILE__, 4)."/rat/repo/themes/".$newthemefolder."/css/style.css","w");
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
		
		$writecss = '/* '.$newthemefolder.' */'.PHP_EOL.'@import url(\'root.css\');'.PHP_EOL;
		$writecss .= 'body {'.PHP_EOL.'font-size: var(--font-size);'.PHP_EOL.'font-family: var(--font-family);'.PHP_EOL;
		if(!empty($_POST['bgfile'])){ 
		$writecss .= 'background-size: var(--bg-size);'.PHP_EOL.'background-position: var(--bg-pos);'.PHP_EOL.'background-repeat: var(--bg-repeat);'.PHP_EOL;
		$writecss .= 'background-image: var(--bg-image);'.PHP_EOL;
		}
		$writecss .= 'background-color: var(--primary-color); color: var(--secondary-color);'.PHP_EOL.'}'.PHP_EOL;
		$writecss .= 'a:link, a:visited { color: var(--link-color);}'.PHP_EOL.'a:hover { color: var(--other-color);}'.PHP_EOL;
		
		fwrite($newthemeroot,$writeroot);
		fwrite($newthemecss, $writecss);
		
		$_SESSION['message'] = 'Theme created successfully';
		header('location: page_edit_themes.php');
	}
	else{
		$_SESSION['message'] = 'All fields required.';
		header('location: page_edit_themes.php');
	}

?>