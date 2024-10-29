<!-- Add New Task -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Task</strong></h4>
		<form method="POST" action="action_new_ports_home.php">
			<input type="hidden" name="pup" value="task" />
			<input type="hidden" name="id" value="<?php echo ($taskfile->task->count()+1).date('dhis');?>" />
			<input type="hidden" name="user" value="<?php echo $current_user;?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				<input type="radio" name="newtask" id="tab1-nt" checked="checked">
				<label for="tab1-nt">General</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw67 xs-100 sm-100 md-100">
						<div class="form-group"><span class="label">Title:</span><br /><input type="text" name="title" /></div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Deadline:</span><br /><input type="date" name="deadline" />
						</div>
					</div><div class="block bw100">
						<div class="form-group">
							<span class="label">Task Description</span><br /><textarea name="description" rows="4"></textarea>
						</div>
					</div></div>
				</div>
				<input type="radio" name="newtask" id="tab2-nt">
				<label for="tab2-nt">Settings</label>
				<div class="tab">
					<div class="block-wrap">
						<div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Project</span><br />
								<select name="project">
									<?php echo $project_options;?>
								</select>
							</div>
							<div class="form-group">
								<span class="label">Estimated Hours:</span><br />
								<input type="number" name="esthrs" value="3" min="0">
								<input type="hidden" name="workhrs" value="0">
							</div>
						</div>
						<div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">	
								<span class="label">Status</span><br />
								<select name="status">
									<option value="not started">Not Started</option>
									<option value="started">Started</option>
									<option value="in progress">In Progress</option>
									<option value="completed">Completed</option>
								</select>
							</div>
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