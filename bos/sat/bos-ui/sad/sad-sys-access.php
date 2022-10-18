<?php $acdatapath = 'sat/sos/system/data/access.csv'; ?>
	<div id="sad-sys-access" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-access" class="op-panelbt op-bt-close">
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
							<h4 class="lucida heavy flow-text"><i class="bi bi-restricted"></i> Access Restrictions</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $acdatapath;?>" target="_blank" class="link"><?php echo $acdatapath;?></a></p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="sys-access">
									<div class="block-wrap">
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<p class="smoke-t lucida bold">Account Registration</p>
												<input type="radio" name="registration" value="disabled" <?php echo ($registration == 'disabled') ? 'checked="checked"' : ''; ?>/><label>off</label>
												<input type="radio" name="registration" value="enabled" <?php echo ($registration == 'enabled') ? 'checked="checked"' : ''; ?>/><label>on</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<p class="smoke-t lucida bold">Default Access Group</p>
												<input type="radio" name="set_group" value="1" <?php echo ($set_group == '1') ? 'checked="checked"' : ''; ?>/><label>admins</label><br />
												<input type="radio" name="set_group" value="2" <?php echo ($set_group == '2') ? 'checked="checked"' : ''; ?>/><label>editors</label><br />
												<input type="radio" name="set_group" value="3" <?php echo ($set_group == '3') ? 'checked="checked"' : ''; ?>/><label>members</label>
											</div>
										</div>
										<div class="block bw100">
											<div class="form-group">
												<p class="smoke-t lucida bold">Require Sitewide Login</p>
												<input type="radio" name="req_login" value="no" <?php echo ($req_login == 'no') ? 'checked="checked"' : ''; ?>/><label>no</label><br />
												<input type="radio" name="req_login" value="yes" <?php echo ($req_login == 'yes') ? 'checked="checked"' : ''; ?>/><label>yes</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<p class="smoke-t lucida bold">Age Restricted</p>
												<input type="radio" name="age_restrict" value="no" <?php echo ($age_restrict == 'no') ? 'checked="checked"' : ''; ?>/><label>no</label>
												<input type="radio" name="age_restrict" value="yes" <?php echo ($age_restrict == 'yes') ? 'checked="checked"' : ''; ?>/><label>yes</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<label>Minimum Age</label>
												<input type="number" name="age" class="form-control" id="set-age" value="<?php echo $age; ?>" min="12" step="1" />
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<input type="checkbox" name="pglock" class="setpglock" value="enabled" <?php echo ($pglock !== '') ? 'checked="checked"' : ''; ?>/><label>Enable PageLock</label>
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-access" />
									</div>
								</form>
								<div class="set_acs_msg_box" style="margin:10px 0px;"></div>
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
							<li><a href="javascript:void(0);" data-panelid="sad-sys-dev" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-reference"></i> Developer Resources</span>
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
	$('#set-access').click(function(e){
		e.preventDefault();
		var registration = $('input:radio[name="registration"]:checked').val();
		var set_group = $('input:radio[name="set_group"]:checked').val();
		var req_login = $('input:radio[name="req_login"]:checked').val();
		var age_restrict = $('input:radio[name="age_restrict"]:checked').val();
		var age = $('#set-age').val();
		var pglock = [];  
        $('.setpglock').each(function(){  
            if($(this).is(":checked")){ pglock.push($(this).val()); }  
        });  
        pglock = pglock.toString();
		
		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-access.php",
            data: "registration="+registration+"&set_group="+set_group+"&req_login="+req_login+"&age_restrict="+age_restrict+"&age="+age+"&pglock="+pglock,
			beforeSend: function() {
				$('.set_acs_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_acs_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>