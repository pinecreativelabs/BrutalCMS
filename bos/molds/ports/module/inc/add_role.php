<!-- Add New Role -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Role</strong></h4>
		<form method="POST" action="action_new_ports.php">
			<input type="hidden" name="pup" value="role" />
			<input type="hidden" name="id" value="<?php echo ($file->role->count()+1).date('dhis');?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" />
					</div>
				</div>
				<div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>User:</label><br />
						<?php echo $user_select;?>
					</div>
				</div>
				<div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">	
						<label for="status">Status</label><br />
						<select name="status">
							<option value="active">Active</option>
							<option value="inactive">Inactive</option>
							<option value="away">Away</option>
						</select>
					</div>
				</div>
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Role Description</label><br />
						<textarea name="description" rows="4"></textarea>
					</div>
				</div>
			</div></div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>