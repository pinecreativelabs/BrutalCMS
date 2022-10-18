<?php include 'helpers/get_settings.php';
	echo '<p class="lucida" style="font-size: 1.2em;">General</p>';
	echo '<p><strong>Sitename: </strong>'.$sitename.'<br />
	<strong>Mailto: </strong>'.$mailto.'<br /><strong>Date Format: </strong>'.$ddf.'<br />
	<strong>Time Format: </strong>'.$dtf.'<br /><strong>Default Theme: </strong>'.$theme.'<br /><br /></p>';
	echo '<p class="lucida" style="font-size: 1.2em;">Developer</p>';
	echo '<p><strong>Developer Mode: </strong>'.$dmode.'<br /><strong>Load jQuery: </strong>'.$load_jquery.'<br />
	<strong>jQuery Version: </strong>'.$jqver.'<br /><strong>Icon Library: </strong>'.$ilib.'<br /><br /></p>';
	echo '<p class="lucida" style="font-size: 1.2em;">Accessibility</p>';
	echo '<p><strong>Registration: </strong>'.$registration.'<br /><strong>Default Group: </strong>'.$group.'<br />
	<strong>Age Restrict: </strong>'.$age_restrict.'<br /><strong>Minimum Age: </strong>'.$age.'<br />
	<strong>Maintenance Mode: </strong>'.$mmode.'<br /><strong>Error Pages: </strong>'.$errormode.'<br />
	<strong>PageLock: </strong>'.$plock.'<br /><br /></p>';
	echo '<p class="lucida" style="font-size: 1.2em;">Cookie Consent</p>';
	echo '<p><strong>Cookie Consent: </strong>'.$cc_mode.'<br /><br /></p>';
	echo '<p class="lucida" style="font-size: 1.2em;">Coming Soon</p>';
	echo '<p><strong>Redirect Who: </strong>'.$cs_redir.'<br /><strong>Template: </strong>'.$cs_template.'<br /><br /></p>';
	echo '<p class="lucida" style="font-size: 1.2em;">Tracking &amp; SEO</p>';
	echo '<p><strong>Tracking Code: </strong>'.$tracking.'<br /><strong>Tracking Position: </strong>'.$tc_position.'<br />
	<strong>Twitter Card: </strong>'.$twcard.'<br /><strong>Open Graph: </strong>'.$ogdata.'</p>';
?>