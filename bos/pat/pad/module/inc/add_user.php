<!-- Add User -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New User</strong></h4>
		<form method="POST" action="action_new_user.php">
		<?php $newuid = date('zGis');?>
			<input type="hidden" name="uid" value="<?php echo $newuid; ?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Username</label><br />
							<input type="text" name="uname" />
						</div>
						<div class="form-group">
							<label>Email</label><br />
							<input type="email" name="email" />
						</div>
						<div class="form-group">
							<label>Password</label><br />
							<input type="password" name="pw1" />
						</div>
						<div class="form-group">
							<label>Confirm Password</label><br />
							<input type="password" name="pw2" />
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Active</span><br />
							<input type="radio" name="active" value="true" /> true&nbsp;|&nbsp;<input type="radio" name="active" value="false" /> false 
						</div>
						<div class="form-group">	
							<label>User Group</label><br />
							<select name="group">
								<option value="1">Administrator</option>
								<option value="2">Editor</option>
								<option value="3">Member</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>