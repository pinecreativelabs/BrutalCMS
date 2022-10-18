	<div id="pad" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="pad" class="op-panelbt op-bt-close">
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
        
        <!-- Panel Content -->
        <div class="op-panelform">
			<div class="container-fluid"><div class="block-wrap">
				<div class="block bw25 xs-100 sm-100 md-100">
					<div class="river chonk denim-t rice-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
						<h3 class="lucida bold" style="font-size: 2.5em; ">PAD <i class="bi bi-lock"></i></h3>
						<h4 class="lucida heavy flow-text">Profile Admin Dashboard</h4>
					</div>
					<h4 class="lucida rice denim-t flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-action"></i> Actions</h4>
					<ul class="tiles lucida smoke-t black-t-s">
						<li><a href="javascript:void(0);" data-panelid="profile" data-pos="right" class="op-tab">
							<span class="title"><i class="bi bi-edit"></i> Edit My Account</span>
						</a></li>
						<?php if($ugroup=="BOS Admin"){?>
						<li><a href="javascript:void(0);" data-panelid="edit-raw-pad-data" data-pos="fade" class="op-tab">
							<span class="title"><i class="bi bi-database"></i> Edit Raw Data</span>
						</a></li>
						<?php } ?>
					</ul>

				</div>
				<div class="block bw75 md-100 sm-100 xs-100">
					<div class="block-wrap">
						<div class="block bw100" style="height: 84vh;">
							<iframe src="pat/pad/module/page_edit_users.php" title="User Editor" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
						</div>
						
					</div>
				</div>
			</div></div>
        </div>
    </div>
<?php include 'raw-data.php'; ?>