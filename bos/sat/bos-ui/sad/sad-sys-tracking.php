<?php 
$trkdatapath = 'sat/sos/system/data/tracking.csv';
$row = 0;
if (($handletrk = fopen($trkdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handletrk, 1000, ",")) !== FALSE) {
		$row++;
		$get_track = $pdata[0];
		$get_tc_position = $pdata[1];
	}
	fclose($handletrk);
}	
$tracking = $get_track;
$tc_position = $get_tc_position;
?>
	<div id="sad-sys-tracking" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-tracking" class="op-panelbt op-bt-close">
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
							<h4 class="lucida heavy flow-text"><i class="bi bi-corners"></i> Tracking Codes</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $trkdatapath;?>" target="_blank" class="link"><?php echo $trkdatapath;?></a></p>
								<p class="info padded courier"><strong>Tracking Mode:</strong><br />Select a mode to enable third party tracking codes. Select which position the code should be placed (header is recommended).</p>
								<p class="padded warning courier">Tracking codes will need to be edited in the following files:<br /><br />
									<strong>Google Analytics:</strong><br />/sat/sos/system/tracking/ga.php<br /><br /><strong>Third Parties:</strong><br />/sat/sos/system/tracking/tp.php
								</p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="sys-tracking">
									<div class="block-wrap">
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<p class="smoke-t lucida bold">Tracking Mode</p>
												<input type="radio" name="tracking" value="off" <?php echo ($tracking == 'off') ? 'checked="checked"' : ''; ?>/> <label>off</label><br />
												<input type="radio" name="tracking" value="ga" <?php echo ($tracking == 'ga') ? 'checked="checked"' : ''; ?>/> <label>Google Analytics</label><br />
												<input type="radio" name="tracking" value="tp" <?php echo ($tracking == 'tp') ? 'checked="checked"' : ''; ?>/> <label>third parties</label><br />
												<input type="radio" name="tracking" value="all" <?php echo ($tracking == 'all') ? 'checked="checked"' : ''; ?>/> <label>all on</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<p class="smoke-t lucida bold">Code Position</p>
												<input type="radio" name="tc_position" value="header" <?php echo ($tc_position == 'header') ? 'checked="checked"' : ''; ?>/> <label>header</label><br />
												<input type="radio" name="tc_position" value="footer" <?php echo ($tc_position == 'footer') ? 'checked="checked"' : ''; ?>/> <label>footer</label>
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-tracking" />
									</div>
								</form>
								<div class="set_trk_msg_box" style="margin:10px 0px;"></div>
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
							<li><a href="javascript:void(0);" data-panelid="sad-sys-comingsoon" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-danger"></i> Coming Soon</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-mmode" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-wrench"></i> Maintenance Mode</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="sad-sys-meta" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-robot"></i> Default META Data</span>
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
	$('#set-tracking').click(function(e){
		e.preventDefault();
		var tracking = $('input:radio[name="tracking"]:checked').val();
		var tc_position = $('input:radio[name="tc_position"]:checked').val();
		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-tracking.php",
            data: "tracking="+tracking+"&tc_position="+tc_position,
			beforeSend: function() {
				$('.set_trk_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_trk_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>