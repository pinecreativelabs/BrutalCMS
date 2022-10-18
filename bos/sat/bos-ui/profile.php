
    <div id="profile" class="op-panel charcoal">
        <div class="op-panelctrl solid-black">
			<div data-close="profile" class="op-panelbt op-bt-close">
				<img src="bat/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<a href="logout.php" class="op-panelbt op-bt-nav">
				<span class="lucida unset-bg">LOGOUT</span>
			</a>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="bat/css/bos-ui/close-white-48a.png" alt="close all" />
			</div>
			<div class="clearspace"></div>
		</div>
        
        <div class="op-panelform smoke-t">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block b100">
						<div class="mint chonk black-t" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">My PAD <i class="bi bi-lock"></i></h3>
							<h4 class="lucida heavy flow-text">My Profile Admin Dashboard</h4>
						</div>
					</div>
				</div>
				<div class="block-wrap">
					<div class="block bw30 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida smoke fossil-t charcoal-t-s flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-action"></i> Actions </h4>
						<ul class="tiles lucida black-t-s">
							<li><a href="javascript:void(0);" data-panelid="edit-profile" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-edit"></i> Edit Profile</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="change-password" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-primary-key"></i> Change Password</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="streams-channels" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-trident grayscale"></i> Streams &amp; Channels</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw40 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida smoke fossil-t charcoal-t-s flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Account</h4>
						<p class="courier padded neotable" style="font-size: 1.33em line-height: 140%;">
						<?php echo '<span>UID: </span>'.$uid.'<br /><span>username: </span>'.$uname.'<br />
							<span>email: </span>'.$uemail.'<br /><span>active: </span>'.$uactive.'<br />
							<span>group: </span>'.$ugroup.'<br /><span>IP: </span>'.$userIP; ?>
						</p>
						<h4 class="lucida smoke fossil-t charcoal-t-s flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Profile</h4>
						<p class="courier padded neotable" style="font-size: 1.33em line-height: 140%;">
						<?php echo '<span>Visibility: </span>'.$up_visibility.'<br />
							<span>Status: </span>'.$up_status.'<br />
							<span>Name: </span>'.$up_fname.' '.$up_lname.'<br />
							<span>Sex: </span>'.$up_sex.'<br />
							<span>Birthday: </span>'.$up_bday.'<br />
							<span>Email: </span>'.$up_email.'<br />
							<span>Phone: </span>'.$up_phone.'<br />
							<span>Website: </span>'.$up_url.'<br />
							<span>BIO:</span><br />'.$up_bio.'';
						?></p>
					</div>
					<div class="block bw30 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida smoke fossil-t charcoal-t-s flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-user"></i> My Avatar </h4>
						<?php 
							if($avatar=='false'){
								echo '<p class="disabled padded" style="max-width: 90%;"><span class="allcaps heavy">Avatar Not Set</span><br />To set an avatar, upload an <strong><em>avatar.jpg</em></strong> image file to your <em>My Photos</em> folder.';
							} else {
								echo '<p class="center" style="max-width: 90%;"><img src="'.$avatarpath.'" alt="'.$uname.' avatar" class="circle crop large-thumb" /></p>';
							}
						?>
					</div>
				</div>
			</div>
        </div>
    </div>