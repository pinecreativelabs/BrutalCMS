<?php 
$crudeconfigdatapath = 'dat/crude/module/data/config.csv';
$row = 0;
if (($handlecrudeconfig = fopen($crudeconfigdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlecrudeconfig, 1000, ",")) !== FALSE) {
		$row++;
		$new_records = $pdata[0];
		$del_records = $pdata[1];
		$read_only = $pdata[2];
	}
	fclose($handlecrudeconfig);
}
?>
	<div id="crude-config" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="crude-config" class="op-panelbt op-bt-close">
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
						<div class="aqua chonk sapphire-t-s rice-t" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">CRUDE <i class="bi bi-save"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-gear"></i> Config</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $crudeconfigdatapath;?>" target="_blank" class="link"><?php echo $crudeconfigdatapath;?></a></p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="crude-configure">
									<div class="block-wrap">
										<div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label for="new_records">Add New Records</label><br />
												<select name="new_records" id="newrecords">
													<option value="true" <?php echo ($new_records == 'true') ? 'selected' : ''; ?>>enabled</option>
													<option value="false" <?php echo ($new_records == 'false') ? 'selected' : ''; ?>>disabled</option>
												</select>
											</div>
											<div class="form-group">
												<label for="del_records">Delete Records</label><br />
												<select name="del_records" id="delrecords">
													<option value="true" <?php echo ($del_records == 'true') ? 'selected' : ''; ?>>enabled</option>
													<option value="false" <?php echo ($del_records == 'false') ? 'selected' : ''; ?>>disabled</option>
												</select>
											</div>
										</div><div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label for="read_only">Read-Only</label><br />
												<select name="read_only" id="readonly">
													<option value="false" <?php echo ($read_only == 'false') ? 'selected' : ''; ?>>false</option>
													<option value="true" <?php echo ($read_only == 'true') ? 'selected' : ''; ?>>true</option>
												</select>
											</div>
										</div>
										
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-crudeconfig" />
									</div>
								</form>
								<div class="set_crudeconfig_msg_box" style="margin:10px 0px;"></div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Edit...</h4>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="new-entity" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-create"></i> Entities</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="entity-groups" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-corners"></i> Data Groups</span>
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
	$('#set-crudeconfig').click(function(e){
		e.preventDefault();
		var new_records = $('#newrecords').val();
		var del_records = $('#delrecords').val();
		var read_only = $('#readonly').val();

		$.ajax({
            type: "POST",
			url: "dat/crude/module/save_config.php",
            data: "new_records="+new_records+"&del_records="+del_records+"&read_only="+read_only,
			beforeSend: function() {
				$('.set_crudeconfig_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_crudeconfig_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>