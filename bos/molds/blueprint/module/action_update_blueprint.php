<?php session_start();
// WALLPAPER GROUPS
if($_POST['pup']=='wpgroup'){
	if(isset($_POST['edit'])){
		$wpgroups = simplexml_load_file('data/wallpapergroups.xml');
		foreach($wpgroups->wallpapergroup as $wpgroup){
			if($wpgroup['id'] == $_POST['id']){
				if($_POST['title']!=''){$wpgroup['title'] = $_POST['title'];}else{$wpgroup['title']='Untitled '.$_POST['type'].' Group';}
				if(isset($_POST['active'])){$wpgroup['active'] = $_POST['active'];}else{$wpgroup['active']='false';}
				$wpgroup['type'] = $_POST['grouptype'];
				if($_POST['grouptype']=='slideshow'){
					$wpgroup['dur'] = $_POST['dur'];
					$wpgroup['fx'] = $_POST['fx'];
				}
				break;
			}
		}
		file_put_contents('data/wallpapergroups.xml', $wpgroups->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Wallpaper group updated successfully</p>';
		header('location: page_edit_wallpapers.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a wallpaper group to edit</p>';
		header('location: page_edit_wallpapers.php');
	}
	
// WALLPAPER
} elseif($_POST['pup']=='wallpaper'){
	if(isset($_POST['edit'])){
		$wallpapers = simplexml_load_file('data/wallpapers.xml');
		foreach($wallpapers->wallpaper as $wallpaper){
			if($wallpaper['id'] == $_POST['id']){
				if($_POST['title']!=''){$wallpaper['title'] = $_POST['title'];}else{$wallpaper['title']='Wallpaper '.$_POST['id'];}
				if(isset($_POST['active'])){$wallpaper['active'] = $_POST['active'];}else{$wallpaper['active']='false';}
				$wallpaper['group'] = $_POST['group'];
				$wallpaper->url = $_POST['wp-url'];
				$wallpaper->options['size'] = $_POST['size'];
				$wallpaper->options['position'] = $_POST['position'];
				$wallpaper->options['repeat'] = $_POST['repeat'];
				if(isset($_POST['attach'])){$wallpaper->options['attach']=$_POST['attach'];}else{$wallpaper->options['attach']='0';}
				break;
			}
		}
		file_put_contents('data/wallpapers.xml', $wallpapers->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Wallpaper updated successfully</p>';
		header('location: page_edit_wallpapers.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a wallpaper to edit</p>';
		header('location: page_edit_wallpapers.php');
	}	
	
// LAYOUTS
} elseif($_POST['pup']=='layout'){
	if(isset($_POST['edit'])){
		$layouts = simplexml_load_file('data/layouts.xml');
		foreach($layouts->layout as $layout){
			if($layout['id'] == $_POST['id']){
				$layout['title'] = $_POST['title'];
				$layout->desc = $_POST['desc'];
				$layout['method'] = $_POST['method'];
				if($_POST['method']!='bento'){
					$layout['cols'] = $_POST['cols'];
					$layout['rows'] = $_POST['rows'];
				}
				if(($_POST['method']!='bento')&&($_POST['method']!='cssgrid')&&($_POST['method']!='print')){
					$layout->rules = $_POST['rule-classes'];
					$layout->column = $_POST['col-classes'];
					if($_POST['method']=='b3grid'){$layout->rules['xxs'] = $_POST['xxs'];}
					$layout->rules['xs'] = $_POST['xs'];
					$layout->rules['sm'] = $_POST['sm'];
					$layout->rules['md'] = $_POST['md'];
					$layout->rules['lg'] = $_POST['lg'];
					$layout->rules['xl'] = $_POST['xl'];
					if($_POST['method']=='b3grid'){$layout->rules['xxl'] = $_POST['xxl'];}
				}
				if($_POST['method']=='b3grid'){
					$layout['preset'] = $_POST['preset'];
					$layout->b3grid['type'] = $_POST['b3type'];
					$layout->b3grid['dir'] = $_POST['b3dir'];
					$layout->b3grid['align-h'] = $_POST['b3alignh'];
					$layout->b3grid['align-v'] = $_POST['b3alignv'];
					$layout->b3grid['contain'] = $_POST['b3contain'];
				}elseif($_POST['method']=='bootstrap'){
					$layout['preset'] = $_POST['preset'];
					$layout->b3grid['contain'] = $_POST['b3contain'];
				}elseif($_POST['method']=='cssgrid'){
					$layout['preset'] = $_POST['preset'];
					$layout->cssgrid['flow'] = $_POST['gridflow'];
					$layout->cssgrid['gaps'] = $_POST['grid-gap'];
					$layout->cssgrid['place-content'] = $_POST['css-ai'];
					$layout->cssgrid['place-items'] = $_POST['css-ac'];
				}elseif($_POST['method']=='bento'){
					$layout['preset'] = $_POST['preset'];
					$layout->bento['cellgap'] = $_POST['cellgap'];
					$layout->bento['columns'] = $_POST['bento-cols'];
					$layout->bento['ar'] = $_POST['bento-ar'];
					$layout->bento['bf'] = $_POST['bento-bf'];
					$layout->bento['mcw'] = $_POST['mincellwidth'];
				}elseif($_POST['method']=='print'){
					$layout->b3grid['contain'] = $_POST['papersize'];
					$layout->column['width'] = $_POST['width'];
					$layout->column['height'] = $_POST['height'];
					$layout->column['x-unit'] = $_POST['x-unit'];
					$layout->column['y-unit'] = $_POST['y-unit'];
				}else{			
					$layout->column['width'] = $_POST['width'];
					$layout->column['min-width'] = $_POST['min-width'];
					$layout->column['max-width'] = $_POST['max-width'];
					$layout->column['height'] = $_POST['height'];
					$layout->column['min-height'] = $_POST['min-height'];
					$layout->column['max-height'] = $_POST['max-height'];
					$layout->column['x-unit'] = $_POST['x-unit'];
					$layout->column['y-unit'] = $_POST['y-unit'];
				}
				break;
			}
		}
		file_put_contents('data/layouts.xml', $layouts->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Layout updated successfully</p>';
		header('location: page_edit_layouts.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a layout to edit</p>';
		header('location: page_edit_layouts.php');
	}
// THEMES
} else {
	if(isset($_POST['edit'])){
		$themes = simplexml_load_file('data/themes.xml');
		foreach($themes->theme as $theme){
			if($theme['id'] == $_POST['id']){
				$theme['title'] = $_POST['title'];
				$theme['active'] = $_POST['active'];
				$theme['type'] = $_POST['themetype'];
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
				if(!empty($_POST['tagelements'])){
					$newtes = '';
					foreach($_POST['tagelements'] as $te){$newtes.=$te.',';}
					$theme->elementags = substr($newtes,0,-1);
				}
				break;
			}
		}
		file_put_contents('data/themes.xml', $themes->asXML());
		
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
		
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Theme updated successfully</p>';
		header('location: page_edit_themes.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a theme to edit</p>';
		header('location: page_edit_themes.php');
	}
}
?>