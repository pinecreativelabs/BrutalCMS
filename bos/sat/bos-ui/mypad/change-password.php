<?php 
$row = 1;
if (($pwhandle = fopen("pat/pad/module/data/users.csv", "r")) !== FALSE) {
	while (($pwdata = fgetcsv($pwhandle, 1000, ",")) !== FALSE) {
		$row++;
		if ($pwdata[0] == $_SESSION['userName']) {
			$get_cur_uname = $pwdata[0];
			$get_cur_pw = $pwdata[1];
		}
	}
	fclose($pwhandle);
}	
$uname = $get_cur_uname;
$password = $get_cur_pw;
?>
	<div id="change-password" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="change-password" class="op-panelbt op-bt-close">
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
						<div class="mint chonk black-t" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">MyPAD <i class="bi bi-lock"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-encrypt"></i> Change Password</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Username:<br /><?php echo $uname;?></p>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="mypad-pw">
									<input type="hidden" name="oldPassword" id="pw-old" value="<?php echo $password; ?>" />
									<div class="block-wrap">
										<div class="block bw100">
											<div class="form-group">
												<label>Password</label>
												<input type="password" name="newPassword" id="pw-new" value="" />
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-pw" />
									</div>
								</form>
								<div class="set_pw_msg_box" style="margin:10px 0px;"></div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Edit...</h4>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="edit-profile" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-edit"></i> Profile</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="streams-channels" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-trident grayscale"></i> Streams &amp; Channels</span>
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
	$('#set-pw').click(function(e){
		e.preventDefault();
		var oldPassword = $('#pw-old').val();
		var newPassword = $('#pw-new').val();
        if(newPassword == ''){
			$('.set_pw_msg_box').html('<span style="color:red;">Password required!</span>');
			$('#pw-new').focus();
            return false;
		}
		$.ajax({
            type: "POST",
			url: "pat/pad/module/set-pw.php",
            data: "oldPassword="+oldPassword+"&newPassword="+newPassword,
			beforeSend: function() {
				$('.set_pw_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_pw_msg_box').html(data);
                }, delay);
            }
		});
	});
});
</script>