	<div id="crude" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="crude" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
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
						<div class="aqua chonk monolisk sapphire-t-s rice-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>CRUDE <i class="bi bi-save"></i></strong></h3>
							<h4 class="heavy flow-text">Create Read Update Data Environment</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="new-entity" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-create"></i> Manage Entities</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="entity-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Edit Data Groups</span>
							</a></li>
							<?php if(($user_pal=='2')||($user_pal=='3')){?>
							<li><a href="javascript:void(0);" data-panelid="crude-config" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Configuration</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 bh85 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/crude/module/page_edit_data.php" title="Data Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- CRUDE Entities Pane -->
	<div id="new-entity" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="new-entity" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="nb-btn-small pill bitstream sepia">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="aqua chonk sapphire-t-s monolisk rice-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>CRUDE <i class="bi bi-grid"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-create"></i> Entities</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="entity-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Edit Entity Groups</span>
							</a></li>
							<?php if(($user_pal=='2')||($user_pal=='3')){?>
							<li><a href="javascript:void(0);" data-panelid="crude-config" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Configuration</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 bh85">
						<div class="block-wrap"><div class="block bw100 bh85">
							<iframe src="molds/crude/module/page_edit_entities.php" title="Entity Editor" loading="lazy"></iframe>
						</div></div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- CRUDE Groups Pane -->
	<div id="entity-groups" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="entity-groups" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="nb-btn-small pill bitstream sepia">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="aqua chonk monolisk sapphire-t-s rice-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>CRUDE <i class="bi bi-grid"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-corners"></i> Entity Groups</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="new-entity" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-create"></i> Edit Entities</span>
							</a></li>
							<?php if(($user_pal=='2')||($user_pal=='3')){?>
							<li><a href="javascript:void(0);" data-panelid="crude-config" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Configuration</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 bh85 xs-100 sm-100 md-100">
						<div class="block-wrap"><div class="block bw100 bh85">
							<iframe src="molds/crude/module/page_edit_groups.php" title="Data Groups Editor" loading="lazy"></iframe>
						</div></div>
					</div>
				</div>
			</div>
        </div>
    </div>
<?php if(($user_pal=='2')||($user_pal=='3')){?>
	<!-- CRUDE Settings Pane -->
	<div id="crude-config" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="crude-config" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="nb-btn-small pill bitstream sepia">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="aqua chonk monolisk sapphire-t-s rice-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>CRUDE <i class="bi bi-grid"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-gear"></i> Config</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="new-entity" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-create"></i> Edit Entities</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="entity-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Edit Data Groups</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 bh85 xs-100 sm-100 md-100">
						<div class="block-wrap"><div class="block bw100 bh85">
							<iframe src="molds/crude/module/page_configure.php" title="Configure CRUDE" loading="lazy"></iframe>
						</div></div>
					</div>
				</div>
			</div>
        </div>
    </div>
<?php } ?>