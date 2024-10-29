<!-- Add User Group -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New User Group</strong></h4>
		<form method="POST" action="action_new_ugroup.php">
			<input type="hidden" name="ugid" value="<?php echo ($ugroupsfile->ugroup->count()+1).date('dhis');?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" /><br />
							<label>Description</label><br />
							<textarea name="description"></textarea>
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>PAL</label> <small>(Permission Access Level)</small><br />
							<select name="pal">
								<option value="0">Guests (0)</option>
								<option value="1">Editors (1)</option>
								<option value="2">Admins (2)</option>
							</select><br />
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Active</label><br />
							<select name="active">
								<option value="true">true</option>
								<option value="false">false</option>
							</select><br />
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>