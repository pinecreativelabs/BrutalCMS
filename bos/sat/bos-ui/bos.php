
    <div id="bos" class="op-panel black">
        <div class="op-panelctrl solid-black">
			<div data-close="bos" class="op-panelbt op-bt-close">
				<img src="bat/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="bat/css/bos-ui/close-white-48a.png" alt="close all" />
			</div>
			<div class="clearspace"></div>
		</div>
        
        <div class="op-panelform smoke-t">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block b100">
						<div class="red chonk black-t" style="display: inline-block; margin: 0 1.5em 0 0; padding: 0 1em 0 1em;">
							<h3 class="lucida bold">BOS</h3>
							<h4 class="impact spread flow-text">Base Operating System</h4>
						</div>
						<div class="huge bold lucida" style="display: inline-block;"><span class="red-t"><?php echo $version;?></span></div>
					</div>
				</div>
				<div class="block-wrap">
					<div class="block bw30 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h3 class="lucida red-t">About</h3>
						<p><strong>BOS Version: </strong> <?php echo $version;?><br />
						<strong>Developed by: </strong><a href="http://www.pinecreativelabs.com" class="link" target="_blank">Pine Creative Labs</a><br /><br />
						<strong>Your IP: </strong><?php echo $userIP;?></p>
						
						<h3 class="lucida red-t flow-text">BOS Configuration</h3>
						<?php include 'sat/sos/print-settings.php'; ?>
					</div>
					<div class="block bw35 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h3 class="lucida red-t">Environment Info</h3>
						<div class="brdr-s-t rounded red-b padded">
							<p><?php echo '<strong>Server OS: </strong>'.php_uname().'<br />';
							echo '<strong>Current User: </strong>'.$cuser.'<br />';
							echo '<strong>Current User ID: </strong>'.$uid.'<br />';
							echo '<strong>Server IP: </strong>'.$sip.'<br />';
							echo '<strong>Server Protocol: </strong>'.$protocol.'<br />';
							echo '<strong>HTTPS: </strong>'.$http.'<br /><br />';
							echo '<strong>Disk Space: </strong>'.sprintf('%1.2f' , $freebytes / pow($bbase,$freebitclass)).' '.$si_prefix[$freebitclass].' / ';
							echo sprintf('%1.2f' , $totbytes / pow($bbase,$totbitclass)).' '.$si_prefix[$totbitclass].'<br /><br />';
							echo '<strong>PHP Version: </strong>' . phpversion().'<br /><br />';
							echo '<strong>Upload Max File Size: </strong>'.$maxFileSize.'<br /><strong>Post Max Size: </strong>'.$postMaxSize.'<br />';
							echo '<strong>Memory Limit: </strong>'.$memLimit.'<br /><br />';
							echo '<strong>User Agent: </strong>'.$_SERVER['HTTP_USER_AGENT'].'<br />';
							echo '<span class="ww-break"><strong>HTTP Accept: </strong>'.$_SERVER['HTTP_ACCEPT'].'</span><br /><br />';
							?></p>
							<p><a href="sat/sos/phpinfo.php" target="_blank" class="btn pastel indigo-t invert-h bold">PHP INFO &raquo;</a></p>
						</div>
					</div>
					<div class="block bw35 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h3 class="lucida red-t">System Info</h3>
						<div class="brdr-s-t rounded red-b padded"><div id="systeminfo"></div></div> 
					</div>
				</div>
			</div>
        </div>
    </div>