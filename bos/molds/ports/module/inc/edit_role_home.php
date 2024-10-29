<!-- Edit Role -->
<div style="display:none;" id="edit_<?php echo $role['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit Role ID: <?php echo $role['id'];?></strong></h4>
		<form method="POST" action="action_home_updater.php">
			<input type="hidden" name="pup" value="roles" />
			<input type="hidden" name="id" value="<?php echo $role['id'];?>" />
			<input type="hidden" name="user" value="<?php echo $_SESSION['userName']; ?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" value="<?php echo $role['title']; ?>" />
					</div>
					<div class="form-group">	
						<label for="status">Status</label><br />
						<select name="status">
							<option value="active" <?php echo ($role['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
							<option value="inactive" <?php echo ($role['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
							<option value="away" <?php echo ($role['status'] == 'away') ? 'selected' : ''; ?>>Away</option>
						</select>
					</div>
					<div class="form-group">
						<label>Role Description</label><br />
						<textarea name="description" rows="4"><?php echo $role->description; ?></textarea>
					</div>
				</div>
			</div></div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $role['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy">Role ID: <?php echo $role['id']; ?></span><br /><br /></p>
		<a href="action_delete_role_home.php?id=<?php echo $role['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>