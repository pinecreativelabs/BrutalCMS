	<style>
	.boslink:link, .boslink:visited{color:#ffff00; border-bottom: 1px dotted #ffff00;}
	.boslink:hover{color:#ff0000; border-bottom: 1px dotted #ff0000;}
	#bos small{font-size: 80%;}
	#bos .limebox{border-radius: 1rem; border: 1px solid #00ff00; padding: 1rem;}
	#bos .limebox h3 {font-weight: 600; margin: 0; padding: 8px;}
	#bos .edit-btn, .del-btn, .mark-btn {min-width: initial;}
	#bos details summary {background: #00ff00; color: #000; font-weight: 600; text-transform: uppercase;}
	#bos .details {padding: 8px 8px 32px 8px;}
	#bos .tabs label {font-weight: 900; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0; background: #0f0; color: #000;}
	#bos .tabs .tab {background: #000; color: #0f0; padding: 1em; border: none;}
	#bos .tabs .tab .rolebox, .tabs .tab .projectbox, .projectbox {-webkit-border-radius: 0 1rem 1rem 1rem; border-radius: 0 1rem 1rem 1rem;}
	</style>
    <div id="bos" class="op-panel black">
        <div class="op-panelctrl solid-black">
			<div data-close="bos" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="nb-btn-small pill bitstream sepia">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        
        <div class="op-panelform smoke-t">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block b100">
						<div class="sand chonk black-t monolisk" style="display: inline-block; margin: 0 1.5em 0 0; padding: 0 1em 0 1em;">
							<h3><strong>BOS</strong></h3>
							<h4 class="spread flow-text"><strong>Base Operating System</strong></h4>
						</div>
						<div class="huge bold lucida" style="display: inline-block;"><span class="sand-t"><?php echo $version;?></span></div>
					</div>
				</div>
				<div class="block-wrap bitstream">
					<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h3 class="sand-t">About</h3>
						<p class="lime-t"><strong>BOS Version: </strong> <?php echo $version;?><br />
							<strong>Developer: </strong><a href="http://www.pinecreativelabs.com" class="boslink" target="_blank">Pine Creative Labs</a></p>
						<h3 class="sand-t">Your Locale</h3>
						<p class="lime-t"><strong>Your IP: </strong><?php echo $userIP;?><br /><strong>Country:</strong><?php echo $user_country.' ('.$user_cc.')';?><br />
							<strong>Region:</strong> <?php echo $user_region.' ('.$user_rc.')';?><br /><strong>City:</strong> <?php echo $user_city;?><br />
							<strong>Timezone:</strong> <?php echo $user_tz;?><br />
						</p>
					</div>
					
					<div class="block bw67 md-100 sm-100 xs-100"><div style="padding: 1em 2em 1em 0;">
					
						<div class="tabs">
							<input type="radio" name="bostabs" id="tab-env" checked="checked">
							<label for="tab-env">Environment</label>
							<div class="tab"><div class="limebox">
								<h3 class="sand-t flow-text">Server Environment</h3>
								<p class="lime-t"><strong>PHP Version:</strong> <?php echo $phpversion;?></p>
								<p><a href="build/helpers/phpinfo.php" target="_blank" class="btn pastel indigo-t invert-h bold">PHP INFO &raquo;</a></p>
								<p class="lime-t" style="margin-top: 1rem;">
									<strong>Local IP:</strong> <?php echo $local_ip;?><br />
									<strong>Server IP:</strong> <?php echo $server_ip;?><br /><br />
									<strong>Session Duration:</strong> <?php echo $session_dur;?><br /><br />
									<strong>HTTP Status:</strong> <?php echo $http;?><br />
									<strong>Current User:</strong> <?php echo $get_cur_user;?><br />
									<strong>User ID:</strong> <?php echo $get_my_uid;?><br />
									<strong>Protocol:</strong> <?php echo $protocol;?><br />
									<!--<strong>Loadtime:</strong> < ?php echo implode(" ",$loadtime);?><br />-->
									<strong>Server OS:</strong> <?php echo $server_os;?><br /><br />
									<strong>Upload Max File Size:</strong> <?php echo $max_file_size;?><br />
									<strong>Post Max Size:</strong> <?php echo $post_max_size;?><br />
									<strong>Memory Limit:</strong> <?php echo $memory_limit;?><br /><br />
									<strong>Disk Space:</strong> <?php echo $free_disk_space.' / '.$total_disk_space;?><br /><br />
								</p>
								<h3 class="sand-t flow-text">Client Info</h3>
								<p class="lime-t"><strong>My IP:</strong> <?php echo $user_ip;?><br />
									<strong>Country:</strong> <?php echo $user_country;?><br />
									<strong>Timezone:</strong> <?php echo $user_tz;?><br /><strong>Browser Language:</strong> <?php echo $browser_lang;?><br /><br />
								</p>
								<div class="lime-t" id="systeminfo"></div>
							</div></div>
							<input type="radio" name="bostabs" id="tab-sys">
							<label for="tab-sys">System</label>
							<div class="tab"><div class="limebox">
								<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100"><div style="padding: 1em;">
									<details><summary>Configuration</summary><div class="details">
										<h3 class="sand-t flow-text">System</h3>
										<p class="lime-t"><strong>https:</strong> <?php echo $https;?><br />
											<strong>host:</strong> <?php echo $host;?><br />
											<strong>basedir:</strong> <?php if($basedir==''){ echo '[not set]<br />'; } else { echo $basedir.'<br />';} ?>
											<strong>cdir:</strong> <?php echo $cdir;?><br />
										</p>
									</div></details>
									<details><summary>Styles</summary><div class="details">
										<h3 class="sand-t flow-text">Custom Fonts</h3>
										<div class="lime-t"><?php echo $fontlist;?></div>
									</div></details>
								</div></div><div class="block bw50 xs-100 sm-100 md-100"><div style="padding: 1em;">
									<details><summary>Content Management</summary><div class="details">
										<h3 class="sand-t flow-text">Content Types</h3>
										<div class="lime-t"><?php echo $content_type_list;?></div>
										<h3 class="sand-t flow-text">Content Group Types</h3>
										<div class="lime-t"><?php echo $content_group_type_list;?></div>
										<h3 class="sand-t flow-text">Content Stream Types</h3>
										<div class="lime-t"><?php echo $stream_type_list;?></div>
										<h3 class="sand-t flow-text">Content Post Types</h3>
										<div class="lime-t"><?php echo $content_post_type_list;?></div>
									</div></details>
									<details><summary>Users</summary><div class="details">
										<h3 class="sand-t flow-text">Permission Access Levels (PAL)</h3>
										<div class="lime-t"><ul class="grouplist">
											<li>0 <small>(read-only)</small></li>
											<li>1 <small>(partial read-write)</small></li>
											<li>2 <small>(full read-write)</small></li>
											<li>3 <small>(superadmin)</small></li>
										</ul></div>
										<h3 class="sand-t flow-text">User Group Types</h3>
										<div class="lime-t"><?php echo $group_type_list;?></div>
										<h3 class="sand-t flow-text">User Groups</h3>
										<div class="lime-t"><?php echo $group_list;?></div>
									</div></details>
								</div></div></div>
							</div></div>
						</div>
					
					</div></div>
				</div>
			</div>
        </div>
    </div>