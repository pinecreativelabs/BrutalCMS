<!-- Edit Page -->
<div style="display:none;" id="edit_<?php echo $uid; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $uname;?></strong></h4>
		<form method="POST" action="action_edit_user.php">
			<input type="hidden" name="uid" value="<?php echo $uid;?>" />
			<input type="hidden" name="uname" value="<?php echo $uname;?>" />
			<input type="hidden" name="password" value="<?php echo $pw;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<div class="form-group">
							<label>Email</label><br />
							<input type="email" name="email" value="<?php echo $email;?>" />
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>User Group</label><br />
							<select name="group">
								<option value="1" <?php echo ($ug == '1') ? 'selected' : ''; ?>>Administrator</option>
								<option value="2" <?php echo ($ug == '2') ? 'selected' : ''; ?>>Editor</option>
								<option value="3" <?php echo ($ug == '3') ? 'selected' : ''; ?>>Member</option>
							</select>
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Active</label><br />
							<select name="active">
								<option value="true" <?php echo ($uactive == 'true') ? 'selected' : ''; ?>>true</option>
								<option value="false" <?php echo ($uactive == 'false') ? 'selected' : ''; ?>>false</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Clear Folder -->
<div style="display:none;" id="clear_<?php echo $uid; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Clear <?php echo $uname;?> Folder</strong></h4>
		<form method="POST" action="action_clear_user_folder.php">
			<input type="hidden" name="uname" value="<?php echo $uname;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<div class="form-group">	
							<label>Select Folder</label><br />
							<select name="folder">
								<option value="all">ALL Folders</option>
								<option value="files">Files</option>
								<option value="photos">Photos</option>
								<option value="audio">Audio</option>
								<option value="video">Video</option>
							</select>
						</div>
						<p style="background: #ff0000; color: #ffff00; font-weight: 600; padding: 8px;">All files within <?php echo $uname;?>'s folder(s) will be permanently deleted!</p>
					</div>
				</div>
			</div>
			<button type="submit" name="clearfldr" class="btn-save">&#10006; Clear Files</button>
		</form>
	</div>
</div>

<!-- Delete User -->
<div style="display:none;" id="delete_<?php echo $uid; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Delete <?php echo $uname;?></strong></h4>
		<form method="POST" action="action_delete_user.php">
			<input type="hidden" name="uid" value="<?php echo $uid;?>" />
			<input type="hidden" name="uname" value="<?php echo $uname;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<div class="form-group">	
							<label>Delete Method</label><br />
							<select name="delmethod">
								<option value="full">Full</option>
								<option value="part">Partial</option>
							</select>
						</div>
						<p style="color: #ff0000; margin: 6px 0 6px 0; font-size: 14px; line-height: 140%;"><strong>FULL Delete: </strong> All user data and files will be permanently erased.<br />
						<strong>PARTIAL Delete: </strong> Delete user profile data, remove account from userlist, but keep all user data and files.</p>
					</div>
				</div>
			</div>
			<button type="submit" name="deluser" class="del-btn">&#10006; Delete</button>
		</form>
	</div>
</div>
