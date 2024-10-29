<?php 
$ggdir = dirname(__FILE__, 4);
if ( $_POST['panelid'] == 'upgrade' ) { // If exist OpenFooter ID
?>

	<!-- Upgrade -->
    <div id="upgrade" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="upgrade" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<a href="logout.php" class="op-panelbt op-bt-nav">
				<span class="lucida unset-bg">LOGOUT</span>
			</a>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform smoke-t center">
			<div class="plush center brick" style="padding: 1.1em;">
				<h4 class="lucida fluid-text"><i class="bi bi-rainbow blink"></i><br />Upgrade Available</h4>
				<p class="flow-text">Gemini 1.1 now available.</p>
			</div>
			<?php $row = 0;
			$skip_row_number = array("1");
			if (($handle = fopen($ggdir."/rat/repo/data/csv/userlist.csv", "r")) !== FALSE) {
				while (($pdata = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$num = count($pdata);
					$row++;
					if (in_array($row, $skip_row_number)){continue;} else {
						echo '<p><strong>UID: </strong>'.$pdata[0].'<br />';
						echo '<strong>username: </strong>'.$pdata[1].'<br />';
						echo '<strong>email: </strong>'.$pdata[3].'<br />';
						echo '<strong>active: </strong>'.$pdata[4].'<br />';
						echo '<strong>group: </strong>'.$pdata[5].'</p>';
					}
				}
				fclose($handle);
			} ?>
        </div>
    </div>

<?php }

elseif ( $_POST['panelid'] == 'fam-fu-imgs' ) {
	include_once('fam-fu-imgs.php');
}
elseif ( $_POST['panelid'] == 'fam-fu-aud' ) {
	include_once('fam-fu-aud.php');
}
elseif ( $_POST['panelid'] == 'fam-fu-vid' ) {
	include_once('fam-fu-vid.php');
}
elseif ( $_POST['panelid'] == 'fam-fu-docs' ) {
	include_once('fam-fu-docs.php');
}
elseif ( $_POST['panelid'] == 'fam-fu-misc' ) {
	include_once('fam-fu-misc.php');
}

// Not Found Content
else { ?>
<!-- Empty Content Block -->
<div id="<?php echo $_POST['panelid']; ?>" class="op-panel charcoal">
	<div class="op-panelctrl">
		<div data-close="<?php echo $_POST['panelid']; ?>" class="op-panelbt op-bt-close">
			<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
		</div>
		<a href="logout.php" class="op-panelbt op-bt-nav"><span class="lucida unset-bg">LOGOUT</span></a>
		<div class="op-panelbt op-bt-closeall floatright">
			<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
		</div><div class="clearspace"></div>
	</div>
    <div class="op-panelform smoke-t center">
		<div class="alert center brick" style="padding: 1.1em;">
			<h4 class="lucida fluid-text"><i class="bi bi-red-alert blink"></i><br />ERROR</h4>
			<p class="flow-text">No content found.</p>
		</div>
    </div>
</div>

<?php } ?>