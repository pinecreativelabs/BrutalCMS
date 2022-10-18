	<div id="pages" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="pages" class="op-panelbt op-bt-close">
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
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="liminal chonk butter-t black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">PAGES <i class="bi bi-file"></i></h3>
							<h4 class="lucida heavy flow-text">Page Administrative Generator Environment System</h4>
						</div>
						<h4 class="lucida butter midnight-t flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-action"></i> Actions</h4>
						<ul class="tiles lucida smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="manage-pages" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-file-edit"></i> Manage Pages</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="page-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Edit Page Groups</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="pages-config" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Configure</span>
							</a></li>
							<?php } ?>
							<li><a href="javascript:void(0);" data-panelid="pages-sitemap" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-navigate"></i> Sitemap</span>
							</a></li>
						</ul>
					</div>
					
					<div class="block bw75 xs-100 sm-100 md-100">
						<h4 class="lucida butter midnight-t flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-rows"></i> Page List</h4>
						<?php $pagesdatafile = simplexml_load_file('fat/pages/module/data/pages.xml'); ?>
						<div class="pagegroups lucida">
							<div class="group">
								<h5 class="courier smoke-t" style="padding: 0 0 8px 0; margin: 0;"><i class="bi bi-global grayscale"></i> Public Pages</h5>
								<ul class="tiles pagelist">
									<?php foreach($pagesdatafile->page as $page){ 
										if($page['type']=='public'){ ?>
											<li><a href="<?php if($page->loc['generated'=='1']){echo $page->loc; }else{?>#nopageavail<?php }?>" <?php if($page->loc['generated'=='1']){ ?>target="_blank"<?php } else { ?>data-modal-open <?php } ?>><?php echo $page['title'];?></a></li>
									<?php } } ?>
								</ul>
							</div>
							<div class="group">
								<h5 class="courier smoke-t" style="padding: 0 0 8px 0; margin: 0;"><i class="bi bi-lock grayscale"></i> Private Pages</h5>
								<ul class="tiles pagelist">
									<?php foreach($pagesdatafile->page as $page){ 
										if($page['type']=='private'){ ?>
											<li><a href="<?php if($page->loc['generated'=='1']){echo $page->loc; }else{?>#nopageavail<?php }?>" <?php if($page->loc['generated'=='1']){ ?>target="_blank"<?php } else { ?>data-modal-open <?php } ?>><?php echo $page['title'];?></a></li>
									<?php } } ?>
								</ul>
							</div>
							<div class="group">
								<h5 class="courier smoke-t" style="padding: 0 0 8px 0; margin: 0;"><i class="bi bi-spy grayscale"></i> Hidden Pages</h5>
								<ul class="tiles pagelist">
									<?php foreach($pagesdatafile->page as $page){ 
										if($page['type']=='hidden'){ ?>
											<li><a href="<?php if($page->loc['generated'=='1']){echo $page->loc; }else{?>#nopageavail<?php }?>" <?php if($page->loc['generated'=='1']){ ?>target="_blank"<?php } else { ?>data-modal-open <?php } ?>><?php echo $page['title'];?></a></li>
									<?php } } ?>
								</ul>
							</div>
							<div class="group">
								<h5 class="courier smoke-t" style="padding: 0 0 8px 0; margin: 0;"><i class="bi bi-gear"></i> System Pages</h5>
								<ul class="tiles pagelist">
									<?php foreach($pagesdatafile->page as $page){ 
										if($page['type']=='system'){ ?>
											<li><a href="<?php if($page->loc['generated'=='1']){echo $page->loc; }else{?>#nopageavail<?php }?>" <?php if($page->loc['generated'=='1']){ ?>target="_blank"<?php } else { ?>data-modal-open <?php } ?>><?php echo $page['title'];?></a></li>
									<?php } } ?>
								</ul>
							</div>
							<div style="display: none;" id="nopageavail">
								<div class="container" style="max-width: 620px;"><div class="padded alert flow-text lucida center">
									<strong>PAGE UNAVAILABLE.</strong><br /><small>This page has not been generated yet.</small>
								</div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
        </div>
    </div>
<?php 
include 'pages.php';
include 'groups.php';
include 'sitemap.php';
if(($ugroup=='administrator')||($ugroup=="BOS Admin")){include 'settings.php';}
?>