<?php 
$cadtopixpath = 'cat/cad/module/data/topics.csv';
$row = 0;
if (($handlecadtopix = fopen($cadtopixpath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlecadtopix, 1000, ",")) !== FALSE) {
		$row++;
		$tid = $pdata[0];
		$topic = $pdata[1];
	}
	fclose($handlecadtopix);
}
?>
	<div id="cad-topix" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="cad-topix" class="op-panelbt op-bt-close">
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
						<div class="river chonk denim-t rice-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">CAD <i class="bi bi-article"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-thought"></i> Topics</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $cadtopixpath;?>" target="_blank" class="link"><?php echo $cadtopixpath;?></a></p>
								<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-thought"></i> Topics</h4>
								<ul class="tiles lucida tasklist">
								<?php $row = 0;
								$skip_row_number = array("1");
								if (($handletopix = fopen($cadtopixpath, 'r')) !== FALSE) {
									while (($pdata = fgetcsv($handletopix, 1000, ",")) !== FALSE) {
										$row++;
										if (in_array($row, $skip_row_number)){continue;} else {
											echo '<li>'.$pdata[1].' <small>[TID: '.$pdata[0].']</small></li>';
										}
									}
									fclose($handletopix);
								} 
								$topixfile = new SplFileObject($cadtopixpath, 'r');
								$topixfile->seek(PHP_INT_MAX);
								$newtid = $topixfile->key();
								?>
								</ul>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-add"></i> New Topic</h4>
								<p class="padded warning" style="max-width: 90%;"><strong>Once a new topic is added, it cannot be modified or deleted!</strong></p>
								<form method="post" class="updata bos-form" id="add-new-topic">
									<input type="hidden" name="tid" id="tid" value="<?php echo $newtid;?>" />
									<div class="block-wrap">
										<div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<p class="smoke-t"><strong>New TID: </strong><?php echo $newtid; ?></p>
												<label><i class="bi bi-thought"></i> Topic </label><br />
												<input type="text" name="topic" id="newtopic" />
											</div>
										</div>
										
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="add-topic" />
									</div>
								</form>
								<div class="add_topic_msg_box" style="margin:10px 0px;"></div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">

					</div>
				</div>
			</div>
        </div>
    </div>
<script>
$(document).ready(function() {
	var delay = 2000;
	$('#add-topic').click(function(e){
		e.preventDefault();
		var tid = $('#tid').val();
		var topic = $('#newtopic').val();
		if(topic == ''){
			$('.add_topic_msg_box').html('<p class="padded alert">Topic required.</p>');
			$('#newtopic').focus();
            return false;
		}
		$.ajax({
            type: "POST",
			url: "cat/cad/module/save_topics.php",
            data: "tid="+tid+"&topic="+topic,
			beforeSend: function() {
				$('.add_topic_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.add_topic_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>