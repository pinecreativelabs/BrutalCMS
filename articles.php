<?php 
require_once 'bos/sat/sos/sos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>CAD DEMO</title>
	<meta name="description" content="Brutal CMS \\\ CAD demo." />
	
	
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
			<h2 class="fluid-text center">CAD Articles</h2>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100"><div class="padded">
			<h4 class="flow-text lucida">About CAD Module</h4>
			<p>CAD <em>(Content Article Display)</em> is a CAT (Content Application Toolkit) module that allows you to display a list of articles. Features include:</p>
			<ul class="check">
				<li>Associate articles with a Topic</li>
				<li>Link image to any URL (optional)</li>
				<li>Set custom initial post date</li>
				<li>Expire (hide) post after a specific date</li>
			</ul>
		</div></div>
		<div class="block bw50 xs-100 sm-100 md-100"><div class="padded">
			<h4 class="lucida flow-text">How Does it Work?</h4>
			<p>CAD does the following:</p>
			<ul class="check">
				<li>Any user within the <em>administrator</em> or <em>editor</em> groups can add and edit articles</li>
				<li>The current editor username is used as the author</li>
				<li>If not set, the current date is used for the DIP (date of initial post)</li>
				<li>If the expiration date is left empty, the post never expires</li>
				<li>Article post becomes hidden after the expiration date has passed, if it was set</li>
			</ul>
		</div></div>
	</div>
	<div class="block-wrap parent">
		<div class="block bw25 xs-100 sm-100 md-100"><div class="padded">
			<h4 class="flow-text">Topics</h4>
			<?php require_once 'bos/cat/cad/views/topic-list.php';?>
			<hr />
			<p>To display a topic list:<br /><small><span class="smoke charcoal-t">require_once 'bos/cat/cad/views/topic-list.php';</span></small></p>
		</div></div>
		<div class="block bw75 xs-100 sm-100 md-100"><div class="padded">
			<h3 class="flow-text">Articles</h3>
			<?php require_once 'bos/cat/cad/view.php'; ?>
			<hr />
			<p>To display all articles:<br /><small><span class="smoke charcoal-t">require_once 'bos/cat/cad/view.php';</span></small></p>
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