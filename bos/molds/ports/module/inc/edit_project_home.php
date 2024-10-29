<!-- Edit Project -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit Project ID: <?php echo $row['id'];?></strong></h4>
		<form method="POST" action="action_home_updater.php">
			<input type="hidden" name="pup" value="projects" />
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="hidden" name="owner" value="<?php echo $_SESSION['userName']; ?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw67 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" value="<?php echo $row['title']; ?>" />
					</div>
				</div>
				<div class="block bw33 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Deadline:</label><br />
						<input type="date" name="deadline" value="<?php echo date('Y-m-d',strtotime($row->deadline)); ?>" />
					</div>
				</div>
				<div class="block bw33 xs-100 sm-100 md-100">
					<div class="form-group">
						<label for="status">Status</label><br />
						<select name="status">
							<option value="not started" <?php echo ($row->status == 'not started') ? 'selected' : ''; ?>>Not Started</option>
							<option value="in progress" <?php echo ($row->status == 'in progress') ? 'selected' : ''; ?>>In Progress</option>
							<option value="on hold" <?php echo ($row->status == 'on hold') ? 'selected' : ''; ?>>On Hold</option>
							<option value="completed" <?php echo ($row->status == 'completed') ? 'selected' : ''; ?>>Completed</option>
						</select>
					</div>
				</div>
				<div class="block bw33 xs-100 sm-100 md-100">
					<div class="form-group">
						<div class="range-slider">
							<label for="progress">Progress:</label><br />
							<input type="range" name="progress" min="0" max="100" value="<?php echo $row->status['progress'];?>" class="range-input" step="25" />
							<div class="sliderticks"><span>0</span><span>25</span><span>50</span><span>75</span><span>100</span></div>
						</div><p>&nbsp;</p>
					</div>
				</div>
				<div class="block bw33 xs-100 sm-100 md-100">
					<div class="form-group">	
						<label for="priority">Priority</label><br />
						<select name="priority">
							<option value="low" <?php echo ($row->priority == 'low') ? 'selected' : ''; ?>>Low</option>
							<option value="medium" <?php echo ($row->priority == 'medium') ? 'selected' : ''; ?>>Medium</option>
							<option value="high" <?php echo ($row->priority == 'high') ? 'selected' : ''; ?>>High</option>
							<option value="critical" <?php echo ($row->priority == 'critical') ? 'selected' : ''; ?>>Critical</option>
						</select>
					</div>
				</div>
				<div class="block bw100">
					<div class="form-group">
						<label>Project Description</label><br />
						<textarea name="description" rows="4"><?php echo $row->description; ?></textarea>
					</div>
				</div>
			</div></div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>
<!-- Mark Done -->
<div id="mark_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded center" style="min-width: 20vw;">
		<h4><strong>Mark Project Done!</strong></h4>
		<form method="POST" action="action_mark_project_done.php">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="hidden" name="status" value="completed" />
			<button type="submit" name="edit" class="mark-btn">&#10004; Complete</button>
		</form>
	</div>
</div>
<!-- Delete -->
<div id="delete_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy">Project ID: <?php echo $row['id']; ?></span><br /><br /></p>
		<a href="action_delete_project_home.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>