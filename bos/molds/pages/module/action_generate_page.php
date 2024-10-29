<?php session_start();
	if(isset($_POST['edit'])){
		// update and save page data
		$pages = simplexml_load_file('data/pages.xml');
		foreach($pages->page as $page){
			if($page['id'] == $_POST['id']){
				$page->loc['generated'] = $_POST['generated'];
				$page->lastmod = $_POST['lastmod'];
				$page->generator['apptheme'] = $_POST['apptheme'];
				$page->generator['batcss'] = $_POST['batcss'];
				$page->generator['incjquery'] = $_POST['incjquery'];
				$page->generator['incjab'] = $_POST['incjab'];
				$page->generator['inclayout'] = $_POST['inclayout'];
				$page->generator['container'] = $_POST['container'];
				$page->generator['applayout'] = $_POST['applayout'];
				break;
			}
		}
		file_put_contents('data/pages.xml', $pages->asXML());
		
		// open and fetch layout and theme data
		$layoutspath = realpath(__DIR__. '/../../../..').'/bat/blueprint/module/data/layouts.xml';
		$themespath = realpath(__DIR__. '/../../../..').'/bat/blueprint/module/data/themes.xml';
		// system settings
		$sitename = $_POST['sitename'];
		$dateformat = $_POST['dateformat'];
		$timeformat = $_POST['timeformat'];
		// Page location
		$loc = $_POST['loc'];
		$pgsloc = $_POST['pgsloc'];
		$canurl = $_POST['canurl'];
		// Page details
		$title = $_POST['title'];
		$metatitle = $_POST['metatitle'];
		$description = $_POST['desc'];
		$author = $_POST['author'];
		$type = $_POST['type'];
		$group = $_POST['group'];
		// Page theme
		$is_theme = $_POST['apptheme'];
		$selectedtheme = $_POST['theme'];
		$css = $_POST['batcss'];
		$jscript = $_POST['incjquery'];
		$jab = $_POST['incjab'];
		if(($is_theme=='1')&&($selectedtheme!='0')){
			$themes = simplexml_load_file($themespath);
		foreach($themes->theme as $theme){
			if($theme['title']==$selectedtheme){
				// colors
				$pcolor = $theme->colors['primary'];
				$scolor = $theme->colors['secondary'];
				$tcolor = $theme->colors['tertiary'];
				$lcolor = $theme->colors['links'];
				$bcolor = $theme->colors['borders'];
				$ocolor = $theme->colors['other'];
				// font
				$fsize = $theme->font['size'].$theme->font['unit'];
				$ftype = $theme->font['type'];
				$font = $theme->font;
				// background
				$bgsize = $theme->background['size'];
				$bgposition = $theme->background['position'];
				$bgrepeat = $theme->background['repeat'];
				$bg = $theme->background;
			}
		}}
		// Page layout
		$is_layout = $_POST['inclayout'];
		$selectedlayout = $_POST['layout'];
		$alayout = $_POST['applayout'];
		$container = $_POST['container'];
		if($selectedlayout!='0'){
			$layouts = simplexml_load_file($layoutspath);
		foreach($layouts->layout as $layout){
			if($layout['title']==$selectedlayout){
				$method = $layout['method'];
				$cols = $layout['cols'];
				$rows = $layout['rows'];
				$xxs = $layout->rules['xxs'];
				$xs = $layout->rules['xs'];
				$sm = $layout->rules['sm'];
				$md = $layout->rules['md'];
				$lg = $layout->rules['lg'];
				$xl = $layout->rules['xl'];
				$xxl = $layout->rules['xxl'];
				$rules = $layout->rules;
				$width = $layout->column['width'];
				$minwidth = $layout->column['min-width'];
				$maxwidth = $layout->column['max-width'];
				$height = $layout->column['height'];
				$minheight = $layout->column['min-height'];
				$maxheight = $layout->column['max-height'];
				$hunit = $layout->column['h-unit'];
				$vunit = $layout->column['v-unit'];
				$column = $layout->column;
			}
		}}
		
		$rrstring=' ';
		if(($method=='b3grid')||($method=='cssgrid')||($method=='other')){
			if($xxs!=''){$rrstring.='xxs-'.$xxs.' ';}
			if($xs!=''){$rrstring.='xs-'.$xs.' ';}
			if($sm!=''){$rrstring.='sm-'.$sm.' ';}
			if($md!=''){$rrstring.='md-'.$md.' ';}
			if($lg!=''){$rrstring.='lg-'.$lg.' ';}
			if($xl!=''){$rrstring.='xl-'.$xl.' ';}
			if($xxl!=''){$rrstring.='xxl-'.$xxl;}
			if($rules!=''){$rrstring.=' '.$rules;}
		} else {
			if($width!=''){$rrstring.=$width.' ';}
			if($sm!=''){$rrstring.='sm-'.$sm.' ';}
			if($md!=''){$rrstring.='md-'.$md.' ';}
			if($lg!=''){$rrstring.='lg-'.$lg.' ';}
			if($xl!=''){$rrstring.='xl-'.$xl.' ';}
			if($rules!=''){$rrstring.=' '.$rules;}
		} 
		
		// WRITE PAGE FILE
		$new_page = fopen($loc, "w") or die("Unable to write page!");
		// create PHP page variables
		$body = '<?php'.PHP_EOL.'//PAGE DATA'.PHP_EOL.'$sitename=\''.$sitename.'\';'.PHP_EOL;
		$body .= '$page_title=\''.$title.'\';'.PHP_EOL.'$page_desc=\''.$description.'\';'.PHP_EOL.'$page_author=\''.$author.'\';'.PHP_EOL;
		$body .= '$page_type=\''.$type.'\';'.PHP_EOL.'$page_group=\''.$group.'\';'.PHP_EOL.'$page_theme=\''.$selectedtheme.'\';'.PHP_EOL;
		$body .= '$page_has_theme='.$is_theme.';'.PHP_EOL.'$page_css='.$css.';'.PHP_EOL.'$page_js='.$jscript.';'.PHP_EOL;
		$body .= '$page_jab='.$jab.';'.PHP_EOL;
		$body .= '//PAGE THEME'.PHP_EOL.'$pcolor=\''.$pcolor.'\'; //primary color'.PHP_EOL.'$scolor=\''.$scolor.'\'; //secondary color'.PHP_EOL;
		$body .= '$tcolor=\''.$tcolor.'\'; //tertiary color'.PHP_EOL.'$lcolor=\''.$lcolor.'\'; //link color'.PHP_EOL.'$bcolor=\''.$bcolor.'\'; //border color'.PHP_EOL;
		$body .= '$ocolor=\''.$ocolor.'\'; //other color'.PHP_EOL.'$font=\''.$font.'\'; //font-family'.PHP_EOL.'$fsize=\''.$fsize.'\'; //font-size'.PHP_EOL;
		$body .= '$font_type=\''.$ftype.'\';'.PHP_EOL;
		if($bg!=''){
			$body .= '$bg_img=\''.$bg.'\'; //background image'.PHP_EOL.'$bg_size=\''.$bgsize.'\'; //background size'.PHP_EOL;
			$body .= '$bg_pos=\''.$bgposition.'\'; //background position'.PHP_EOL.'$bg_repeat=\''.$bgrepeat.'\'; //background repeat'.PHP_EOL;
		}
		$body .= '//PAGE LAYOUT'.PHP_EOL.'$num_cols='.$cols.'; //number of columns'.PHP_EOL.'$num_rows='.$rows.';//number of rows'.PHP_EOL.'$col=\''.$column.'\';'.PHP_EOL;
		$body .= '$width=\''.$width.'\'; //column width'.PHP_EOL.'$min_width=\''.$minwidth.'\'; //min-width'.PHP_EOL.'$max_width=\''.$maxwidth.'\'; //max-width'.PHP_EOL;
		$body .= '$height=\''.$height.'\'; //row height'.PHP_EOL.'$min_height=\''.$minheight.'\'; //min-height'.PHP_EOL.'$max_height=\''.$maxheight.'\'; //max-height'.PHP_EOL;
		$body .= '$wu=\''.$hunit.'\'; //width unit'.PHP_EOL.'$hu=\''.$vunit.'\'; //height unit'.PHP_EOL;
		$body .= '$container=\''.$container.'\'; //container'.PHP_EOL.'$rrules=\''.$rrstring.'\'; //responsive rules classes'.PHP_EOL;
		$body .= '?>'.PHP_EOL;
		// write page HTML
		$body .= '<!DOCTYPE html>'.PHP_EOL.'<html>'.PHP_EOL.'<head>'.PHP_EOL;
		$body .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>'.PHP_EOL;
		$body .= '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>'.PHP_EOL;
		$body .= '<title>'.$metatitle.'</title>'.PHP_EOL;
		$body .= '<meta name="description" content="'.$description.'" />'.PHP_EOL;
		$body .= '<link rel="canonical" href="'.$canurl.'" />'.PHP_EOL;
		if($pgsloc=='base'){
			if($css=='1'){
				$body .= '<link href="bos/bat/css/brutalist.min.css" type="text/css" rel="stylesheet" media="all"/>'.PHP_EOL;
			} elseif($css=='2'){
				$body .= '<link href="bos/bat/css/brutalist.lite.css" type="text/css" rel="stylesheet" media="all"/>'.PHP_EOL;
			} else {
				$body .= '<link href="bos/bat/css/core/default.css" type="text/css" rel="stylesheet" media="all"/>'.PHP_EOL;
			}
			$body .= '<link href="bos/bat/css/blueprintgrid.min.css" type="text/css" rel="stylesheet" media="all"/>'.PHP_EOL;
		}else{
			if($css=='1'){
				$body .= '<link href="bat/css/brutalist.min.css" type="text/css" rel="stylesheet" media="all"/>'.PHP_EOL;
			} elseif($css=='2'){
				$body .= '<link href="bat/css/brutalist.lite.css" type="text/css" rel="stylesheet" media="all"/>'.PHP_EOL;
			} else {
				$body .= '<link href="bat/css/core/default.css" type="text/css" rel="stylesheet" media="all"/>'.PHP_EOL;
			}
			$body .= '<link href="bat/css/blueprintgrid.min.css" type="text/css" rel="stylesheet" media="all"/>'.PHP_EOL;
		}
		if(($is_theme=='1')&&($selectedtheme!='0')){
			$body.= '<style>'.PHP_EOL;
			$body.= 'body {'.PHP_EOL;
			if($bg!=''){$body.= 'background: url(\''.$bg.'\'); background-repeat: '.$bgrepeat.'; background-position: '.$bgsize.'; background-position: '.$bgposition.';'.PHP_EOL;}
			$body.= 'color: '.$scolor.'; background-color: '.$pcolor.';'.PHP_EOL;
			$body.= 'font-family: '.$font.'; font-size: '.$fsize.';}'.PHP_EOL;
			$body.= 'a:link, a:visited{ color: '.$lcolor.';}'.PHP_EOL;
			$body.= 'a:hover{ color: '.$ocolor.';}'.PHP_EOL;
			$body.= 'header, main, footer {padding: 1em;}'.PHP_EOL;
			$body.= 'header, footer {background-color: '.$bcolor.'; color: '.$ocolor.';}'.PHP_EOL;
			$body.= 'main{background-color: '.$pcolor.'; color: '.$scolor.';}'.PHP_EOL;
			$body.= '</style>'.PHP_EOL;
		}
		$body .= '</head>'.PHP_EOL.'<body>'.PHP_EOL;
			
		if($is_layout=='1'){ if(($container!='n')&&(strpos($alayout,'h')!==false)){ $body .= '<div class="'.$container.'">'.PHP_EOL; }}
			
		$body .= '<header><h1>'.$title.'</h1>'.PHP_EOL.'<h2>'.$description.'</h2>'.PHP_EOL.'<p>Updated: <strong>'.date($dateformat).'</strong> at <strong>'.date($timeformat).'</strong></p></header>'.PHP_EOL;
			
		if($is_layout=='1'){ 
			if(($container!='n')&&(strpos($alayout,'h')!==false)){ $body .= '</div>'.PHP_EOL; }
			if(($container!='n')&&(strpos($alayout,'b')!==false)){$body .= '<div class="'.$container.'">'.PHP_EOL;}
		}
			
		$body .= '<main>'.PHP_EOL;
		
		if(($is_layout=='1')&&(strpos($alayout,'b')!==false)){
			if($method=='b3grid'){
				for ($y=1; $y<=$rows; $y++){
					$body.='<div class="block-wrap">'.PHP_EOL;
					for ($x=1; $x<=$cols; $x++){
						$body.='<div class="block bw'.$width.$rrstring.'"><h5>block bw'.$width.'</h5>'.PHP_EOL.'<p>'.$rrstring.'</p></div>'.PHP_EOL;
					}
					$body.='</div>'.PHP_EOL;
				}
			} elseif($method=='bootstrap'){
				for ($y=1; $y<=$rows; $y++){
					$body.='<div class="row">'.PHP_EOL;
					for ($x=1; $x<=$cols; $x++){
						$body.='<div class="col-'.$rrstring.'"><h5>col-'.$width.'</h5>'.PHP_EOL.'<p>'.$rrstring.'</p></div>'.PHP_EOL;
					}
					$body.='</div>'.PHP_EOL;
				}
			} else {
				for ($y=1; $y<=$rows; $y++){
					$body.='<div class="row">'.PHP_EOL;
					for ($x=1; $x<=$cols; $x++){
						$body.='<div class="'.$column.' '.$rrstring.'"><h5>col-'.$width.$wu.'</h5>'.PHP_EOL.'<p>'.$rrstring.'</p></div>'.PHP_EOL;
					}
					$body.='</div>'.PHP_EOL;
				}
			}
		}
		$body .= '<p><strong>Color Palette:</strong> <span style="border: 1px solid #444;"><span style="background: '.$pcolor.';">&nbsp;&nbsp;</span><span style="background: '.$scolor.';">&nbsp;&nbsp;</span>';
		$body .= '<span style="background: '.$tcolor.';">&nbsp;&nbsp;</span><span style="background: '.$lcolor.';">&nbsp;&nbsp;</span>';
		$body .= '<span style="background: '.$bcolor.';">&nbsp;&nbsp;</span><span style="background: '.$ocolor.';">&nbsp;&nbsp;</span></span></p>'.PHP_EOL;
		$body .= '<p>Page created by <strong>'.$author.'</strong></p>'.PHP_EOL;
		$body .= '<p>TYPE: '.$type.'<br />GROUP: '.$group.'<br />JAB: '.$jab.'<br />JQUERY: '.$jscript.'<br />CSS: '.$css.'<br />THEME: '.$selectedtheme.' | '.$is_theme.'<br />';
		$body .= 'CONTAINER: '.$container.'<br />LAYOUT: '.$selectedlayout.' | '.$alayout.' | '.$is_layout.'<br /></p>'.PHP_EOL;
		
		$body .= '<h4>Layout Data</h4>'.PHP_EOL;
		if($selectedlayout!='0'){
		$body .= '<p>'.$method.' method<br />'.$rows.' rows X '.$cols.' cols<br />col-width: '.$width.' '.$hunit.' | min-width: '.$maxwidth.' | max-width: '.$maxwidth.'<br />row-height: '.$height.' '.$vunit.' | min-height: '.$minheight.' | max-height: '.$maxheight.'</p>'.PHP_EOL;
		
			if($method=='b3grid'){
				$body .= '<p>'.$rrstring.'</p>'.PHP_EOL;
			} elseif($method=='bootstrap'){
				$body .= '<p>'.$bsstring.'</p>'.PHP_EOL;
			} elseif($method=='cssgrid'){
				
			} else {}
			
		} else { $body.='<p>no layout selected</p>'.PHP_EOL;}
		
		$body .= '</main>'.PHP_EOL;
		
		if($is_layout=='1'){ 
			if(($container!='n')&&(strpos($alayout,'b')!==false)){ $body .= '</div>'.PHP_EOL; }
			if(($container!='n')&&(strpos($alayout,'f')!==false)){ $body .= '<div class="'.$container.'">'.PHP_EOL; }
		}
		
		$body .= '<footer><p class="copyright">&copy; '.$sitename.' '.date('Y').'</p></footer>'.PHP_EOL;
		
		if($is_layout=='1'){ if(($container!='n')&&(strpos($alayout,'f')!==false)){ $body .= '</div>'.PHP_EOL; }}
		if(($jab=='1')||($jab=='2')){
			$body .= '<div class="modal"><div class="modal-inner"><span data-modal-close>&times;</span><div class="modal-content"></div></div></div>'.PHP_EOL;
		}
		if($pgsloc=='base'){
			if($jab=='1'){
				$body .= '<script src="bos/bat/jab/jab.js"></script>'.PHP_EOL;
				if($jscript!='0'){
				$body .= '<script src="bos/bat/jab/jquery.'.$jscript.'.js"></script>'.PHP_EOL;
				$body .= '<script src="bos/bat/jab/brutalist.js"></script>'.PHP_EOL;
				$body .= '<script src="bos/bat/jab/start.brutalizing.js"></script>'.PHP_EOL;
				}
			} elseif($jab=='2'){
				$body .= '<script src="bos/bat/jab/jab.js"></script>'.PHP_EOL;
			} else {}
		} else {
			if($jab=='1'){
				$body .= '<script src="bat/jab/jab.js"></script>'.PHP_EOL;
				if($jscript!='0'){
				$body .= '<script src="bat/jab/jquery.'.$jscript.'.js"></script>'.PHP_EOL;
				$body .= '<script src="bat/jab/brutalist.js"></script>'.PHP_EOL;
				$body .= '<script src="bat/jab/start.brutalizing.js"></script>'.PHP_EOL;
				}
			} elseif($jab=='2'){
				$body .= '<script src="bat/jab/jab.js"></script>'.PHP_EOL;
			} else {}
		}
		$body .= '</body>'.PHP_EOL.'</html>';
		fwrite($new_page, $body); 
		
		$_SESSION['message'] = 'Page generated successfully';
		header('location: page_edit_pages.php');
	} else{
		$_SESSION['message'] = 'Select a page to generate';
		header('location: page_edit_pages.php');
	}
?>