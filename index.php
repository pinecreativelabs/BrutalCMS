<?php 
// load core system
require_once 'bos/sat/sos/sos.php';
// load user info
require_once 'bos/pat/pad/view.php';
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title><?php echo $sitename;?></title>
    <meta name="description" content="Timelapse Magic: Brutal CMS DICK (Daily Integrated Content Keeper) module demo." />
    
	<!-- CORE CSS -->
	<link rel="stylesheet" type="text/css" href="bos/bat/css/brutalist.min.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="bos/bat/css/blueprintgrid.min.css" media="screen"/> 
	
	<!-- THEME -->
	<link rel="stylesheet" type="text/css" href="bos/rat/repo/themes/<?php echo $theme; ?>/css/style.css" media="screen"/>

</head>
<body>
<!-- Preloader -->
<div id="preloader" class="swede-split"><div id="status">&nbsp;</div></div>
	
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
<!-- Main Body -->
<main class="container-1200">
	<div class="block-wrap parent">
		<div class="block bw100"><div class="padded">
			<h2 class="fluid-text center"><?php echo $meta_desc;?></h2>
		</div></div>
		<div class="block bw100"><div class="padded">
			<h3>Welcome to Brutality</h3>
			<p><a href="https://www.brutalcms.com" target="_blank" class="link">Brutal CMS</a> is a flat-file content management system built with PHP, and uses XML and CSV files to store data.</p>
		</div></div>
		<div class="block bw100"><div class="padded">
			<h3>System Settings</h3>
			<p>System data as configured via the <a href="bos/index.php" class="link" target="_blank">BOS</a> <em>SAD</em> module.</p>
			<div class="block-wrap stretch">
				<div class="block bw33 xs-100 sm-100 md-50"><div class="padded">
					<h4 class="flow-text">System</h4>
					<details><summary>Coming Soon</summary>
						<p><strong>Redirect Users: </strong><?php echo $cs_redir;?><br /><strong>Template: </strong><?php echo $cs_template;?></p>
						<p><strong>HEADER:</strong><br /><?php echo $cs_header;?></p>
						<p><strong>MESSAGE:</strong><br /><?php echo $cs_text;?></p>
					</details>
					<details><summary>Maintenance Mode</summary>
						<p><strong>STATUS: </strong><?php if(empty($mmode)){ ?>Disabled<?php } else { ?>Enabled<?php }?></p>
						<p><strong>MESSAGE: </strong><br /><?php echo $mmtext; ?></p>
					</details>
					<details><summary>Developer Settings</summary>
						<p><strong>Developer Mode: </strong><?php echo $devmode;?><br />
						<strong>Load jQuery: </strong><?php echo $is_jquery;?><br /><strong>jQuery Version: </strong><?php echo $jqv;?><br />
						<strong>Icon Library: </strong><?php echo $ilib;?></p>
					</details>
				</div></div>
				<div class="block bw33 xs-100 sm-100 md-50"><div class="padded">
					<h4 class="flow-text">Errors</h4>
					<details><summary>403 Forbidden</summary>
						<p><?php echo $error403;?></p>
					</details>
					<details><summary>404 Not Found</summary>
						<p><?php echo $error404;?></p>
					</details>
					<details><summary>405 Not Allowed</summary>
						<p><?php echo $error405;?></p>
					</details>
					<details><summary>408 Request Timeout</summary>
						<p><?php echo $error408;?></p>
					</details>
					<details><summary>500 Internal Error</summary>
						<p><?php echo $error500;?></p>
					</details>
					<details><summary>502 Bad Gateway</summary>
						<p><?php echo $error502;?></p>
					</details>
					<details><summary>504 Gateway Timeout</summary>
						<p><?php echo $error504;?></p>
					</details>
				</div></div>
				<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
					<h4 class="flow-text">Access &amp; SEO</h4>
					<details><summary>Accounts</summary>
						<p><strong>Registration: </strong><?php echo $registration;?><br /><strong>Default Group: </strong><?php echo $group;?><br />
						<strong>Require Sitewide Login: </strong><?php echo $req_login;?></p>
					</details>
					<details><summary>Restrictions</summary>
						<p><strong>Age Verification: </strong><?php echo $age_verify;?><br /><strong>Minimum Age: </strong><?php echo $age;?><br />
						<strong>PageLock: </strong><?php echo $plock;?></p>
					</details>
					<details><summary>Cookie Consent</summary>
						<p><strong>Mode: </strong><?php echo $cc_mode;?><br /><strong>Cookie Duration: </strong><?php echo $cc_duration;?> days</p>
					</details>
					<details><summary>SEO</summary>
						<p><strong>Tracking Codes: </strong><?php echo $tracking;?><br /><strong>Tracking Code Position: </strong><?php echo $tc_position;?></p>
					</details>
				</div></div>
			</div>
		</div></div>
		<div class="block bw100"><div class="padded">
			<h3>Users</h3>
			<p>To display user information, include the PAD view file:<br /><span class="heavy flow-text smoke charcoal-t">require_once 'bos/pat/pad/view.php'</span></p>
			<div class="block-wrap stretch">
				<div class="block bw50"><div class="padded">
					<h4 class="flow-text">User List (Basic)</h4>
					<p>A list that only shows usernames that are active.</p>
					<?php echo $userlist;?>
					<p style="margin-top: 1em;">To display this list:<br /><span class="smoke charcoal-t">echo $userlist</span></p>
				</div></div>
				<div class="block bw50"><div class="padded">
					<h4 class="flow-text">User List (Details)</h4>
					<p>A details list of users that shows their user ID (UID), active status, and group.</p>
					<?php echo $userlist_details;?>
					<p style="margin-top: 1em;">To display this list:<br /><span class="smoke charcoal-t">echo $userlist_details</span></p>
				</div></div>
			</div>
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
			<li><a href="blueprint.php">BLUEPRINT<br /><small>Layouts &amp; Themes</small></a></li>
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