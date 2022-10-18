<?php 
require_once 'bos/sat/sos/sos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>BLUEPRINT DEMO</title>
	<meta name="description" content="Brutal CMS \\\ BLUEPRINT demo." />
	
	<!-- Fonts -->
	<link href="bos/rat/repo/fonts/bitstream/font.css" type="text/css" rel="stylesheet" media="all"/>
	<link href="bos/rat/repo/fonts/communist/font.css" type="text/css" rel="stylesheet" media="all"/>
	<link href="bos/rat/repo/fonts/vcr-mono/font.css" type="text/css" rel="stylesheet" media="all"/>
	<link href="bos/rat/repo/fonts/depixel/font.css" type="text/css" rel="stylesheet" media="all"/>
	<link href="bos/rat/repo/fonts/writer-duospace/font.css" type="text/css" rel="stylesheet" media="all"/>
	
	<!-- CORE CSS -->
	<link rel="stylesheet" type="text/css" href="bos/bat/css/brutalist.min.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="bos/bat/css/blueprintgrid.min.css" media="screen"/> 
	
	<!-- THEME -->
	<link rel="stylesheet" type="text/css" href="bos/rat/repo/themes/<?php echo $theme; ?>/css/style.css" media="screen"/>

	<?php require_once 'bos/bat/blueprint/view.php';?>
</head>
<body>
<!-- Header -->
<header class="block-wrap stretch parent glued">
	<div class="block bw80 xs-100 sm-100 md-100"><div class="padded">
		<h1 class="fluid-text heavy"><?php echo $sitename;?></h1>
	</div></div>
	<div class="block bw20 xs-100 sm-100 md-100"><div class="padded center heavy">
			<a href="#menu" data-modal-open class="btn full flow-text">MENU</a>
			<br /><hr />
			<a href="bos/index.php" target="_blank" class="btn full">BOS Login</a>
	</div></div>
</header>
<!-- BODY -->
<main class="container-1200">
	<div class="block-wrap parent">
		<div class="block bw100 blueprint"><div class="padded">
			<h2 class="fluid-text center">Blueprint</h2>
		</div></div>
		<div class="block bw100"><div class="padded">
			<h3>Applying Themes &amp; Building Layouts</h3>
			<p>To work with all theme and layout data, only one script needs to be included within the <em><b>head</b></em> tag.<br /><br />
			<span class="heavy flow-text smoke charcoal-t">require_once 'bos/bat/blueprint/view.php'</span><br /><br />
			This file adds inline CSS, which contains theme classes that can be applied to any element. It also references layout data, which can be used to programmatically generate a layout.</p>
		</div></div>
	</div>


<div class="block-wrap parent">
	<div class="block bw50 xs-100 sm-100 md-100">
		<div class="padded">
			<h3 class="padded blueprint lucida">Fonts</h3>
			<p>These fonts are included in the RAT/REPO/FONTS directory. Simply reference the CSS file for any font that will be rendered:<br /><br />
			<strong>/bos/rat/repo/fonts/<span class="red-t">name-of-font</span>/font.css</strong>.<br /><br />Apply a custom font name class to any element: <strong><em>font-name</em>-font</strong><br /><br /></p>
			<p class="charcoal smoke-t heavy"><small>.bitstream-font</small></p>
			<p class="flow-text bitstream-font" style="margin-bottom: 20px;">Bitstream Font (normal)<br /><b>Bitstream Bold</b><br />
				<em>Bitstream Italic</em><br /><strong><em>Bitstream Bold Italic</em></strong>
			</p>
			<p class="charcoal smoke-t heavy"><small>.communist-font</small></p>
			<p class="flow-text communist-font" style="margin-bottom: 20px;">Communist Font (normal)<br /><b>Communist Bold</b><br />
				<em>Communist Italic</em><br /><strong><em>Communist Bold Italic</em></strong>
			</p>
			<p class="charcoal smoke-t heavy"><small>.vcr-mono-font</small></p>
			<p class="vcr-mono-font flow-text" style="margin-bottom: 20px;">VCR Mono Font</p>
			<p class="charcoal smoke-t heavy"><small>.depixel-font</small></p>
			<p class="depixel-font flow-text" style="margin-bottom: 20px;">DePixel Font<br /><b>DePixel Bold</b><br /><span class="narrow">DePixel .narrow</span><br />
			<span class="wide">DePixel .wide</span><br /><small>DePixel Small</small></p>
			<p class="charcoal smoke-t heavy"><small>.writer-duospace-font</small></p>
			<p class="flow-text writer-duospace-font">Writer-Duospace Font (normal)<br /><b>Writer-Duospace Bold</b><br /><em>Writer-Duospace Italic</em><br />
			<strong><em>Writer-Duospace Bold Italic</em></strong></p>
		</div>
	</div>
	<div class="block bw50 xs-100 sm-100 md-100">
		<div class="padded">
			<h3 class="padded blueprint lucida">Themes</h3>
			<p>Below are the four default themes that are included with Brutal CMS. A default global theme (applied to a whole page) can be configured in the SAD module, under "Defaults". Additionally, each theme can be applied via class name to any element like so: <strong>.theme-<em>name-of-theme</em></strong><br /><br /></p>
			<div class="theme-nude border padded" style="min-height: 25vh;">
				<h3 class="flow-text">Nude Theme</h3>
				<p><strong>.theme-nude</strong><br /><br />I am a bare naked theme. I go out onto the interwebs all willy-nilly.<br />[<a href="#">link</a>]</p>
			</div>
			<div class="theme-communist border padded" style="min-height: 25vh;">
				<h3 class="flow-text">Communist Theme</h3>
				<p><strong>.theme-communist</strong><br /><br />I am a very strict communist theme that dictates your very thoughts.<br />[<a href="#">link</a>]</p>
			</div>
			<div class="theme-vaporwave border padded" style="min-height: 25vh;">
				<h3 class="flow-text">V a p o r w a v e</h3>
				<p><strong>.theme-vaporwave</strong><br /><br />A chillaxed theme for those who like to lounge around.<br />[<a href="#">link</a>]</p>
			</div>
			<div class="theme-8bit border padded" style="min-height: 25vh;">
				<h3 class="flow-text">8bit Theme</h3>
				<p><strong>.theme-8bit</strong><br /><br />I'm a pixelated theme, rendered in 8-bit.<br />[<a href="#">link</a>]</p>
			</div>
			<hr />
			<h4>List of Themes</h4>
			<p>To display a simple list of active themes, simply echo the variable: <strong><em>$themelist</em></strong>.</p>
			<?php echo $themelist;?>
		</div>
	</div>
	<div class="block bw100 xs-100 sm-100 md-100">
		<div class="padded">
			<h3 class="padded blueprint lucida">Layouts</h3>
			<p>To display a simple list of available layouts, simply echo the variable: <strong><em>$layoutlist</em></strong>.</p>
			<?php echo $layoutlist;?>
			<hr />
			<h4>Generating a Layout from Raw Data</h4>
			<p>Layouts can be programmatically generated from raw layout data. Copy the code from the below location into a page where the layout is to appear.</p>
			<p><strong><em>/bos/bat/blueprint/views/layouts.php</em></strong></p>
			<p class="warning padded"><strong>NOTE:</strong> This will be significantly improved in the Developer release.</p>
			<hr />
			<h4>EXAMPLE: <em>3-Column Layout</em></h4>
			<p>In the example below, we will use the <strong><em>three-column</em></strong> layout. The initial settings should create two rows, with 3 blocks each.</p>
			<p>Try changing some settings within the BLUEPRINT module, such as the method and / or number of columns and rows.</p>
			<?php 
			if($layouts->layout->count()>0){ 
				foreach($layouts->layout as $layout){
					// get variables
					$layoutname = strtolower(preg_replace('/\s*/','',$layout['title']));
					$layoutmethod = $layout['method'];
					$column = $layout->column; // column class name
					$cols = $layout['cols']; // number of columns
					$rows = $layout['rows']; // number of rows
					$xu = $layout->column['x-unit']; // horizontal width unit
					$yu = $layout->column['y-unit']; // vertical height unit
					$width = $layout->column['width']; // default width
					$minwidth = $layout->column['min-width'];
					$maxwidth = $layout->column['max-width'];
					$height = $layout->column['height']; // default height
					$minheight = $layout->column['min-height'];
					$maxheight = $layout->column['max-height'];
					$rules = strtolower($layout->rules); // responsive rule classes
					$xxs = $layout->rules['xxs']; // wearables
					$xs = $layout->rules['xs']; // small mobile
					$sm = $layout->rules['sm']; // mobile
					$md = $layout->rules['md']; // tablets
					$lg = $layout->rules['lg']; // laptops
					$xl = $layout->rules['xl']; // desktops
					$xxl = $layout->rules['xxl']; // tvs
					// create responsive rules string
					$rrules = '';
					if($xxs!=''){$rrules.='xxs-'.$xxs.' ';}
					if($xs!=''){$rrules.='xs-'.$xs.' ';}
					if($sm!=''){$rrules.='sm-'.$sm.' ';}
					if($md!=''){$rrules.='md-'.$md.' ';}
					if($lg!=''){$rrules.='lg-'.$lg.' ';}
					if($xl!=''){$rrules.='xl-'.$xl.' ';}
					if($xxl!=''){$rrules.='xxl-'.$xxl.' ';}
					if($rules!=''){$rrules.=$rules.' ';}
					
					// find desired match for layout data
					if($layout['title']=='three-column'){
						if($layoutmethod=='b3grid'){
							echo '<p class="flow-text">Layout Method: <strong>B3Grid</strong></p>';
							$threecols = '';
							// count number of rows
							for ($y=1; $y<=$rows; $y++) {
								$threecols .= '<div class="block-wrap bh-'.$height.'">'.PHP_EOL; // row container
								// count number of columns
								for ($x=1; $x <= $cols; $x++) {
									$threecols .= '<div class="'.$column.' bw'.$width.' '.$rrules.' padded disabled" style="border-right: 2px solid #333; border-bottom: 2px solid #333;">'.PHP_EOL;
									$threecols .= 'ROW '.$y.'<br />BLOCK '.$x.PHP_EOL.'</div>'; // columns (blocks)
								}
								$threecols .= '</div>'.PHP_EOL;
							}
							echo $threecols;
						} elseif($layoutmethod=='bootstrap'){
							echo '<p class="flow-text">Layout Method: <strong>Bootstrap</strong></p>';
							
						} else {
							echo '<p class="flow-text">Layout Method: <strong>Custom</strong></p>';
						}
					}
				}
			} else { echo '<p>No layouts available.</p>';}
		?>
		</div>
	</div>
</div>
</main>
<!-- Footer -->
<footer class="block-wrap stretch parent">
	<div class="block bw50 xs-100 sm-100"><div class="padded">
		<h5>Links</h5>
		<ul class="tiles full nav">
			<li><a href="http://www.brutalistframework.com" target="_blank">Brutalist Framework</a></li>
			<li><a href="https://www.blueprintgrid.com" target="_blank">Blueprint Grid</a></li>
			<li><a href="https://brutalboard.net/" target="_blank">Brutal Board</a></li>
		</ul>
	</div></div>
	<div class="block bw50 xs-100 sm-100"><div class="padded">
		<p class="right-align">&copy; <?php echo $sitename.' '.date('Y');?></p>
	</div></div>
</footer>
<div class="block-wrap bh10"></div>

<!-- MENU MODAL -->
<div style="display: none;" id="menu">
	<div class="padded warning">
		<h4 class="lucida flow-text"><i class="bi bi-menu"></i> Menu</h4>
		<ul class="tiles thirds menu">
			<li><a href="index.php">HOME<br /><small>Index Page</small></a></li>
			<li><a href="articles.php">CAD<br /><small>Articles</small></a></li>
			<li><a href="crude.php">CRUDE<br /><small>Data</small></a></li>
			<li><a href="daily-content.php" target="_blank">DICK<br /><small>Daily Content</small></a></li>
		</ul>
	</div>
</div>
<!-- Initiate and display modal itself -->
<div class="modal">
	<div class="modal-inner draggable">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="bos/bat/jab/jab.js" type="text/javascript" ></script>
<script src="bos/bat/jab/jquery.3.js" type="text/javascript" ></script>

<!-- Preloader -->
<script type="text/javascript">
//<![CDATA[
	$(window).on("load",function(e) { // makes sure the whole site is loaded
		$("#status").fadeOut(); // will first fade out the loading animation
		$("#preloader").delay(500).fadeOut("slow"); // will fade out the white DIV that covers the website.
	})
//]]>
</script>
</body>
</html>