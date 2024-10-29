<?php
$dir_incoming = "app/files/incoming/";
$dir_trash = "app/files/trash/";
$dir_files = "app/files/";
$dir_pfiles = "app/users/".$_SESSION['userName']."/files/";
$dir_mytrash = "app/users/".$_SESSION['userName']."/trash/";
$sharedfiles = scandir($dir_files);
$privatefiles = scandir($dir_pfiles);
$incfiles = scandir($dir_incoming);
$trashfiles = scandir($dir_trash);
$mytrashfiles = scandir($dir_mytrash);
$fc_sf = count($sharedfiles)-5;
$fc_pf = count($privatefiles)-2;
$fc_inc = count($incfiles)-2;
$fc_trash = count($trashfiles)-2;
$fc_mytrash = count($mytrashfiles)-2;
?>
	<div id="fam-new" class="op-panel charcoal">
		<div class="op-panelctrl">
			<div data-close="fam-new" class="op-panelbt op-bt-close">
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
						<div class="chonk monolisk clean charcoal-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>FAM <i class="bi bi-folder"></i></strong></h3>
							<h4 class="heavy flow-text">File Asset Manager</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s files folderlist">
							<li><a href="javascript:void(0);" data-panelid="fam-shared" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-open"></i> Shared Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-private" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-lock"></i> Private Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-incoming" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-network-open"></i> Incoming</span>
							</a></li>
						</ul>
						<ul class="tiles bitstream smoke-t black-t-s files" style="margin-top: 16px;">
							<li><a href="javascript:void(0);" data-panelid="fam-trashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash"></i> Trash</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-mytrashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash sepia"></i> My Trash</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="block-wrap vcr-mono">
							<div class="block bw100 padded">
								<a href="#fu" data-modal-open class="nb-btn-jumbo sepia bitstream pill"><i class="bi bi-upload"></i> UPLOAD</a>
							</div>
							<div class="block bw100 padded">
								<div class="padded terminal b-s-t rounded inline-block center" style="margin-right: 1.5rem;">
									<h4 class="fluid-text-h3" style="padding: 0; margin: 0;"><?php echo $fc_sf;?></h4>
									<p class="flow-text">shared files</p>
								</div>
								<div class="padded terminal b-s-t rounded inline-block center" style="margin-right: 1.5rem;">
									<h4 class="fluid-text-h3" style="padding: 0; margin: 0;"><?php echo $fc_pf;?></h4>
									<p class="flow-text">private files</p>
								</div>
								<div class="padded terminal b-s-t rounded inline-block center">
									<h4 class="fluid-text-h3" style="padding: 0; margin: 0;"><?php echo $fc_inc;?></h4>
									<p class="flow-text">incoming files</p>
								</div>
							</div>
							<div class="block bw100 padded">
								<div class="padded terminal b-s-t rounded inline-block center" style="margin-right: 1.5rem;">
									<h4 class="flow-text" style="padding: 0; margin: 0;"><?php echo $fc_trash;?></h4>
									<p>files in shared trash</p>
								</div>
								<div class="padded terminal b-s-t rounded inline-block center">
									<h4 class="flow-text" style="padding: 0; margin: 0;"><?php echo $fc_mytrash;?></h4>
									<p>files in my trash</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	
	<!-- FAM Shared (public) Files -->
	<div id="fam-shared" class="op-panel charcoal">
		<div class="op-panelctrl">
			<div data-close="fam-shared" class="op-panelbt op-bt-close">
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
						<div class="chonk monolisk clean charcoal-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>FAM <i class="bi bi-folder"></i></strong></h3>
							<h4 class="heavy flow-text files"><i class="folder-open"></i> Shared Files</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s files">
							<li><a href="javascript:void(0);" data-panelid="fam-private" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-lock"></i> Private Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-incoming" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-network-open"></i> Incoming</span>
							</a></li>
						</ul>
						<ul class="tiles bitstream smoke-t black-t-s files" style="margin-top: 16px;">
							<li><a href="javascript:void(0);" data-panelid="fam-trashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash"></i> Trash</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-mytrashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash sepia"></i> My Trash</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/fam/module/page_shared_files.php" title="Shared Files" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	
	<!-- FAM Private Files -->
	<div id="fam-private" class="op-panel charcoal">
		<div class="op-panelctrl">
			<div data-close="fam-private" class="op-panelbt op-bt-close">
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
						<div class="chonk monolisk clean charcoal-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>FAM <i class="bi bi-folder"></i></strong></h3>
							<h4 class="heavy flow-text files"><i class="folder-lock"></i> My Private Files</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s files">
							<li><a href="javascript:void(0);" data-panelid="fam-shared" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-open"></i> Shared Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-incoming" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-network-open"></i> Incoming</span>
							</a></li>
						</ul>
						<ul class="tiles bitstream smoke-t black-t-s files" style="margin-top: 16px;">
							<li><a href="javascript:void(0);" data-panelid="fam-trashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash"></i> Trash</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-mytrashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash sepia"></i> My Trash</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/fam/module/page_private_files.php" title="Days Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	
	<!-- FAM Incoming Files -->
	<div id="fam-incoming" class="op-panel charcoal">
		<div class="op-panelctrl">
			<div data-close="fam-incoming" class="op-panelbt op-bt-close">
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
						<div class="chonk monolisk clean charcoal-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>FAM <i class="bi bi-folder"></i></strong></h3>
							<h4 class="heavy flow-text files"><i class="folder-network-open"></i> Incoming Files</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s files">
							<li><a href="javascript:void(0);" data-panelid="fam-shared" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-open"></i> Shared Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-private" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-lock"></i> Private Files</span>
							</a></li>
						</ul>
						</ul>
						<ul class="tiles bitstream smoke-t black-t-s files" style="margin-top: 16px;">
							<li><a href="javascript:void(0);" data-panelid="fam-trashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash"></i> Trash</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-mytrashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash sepia"></i> My Trash</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/fam/module/page_incoming.php" title="Days Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	
	<!-- FAM Trash -->
	<div id="fam-trashcan" class="op-panel charcoal">
		<div class="op-panelctrl">
			<div data-close="fam-trashcan" class="op-panelbt op-bt-close">
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
						<div class="chonk monolisk clean charcoal-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>FAM <i class="bi bi-folder"></i></strong></h3>
							<h4 class="heavy flow-text files"><i class="folder-trash"></i> Trash</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s files folderlist">
							<li><a href="javascript:void(0);" data-panelid="fam-shared" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-open"></i> Shared Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-private" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-lock"></i> Private Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-incoming" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-network-open"></i> Incoming</span>
							</a></li>
						</ul>
						<ul class="tiles bitstream smoke-t black-t-s files" style="margin-top: 16px;">
							<li><a href="javascript:void(0);" data-panelid="fam-mytrashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash sepia"></i> My Trash</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/fam/module/page_trashcan.php" title="Days Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	
	<!-- MY Trashcan -->
	<div id="fam-mytrashcan" class="op-panel charcoal">
		<div class="op-panelctrl">
			<div data-close="fam-mytrashcan" class="op-panelbt op-bt-close">
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
						<div class="chonk monolisk clean charcoal-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>FAM <i class="bi bi-folder"></i></strong></h3>
							<h4 class="heavy flow-text files"><i class="folder-trash"></i> My Trash</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s files folderlist">
							<li><a href="javascript:void(0);" data-panelid="fam-shared" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-open"></i> Shared Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-private" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-lock"></i> Private Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-incoming" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-network-open"></i> Incoming</span>
							</a></li>
						</ul>
						<ul class="tiles bitstream smoke-t black-t-s files" style="margin-top: 16px;">
							<li><a href="javascript:void(0);" data-panelid="fam-trashcan" data-pos="fade" class="op-tab">
								<span class="title"><i class="folder-trash"></i> Trash</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/fam/module/page_mytrashcan.php" title="Days Editor" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
