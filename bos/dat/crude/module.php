	<div id="crude" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="crude" class="op-panelbt op-bt-close">
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
						<div class="aqua chonk sapphire-t-s rice-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">CRUDE <i class="bi bi-save"></i></h3>
							<h4 class="lucida heavy flow-text">Create Read Update Data Environment</h4>
						</div>
						<h4 class="lucida sapphire rice-t flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-action"></i> Actions</h4>
						<ul class="tiles lucida smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="new-entity" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-create"></i> Manage Entities</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="entity-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Edit Data Groups</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="crude-config" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Configuration</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					
					<div class="block bw75 bh85 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="dat/crude/module/page_edit_data.php" title="Data Editor" style="border: none; overflow-y: none; width: 100%; margin: 0 auto; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
			
        </div>
    </div>
<?php 
include 'entities.php';
include 'groups.php'; 
if(($ugroup=='administrator')||($ugroup=="BOS Admin")){include 'settings.php';}
?>