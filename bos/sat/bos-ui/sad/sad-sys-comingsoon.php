<?php 
$csdatapath = 'sat/sos/system/data/comingsoon.csv';
$row = 0;
if (($handlecs = fopen($csdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlecs, 1000, ",")) !== FALSE) {
		$row++;
		$get_csredir = $pdata[0];
		$get_cstemp = $pdata[1];
		$get_cs_head = $pdata[2];
		$get_cs_text = $pdata[3];
	}
	fclose($handlecs);
}	
$cs_redir = $get_csredir;
$cs_template = $get_cstemp;
$cs_header = $get_cs_head;
$cs_text = $get_cs_text;
?>
	<div id="sad-sys-comingsoon" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-comingsoon" class="op-panelbt op-bt-close">
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
							<h4 class="lucida heavy flow-text"><i class="bi bi-danger"></i> Coming Soon</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $csdatapath;?>" target="_blank" class="link"><?php echo $csdatapath;?></a></p>
								<p class="info padded courier">Redirect all (public) visitors or only logged-in users to a <em>coming soon</em> page. Set to "none" to disable the redirect. Only logged in admin users will NOT be redirected.</p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="sys-comingsoon">
									<div class="block-wrap">
										<div class="block bw50 xs-100 sm-100">
											<p class="smoke-t lucida bold">Redirect User Group</p>
											<div class="form-group">
												<input type="radio" name="cs_redir" value="none" <?php echo ($cs_redir == 'none') ? 'checked="checked"' : ''; ?>/><label>none</label><br />
												<input type="radio" name="cs_redir" value="all" <?php echo ($cs_redir == 'all') ? 'checked="checked"' : ''; ?>/><label>all</label><br />
												<input type="radio" name="cs_redir" value="users" <?php echo ($cs_redir == 'users') ? 'checked="checked"' : ''; ?>/><label>logged in users only</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<label for="cs_template">Template</label>
												<select name="cs_template" id="cstemplate">
													<option value="capture" <?php echo ($cs_template == 'capture') ? 'selected' : ''; ?>>Capture</option>
													<option value="construction" <?php echo ($cs_template == 'construction') ? 'selected' : ''; ?>>Construction</option>
													<option value="countdown" <?php echo ($cs_template == 'countdown') ? 'selected' : ''; ?>>Countdown</option>
												</select>
											</div>
										</div>
										<div class="block bw100">
											<div class="form-group">
												<label>Header Text</label><br />
												<input type="text" name="cs_header" id="csheader" value="<?php echo $cs_header; ?>" />
											</div>
											<div class="form-group">
												<label>Body Text</label><br />
												<textarea name="cs_text" id="cstext"><?php echo $cs_text; ?></textarea>
											</div>
											
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-comingsoon" />
									</div>
								</form>
								<div class="set_cs_msg_box" style="margin:10px 0px;"></div>
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
							<li><a href="javascript:void(0);" data-panelid="sad-sys-access" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-restricted"></i> Access Restrictions</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-cc" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-cookie"></i> Cookie Consent</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-errors" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-wrong"></i> Error Pages</span>
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
	$('#set-comingsoon').click(function(e){
		e.preventDefault();
		var cs_redir = $('input:radio[name="cs_redir"]:checked').val();
		var cs_template = $('#cstemplate').val();
		var cs_header = $('#csheader').val();
        if(cs_header == ''){
			$('.set_cs_msg_box').html('<span style="color:red;">Header text required.</span>');
			$('#csheader').focus();
            return false;
		}
		var cs_text = $('#cstext').val();
        if(cs_text == ''){
			$('.set_cs_msg_box').html('<span style="color:red;">Body text required.</span>');
			$('#cstext').focus();
            return false;
		}

		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-comingsoon.php",
            data: "cs_redir="+cs_redir+"&cs_template="+cs_template+"&cs_header="+cs_header+"&cs_text="+cs_text,
			beforeSend: function() {
				$('.set_cs_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_cs_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>