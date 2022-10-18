<?php 
$themefile = simplexml_load_file('bat/blueprint/module/data/themes.xml');
$layoutfile = simplexml_load_file('bat/blueprint/module/data/layouts.xml');
?>
	<div id="blueprint" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="blueprint" class="op-panelbt op-bt-close">
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
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block b100">
						<div class="blueprint chonk charcoal-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">BLUEPRINT <i class="bi bi-grid"></i></h3>
							<h4 class="lucida heavy flow-text">Layouts &amp; Themes</h4>
						</div>
					</div>
				</div>
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida blueprint flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-action"></i> Actions</h4>
						<ul class="tiles lucida smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="blueprint-layouts" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-create"></i> Create Layouts</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="blueprint-themes" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-rainbow"></i> Manage Themes</span>
							</a></li>
						</ul>
					</div>
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
						<!-- <ul class="tiles lucida tasklist charcoal-t"> -->
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
					</div>
				</div>
			</div>
			
        </div>
    </div>
<?php 
include 'themes.php';
include 'layouts.php';
?>