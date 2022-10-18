
	<div id="cad" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="cad" class="op-panelbt op-bt-close">
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
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 xs-100 sm-100 md-100">
						<div class="river chonk denim-t rice-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">CAD <i class="bi bi-article"></i></h3>
							<h4 class="lucida heavy flow-text">Content Article Display</h4>
						</div>
						<h4 class="lucida rice denim-t flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-action"></i> Actions</h4>
						<ul class="tiles lucida smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="cad-topix" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-think"></i> Add Topics</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="cat/cad/module/page_edit_articles.php" title="Article Editor" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
<?php include 'topics.php'; ?>