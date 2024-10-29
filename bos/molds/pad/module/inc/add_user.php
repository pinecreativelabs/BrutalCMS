<!-- Add User -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New User</strong></h4>
		<form method="POST" action="action_new_user.php">
			<input type="hidden" name="uid" value="<?php echo ($usersfile->user->count()+1).date('dhis');?>" />
			<input type="hidden" name="country" value="<?php echo $input_country;?>" />
			<input type="hidden" name="region" value="<?php echo $input_region;?>" />
			<input type="hidden" name="city" value="<?php echo $input_city;?>" />
			<input type="hidden" name="timezone" value="<?php echo $input_tz;?>" />
			<input type="hidden" name="language" value="<?php echo $input_lang;?>" />
			<input type="hidden" name="curc" value="<?php echo $input_curc;?>" />
			<input type="hidden" name="curs" value="<?php echo $input_curs;?>" />
			<input type="hidden" name="pwe" value="<?php echo $pw_encrypt;?>" />
			
			<div style="min-width: 80vw;">
				<div class="tabs">
					<input type="radio" name="newuser" id="tab1" checked="checked">
					<label for="tab1">General</label>
					<div class="tab">
						<div class="block-wrap">
							<div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label">Username</span><br />
									<input type="text" name="uname" id="uname" required title="Username required" />
									<p id="unameError" class="errorMsg"></p>
								</div>
								<div class="form-group">
									<span class="label">Email</span><br />
									<input type="email" name="email" required title="Email required" />
									<p id="emailError" class="errorMsg"></p>
								</div>
							</div><div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label">Password</span><br />
									<input type="password" name="pw1" id="pw1" class="form-control" required pattern="<?php echo $pw_reqs;?>" title="<?php echo $pw_req_msg;?>" autocomplete="new-password" />
									<p class="warningbox"><strong><small><?php echo $pw_req_msg;?></small></strong></p>
									<span class="label">Confirm Password</span><br />
									<input type="password" name="pw2" required title="Confirm password" /><br />
									<span class="label">PIN:</span><br /><small><?php echo $pin_req_msg;?></small><br />
									<input id="pin" name="pin" type="password" required pattern="<?php echo $pin_req;?>" minlength="4" maxlength="8" size="8" autocomplete="new-password" title="<?php echo $pin_req_msg;?>" style="max-width: 150px;" />
								</div>
							</div>
						</div>
					</div>
					<!-- Options Tab -->
					<input type="radio" name="newuser" id="tab2">
					<label for="tab2">Options</label>
					<div class="tab">
						<div class="block-wrap">
							<div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> Active</span>
								</div>
								<div class="form-group">	
									<span class="label">PAL</span> <small>(Permission Access Level)</small><br />
									<select name="pal">
										<option value="0">0 (Members)</option>
										<option value="1">1 (Editors)</option>
										<option value="2">2 (Admins)</option>
									</select><br />
									<span class="label">User Group</span><br />
									<?php echo $group_selector;?>
								</div>
							</div>
							<div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label">Status</span><br />
									<select name="status">
										<option value="available" selected>Available</option>
										<option value="away">Away</option>
										<option value="unavailable">Unavailable</option>
									</select><br />
									<span class="label">Visibility</span><br />
									<select name="visibility">
										<option value="public" selected>Public</option>
										<option value="private">Private</option>
										<option value="hidden">Hidden</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>