<?php 
$dickdatapath = 'cat/dick/module/data/defaults.csv';
$row = 0;
if (($handlemydick = fopen($dickdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlemydick, 1000, ",")) !== FALSE) {
		$row++;
		$dick_tz = $pdata[0];
		$dick_template = $pdata[1];
		$dick_dispmode = $pdata[2];
		$dm01 = $pdata[3];
		$dm02 = $pdata[4];
		$dm03 = $pdata[5];
		$dm04 = $pdata[6];
		$dm05 = $pdata[7];
		$dm06 = $pdata[8];
		$dm07 = $pdata[9];
		$dm08 = $pdata[10];
		$dm09 = $pdata[11];
		$dm10 = $pdata[12];
		$dm11 = $pdata[13];
		$dm12 = $pdata[14];
		$dick_spring = $pdata[15];
		$dick_summer = $pdata[16];
		$dick_fall = $pdata[17];
		$dick_winter = $pdata[18];
		$dick_fbtext = $pdata[19];
		$dick_pic = $pdata[20];
		$dick_link = $pdata[21];
		$linktext = $pdata[22];
		$dick_target = $pdata[23];
		$pcolor = $pdata[24];
		$scolor = $pdata[25];
		$tcolor = $pdata[26];
	}
	fclose($handlemydick);
}
?>
	<div id="dick-settings" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="dick-settings" class="op-panelbt op-bt-close">
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
						<div class="happiness chonk black-t" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">DICK <i class="bi bi-sol"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-gear"></i> Settings</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $dickdatapath;?>" target="_blank" class="link"><?php echo $dickdatapath;?></a></p>
								<p class="center smoke-t courier" style="margin-top: 1.5em; font-size: 16px; font-weight: 600;">Default DICK Pic:<br /><img src="<?php echo $dick_pic;?>" alt="dick pic" class="xlarge-thumb circle crop" /></p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="dick-defaults">
									<div class="block-wrap">
										<div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label><i class="bi bi-clock"></i> Timezone </label>&nbsp;<small class="smoke-t">ex: <em>Europe/London</em></small><br />
												<input type="text" name="dick_tz" id="dicktz" value="<?php echo $dick_tz; ?>" />
											</div>
											<div class="form-group">
												<label for="dick_template">Template</label><br />
												<select name="dick_template" id="dicktemp">
													<option value="default" <?php echo ($dick_template == 'default') ? 'selected' : ''; ?>>[Default]</option>
													<option value="cover" <?php echo ($dick_template == 'cover') ? 'selected' : ''; ?>>Cover</option>
												</select>
											</div>
										</div><div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label for="dick_dispmode">Display Mode</label><br />
												<select name="dick_dispmode" id="ddispmode">
													<option value="always" <?php echo ($dick_dispmode == 'always') ? 'selected' : ''; ?>>Always</option>
													<option value="week" <?php echo ($dick_dispmode == 'week') ? 'selected' : ''; ?>>Weekly</option>
													<option value="month" <?php echo ($dick_dispmode == 'month') ? 'selected' : ''; ?>>Monthly</option>
													<option value="season" <?php echo ($dick_dispmode == 'season') ? 'selected' : ''; ?>>Seasonal</option>
												</select>
											</div>
										</div>
										<div class="block bw100">
											<p class="smoke-t lucida">Months</p>
											<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
												<div class="form-group">
													<input type="checkbox" name="dm01" value="01" class="dm01" <?php echo ($dm01 !== '') ? 'checked="checked"' : ''; ?>/> <label>January</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm02" value="02" class="dm02" <?php echo ($dm02 !== '') ? 'checked="checked"' : ''; ?>/> <label>February</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm03" value="03" class="dm03" <?php echo ($dm03 !== '') ? 'checked="checked"' : ''; ?>/> <label>March</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm04" value="04" class="dm04" <?php echo ($dm04 !== '') ? 'checked="checked"' : ''; ?>/> <label>April</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm05" value="05" class="dm05" <?php echo ($dm05 !== '') ? 'checked="checked"' : ''; ?>/> <label>May</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm06" value="06" class="dm06" <?php echo ($dm06 !== '') ? 'checked="checked"' : ''; ?>/> <label>June</label>
												</div>
											</div><div class="block bw50 xs-100 sm-100 md-100">
												<div class="form-group">
													<input type="checkbox" name="dm07" value="07" class="dm07" <?php echo ($dm07 !== '') ? 'checked="checked"' : ''; ?>/> <label>July</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm08" value="08" class="dm08" <?php echo ($dm08 !== '') ? 'checked="checked"' : ''; ?>/> <label>August</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm09" value="09" class="dm09" <?php echo ($dm09 !== '') ? 'checked="checked"' : ''; ?>/> <label>September</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm10" value="10" class="dm10" <?php echo ($dm10 !== '') ? 'checked="checked"' : ''; ?>/> <label>October</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm11" value="11" class="dm11" <?php echo ($dm11 !== '') ? 'checked="checked"' : ''; ?>/> <label>November</label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dm12" value="12" class="dm12" <?php echo ($dm12 !== '') ? 'checked="checked"' : ''; ?>/> <label>December</label>
												</div>
											</div></div>
										</div>
										<div class="block bw100">
											<p class="smoke-t lucida">Seasons</p>
											<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
												<div class="form-group">
													<input type="checkbox" name="dick_spring" value="spring" class="dickspring" <?php echo ($dick_spring !== '') ? 'checked="checked"' : ''; ?>/>
													<label> Spring <i class="bi bi-sprout"></i> </label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dick_summer" value="summer" class="dicksummer" <?php echo ($dick_summer !== '') ? 'checked="checked"' : ''; ?>/>
													<label> Summer <i class="bi bi-beach"></i> </label>
												</div>
											</div><div class="block bw50 xs-100 sm-100 md-100">
												<div class="form-group">
													<input type="checkbox" name="dick_fall" value="fall" class="dickfall" <?php echo ($dick_fall !== '') ? 'checked="checked"' : ''; ?>/>
													<label> Fall <i class="bi bi-autumn"></i> </label>
												</div>
												<div class="form-group">
													<input type="checkbox" name="dick_winter" value="winter" class="dickwinter" <?php echo ($dick_winter !== '') ? 'checked="checked"' : ''; ?>/>
													<label> Winter <i class="bi bi-snowflake"></i> </label>
												</div>
											</div></div>
										</div>
										<div class="block bw100">
											<h4 class="smoke charcoal-t flow-text lucida">Fallback Content</h4>
											<p class="courier smoke-t">This will be displayed if no other content is available on any given day.</p>
											<div class="form-group">
												<label>Fallback Text</label>
												<textarea name="dick_fbtext" id="dick_fbtext"><?php echo $dick_fbtext; ?></textarea>
											</div>
											<div class="form-group">
												<label><i class="bi bi-image"></i> DICK Pic </label>&nbsp;<small class="smoke-t">enter image URL <em>(optional)</em></small><br />
												<input type="url" name="dick_pic" id="dickpic" value="<?php echo $dick_pic; ?>" />
											</div>
											<div class="form-group">
												<label><i class="bi bi-link"></i> Link </label>&nbsp;<small class="smoke-t"><em>(optional)</em></small><br />
												<input type="url" name="dick_link" id="dicklink" value="<?php echo $dick_link; ?>" />
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label for="dick_target">Link Target</label><br />
												<select name="dick_target" id="dtarget">
													<option value="_self" <?php echo ($dick_target == '_self') ? 'selected' : ''; ?>>Same Window</option>
													<option value="_blank" <?php echo ($dick_target == '_blank') ? 'selected' : ''; ?>>New Window</option>
													<option value="_parent" <?php echo ($dick_target == '_parent') ? 'selected' : ''; ?>>Parent Frame</option>
												</select>
											</div>
											<div class="form-group">
												<label>Link Text</label><br />
												<input type="text" name="linktext" id="linktext" value="<?php echo $linktext; ?>" style="width: 90%;"/>
											</div>
										</div>
										<div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group smoke-t">
												<label><i class="bi bi-palette"></i>Colors</label><br />
												<input type="color" name="pcolor" id="pcolor" value="<?php echo $pcolor; ?>" /> Primary<br />
												<input type="color" name="scolor" id="scolor" value="<?php echo $scolor; ?>" /> Secondary<br />
												<input type="color" name="tcolor" id="tcolor" value="<?php echo $tcolor; ?>" /> Tertiary
											</div>
										</div>
										
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-dick" />
									</div>
								</form>
								<div class="set_dick_msg_box" style="margin:10px 0px;"></div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Edit...</h4>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="dick-weekdays" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-weather grayscale"></i> Weekdays</span>
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
	$('#set-dick').click(function(e){
		e.preventDefault();
		var dick_tz = $('#dicktz').val();
		if(dick_tz == ''){
			$('.set_dick_msg_box').html('<p class="padded alert">Timezone required!</p>');
			$('#dicktz').focus();
            return false;
		}
		var dick_template = $('#dicktemp').val();
		var dick_dispmode = $('#ddispmode').val();
		
		var dm01 = [];  
        $('.dm01').each(function(){  
            if($(this).is(":checked")){ dm01.push($(this).val()); }  
        });  
        dm01 = dm01.toString();
		var dm02 = [];  
        $('.dm02').each(function(){  
            if($(this).is(":checked")){ dm02.push($(this).val()); }  
        });  
        dm02 = dm02.toString();
		var dm03 = [];  
        $('.dm03').each(function(){  
            if($(this).is(":checked")){ dm03.push($(this).val()); }  
        });  
        dm03 = dm03.toString();
		var dm04 = [];  
        $('.dm04').each(function(){  
            if($(this).is(":checked")){ dm04.push($(this).val()); }  
        });  
        dm04 = dm04.toString();
		var dm05 = [];  
        $('.dm05').each(function(){  
            if($(this).is(":checked")){ dm05.push($(this).val()); }  
        });  
        dm05 = dm05.toString();
		var dm06 = [];  
        $('.dm06').each(function(){  
            if($(this).is(":checked")){ dm06.push($(this).val()); }  
        });  
        dm06 = dm06.toString();
		var dm07 = [];  
        $('.dm07').each(function(){  
            if($(this).is(":checked")){ dm07.push($(this).val()); }  
        });  
        dm07 = dm07.toString();
		var dm08 = [];  
        $('.dm08').each(function(){  
            if($(this).is(":checked")){ dm08.push($(this).val()); }  
        });  
        dm08 = dm08.toString();
		var dm09 = [];  
        $('.dm09').each(function(){  
            if($(this).is(":checked")){ dm09.push($(this).val()); }  
        });  
        dm09 = dm09.toString();
		var dm10 = [];  
        $('.dm10').each(function(){  
            if($(this).is(":checked")){ dm10.push($(this).val()); }  
        });  
        dm10 = dm10.toString();
		var dm11 = [];  
        $('.dm11').each(function(){  
            if($(this).is(":checked")){ dm11.push($(this).val()); }  
        });  
        dm11 = dm11.toString();
		var dm12 = [];  
        $('.dm12').each(function(){  
            if($(this).is(":checked")){ dm12.push($(this).val()); }  
        });  
        dm12 = dm12.toString();
		
		var dick_spring = [];  
        $('.dickspring').each(function(){  
            if($(this).is(":checked")){ dick_spring.push($(this).val()); }  
        });  
        dick_spring = dick_spring.toString();
		var dick_summer = [];  
        $('.dicksummer').each(function(){  
            if($(this).is(":checked")){ dick_summer.push($(this).val()); }  
        });  
        dick_summer = dick_summer.toString();
		var dick_fall = [];  
        $('.dickfall').each(function(){  
            if($(this).is(":checked")){ dick_fall.push($(this).val()); }  
        });  
        dick_fall = dick_fall.toString();
		var dick_winter = [];  
        $('.dickwinter').each(function(){  
            if($(this).is(":checked")){ dick_winter.push($(this).val()); }  
        });  
        dick_winter = dick_winter.toString();
		
		
		var dick_fbtext = $('#dick_fbtext').val();
		var dick_pic = $('#dickpic').val();
		if( $("#dickpic").val()!=''){
			if( !is_url( $("#dickpic").val() ) ){
				$('.set_dick_msg_box').html('<p class="padded alert">Invalid URL</p>');
				$('#dickpic').focus();
				return false;
			}
		}
		var dick_link = $('#dicklink').val();
		if( $("#dicklink").val()!=''){
			if( !is_url( $("#dicklink").val() ) ){
				$('.set_dick_msg_box').html('<p class="padded alert">Invalid URL</p>');
				$('#dicklink').focus();
				return false;
			}
		}
		var linktext = $('#linktext').val();
		if(linktext == ''){
			$('.set_dick_msg_box').html('<p class="padded alert">Link Text required!</p>');
			$('#linktext').focus();
            return false;
		}
		var dick_target = $('#dtarget').val();
		var pcolor = $('#pcolor').val();
		var scolor = $('#scolor').val();
		var tcolor = $('#tcolor').val();
		$.ajax({
            type: "POST",
			url: "cat/dick/module/save_settings.php",
            data: "dick_tz="+dick_tz+"&dick_template="+dick_template+"&dick_dispmode="+dick_dispmode+"&dm01="+dm01+"&dm02="+dm02+"&dm03="+dm03+"&dm04="+dm04+"&dm05="+dm05+"&dm06="+dm06+"&dm07="+dm07+"&dm08="+dm08+"&dm09="+dm09+"&dm10="+dm10+"&dm11="+dm11+"&dm12="+dm12+"&dick_spring="+dick_spring+"&dick_summer="+dick_summer+"&dick_fall="+dick_fall+"&dick_winter="+dick_winter+"&dick_fbtext="+dick_fbtext+"&dick_pic="+dick_pic+"&dick_link="+dick_link+"&linktext="+linktext+"&dick_target="+dick_target+"&pcolor="+pcolor+"&scolor="+scolor+"&tcolor="+tcolor,
			beforeSend: function() {
				$('.set_dick_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_dick_msg_box').html(data);
                }, delay);
            }
		});
	});
});
function is_url(str){
  regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        if (regexp.test(str)){return true;}
        else{return false;}
};
</script>