	<div id="mad" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="mad" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="nb-btn-small pill bitstream sepia">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="violence chonk white-t monolisk black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>MAD <i class="bi bi-target"></i></strong></h3>
							<h4 class="heavy flow-text">Marketing Admin Dashboard</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="cta-central" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bullhorn"></i> CTA Central</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-ads" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-target"></i> Manage Ads</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="mailing-lists" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-mailbox"></i> Mailing Lists</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="form-manager" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-file-edit"></i> Form Manager</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="notify-node" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bell"></i> Notifications</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-mad" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="padded warning bitstream">
							<p class="flow-text">This module will be available in 3.2 or newer. It will offer management of:</p>
							<ul>
								<li>Mailing lists (campaigns)</li>
								<li>Notifications &amp; alerts</li>
								<li>Advertisements</li>
								<li>CTA content</li>
								<li>Data collection (forms)</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- MAD CTA Panel -->
	<div id="cta-central" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="cta-central" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="violence chonk white-t monolisk black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>MAD <i class="bi bi-target"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-bullhorn"></i> CTA Central</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="manage-ads" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-target"></i> Manage Ads</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="mailing-lists" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-mailbox"></i> Mailing Lists</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="form-manager" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-file-edit"></i> Form Manager</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="notify-node" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bell"></i> Notifications</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-mad" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/mad/module/page_cta_central.php" title="CTA Manager" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- MAD Ads Panel -->
	<div id="manage-ads" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="manage-ads" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="violence chonk white-t monolisk black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>MAD <i class="bi bi-target"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-target"></i> Ad Manager</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="cta-central" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bullhorn"></i> CTA Central</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="mailing-lists" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-mailbox"></i> Mailing Lists</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="form-manager" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-file-edit"></i> Form Manager</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="notify-node" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bell"></i> Notifications</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-mad" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/mad/module/page_ad_manager.php" title="Ad Manager" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- MAD Mailing Lists Panel -->
	<div id="mailing-lists" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="mailing-lists" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="violence chonk white-t monolisk black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>MAD <i class="bi bi-target"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-mailbox"></i> Mailing Lists</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="cta-central" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bullhorn"></i> CTA Central</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-ads" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-target"></i> Manage Ads</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="form-manager" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-file-edit"></i> Form Manager</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="notify-node" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bell"></i> Notifications</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-mad" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/mad/module/page_mailing_lists.php" title="Mailing List Manager" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- MAD Form Manager Panel -->
	<div id="form-manager" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="form-manager" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="violence chonk white-t monolisk black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>MAD <i class="bi bi-target"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-file-edit"></i> Form Manager</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="cta-central" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bullhorn"></i> CTA Central</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-ads" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-target"></i> Manage Ads</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="mailing-lists" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-mailbox"></i> Mailing Lists</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="notify-node" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bell"></i> Notifications</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-mad" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/mad/module/page_form_builder.php" title="Form Builder" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- MAD Notifications Panel -->
	<div id="notify-node" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="notify-node" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="violence chonk white-t monolisk black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>MAD <i class="bi bi-target"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-bell"></i> Notifications</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="cta-central" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bullhorn"></i> CTA Central</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-ads" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-target"></i> Manage Ads</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="mailing-lists" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-mailbox"></i> Mailing Lists</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="form-manager" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-file-edit"></i> Form Manager</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-mad" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/mad/module/page_notifications.php" title="Notifications" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>