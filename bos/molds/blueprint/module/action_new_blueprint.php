<?php session_start();
// NEW WALLPAPER
if($_POST['pup']=='wallpaper'){
	if(isset($_POST['add'])){
		$wallpapers = simplexml_load_file('data/wallpapers.xml');
		$wallpaper = $wallpapers->addChild('wallpaper');
		$wallpaper->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$wallpaper->addAttribute('title', $_POST['title']);}else{$wallpaper->addAttribute('title','Untitled Wallpaper');}
		$wallpaper->addAttribute('group','none');
		if(isset($_POST['active'])){$wallpaper->addAttribute('active',$_POST['active']);}else{$wallpaper->addAttribute('active','false');}
		$url = $wallpaper->addChild('url',$_POST['wp-url']);
		$options = $wallpaper->addChild('options');
		$options->addAttribute('size',$_POST['size']);
		$options->addAttribute('position',$_POST['position']);
		$options->addAttribute('repeat',$_POST['repeat']);
		if(isset($_POST['attach'])){$options->addAttribute('attach',$_POST['attach']);}else{$options->addAttribute('attach','0');}
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($wallpapers->asXML());
		$dom->save('data/wallpapers.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Wallpaper created successfully</p>';
		header('location: page_edit_wallpapers.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_wallpapers.php');
	}
	
// NEW WALL PAPER GROUP
} elseif($_POST['pup']=='wpgroup'){
	if(isset($_POST['addgroup'])){
		$wallpapergroups = simplexml_load_file('data/wallpapergroups.xml');
		$wpgroup = $wallpapergroups->addChild('wallpapergroup');
		$wpgroup->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$wpgroup->addAttribute('title', $_POST['title']);}else{$wpgroup->addAttribute('title','Untitled '.$_POST['grouptype'].' Group');}
		$wpgroup->addAttribute('type', $_POST['grouptype']);
		$wpgroup->addAttribute('dur','3');
		$wpgroup->addAttribute('fx','xfade');
		if(isset($_POST['active'])){$wpgroup->addAttribute('active',$_POST['active']);}else{$wpgroup->addAttribute('active','false');}
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($wallpapergroups->asXML());
		$dom->save('data/wallpapergroups.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Wallpaper group created successfully</p>';
		header('location: page_edit_wallpapers.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_wallpapers.php');
	}
	
// NEW THEME	
} elseif($_POST['pup']=='theme'){
	if(isset($_POST['add'])){
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
		$theme->addAttribute('type',$_POST['themetype']);
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
		$elemtags = $theme->addChild('elementags');
		// Save to file
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
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Theme created successfully</p>';
		header('location: page_edit_themes.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_themes.php');
	}
	
// NEW LAYOUT
} else{ 
	if(isset($_POST['add'])){
		$layouts = simplexml_load_file('data/layouts.xml');
		$layout = $layouts->addChild('layout');
		$layout->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$layout->addAttribute('title', $_POST['title']);}else{$layout->addAttribute('title','Untitled '.$_POST['method'].' Layout');}
		$desc = $layout->addChild('desc',$_POST['desc']);
		$layout->addAttribute('method', $_POST['method']);
		$layout->addAttribute('cols','1');
		$layout->addAttribute('rows','1');
		$layout->addAttribute('preset','1col');
		if(isset($_POST['active'])){$layout->addAttribute('active',$_POST['active']);}else{$layout->addAttribute('active','false');}
		$column = $layout->addChild('column');
		$column->addAttribute('width', '100');
		$column->addAttribute('height','');
		$column->addAttribute('x-unit','px');
		$column->addAttribute('y-unit','px');
		$column->addAttribute('min-width','');
		$column->addAttribute('max-width','');
		$column->addAttribute('min-height','');
		$column->addAttribute('max-height','');
		$rules = $layout->addChild('rules');
		$rules->addAttribute('xxs','');
		$rules->addAttribute('xs','');
		$rules->addAttribute('sm','');
		$rules->addAttribute('md','');
		$rules->addAttribute('lg','');
		$rules->addAttribute('xl','');
		$rules->addAttribute('xxl','');
		$b3grid = $layout->addChild('b3grid');
		$b3grid->addAttribute('type','blocks');
		$b3grid->addAttribute('dir','row');
		$b3grid->addAttribute('align-h','around');
		$b3grid->addAttribute('align-v','baseline');
		$b3grid->addAttribute('contain','none');
		$bento = $layout->addChild('bento');
		$bento->addAttribute('cellgap','0');
		$bento->addAttribute('columns','8');
		$bento->addAttribute('ar','1'); // aspectRatio
		$bento->addAttribute('bf','false'); // balanceFillers
		$bento->addAttribute('mcw','50'); // minCellWidth
		$cssgrid = $layout->addChild('cssgrid');
		$cssgrid->addAttribute('flow','row');
		$cssgrid->addAttribute('gaps','0px 0px');
		$cssgrid->addAttribute('place-content','start');
		$cssgrid->addAttribute('place-items','start');
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($layouts->asXML());
		$dom->save('data/layouts.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Layout created successfully</p>';
		header('location: page_edit_layouts.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_layouts.php');
	}
}
?>