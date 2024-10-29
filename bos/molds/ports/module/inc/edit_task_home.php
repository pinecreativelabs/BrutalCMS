<!-- Edit Task -->
<div style="display:none;" id="edit_<?php echo $task['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit Task ID: <?php echo $task['id'];?></strong></h4>
		<form method="POST" action="action_home_updater.php">
			<input type="hidden" name="pup" value="tasks" />
			<input type="hidden" name="id" value="<?php echo $task['id'];?>" />
			<input type="hidden" name="owner" value="<?php echo $_SESSION['userName']; ?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				<input type="radio" name="edittask" id="tab1-<?php echo $task['id'];?>" checked="checked">
				<label for="tab1-<?php echo $task['id'];?>">General</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw67 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Title:</span><br />
							<input type="text" name="title" value="<?php echo $task['title']; ?>" />
						</div>
						<div class="form-group">
							<span class="label">Task Description</span><br />
							<textarea name="description" rows="4"><?php echo $task->description; ?></textarea>
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Deadline:</span><br />
							<input type="date" name="deadline" value="<?php echo date('Y-m-d',strtotime($task->deadline)); ?>" />
						</div>
					</div></div>
				</div>
				<input type="radio" name="edittask" id="tab2-<?php echo $task['id'];?>">
				<label for="tab2-<?php echo $task['id'];?>">Settings</label>
				<div class="tab">
					
					<div class="block-wrap">
						<div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Project:</span><br />
								<select name="project" id="proj<?php echo $task['id'];?>">
								<?php echo $project_options;?>
								</select>
								<script>
								var temp = "<?php echo $task['project'];?>";
								var mySelect = document.getElementById('proj<?php echo $task['id'];?>');
								for(var i, j = 0; i = mySelect.options[j]; j++) {
									if(i.value == temp) {
										mySelect.selectedIndex = j;
										break;
									}
								}
								</script>
							</div>
							<div class="form-group">
								<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
									<span class="label">Estimated Hours:</span><br /><input type="number" name="esthrs" min="0" value="<?php echo $task->status['esthrs'];?>">
								</div><div class="block bw50 xs-100 sm-100 md-100">
									<span class="label">Worked Hours:</span><br /><input type="number" name="workhrs" min="0" value="<?php echo $task->status['workhrs'];?>">
								</div></div>
							</div>
						</div>
						<div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Status</span><br />
								<select name="status">
									<option value="not started" <?php echo ($task->status == 'not started') ? 'selected' : ''; ?>>Not Started</option>
									<option value="in progress" <?php echo ($task->status == 'in progress') ? 'selected' : ''; ?>>In Progress</option>
									<option value="on hold" <?php echo ($task->status == 'on hold') ? 'selected' : ''; ?>>On Hold</option>
									<option value="completed" <?php echo ($task->status == 'completed') ? 'selected' : ''; ?>>Completed</option>
								</select>
							</div>
							<div class="form-group">	
								<span class="label">Priority</span><br />
								<select name="priority">
									<option value="low" <?php echo ($task->priority == 'low') ? 'selected' : ''; ?>>Low</option>
									<option value="medium" <?php echo ($task->priority == 'medium') ? 'selected' : ''; ?>>Medium</option>
									<option value="high" <?php echo ($task->priority == 'high') ? 'selected' : ''; ?>>High</option>
									<option value="critical" <?php echo ($task->priority == 'critical') ? 'selected' : ''; ?>>Critical</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div></div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>
<!-- Mark Done -->
<div id="mark_<?php echo $task['id']; ?>" style="display:none;">
	<div class="padded center" style="min-width: 20vw;">
		<h4><strong>Mark Task Done!</strong></h4>
		<form method="POST" action="action_mark_task_done.php">
			<input type="hidden" name="id" value="<?php echo $task['id'];?>" />
			<input type="hidden" name="status" value="completed" />
			<button type="submit" name="edit" class="mark-btn">&#10004; Complete</button>
		</form>
	</div>
</div>
<!-- Delete -->
<div id="delete_<?php echo $task['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy">Task ID: <?php echo $task['id']; ?></span><br /><br /></p>
		<a href="action_delete_task_home.php?id=<?php echo $task['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>