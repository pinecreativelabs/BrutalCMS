<?php $modsdatapath = 'sat/sos/system/data/modules.csv'; ?>
	<div id="sad-sys-mods" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-mods" class="op-panelbt op-bt-close">
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
							<h4 class="lucida heavy flow-text"><i class="bi bi-box-check"></i> Enabled Modules</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $modsdatapath;?>" target="_blank" class="link"><?php echo $modsdatapath;?></a></p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form action="" method="post" class="updata bos-form" id="sys-mods">
									<div class="block-wrap">
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<input type="checkbox" name="cad" value="cad" class="mcad" <?php echo ($cad !== '') ? 'checked="checked"' : ''; ?>/> <label>CAD</label>
											</div>
											<div class="form-group">
												<input type="checkbox" name="crude" value="crude" class="mcrude" <?php echo ($crude !== '') ? 'checked="checked"' : ''; ?>/> <label>CRUDE</label>
											</div>
											<div class="form-group">
												<input type="checkbox" name="dick" value="dick" class="mdick" <?php echo ($dick !== '') ? 'checked="checked"' : ''; ?>/> <label>DICK</label>
											</div>
											<div class="form-group">
												<input type="checkbox" name="edu" value="edu" class="medu" <?php echo ($edu !== '') ? 'checked="checked"' : ''; ?>/> <label>EDU</label>
											</div>
											<div class="form-group">
												<input type="checkbox" name="hapi" value="hapi" class="hapi" <?php echo ($hapi !== '') ? 'checked="checked"' : ''; ?>/> <label>HAPI</label>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100">
											<div class="form-group">
												<input type="checkbox" name="jack" value="jack" class="jack" <?php echo ($jack !== '') ? 'checked="checked"' : ''; ?>/> <label>JACK</label>
											</div>
											<div class="form-group">
												<input type="checkbox" name="mad" value="mad" class="mmad" <?php echo ($mad !== '') ? 'checked="checked"' : ''; ?>/> <label>MAD</label>
											</div>
											<div class="form-group">
												<input type="checkbox" name="paws" value="paws" class="mpaws" <?php echo ($paws !== '') ? 'checked="checked"' : ''; ?>/> <label>PAWS</label>
											</div>
											<div class="form-group">
												<input type="checkbox" name="shop" value="shop" class="mshop" <?php echo ($shop !== '') ? 'checked="checked"' : ''; ?>/> <label>SHOP</label>
											</div>
											<div class="form-group">
												<input type="checkbox" name="slides" value="slides" class="mslides" <?php echo ($slides !== '') ? 'checked="checked"' : ''; ?>/> <label>SLIDES</label>
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-modules" />
									</div>
								</form>
								<div class="set_mods_msg_box" style="margin:10px 0px;"></div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Edit...</h4>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="sad-sys-defaults" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-loz"></i> System Defaults</span>
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
	$('#set-modules').click(function(e){
		e.preventDefault();
		var cad = [];
		$('.mcad').each(function(){  
            if($(this).is(":checked")){ cad.push($(this).val()); }  
        });  
        cad = cad.toString();
		var dick = [];  
        $('.mdick').each(function(){  
            if($(this).is(":checked")){ dick.push($(this).val()); }  
        });  
        dick = dick.toString();
		var mad = [];  
        $('.mmad').each(function(){  
            if($(this).is(":checked")){ mad.push($(this).val()); }  
        });  
        mad = mad.toString();
		var slides = [];  
        $('.mslides').each(function(){  
            if($(this).is(":checked")){ slides.push($(this).val()); }  
        });  
        slides = slides.toString();
		var edu = [];  
        $('.medu').each(function(){  
            if($(this).is(":checked")){ edu.push($(this).val()); }  
        });  
        edu = edu.toString();
		var shop = [];  
        $('.mshop').each(function(){  
            if($(this).is(":checked")){ shop.push($(this).val()); }  
        });  
        shop = shop.toString();
		var crude = [];  
        $('.mcrude').each(function(){  
            if($(this).is(":checked")){ crude.push($(this).val()); }  
        });  
        crude = crude.toString();
		var jack = [];  
        $('.jack').each(function(){  
            if($(this).is(":checked")){ jack.push($(this).val()); }  
        });  
        jack = jack.toString();
		var hapi = [];  
        $('.hapi').each(function(){  
            if($(this).is(":checked")){ hapi.push($(this).val()); }  
        });  
        hapi = hapi.toString();
		var paws = [];
		$('.mpaws').each(function(){  
            if($(this).is(":checked")){ paws.push($(this).val()); }  
        });  
        paws = paws.toString();
		
		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-modules.php",
            data: "cad="+cad+"&dick="+dick+"&mad="+mad+"&slides="+slides+"&edu="+edu+"&shop="+shop+"&crude="+crude+"&jack="+jack+"&hapi="+hapi+"&paws="+paws,
			beforeSend: function() {
				$('.set_mods_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_mods_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>