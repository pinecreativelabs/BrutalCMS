<!-- Edit User -->
<div style="display:none;" id="edit_<?php echo $uid; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $username;?></strong></h4>
		<form method="POST" action="action_user_manage.php">
			<input type="hidden" name="pup" value="editacct" />
			<input type="hidden" name="uid" value="<?php echo $uid;?>" />
			<input type="hidden" name="uname" value="<?php echo $username;?>" />
			<input type="hidden" name="password" value="<?php echo $user_password;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw67 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Email</label><br />
							<input type="email" name="email" value="<?php echo $user_email;?>" />
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label><input type="checkbox" name="active" value="true" checked="checked" /> Active</label>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>User PAL</label><br />
							<select name="pal">
								<option value="0" <?php echo ($user_pal == '0') ? 'selected' : ''; ?>>0 (Members)</option>
								<option value="1" <?php echo ($user_pal == '1') ? 'selected' : ''; ?>>1 (Editors)</option>
								<option value="2" <?php echo ($user_pal == '2') ? 'selected' : ''; ?>>2 (Admins)</option>
							</select><br />
							<label>User Group</label><br />
							<div id="ug-<?php echo $uid;?>">
							<?php echo $group_selector;?>
							</div>
							<script>
							var temp = "<?php echo $user_group;?>";
							var mySelect = document.querySelector('<?php echo '#ug-'.$uid;?> select');
							for(var i, j = 0; i = mySelect.options[j]; j++) {
								if(i.value == temp) {
									mySelect.selectedIndex = j;
									break;
								}
							}
							</script>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Status</label><br />
							<select name="status">
								<option value="available" <?php echo ($user_status == 'available') ? 'selected' : ''; ?>>Available</option>
								<option value="away" <?php echo ($user_status == 'away') ? 'selected' : ''; ?>>Away</option>
								<option value="unavailable" <?php echo ($user_pal == 'unavailable') ? 'selected' : ''; ?>>Unavailable</option>
							</select><br />
							<label>Visibility</label><br />
							<select name="visibility">
								<option value="public" <?php echo ($user_visibility == 'public') ? 'selected' : ''; ?>>Public</option>
								<option value="private" <?php echo ($user_visibility == 'private') ? 'selected' : ''; ?>>Private</option>
								<option value="hidden" <?php echo ($user_visibility == 'hidden') ? 'selected' : ''; ?>>Hidden</option>
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
<div style="display:none;" id="clear_<?php echo $uid; ?>"><div class="padded">
	<h4 class="modal-title edit"><strong>Clear Files for: <em><?php echo $username;?></em></strong></h4>
	<form method="POST" action="action_user_manage.php">
		<input type="hidden" name="pup" value="clearfiles" />
		<input type="hidden" name="userfilespath" value="<?php echo $user_filepath;?>" />
		<input type="hidden" name="usertrashpath" value="<?php echo $user_trashpath;?>" />
		<input type="hidden" name="uname" value="<?php echo $username;?>" />
		<div style="max-width: 80vw;"><div class="block-wrap"><div class="block bw100">
			<div class="form-group">	
				<?php if(($fc_user_trash>0)||($fc_user_files>0)){ ?>
				<label>Select Action</label><br />
				<select name="clearaction">
					<?php if($fc_user_files>0){ ?><option value="trashfiles">Move <?php echo $fc_user_files;?> Files to Trash</option><?php } ?>
					<option value="emptytrash">Empty Trash (<?php echo $fc_user_trash;?> files)</option>
				</select>
				<?php } else { echo '<p>User has no files.</p>';} ?>
			</div>
			<?php if($fc_user_trash>0){?>
			<p class="warningbox">Selecting "Empty Trash" will permanently delete all <?php echo $fc_user_trash;?> files within <?php echo $username;?>'s Trash directory!</p>
			<?php } ?>
		</div></div></div>
		<?php if($fc_user_trash>0){?>
		<button type="submit" name="clearfldr" class="btn-save">&#10004; Confirm Action</button>
		<?php } ?>
	</form>
</div></div>

<!-- Keypad -->
<div style="display:none;" id="keys_<?php echo $uid; ?>"><div class="padded">
	<h4 class="modal-title edit"><strong>User Keys</strong></h4>
	<form method="POST" action="action_user_manage.php">
		<input type="hidden" name="pup" value="keys" />
		<input type="hidden" name="pwe" value="<?php echo $pw_encrypt;?>" />
		<input type="hidden" name="uid" value="<?php echo $uid;?>" />
		<input type="hidden" name="uname" value="<?php echo $username;?>" />
		<div style="min-width: 80vw;"><div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
			<div class="form-group">	
				<label>New Password</label><br />
				<input type="password" name="pw1" class="form-control" pattern="<?php echo $pw_reqs;?>" title="<?php echo $pw_req_msg;?>" autocomplete="new-password" /><br />
				<label>Confirm New Password</label><br />
				<input type="password" name="pw2" class="form-control" pattern="<?php echo $pw_reqs;?>" title="<?php echo $pw_req_msg;?>" />
				<p class="warningbox"><strong><?php echo ucfirst($pw_strength);?> Requirements:</strong><br /><?php echo $pw_req_msg;?></p>
			</div>
		</div><div class="block bw50 xs-100 sm-100 md-100">
			<div class="form-group">
				<label>New PIN</label><br />
				<input name="pin" type="password" pattern="<?php echo $pin_req;?>" minlength="4" maxlength="8" size="8" autocomplete="new-password" title="<?php echo $pin_req_msg;?>" style="max-width: 150px;" />
				<p class="warningbox"><strong><?php echo ucfirst($pw_strength);?> Requirements:</strong><br /><?php echo $pin_req_msg;?></p>
			</div>
		</div></div></div>
		<button type="submit" name="userkeys" class="btn-save">&#10004; Update Keys</button>
	</form>
</div></div>

<?php if(($uid!='0')&&($uid!='1')){ ?>
<!-- Account Actions -->
<div style="display:none;" id="acct_<?php echo $uid; ?>"><div class="padded">
	<h4 class="modal-title edit"><strong>Account Actions</strong></h4>
	<form method="POST" action="action_user_manage.php">
		<input type="hidden" name="pup" value="acct" />
		<input type="hidden" name="uid" value="<?php echo $uid;?>" />
		<input type="hidden" name="uname" value="<?php echo $username;?>" />
		<input type="hidden" name="userdirpath" value="<?php echo $user_dirpath;?>" />
		<div style="min-width: 80vw;"><div class="block-wrap"><div class="block bw100">
			<div class="form-group">	
				<label>Select Action</label><br />
				<select name="acctaction">
					<?php if($user_blocked=='0'){?><option value="block">Block User</option><?php } else { ?><option value="unblock">Unblock User</option><?php } ?>
					<option value="delete">Delete User</option>
					<option value="destroy">Destroy User</option>
				</select>
			</div>
			<p class="warningbox"><strong>BLOCK: </strong>User will no longer be able to login to BOS.<br />
			<strong>DELETE: </strong>Delete user profile account, but retain all user files and any MOLDS data.<br />
			<strong>DESTROY: </strong>All user data and files will be permanently erased.</p>
		</div></div></div>
		<button type="submit" name="useracct" class="del-btn">&#10006; Confirm Action</button>
	</form>
</div></div>
<?php } ?>