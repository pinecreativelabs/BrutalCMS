<?php $ddatapath = 'sat/sos/system/data/defaults.csv'; ?>
	<div id="sad-sys-defaults" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-defaults" class="op-panelbt op-bt-close">
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
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="lime chonk black-t blue-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">SAD <i class="bi bi-tools"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-loz"></i> System Defaults</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $ddatapath;?>" target="_blank" class="link"><?php echo $ddatapath;?></a></p>
								<p class="info padded courier"><strong><em>Site Name</em></strong> - name of application<br /><br />
								<strong><em>Mailer Address</em></strong> - email address where system notificaitons will be sent to<br /><br />
								<strong><em>Date Format</em></strong> - format of all date variables<br /><br />
								<strong><em>Timestamp Format</em></strong> - format of all time variables
								</p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="sys-defaults">
									<div class="block-wrap">
										<div class="block bw100">
											<div class="form-group">
												<label>Site Name</label>
												<input type="text" name="sitename" id="sname" value="<?php echo $sitename; ?>" />
											</div>
											<div class="form-group">
												<label>Mailer Address</label>
												<input type="email" name="mailto" id="mailto" value="<?php echo $mailto; ?>" />
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label for="ddf">Date Format</label>
												<select name="ddf" id="dateformat">
													<option value="Y-m-d" <?php echo ($ddf == 'Y-m-d') ? 'selected' : ''; ?>>Y-m-d</option>
													<option value="m-d-Y" <?php echo ($ddf == 'm-d-Y') ? 'selected' : ''; ?>>m-d-Y</option>
													<option value="d-m-Y" <?php echo ($ddf == 'd-m-Y') ? 'selected' : ''; ?>>d-m-Y</option>
													<option value="Y/m/d" <?php echo ($ddf == 'Y/m/d') ? 'selected' : ''; ?>>Y/m/d</option>
													<option value="m/d/Y" <?php echo ($ddf == 'm/d/Y') ? 'selected' : ''; ?>>m/d/Y</option>
													<option value="d/m/Y" <?php echo ($ddf == 'd/m/Y') ? 'selected' : ''; ?>>d/m/Y</option>
												</select>
											</div>
										</div><div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label for="dtf">Timestamp Format</label>
												<select name="dtf" id="tsformat">
													<option value="g:i" <?php echo ($dtf == 'g:i') ? 'selected' : ''; ?>>g:i</option>
													<option value="g:i a" <?php echo ($dtf == 'g:i a') ? 'selected' : ''; ?>>g:i a</option>
													<option value="g:i A" <?php echo ($dtf == 'g:i A') ? 'selected' : ''; ?>>g:i A</option>
													<option value="g:i:s" <?php echo ($dtf == 'g:i:s') ? 'selected' : ''; ?>>g:i:s</option>
													<option value="g:i:s a" <?php echo ($dtf == 'g:i:s a') ? 'selected' : ''; ?>>g:i:s a</option>
													<option value="g:i:s A" <?php echo ($dtf == 'g:i:s A') ? 'selected' : ''; ?>>g:i:s A</option>
												</select>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label for="theme">Default Theme</label>
												<select name="theme" id="dtheme">
													<option value="nude" <?php echo ($theme == 'nude') ? 'selected' : ''; ?>>Nude</option>
													<option value="communist" <?php echo ($theme == 'communist') ? 'selected' : ''; ?>>Communist</option>
													<option value="8bit" <?php echo ($theme == '8bit') ? 'selected' : ''; ?>>8Bit</option>
													<option value="vaporwave" <?php echo ($theme == 'vaporwave') ? 'selected' : ''; ?>>Vaporwave</option>
												</select>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100 md-100">
											<p class="bold smoke-t lucida">FAM Copy URL Mode</p>
											<div class="form-group">
												<input type="radio" name="fam_curl_mode" value="rel" <?php echo ($fam_curl_mode == 'rel') ? 'checked="checked"' : ''; ?>/><label>relative</label><br />
												<input type="radio" name="fam_curl_mode" value="full" <?php echo ($fam_curl_mode == 'full') ? 'checked="checked"' : ''; ?>/><label>absolute</label>
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-d" />
									</div>
								</form>
								<div class="set_d_msg_box" style="margin:10px 0px;"></div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Edit...</h4>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="sad-sys-mods" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-box-check"></i> Enabled Modules</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-dev" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-reference"></i> Developer Resources</span>
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
	$('#set-d').click(function(e){
		e.preventDefault();
		var sitename = $('#sname').val();
        if(sitename == ''){
			$('.set_d_msg_box').html('<span style="color:red;">Sitename required!</span>');
			$('#sname').focus();
            return false;
		}
		var mailto = $('#mailto').val();
		if( $("#mailto").val()!='' ){
			if( !isValidEmailAddress( $("#mailto").val() ) ){
			$('.set_d_msg_box').html('<span style="color:red;">Invalid email!</span>');
			$('#mailto').focus();
			return false;
			}
		}
		var ddf = $('#dateformat').val();
		var dtf = $('#tsformat').val();
		var theme = $('#dtheme').val();
		var fam_curl_mode = $('input:radio[name="fam_curl_mode"]:checked').val();
		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-d.php",
            data: "sitename="+sitename+"&mailto="+mailto+"&ddf="+ddf+"&dtf="+dtf+"&theme="+theme+"&fam_curl_mode="+fam_curl_mode,
			beforeSend: function() {
				$('.set_d_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_d_msg_box').html(data);
                }, delay);
            }
		});
	});
});
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};
</script>