<?php 
$ccdatapath = 'sat/sos/system/data/cc.csv';
$row = 0;
if (($handlecc = fopen($ccdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlecc, 1000, ",")) !== FALSE) {
		$row++;
		$get_ccmode = $pdata[0];
		$get_ccdur = $pdata[1];
		$get_cctextcolor = $pdata[2];
		$get_ccbgcolor = $pdata[3];
		$get_ccbtntextcolor = $pdata[4];
		$get_ccbtnbgcolor = $pdata[5];
	}
	fclose($handlecc);
}	
$ccmode = $get_ccmode;
$ccdur = $get_ccdur;
$cctextcolor = $get_cctextcolor;
$ccbgcolor = $get_ccbgcolor;
$ccbtntextcolor = $get_ccbtntextcolor;
$ccbtnbgcolor = $get_ccbtnbgcolor;
?>
	<div id="sad-sys-cc" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-cc" class="op-panelbt op-bt-close">
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
					<div class="block bw75 sm-100 xs-100 md-100">
						<div class="lime chonk black-t blue-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">SAD <i class="bi bi-tools"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-cookie"></i> Cookie Consent</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $ccdatapath;?>" target="_blank" class="link"><?php echo $ccdatapath;?></a></p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="sys-cc">
									<div class="block-wrap">
										<div class="block bw50">
											<p class="smoke-t lucida bold">Cookie Consent Mode</p>
											<div class="form-group">
												<input type="radio" name="ccmode" value="off" <?php echo ($ccmode == 'off') ? 'checked="checked"' : ''; ?>/> <label>off</label><br />
												<input type="radio" name="ccmode" value="on" <?php echo ($ccmode == 'on') ? 'checked="checked"' : ''; ?>/> <label>on</label><br />
												<input type="radio" name="ccmode" value="global" <?php echo ($ccmode == 'global') ? 'checked="checked"' : ''; ?>/> <label>global</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<p class="smoke-t lucida bold">Cookie Duration</p>
											<div class="form-group">
												<input type="radio" name="ccdur" value="1" <?php echo ($ccdur == '1') ? 'checked="checked"' : ''; ?>/> <label>1 day</label><br />
												<input type="radio" name="ccdur" value="7" <?php echo ($ccdur == '7') ? 'checked="checked"' : ''; ?>/> <label>1 week</label><br />
												<input type="radio" name="ccdur" value="30" <?php echo ($ccdur == '30') ? 'checked="checked"' : ''; ?>/> <label>1 month</label><br />
												<input type="radio" name="ccdur" value="365" <?php echo ($ccdur == '365') ? 'checked="checked"' : ''; ?>/> <label>1 year</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<label>Text Color</label><br />
												<input type="color" name="cctextcolor" value="<?php echo $cctextcolor; ?>" id="cctextcolor" />
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<label>Background Color</label><br />
												<input type="color" name="ccbgcolor" value="<?php echo $ccbgcolor; ?>" id="ccbgcolor" />
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<label>Button Text Color</label><br />
												<input type="color" name="ccbtntextcolor" value="<?php echo $ccbtntextcolor; ?>" id="ccbtntextcolor" />
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<label>Button Background Color</label><br />
												<input type="color" name="ccbtnbgcolor" value="<?php echo $ccbtnbgcolor; ?>" id="ccbtnbgcolor" />
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-cc" />
									</div>
								</form>
								<div class="set_cc_msg_box" style="margin:10px 0px;"></div>
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
	$('#set-cc').click(function(e){
		e.preventDefault();
		var ccmode = $('input:radio[name="ccmode"]:checked').val();
		var ccdur = $('input:radio[name="ccdur"]:checked').val();
		var cctextcolor = $('#cctextcolor').val();
		var ccbgcolor = $('#ccbgcolor').val();
		var ccbtntextcolor = $('#ccbtntextcolor').val();
		var ccbtnbgcolor = $('#ccbtnbgcolor').val();
		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-cc.php",
            data: "ccmode="+ccmode+"&ccdur="+ccdur+"&cctextcolor="+cctextcolor+"&ccbgcolor="+ccbgcolor+"&ccbtntextcolor="+ccbtntextcolor+"&ccbtnbgcolor="+ccbtnbgcolor,
			beforeSend: function() {
				$('.set_cc_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_cc_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>