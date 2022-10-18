<?php 
$metadatapath = 'sat/sos/system/data/meta.csv';
$row = 0;
if (($handlemeta = fopen($metadatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlemeta, 1000, ",")) !== FALSE) {
		$row++;
		$get_meta_title = $pdata[0];
		$get_meta_desc = $pdata[1];
		$get_twcard = $pdata[2];
		$get_tw_handle = $pdata[3];
		$get_tw_img = $pdata[4];
		$get_og_data = $pdata[5];
		$get_og_img = $pdata[6];
	}
	fclose($handlemeta);
}
$meta_title = $get_meta_title;
$meta_desc = $get_meta_desc;
$twcard = $get_twcard;
$tw_handle = $get_tw_handle;
$tw_img = $get_tw_img;
$ogdata = $get_og_data;
$og_img = $get_og_img;
?>
	<div id="sad-sys-meta" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="sad-sys-meta" class="op-panelbt op-bt-close">
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
							<h4 class="lucida heavy flow-text"><i class="bi bi-robot"></i> Default META Data</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $metadatapath;?>" target="_blank" class="link"><?php echo $metadatapath;?></a></p>
								<p class="info padded courier">The default meta title and description will be used if a page has neither specified.<br /><br />
								<strong>Twitter Card:</strong><br />Sets Twitter meta tags for sharing content.<br /><br />
								<strong>Open Graph:</strong><br />Sets open graph (OG) tags for sharing on social media platforms (e.g. Facebook).<br /><br />
								If enabled, Twitter Cards and OG meta tags will automatically be generated in page headers.
								</p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="sys-meta-defaults">
									<div class="block-wrap">
										<div class="block bw100">
											<div class="form-group">
												<label>Meta Title</label><br />
												<input type="text" name="meta_title" id="metatitle" value="<?php echo $meta_title; ?>" /><br />
												<label>Meta Description</label><br />
												<textarea name="meta_desc" id="metadesc"><?php echo $meta_desc; ?></textarea>
											</div><br />
											<div class="form-group">
												<input type="checkbox" name="twcard" value="true" class="twcard" <?php echo ($twcard !== '') ? 'checked="checked"' : ''; ?>/><label>Enable Twitter Card</label><br /><br />
												<label>Twitter Handle</label><br />
												<input type="text" name="tw_handle" id="twhandle" value="<?php echo $tw_handle; ?>" /><br />
												<label>Twitter Image URL</label><br />
												<input type="text" id="twimgurl" value="<?php echo $tw_img;?>" />
											</div><br />
											<div class="form-group">
												<input type="checkbox" name="ogdata" value="true" class="ogdata" <?php echo ($ogdata !== '') ? 'checked="checked"' : ''; ?>/><label>Enable Open Graph Data</label><br /><br />
												<label>Open Graph Image URL</label><br />
												<input type="text" id="ogimgurl" value="<?php echo $og_img;?>" />
											</div>
											
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-meta" />
									</div>
								</form>
								<div class="set_meta_msg_box" style="margin:10px 0px;"></div>
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
	$('#set-meta').click(function(e){
		e.preventDefault();
		
		var meta_title = $('#metatitle').val();
        if(meta_title == ''){
			$('.set_cs_msg_box').html('<span style="color:red;">Meta Title required.</span>');
			$('#metatitle').focus();
            return false;
		}
		var meta_desc = $('#metadesc').val();
        if(meta_desc == ''){
			$('.set_cs_msg_box').html('<span style="color:red;">Meta description required.</span>');
			$('#metadesc').focus();
            return false;
		}
		
		var twcard = [];  
        $('.twcard').each(function(){  
            if($(this).is(":checked")){ twcard.push($(this).val()); }  
        });  
        twcard = twcard.toString();
		var tw_handle = $('#twhandle').val();
		var tw_img = $('#twimgurl').val();
		if( $("#twimgurl").val()!=''){
			if( !is_url( $("#twimgurl").val() ) ){
				$('.set_meta_msg_box').html('<span style="color:red;">Invalid Twitter image URL</span>');
				$('#twimgurl').focus();
				return false;
			}
		}
		
		var ogdata = [];  
        $('.ogdata').each(function(){  
            if($(this).is(":checked")){ ogdata.push($(this).val()); }  
        });  
        ogdata = ogdata.toString();
		var og_img = $('#ogimgurl').val();
		if( $("#ogimgurl").val()!=''){
			if( !is_url( $("#ogimgurl").val() ) ){
				$('.set_meta_msg_box').html('<span style="color:red;">Invalid Open Graph image URL</span>');
				$('#ogimgurl').focus();
				return false;
			}
		}

		$.ajax({
            type: "POST",
			url: "sat/sos/system/set-meta.php",
            data: "meta_title="+meta_title+"&meta_desc="+meta_desc+"&twcard="+twcard+"&tw_handle="+tw_handle+"&tw_img="+tw_img+"&ogdata="+ogdata+"&og_img="+og_img,
			beforeSend: function() {
				$('.set_meta_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_meta_msg_box').html(data);
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