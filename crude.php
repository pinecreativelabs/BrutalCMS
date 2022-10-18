<?php 
require_once 'bos/sat/sos/sos.php';
// include CRUDE view 
require_once 'bos/dat/crude/view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>CRUDE DEMO</title>
	<meta name="description" content="Brutal CMS \\\ CRUDE demo." />
	
	
	<!-- CORE CSS -->
	<link rel="stylesheet" type="text/css" href="bos/bat/css/brutalist.min.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="bos/bat/css/blueprintgrid.min.css" media="screen"/> 
	
	<!-- THEME -->
	<link rel="stylesheet" type="text/css" href="bos/rat/repo/themes/<?php echo $theme; ?>/css/style.css" media="screen"/>

	<style>
	ul.check li {margin-top: 8px;}
	ul.tags li {background: #0B243B; border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px; color: #f5f6ce; font-weight: 600; padding: 6px; }
	.articles-wrapper {display: flex; flex-wrap: wrap; align-items: stretch; font-family: "Times New Roman", Times, serif; text-align: left;}
	.articles-wrapper article { flex-basis: 45%; -moz-flex-basis: 45%; -webkit-flex-basis: 45%;
		padding: 1.25em; margin: 0.75em; background: #0B243B; min-height: 40vh; position: relative;
	}
	@media only screen and (max-width: 1199px) {
		.articles-wrapper article{flex-basis: 90%; -moz-flex-basis: 90%; -webkit-flex-basis: 90%;}
	}
	.articles-wrapper article .title {
		background: #0B3861; color: #F5F6CE; padding: 8px; margin: 0;
		font-size: 22px; line-height: 140%; font-weight: 600;
	}
	.articles-wrapper article .cover {min-height: 220px; width: 100%; background-size: cover; background-position: center top; background-repeat: no-repeat; }
	.articles-wrapper article .tag { position: absolute; bottom: 0; right: 0; background: #fff; color: #0b243b; font-weight: 600; font-size: 0.85em; padding: 6px;}
	.articles-wrapper article .post { font-size: 14px; line-height: 100%; color: #000; background: #f5f6ce; padding: 4px;}
	.articles-wrapper article .content {font-size: 16px; line-height: 140%; color: #fff; padding-bottom: 1.5em;}
	</style>
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
			<h2 class="fluid-text center">CRUDE Data</h2>
		</div></div>
		<div class="block bw100"><div class="padded">
			<h4 class="flow-text lucida">About CRUDE Module</h4>
			<p>CRUDE <em>(Create Read Update Data Environment)</em> is a DAT (Data Application Toolkit) module that allows you to manage CSV data files ("Entities"). Features include:</p>
			<ul class="check">
				<li>Manage entity groups</li>
				<li>Manage data entities (CSV files)</li>
				<li>Create and update data records</li>
				<li>Enable / disable ability to add or delete records</li>
			</ul>
			<p>Include CRUDE view:<br /><br /><span class="heavy flow-text smoke charcoal-t">require_once 'bos/dat/crude/view.php'</span></p>
		</div></div>
	</div>
	<div class="block-wrap parent">
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<h4 class="flow-text"><strong><?php echo $entity_count;?></strong> Entities</h4>
			<p>To get the number of entities:<br /><span class="smoke charcoal-t">echo $entity_count</span></p>
			<hr />
			<h4 class="flow-text">Entity List</h4>
			<?php echo $entity_list;?>
			<p>To display a linked list of entity raw data files:<br /><span class="smoke charcoal-t">echo $entity_list</span></p>
		</div></div>
		<div class="block bw67 xs-100 sm-100 md-100"><div class="padded">
			<h3 class="flow-text">Example Entity</h3>
			<p>In the example data table below, we are using the entity "<em><strong>books</strong></em>" to display a responsive data table of books.<br /><br /></p>
			
			<style>
				table.responsive tr:first-of-type {font-weight: 600; background: #e3e3e3; color: #333; text-transform: capitalize;}
			</style>
			<?php
			// DEFINE CUSTOM TABLE VARIABLE
			$booktable = '<table class="responsive">';
			// DEFINE DATA FILE PATH
			$book_datafile = $crudedatapath.'books.csv';
			// OPEN CSV FILE
			$stream = fopen($book_datafile, 'r');
			// EXTRACT ROWS & COLS
			while (($row = fgetcsv($stream)) !== false) {
				$booktable .= '<tr>';
				foreach ($row as $col) { $booktable .= '<td>'.$col.'</td>'; }
				$booktable .='</tr>';
			}
			// CLOSE CSV FILE
			fclose($stream);
			$booktable .= '</table>';
			// DISPLAY TABLE
			echo $booktable;
			?>
			
		</div></div>
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
			<li><a href="blueprint.php">BLUEPRINT<br /><small>Layouts &amp; Themes</small></a></li>
			<li><a href="articles.php">CAD<br /><small>Articles</small></a></li>
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