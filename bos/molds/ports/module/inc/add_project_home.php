<!-- Add New Project -->
<div style="display:none;" id="addnewproj">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Project</strong></h4>
		<form method="POST" action="action_new_ports_home.php">
			<input type="hidden" name="pup" value="proj" />
			<input type="hidden" name="id" value="<?php echo ($projectsfile->project->count()+1).date('dhis');?>" />
			<input type="hidden" name="user" value="<?php echo $current_user; ?>" />
			<input type="hidden" name="status" value="not started" />
			<input type="hidden" name="progress" value="0" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br /><input type="text" name="title" />
					</div>
				</div>
				<div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Deadline:</label><br /><input type="date" name="deadline" />
					</div>
				</div>
				<div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">	
						<label for="priority">Priority</label><br />
						<select name="priority">
							<option value="low">Low</option>
							<option value="medium">Medium</option>
							<option value="high">High</option>
							<option value="critical">Critical</option>
						</select>
					</div>
				</div>
				<div class="block bw100">
					<div class="form-group">
						<label>Project Description</label><br />
						<textarea name="description" rows="4"></textarea>
					</div>
				</div>
			</div></div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>