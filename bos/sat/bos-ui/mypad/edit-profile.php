<?php 
$updatapath = 'pat/users/'.$_SESSION['userName'].'/data/profile.csv';
?>
	<div id="edit-profile" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="edit-profile" class="op-panelbt op-bt-close">
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
						<div class="mint chonk black-t" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">My PAD <i class="bi bi-lock"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-edit"></i> Edit Profile</h4>
						</div>
						<div class="block-wrap">
							<div class="block bw33 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<p class="disabled padded courier">Data Path:<br /><a href="<?php echo $updatapath;?>" target="_blank" class="link"><?php echo $updatapath;?></a></p>
								<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Edit...</h4>
								<ul class="tiles lucida black-t-s smoke-t">
									<li><a href="javascript:void(0);" data-panelid="change-password" data-pos="fade" class="op-tab">
										<span class="title"><i class="bi bi-primary-key"></i> Password</span>
									</a></li>
									<li><a href="javascript:void(0);" data-panelid="streams-channels" data-pos="fade" class="op-tab">
										<span class="title"><i class="bi bi-trident grayscale"></i> Streams &amp; Channels</span>
									</a></li>
								</ul>
							</div>
							<div class="block bw67 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
								<form method="post" class="updata bos-form" id="mypad-up-edit">
									<div class="block-wrap">
										<div class="block bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<p class="bold smoke-t lucida">Visibility</p>
												<input type="radio" name="up_visibility" value="public" <?php echo ($up_visibility == 'public') ? 'checked="checked"' : ''; ?>/><label> public </label><br />
												<input type="radio" name="up_visibility" value="private" <?php echo ($up_visibility == 'private') ? 'checked="checked"' : ''; ?>/><label> private </label>
											</div>
										</div>
										<div class="bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<p class="bold smoke-t lucida">Status</p>
												<input type="radio" name="up_status" value="available" <?php echo ($up_status == 'available') ? 'checked="checked"' : ''; ?>/><label> available </label><br />
												<input type="radio" name="up_status" value="away" <?php echo ($up_status == 'away') ? 'checked="checked"' : ''; ?>/><label> away </label><br />
											</div>
										</div>
										<div class="bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label>First Name</label>
												<input type="text" name="up_fname" id="upfname" value="<?php echo $up_fname; ?>" />
											</div>
										</div>
										<div class="bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label>Last Name</label>
												<input type="text" name="up_lname" id="uplname" value="<?php echo $up_lname; ?>" />
											</div>
										</div>
										<div class="bw50 xs-100 sm-100 md-100">
											<div class="form-group">	
												<label for="up_sex">Sex</label>
												<select name="up_sex" id="upsex">
													<option value="male" <?php echo ($up_sex == 'male') ? 'selected' : ''; ?>>male</option>
													<option value="female" <?php echo ($up_sex == 'female') ? 'selected' : ''; ?>>female</option>
													<option value="other" <?php echo ($up_sex == 'other') ? 'selected' : ''; ?>>other</option>
													<option value="unspecified" <?php echo ($up_sex == 'unspecified') ? 'selected' : ''; ?>>unspecified</option>
												</select>
											</div>
										</div>
										<div class="bw50 xs-100 sm-100 md-100">
											<div class="form-group">
												<label>Birthday</label>
												<input type="date" name="up_bday" id="upbday" value="<?php echo $up_bday; ?>" />
											</div>
										</div>
										<div class="bw100">
											<div class="form-group">
												<label>Email</label>
												<input type="email" name="up_email" id="upemail" value="<?php echo $up_email; ?>" />
											</div>
											<div class="form-group">
												<label>Phone</label>
												<input type="tel" name="up_phone" id="upphone" value="<?php echo $up_phone; ?>" />
											</div>
											<div class="form-group">
												<label>Website</label>
												<input type="url" name="up_url" id="upurl" value="<?php echo $up_url; ?>" />
											</div>
											<div class="form-group">
												<label>Bio</label><br />
												<textarea name="up_bio" id="upbio"><?php echo $up_bio; ?></textarea>
											</div>
										</div>
									</div>
									<div class="form-group" align="center">
										<input type="submit" name="submit" value="SAVE" id="set-up" />
									</div>
								</form>
								<div class="set_up_msg_box" style="margin:10px 0px;"></div>
							</div>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="padded warning">
							<form method="post" class="notepad bos-form" id="mynotes">
								<h4 class="flow-text times charcoal-t"><strong>My Notepad</strong></h4>
								<div class="form-group">
									<textarea name="mynotes" id="notepad"><?php echo $mynotes; ?></textarea>
								</div>
								<div class="form-group" align="center">
									<input type="button" value="Clear" onclick="javascript:eraseText();">
									<input type="submit" name="submit" value="Update" id="set-notepad" />
								</div>
							</form>
							<div class="set_notepad_box" style="margin:10px 0px;"></div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
<script>
$(document).ready(function() {
	var delay = 2000;
	$('#set-up').click(function(e){
		e.preventDefault();
		var up_visibility = $('input:radio[name="up_visibility"]:checked').val();
		var up_status = $('input:radio[name="up_status"]:checked').val();
		var up_fname = $('#upfname').val();
		var up_lname = $('#uplname').val();
		var up_sex = $('#upsex').val();
		var up_bday = $('#upbday').val();
		var up_email = $('#upemail').val();
		var up_phone = $('#upphone').val();
		var up_url = $('#upurl').val();
		var up_bio = $('#upbio').val();
		$.ajax({
            type: "POST",
			url: "pat/mypad-save.php",
            data: "up_visibility="+up_visibility+"&up_status="+up_status+"&up_fname="+up_fname+"&up_lname="+up_lname+"&up_sex="+up_sex+"&up_bday="+up_bday+"&up_email="+up_email+"&up_phone="+up_phone+"&up_url="+up_url+"&up_bio="+up_bio,
			beforeSend: function() {
				$('.set_up_msg_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_up_msg_box').html(data);
                }, delay);
            }
		});
	});
	$('#set-notepad').click(function(e){
		e.preventDefault();
		var notepad = $('#notepad').val();
		$.ajax({
            type: "POST",
			url: "pat/notepad-save.php",
            data: "notepad="+notepad,
			beforeSend: function() {
				$('.set_notepad_box').html('<img src="bat/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {
                    $('.set_notepad_box').html(data);
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
function eraseText() {document.getElementById("notepad").value = "";}
</script>