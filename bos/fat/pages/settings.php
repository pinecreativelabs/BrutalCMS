<?php 
$pagesconfigdatapath = 'fat/pages/module/data/config.csv';
$row = 0;
if (($handlecrudeconfig = fopen($pagesconfigdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlecrudeconfig, 1000, ",")) !== FALSE) {
		$row++;
		$gen_mode = $pdata[0];
		$pgs_dir = $pdata[1];
		$pgspermission = $pdata[2];
		$inc_metadata = $pdata[3];
	}
	fclose($handlecrudeconfig);
}
?>
	<div id="pages-config" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="pages-config" class="op-panelbt op-bt-close">
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
						<div class="liminal chonk butter-t black-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">PAGES <i class="bi bi-file"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-gear"></i> Configure</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $pagesconfigdatapath;?>" target="_blank" class="link"><?php echo $pagesconfigdatapath;?></a></p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="pages-configure">
									<div class="block-wrap">
										<div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label for="gen_mode">Generation Mode</label><br /><span class="smoke-t"><small><em>partial</em> = data-only<br /><em>full</em> = data + create empty pages</small></span><br />
												<select name="gen_mode" id="pgsgenmode">
													<option value="partial" <?php echo ($gen_mode == 'partial') ? 'selected' : ''; ?>>partial</option>
													<option value="full" <?php echo ($gen_mode == 'full') ? 'selected' : ''; ?>>full</option>
												</select>
											</div>
											<div class="form-group">
												<label for="pgs_dir">Pages Location</label><br /><span class="smoke-t"><small><em>base</em> = <?php echo $bdir; ?><br />
												<em>bos</em> = <?php echo $bosdir; ?></small></span><br />
												<select name="pgs_dir" id="pgsdir">
													<option value="base" <?php echo ($pgs_dir == 'base') ? 'selected' : ''; ?>>base</option>
													<option value="bos" <?php echo ($pgs_dir == 'bos') ? 'selected' : ''; ?>>bos</option>
												</select>
											</div>
										</div><div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label for="pgspermission">Permission Level</label><br /><span class="smoke-t"><small><em>limited</em> = only administrators can manage pages<br />
												<em>extended</em> = administrators &amp; editors can manage pages</small></span><br />
												<select name="pgspermission" id="pgspermission">
													<option value="limited" <?php echo ($pgspermission == 'limited') ? 'selected' : ''; ?>>limited</option>
													<option value="extended" <?php echo ($pgspermission == 'extended') ? 'selected' : ''; ?>>extended</option>
												</select>
											</div>
											<div class="form-group">
												<label for="inc_metadata">META Data</label><br /><span class="smoke-t"><small>Include META tags in new pages?</small></span><br />
												<select name="inc_metadata" id="genmetadata">
													<option value="true" <?php echo ($inc_metadata == 'true') ? 'selected' : ''; ?>>yes</option>
													<option value="false" <?php echo ($inc_metadata == 'false') ? 'selected' : ''; ?>>no</option>
												</select>
											</div>
										</div>
										
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-pagesconfig" />
									</div>
								</form>
								<div class="set_pagesconfig_msg_box" style="margin:10px 0px;"></div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Edit...</h4>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="edit-pages" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-file-edit"></i> Pages</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="page-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Page Groups</span>
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
	$('#set-pagesconfig').click(function(e){
		e.preventDefault();
		var gen_mode = $('#pgsgenmode').val();
		var pgs_dir = $('#pgsdir').val();
		var pgspermission = $('#pgspermission').val();
		var inc_metadata = $('#genmetadata').val();

		$.ajax({
            type: "POST",
			url: "fat/pages/module/save_config.php",
            data: "gen_mode="+gen_mode+"&pgs_dir="+pgs_dir+"&pgspermission="+pgspermission+"&inc_metadata="+inc_metadata,
			beforeSend: function() {
				$('.set_pagesconfig_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_pagesconfig_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>