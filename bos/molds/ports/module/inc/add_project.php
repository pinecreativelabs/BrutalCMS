<!-- Add New Project -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Project</strong></h4>
		<form method="POST" action="action_new_ports.php">
			<input type="hidden" name="pup" value="proj" />
			<input type="hidden" name="id" value="<?php echo ($file->project->count()+1).date('dhis');?>" />
			<input type="hidden" name="user" value="<?php echo $_SESSION['userName']; ?>" />
			<input type="hidden" name="status" value="not started" />
			<input type="hidden" name="progress" value="0" />
			<div style="min-width: 80vw;"><div class="tabs">
				<input type="radio" name="newproj" id="tab1" checked="checked">
				<label for="tab1">General</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw100 xs-100 sm-100 md-100">
						<div class="form-group"><span class="label">Title:</span><br /><input type="text" name="title" /></div>
						<div class="form-group">
							<span class="label">Project Description</span><br />
							<textarea name="description" rows="4"></textarea>
						</div>
					</div></div>
				</div>
				<input type="radio" name="newproj" id="tab2">
				<label for="tab2">Settings</label>
				<div class="tab">
					<div class="block-wrap">
						<div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Deadline:</span><br /><input type="date" name="deadline" />
							</div>
						</div>
						<div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">	
								<span class="label">Priority</span><br />
								<select name="priority">
									<option value="low">Low</option>
									<option value="medium" selected>Medium</option>
									<option value="high">High</option>
									<option value="critical">Critical</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div></div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>