<?php $devdatapath = 'sat/sos/system/data/dev.csv'; ?>
	<div id="sad-sys-dev" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-dev" class="op-panelbt op-bt-close">
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
					<div class="block bw75 xs-100 sm-100 md-100">
						<div class="lime chonk black-t blue-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">SAD <i class="bi bi-tools"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-reference"></i> Developer Resources</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $devdatapath;?>" target="_blank" class="link"><?php echo $devdatapath;?></a></p>
								<p class="info padded courier"><strong>Developer Mode:</strong><br />turn <em>on</em> to use unminified CSS resources on front-end.</p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="sys-dev">
									<?php echo $error2; ?>
									<div class="block-wrap">
										<div class="block bw100">
											<p class="bold smoke-t lucida">Developer Mode</p>
											<div class="form-group">
												<input type="radio" name="dmode" value="off" <?php echo ($devmode == 'off') ? 'checked="checked"' : ''; ?>/><label> off </label>
												<input type="radio" name="dmode" value="on" <?php echo ($devmode == 'on') ? 'checked="checked"' : ''; ?>/><label> on </label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<input type="checkbox" name="set_jq" value="true" class="set-jq" <?php echo ($set_jq !== '') ? 'checked="checked"' : ''; ?>/><label>Load jQuery</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<p class="bold smoke-t lucida">jQuery Version</p>
											<div class="form-group">
												<input type="radio" name="jqver" value="3" <?php echo ($jqv == '3') ? 'checked="checked"' : ''; ?>/><label>3</label><br />
												<input type="radio" name="jqver" value="2" <?php echo ($jqv == '2') ? 'checked="checked"' : ''; ?>/><label>2</label><br />
												<input type="radio" name="jqver" value="1" <?php echo ($jqv == '1') ? 'checked="checked"' : ''; ?>/><label>1</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<label for="icon_lib">Icon Library</label>
												<select name="icon_lib" id="icontype">
													<option value="none" <?php echo ($icon_lib == 'none') ? 'selected' : ''; ?>>None</option>
													<option value="fa" <?php echo ($icon_lib == 'fa') ? 'selected' : ''; ?>>Font Awesome</option>
													<option value="md" <?php echo ($icon_lib == 'md') ? 'selected' : ''; ?>>Material Design</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-dev" />
									</div>
								</form>
								<div class="set_dev_msg_box" style="margin:10px 0px;"></div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Edit...</h4>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="sad-sys-defaults" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-loz"></i> System Defaults</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-mods" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-box-check"></i> Enabled Modules</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-access" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-restricted"></i> Access Restrictions</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-cc" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-cookie"></i> Cookie Consent</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-errors" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-wrong"></i> Error Pages</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-comingsoon" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-danger"></i> Coming Soon</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-mmode" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-wrench"></i> Maintenance Mode</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-meta" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-robot"></i> Default META Data</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-tracking" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Tracking Codes</span>
							</a></li>
						</ul>
					</div>
				</div>
			</div>
        </div>
    </div>
<script>
$(document).ready(function() {
	var delay = 2000;
	$('#set-dev').click(function(e){
		e.preventDefault();
		var dmode = $('input:radio[name="dmode"]:checked').val();
		var set_jq = [];  
        $('.set-jq').each(function(){  
            if($(this).is(":checked")){ set_jq.push($(this).val()); }  
        });  
        set_jq = set_jq.toString();
		var jqver = $('input:radio[name="jqver"]:checked').val();
		var icon_lib = $('#icontype').val();
		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-dev.php",
            data: "dmode="+dmode+"&set_jq="+set_jq+"&jqver="+jqver+"&icon_lib="+icon_lib,
			beforeSend: function() {
				$('.set_dev_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_dev_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>