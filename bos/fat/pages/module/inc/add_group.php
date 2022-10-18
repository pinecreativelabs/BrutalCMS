<!-- Add New Page Group -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Page Group</strong></h4>
		<form method="POST" action="action_new_group.php">
			<input type="hidden" name="id" value="<?php echo $new_gid; ?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" />
						</div>
						<div class="form-group">
							<label>Description:</label><br />
							<input type="text" name="desc" />
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label for="pagetype">Page Group Type</label>
							<select name="pagetype">
								<option value="public">Public</option>
								<option value="private">Private</option>
								<option value="system">System</option>
								<option value="hidden">Hidden</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>