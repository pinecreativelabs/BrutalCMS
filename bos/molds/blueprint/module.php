<?php 
$themefile = simplexml_load_file('molds/blueprint/module/data/themes.xml');
$layoutfile = simplexml_load_file('molds/blueprint/module/data/layouts.xml');
?>
	<div id="blueprint" class="op-panel charcoal">
		<div class="op-panelctrl">
			<div data-close="blueprint" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
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
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="blueprint chonk monolisk charcoal-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>BLUEPRINT <i class="bi bi-grid"></i></strong></h3>
							<h4 class="heavy flow-text">Layout &amp; Theme Planner</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="blueprint-layouts" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Layouts</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="blueprint-themes" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-rainbow"></i> Themes</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="blueprint-wallpapers" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-fill"></i> Wallpapers</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/blueprint/module/page_home.php" title="Blueprint Home" loading="lazy"></iframe>
							</div>
						</div>
					</div>
					<!--
					<div class="block bw40 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida blueprint flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-cols-between-rows"></i> Layouts</h4>
						<div class="paginate-5" style="margin-left: 0; padding: 0.5em; max-width: 90%;">
						  <div class="lucida rice-t items">
							<?php foreach($layoutfile->layout as $row){ 
								echo '<div class="clean charcoal-t">'.$row['title'].' <small>['.$row['cols'].'x'.$row['rows'].']</small></div>';
							}?>
						  </div>
						  <div class="pager lucida">
							<div class="firstPage">first</div>
							<div class="previousPage">prev</div>
							<div class="pageNumbers"></div>
							<div class="nextPage">next</div>
							<div class="lastPage">last</div>
						  </div>
						</div>
					</div>
					<div class="block bw35 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida blueprint flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-palette"></i> Active Themes</h4>
						<div class="paginate-5" style="margin-left: 0; padding: 0.5em; max-width: 90%;">
							<div class="lucida items heavy">
							<?php 
							foreach($themefile->theme as $row){ 
								if($row['active']=='true'){
									echo '<div class="emptiness white-t azure-t-s">'.$row['title'].'
									<p class="swatch"><span style="background: '.$row->colors['primary'].';"></span><span style="background: '.$row->colors['secondary'].';"></span><span style="background: '.$row->colors['tertiary'].';"></span><span style="background: '.$row->colors['links'].';"></span><span style="background: '.$row->colors['borders'].';"></span><span style="background: '.$row->colors['other'].';"></span></p></div>';
								}
							}?>
							</div>
							<div class="pager lucida">
								<div class="firstPage">first</div>
								<div class="previousPage">prev</div>
								<div class="pageNumbers"></div>
								<div class="nextPage">next</div>
								<div class="lastPage">last</div>
							</div>
						</div>
					</div>-->
				</div>
			</div>
			
        </div>
    </div>
	<!-- Blueprint Themes Panel -->
	<div id="blueprint-themes" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="blueprint-themes" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
			<div data-panelid="fam-shared" data-pos="right" class="op-panelbt op-tab op-bt-nav" style="margin-right: 1rem;">
				<span class="nb-btn-small pill sepia"><i class="bi bi-folder charcoal-t-s"></i>FAM</span>
			</div>
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
						<div class="blueprint chonk monolisk charcoal-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>Blueprint <i class="bi bi-grid"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-rainbow"></i> Themes</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="blueprint-layouts" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Layouts</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="blueprint-wallpapers" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-fill"></i> Wallpapers</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/blueprint/module/page_edit_themes.php" title="Themes Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- Blueprint Layouts Panel -->
	<div id="blueprint-layouts" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="blueprint-layouts" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
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
						<div class="blueprint monolisk chonk charcoal-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>Blueprint <i class="bi bi-grid"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-corners"></i> Layouts</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="blueprint-themes" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-rainbow"></i> Themes</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="blueprint-wallpapers" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-fill"></i> Wallpapers</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 bh85">
						<div class="block-wrap"><div class="block bw100 bh85">
							<iframe src="molds/blueprint/module/page_edit_layouts.php" title="Layouts Editor" loading="lazy"></iframe>
						</div></div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- Blueprint Wallpapers -->
	<div id="blueprint-wallpapers" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="blueprint-wallpapers" class="op-panelbt op-bt-close"><img src="core/css/bos-ui/arrow-left-48.png" alt="close" /></div>
			<div data-panelid="fam-shared" data-pos="right" class="op-panelbt op-tab op-bt-nav" style="margin-right: 1rem;">
				<span class="nb-btn-small pill sepia"><i class="bi bi-folder charcoal-t-s"></i>FAM</span>
			</div>
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
						<div class="blueprint chonk monolisk charcoal-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>Blueprint <i class="bi bi-grid"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-fill"></i> Wallpapers</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="blueprint-layouts" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Layouts</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="blueprint-themes" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-rainbow"></i> Themes</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/blueprint/module/page_edit_wallpapers.php" title="Wallpaper Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>