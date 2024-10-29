<!-- Edit Theme -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['title'];?></strong></h4>
		<form method="POST" action="action_update_group.php">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" value="<?php echo $row['title']; ?>" />
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label for="datatype">Data Type</label>
							<select name="datatype">
								<option value="mixed" <?php echo ($row['type'] == 'mixed') ? 'selected' : ''; ?>>Mixed</option>
								<option value="csv" <?php echo ($row['type'] == 'csv') ? 'selected' : ''; ?>>CSV</option>
								<option value="xml" <?php echo ($row['type'] == 'xml') ? 'selected' : ''; ?>>XML</option>
							</select>
						</div>
					</div>
					<div class="block bw100">
						<div class="form-group">
							<label>Description:</label><br />
							<input type="text" name="desc" value="<?php echo $row['description']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete data group<br />
		<span class="larger heavy"><?php echo $row['title']; ?></span><br /><br /></p>
		<a href="action_delete_group.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>