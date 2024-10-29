	<div id="pages" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="pages" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
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
						<div class="liminal chonk monolisk butter-t black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>PAGES <i class="bi bi-file"></i></strong></h3>
							<h4 class="heavy flow-text">Page Administrative Generator Environment System</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="page-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Page Groups</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="pages-sitemap" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-navigate"></i> Sitemap</span>
							</a></li>
							<?php if(($user_pal=='2')||($user_pal=="3")){ ?>
							<li><a href="javascript:void(0);" data-panelid="pages-config" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Configure</span>
							</a></li><?php } ?>
						</ul>
					</div>
					<div class="block bw75 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/pages/module/page_home.php" title="Sitemap Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- Page Groups Panel -->
	<div id="page-groups" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="page-groups" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
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
						<div class="liminal monolisk chonk butter-t black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>PAGES <i class="bi bi-file"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-corners"></i> Manage Groups</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="pages-sitemap" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-navigate"></i> Sitemap</span>
							</a></li>
							<?php if(($user_pal=='2')||($user_pal=="3")){ ?>
							<li><a href="javascript:void(0);" data-panelid="pages-config" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Configure</span>
							</a></li><?php } ?>
						</ul>
					</div>
					<div class="block bw75 bh85 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/pages/module/page_edit_groups.php" title="Page Group Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- Pages Sitemap Panel -->
	<div id="pages-sitemap" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="pages-sitemap" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
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
						<div class="liminal monolisk chonk butter-t black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>PAGES <i class="bi bi-file"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-navigate"></i> Sitemap</h4>
						</div>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="page-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Page Groups</span>
							</a></li>
							<?php if(($user_pal=='2')||($user_pal=="3")){ ?>
							<li><a href="javascript:void(0);" data-panelid="pages-config" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Configure</span>
							</a></li><?php } ?>
						</ul>
					</div>
					<div class="block bw75 bh85 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/pages/module/page_edit_sitemap.php" title="Sitemap Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- Pages Configuration -->
	<div id="pages-config" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="pages-config" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
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
						<div class="liminal monolisk chonk butter-t black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>PAGES <i class="bi bi-file"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-gear"></i> Configure</h4>
						</div>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="page-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Page Groups</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="pages-sitemap" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-navigate"></i> Sitemap</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 bh85 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/pages/module/page_configure.php" title="Configure PAGES" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>