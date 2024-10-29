<!-- Edit Role -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit Role ID: <?php echo $row['id'];?></strong></h4>
		<form method="POST" action="action_update_ports.php">
			<input type="hidden" name="pup" value="role" />
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" value="<?php echo $row['title']; ?>" />
					</div>
				</div>
				<div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>User:</label><br />
						<select name="user" id="<?php echo $row['id'];?>">
						<?php echo $user_select_options;?>
						</select>
						<script>
						var temp = "<?php echo $row['user'];?>";
						var mySelect = document.getElementById('<?php echo $row['id'];?>');
						for(var i, j = 0; i = mySelect.options[j]; j++) {
							if(i.value == temp) {
								mySelect.selectedIndex = j;
								break;
							}
						}
						</script>
					</div>
				</div>
				<div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">	
						<label for="status">Status</label><br />
						<select name="status">
							<option value="active" <?php echo ($row['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
							<option value="inactive" <?php echo ($row['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
							<option value="away" <?php echo ($row['status'] == 'away') ? 'selected' : ''; ?>>Away</option>
						</select>
					</div>
				</div>
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Role Description</label><br />
						<textarea name="description" rows="4"><?php echo $row->description; ?></textarea>
					</div>
				</div>
			</div></div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy">Role ID: <?php echo $row['id']; ?></span><br /><br /></p>
		<a href="action_delete_role.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>