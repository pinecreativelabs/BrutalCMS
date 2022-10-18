<?php 
$mmdatapath = 'sat/sos/system/data/mmode.csv';
$row = 0;
if (($handlemm = fopen($mmdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlemm, 1000, ",")) !== FALSE) {
		$row++;
		$get_mmode = $pdata[0];
		$get_mmtext = $pdata[1];
	}
	fclose($handlemm);
}	
$mmode = $get_mmode;
$mmtext = $get_mmtext;
?>
	<div id="sad-sys-mmode" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-mmode" class="op-panelbt op-bt-close">
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
							<h4 class="lucida heavy flow-text"><i class="bi bi-wrench"></i> Maintenance Mode</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $mmdatapath;?>" target="_blank" class="link"><?php echo $mmdatapath;?></a></p>
								<p class="padded info courier"><strong>Maintenance Mode</strong> re-directs all front-end application pages to a static maintenance page while errors and other isssues are being resolved.</p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="sys-mmode">
									<div class="block-wrap">
										<div class="block bw100">
											<div class="form-group">
												<input type="checkbox" name="mmode" value="enabled" class="get-mmode" <?php echo ($mmode !== '') ? 'checked="checked"' : ''; ?>/>
												<label> Enable Maintenance Mode</label>
											</div>
											<div class="form-group">
												<label>Maintenance Message</label>
												<textarea name="mmtext" id="mmtext"><?php echo $mmtext; ?></textarea>
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-mmode" />
									</div>
								</form>
								<div class="set_mmode_msg_box" style="margin:10px 0px;"></div>
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
	$('#set-mmode').click(function(e){
		e.preventDefault();
		var mmode = [];  
        $('.get-mmode').each(function(){  
            if($(this).is(":checked")){ mmode.push($(this).val()); }  
        });  
        mmode = mmode.toString();
		var mmtext = $('#mmtext').val();
        if(mmtext == ''){
			$('.set_mmode_msg_box').html('<span style="color:red;">Enter Your Message Here!</span>');
			$('#mmtext').focus();
            return false;
		}		
		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-mmode.php",
            data: "mmode="+mmode+"&mmtext="+mmtext,
			beforeSend: function() {
				$('.set_mmode_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_mmode_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>