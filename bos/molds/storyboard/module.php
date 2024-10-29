	<div id="storyboard" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="storyboard" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="nb-btn-small pill bitstream sepia">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        
        <!-- Panel Content -->
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="violence chonk monolisk poolwater-t black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>STORYboard <i class="bi bi-file"></i></strong></h3>
							<h4 class="heavy flow-text">Presentation Management</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="setup-storyboards" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-panes"></i> Setup Boards</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="tell-stories" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-speak"></i> Tell Stories</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-storyboard" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="padded warning bitstream">
							<p class="flow-text">This module will be available in 3.2. It will offer management of:</p>
							<ul>
								<li>Slideshow Groups</li>
								<li>Slides</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>