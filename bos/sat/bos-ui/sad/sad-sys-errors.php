<?php 
$errdatapath = 'sat/sos/system/data/errors.csv';
$row = 0;
if (($handleerr = fopen($errdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handleerr, 1000, ",")) !== FALSE) {
		$row++;
		$get_errmode = $pdata[0];
		$get_403 = $pdata[1];
		$get_404 = $pdata[2];
		$get_405 = $pdata[3];
		$get_408 = $pdata[4];
		$get_500 = $pdata[5];
		$get_502 = $pdata[6];
		$get_504 = $pdata[7];
	}
	fclose($handleerr);
}	
$errmode = $get_errmode;
$error403 = $get_403;
$error404 = $get_404;
$error405 = $get_405;
$error408 = $get_408;
$error500 = $get_500;
$error502 = $get_502;
$error504 = $get_504;
?>
	<div id="sad-sys-errors" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-errors" class="op-panelbt op-bt-close">
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
					<div class="block bw75">
						<div class="lime chonk black-t blue-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">SAD <i class="bi bi-tools"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-wrong"></i> Error Pages</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $errdatapath;?>" target="_blank" class="link"><?php echo $errdatapath;?></a></p>
								<p class="info padded courier"><strong>Error Pages Mode:</strong><br />Set to <em>custom</em> to use your own custom-made error pages.</p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="sys-errs">
									<div class="block-wrap">
										<div class="block bw100">
											<p class="smoke-t lucida bold">Error Pages Mode</p>
											<div class="form-group">
												<input type="radio" name="errmode" value="dynamic" <?php echo ($errmode == 'dynamic') ? 'checked="checked"' : ''; ?>/><label> dynamic </label>&nbsp;&nbsp;&nbsp;
												<input type="radio" name="errmode" value="custom" <?php echo ($errmode == 'custom') ? 'checked="checked"' : ''; ?>/><label> custom </label>
											</div><p class="padded"></p>
											<div class="form-group">
												<label><i class="bi bi-restricted"></i> 403 Forbidden</label><br />
												<textarea name="error403" id="err403"><?php echo $error403; ?></textarea>
											</div>
											<div class="form-group">
												<label><i class="bi bi-red-alert"></i> 404 Not Found</label><br />
												<textarea name="error404" id="err404"><?php echo $error404; ?></textarea>
											</div>
											<div class="form-group">
												<label><i class="bi bi-red-flag"></i> 405 Method Not Allowed</label><br />
												<textarea name="error405" id="err405"><?php echo $error405; ?></textarea>
											</div>
											<div class="form-group">
												<label><i class="bi bi-time"></i> 408 Request Timeout</label><br />
												<textarea name="error408" id="err408"><?php echo $error408; ?></textarea>
											</div>
											<div class="form-group">
												<label><i class="bi bi-wrong"></i> 500 Internal Server Error</label><br />
												<textarea name="error500" id="err500"><?php echo $error500; ?></textarea>
											</div>
											<div class="form-group">
												<label><i class="bi bi-warning"></i> 502 Bad Gateway</label><br />
												<textarea name="error502" id="err502"><?php echo $error502; ?></textarea>
											</div>
											<div class="form-group">
												<label><i class="bi bi-time"></i> 504 Gateway Timeout</label><br />
												<textarea name="error504" id="err504"><?php echo $error504; ?></textarea>
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-errs" />
									</div>
								</form>
								<div class="set_err_msg_box" style="margin:10px 0px;"></div>
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
	$('#set-errs').click(function(e){
		e.preventDefault();
		var errmode = $('input:radio[name="errmode"]:checked').val();
		var error403 = $('#err403').val();
        if(error403 == ''){
			$('.set_err_msg_box').html('<span style="color:red;">403 message required!</span>');
			$('#err403').focus();
            return false;
		}
		var error404 = $('#err404').val();
        if(error404 == ''){
			$('.set_err_msg_box').html('<span style="color:red;">404 message required!</span>');
			$('#err404').focus();
            return false;
		}
		var error405 = $('#err405').val();
        if(error405 == ''){
			$('.set_err_msg_box').html('<span style="color:red;">405 message required!</span>');
			$('#err405').focus();
            return false;
		}
		var error408 = $('#err408').val();
        if(error408 == ''){
			$('.set_err_msg_box').html('<span style="color:red;">408 message required!</span>');
			$('#err408').focus();
            return false;
		}
		var error500 = $('#err500').val();
        if(error500 == ''){
			$('.set_err_msg_box').html('<span style="color:red;">500 message required!</span>');
			$('#err500').focus();
            return false;
		}
		var error502 = $('#err502').val();
        if(error502 == ''){
			$('.set_err_msg_box').html('<span style="color:red;">502 message required!</span>');
			$('#err502').focus();
            return false;
		}
		var error504 = $('#err504').val();
        if(error504 == ''){
			$('.set_err_msg_box').html('<span style="color:red;">504 message required!</span>');
			$('#err504').focus();
            return false;
		}
		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-errors.php",
            data: "errmode="+errmode+"&error403="+error403+"&error404="+error404+"&error405="+error405+"&error408="+error408+"&error500="+error500+"&error502="+error502+"&error504="+error504,
			beforeSend: function() {
				$('.set_err_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_err_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>