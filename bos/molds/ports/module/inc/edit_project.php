<!-- Edit Project -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit Project ID: <?php echo $row['id'];?></strong></h4>
		<form method="POST" action="action_update_ports.php">
			<input type="hidden" name="pup" value="proj" />
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="hidden" name="owner" value="<?php echo $_SESSION['userName']; ?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				<input type="radio" name="editproj" id="tab1-<?php echo $row['id'];?>" checked="checked">
				<label for="tab1-<?php echo $row['id'];?>">General</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw100">
						<div class="form-group">
							<span class="label">Title:</span><br />
							<input type="text" name="title" value="<?php echo $row['title']; ?>" />
						</div>
						<div class="form-group">
							<span class="label">Project Description</span><br />
							<textarea name="description" rows="4"><?php echo $row->description; ?></textarea>
						</div>
					</div></div>
				</div>
				<input type="radio" name="editproj" id="tab2-<?php echo $row['id'];?>">
				<label for="tab2-<?php echo $row['id'];?>">Settings</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Deadline:</span><br />
							<input type="date" name="deadline" value="<?php echo date('Y-m-d',strtotime($row->deadline)); ?>" />
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Status</span><br />
							<select name="status">
								<option value="not started" <?php echo ($row->status == 'not started') ? 'selected' : ''; ?>>Not Started</option>
								<option value="in progress" <?php echo ($row->status == 'in progress') ? 'selected' : ''; ?>>In Progress</option>
								<option value="on hold" <?php echo ($task->status == 'on hold') ? 'selected' : ''; ?>>On Hold</option>
								<option value="completed" <?php echo ($row->status == 'completed') ? 'selected' : ''; ?>>Completed</option>
							</select>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<div class="range-slider">
								<span class="label">Progress:</span><br />
								<input type="range" name="progress" min="0" max="100" value="<?php echo $row->status['progress'];?>" class="range-input" step="25" />
								<div class="sliderticks"><span>0</span><span>25</span><span>50</span><span>75</span><span>100</span></div>
							</div><p>&nbsp;</p>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<span class="label">Priority</span><br />
							<select name="priority">
								<option value="low" <?php echo ($row->priority == 'low') ? 'selected' : ''; ?>>Low</option>
								<option value="medium" <?php echo ($row->priority == 'medium') ? 'selected' : ''; ?>>Medium</option>
								<option value="high" <?php echo ($row->priority == 'high') ? 'selected' : ''; ?>>High</option>
								<option value="critical" <?php echo ($row->priority == 'critical') ? 'selected' : ''; ?>>Critical</option>
							</select>
						</div>
					</div></div>
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
		<span class="larger heavy">Project ID: <?php echo $row['id']; ?></span><br /><br /></p>
		<a href="action_delete_project.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>