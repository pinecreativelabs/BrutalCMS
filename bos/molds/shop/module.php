	<div id="shop" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="shop" class="op-panelbt op-bt-close">
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
						<div class="evergreen chonk monolisk mint-t charcoal-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>SHOP <i class="bi bi-cart"></i></strong></h3>
							<h4 class="heavy flow-text">Sales Helper for Online Products</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="inventory" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-clipboard"></i> Inventory</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="shipping" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-truck"></i> Shipping</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-taxes" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-money-bag"></i> Taxes</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="discounts" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-cut"></i> Discounts</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="orders" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-receipt"></i> Orders</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-shop" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="padded warning bitstream">
							<p class="flow-text">This module will be available in the Developer BETA release. It will offer management of:</p>
							<ul>
								<li>Product groups &amp; categories</li>
								<li>Products</li>
								<li>Shipping, taxes, discounts</li>
								<li>Customers &amp; orders</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>