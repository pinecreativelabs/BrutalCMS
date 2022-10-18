
	<div id="streams-channels" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="streams-channels" class="op-panelbt op-bt-close">
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
        <div class="op-panelform smoke-t">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw75 xs-100 sm-100 md-100">
						<div class="mint chonk black-t" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">My PAD <i class="bi bi-lock"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-trident grayscale"></i> Streams &amp; Channels</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								
								<h4 class="lucida smoke fossil-t charcoal-t-s flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-trident grayscale"></i> My Streams </h4>
								<div class="courier" style="max-width: 90%; margin-bottom: 1.25em;">
									<ul class="tiles datalist">
								<?php $row = 0;
								$skip_row_number = array("1");
								if (($handleus = fopen("pat/users/".$_SESSION['userName']."/data/streams.csv", "r")) !== FALSE) {
									while (($usdata = fgetcsv($handleus, 1000, ",")) !== FALSE) {
										$row++;
										if (in_array($row, $skip_row_number)){continue;} else {
											echo '<li><span class="title">'.$usdata[1].'</span><span class="id">SID: '.$usdata[0].'</span><br /><span class="desc">'.$usdata[2].'</span></li>';
										}
									} 
									fclose($handleus);	
								} ?>
									</ul>
								</div>
							</div>
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<h4 class="lucida smoke fossil-t charcoal-t-s flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-tv grayscale"></i> My Channels </h4>
								<div class="courier" style="max-width: 90%;">
									<ul class="tiles datalist">
									<?php $row = 0;
									$skip_row_number = array("1");
									if (($handleuc = fopen("pat/users/".$_SESSION['userName']."/data/channels.csv", "r")) !== FALSE) {
										while (($psdata = fgetcsv($handleuc, 1000, ",")) !== FALSE) {
											$row++;
											if (in_array($row, $skip_row_number)){continue;} else {
												echo '<li><span class="title">'.$psdata[1].'</span><span class="id">CID: '.$psdata[0].'</span><br /><span class="desc">'.$psdata[2].'</span></li>';
											}
										} 
										fclose($handleuc);	
									} ?>
									</ul>
									<?php $channelsFile = file('pat/users/'.$_SESSION['userName'].'/data/channels.csv');
									$cdata = [];
									foreach ($channelsFile as $line) {
										$cdata[] = str_getcsv($line);
									}
									$numchannels = count($cdata)-1;
									$new_cid = $uid.$numchannels;
									?>
									<p><?php echo $numchannels; ?> channels<br />new CID: <?php echo $new_cid;?></p>
								</div>
							</div>
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<div class="courier" style="max-width: 90%;">
									<h4 class="lucida smoke allcaps fossil-t charcoal-t-s flow-text" style="margin-left: 0; padding: 0.5em;"><i class="bi bi-add"></i> Add Channel</h4>
									<p class="warning padded"><strong>NOTE:</strong> Once a channel is added, it cannot be deleted or modified!</p>
									<form method="post" class="updata bos-form" id="mypad-new-channel">
										<input type="hidden" name="cid" id="newcid" value="<?php echo $new_cid;?>" />
										<div class="block-wrap">
											<div class="bw100">
												<div class="form-group">
													<label>Title</label>
													<input type="text" name="channel_title" id="channel_title" />
												</div>
												<div class="form-group">
													<label>Description</label>
													<input type="text" name="channel_desc" id="channel_desc" />
												</div>
											</div>
										</div>
										<div class="form-group" align="center">
											<input type="submit" name="submit" value="ADD" id="set-new-channel" />
										</div>
									</form>
									<div class="set_newchannel_msg_box" style="margin:10px 0px;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Edit...</h4>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="change-password" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-primary-key"></i> Password</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="edit-profile" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-edit"></i> Profile</span>
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
	$('#set-new-channel').click(function(e){
		e.preventDefault();
		var cid = $('#newcid').val();
		var channel_title = $('#channel_title').val();
		var channel_desc = $('#channel_desc').val();
		$.ajax({
            type: "POST",
			url: "pat/mypad-add-channel.php",
            data: "cid="+cid+"&channel_title="+channel_title+"&channel_desc="+channel_desc,
			beforeSend: function() {
				$('.set_newchannel_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_newchannel_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>