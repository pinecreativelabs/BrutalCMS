	<div id="jack" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="jack" class="op-panelbt op-bt-close">
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
						<div class="apple chonk monolisk slime-t ash-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>JACK <i class="bi bi-join"></i></strong></h3>
							<h4 class="heavy flow-text">Joined Ajax Content Keeper</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="jack-uploader" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-upload"></i> Upload Content</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="jack-joins" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-join"></i> Joins</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="jack-ties" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bowtie"></i> Ties</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-jack" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="padded warning bitstream">
							<p class="flow-text">This module will be available in 3.2 or newer. It will offer management of:</p>
							<ul>
								<li>Joins (AJAX content groups)</li>
								<li>Ties (connect AJAX content to joins)</li>
								<li>Content uploads</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- JACK Uploader Panel -->
	<div id="jack-uploader" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="jack-uploader" class="op-panelbt op-bt-close">
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
						<div class="apple chonk monolisk slime-t ash-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>JACK <i class="bi bi-join"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-upload"></i> Upload Content</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="jack-joins" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-join"></i> Joins</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="jack-ties" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bowtie"></i> Ties</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-jack" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/jack/module/page_jack_uploader.php" title="JACK Uploader" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- JACK Joins Panel -->
	<div id="jack-joins" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="jack-joins" class="op-panelbt op-bt-close">
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
						<div class="apple chonk monolisk slime-t ash-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>JACK <i class="bi bi-join"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-join"></i> Joins</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="jack-uploader" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-upload"></i> Upload</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="jack-ties" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-bowtie"></i> Ties</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-jack" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/jack/module/page_edit_joins.php" title="JACK Joins" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- JACK Ties Panel -->
	<div id="jack-ties" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="jack-ties" class="op-panelbt op-bt-close">
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
						<div class="apple chonk monolisk slime-t ash-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>JACK <i class="bi bi-join"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-bowtie"></i> Ties</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="jack-uploader" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-upload"></i> Upload</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="jack-joins" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-join"></i> Joins</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-jack" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/jack/module/page_edit_ties.php" title="JACK Ties" style="border: none; overflow-y: none; width: 100%; margin: 0; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>