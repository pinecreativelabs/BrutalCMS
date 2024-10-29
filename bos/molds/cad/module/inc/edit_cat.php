<!-- Edit Category -->
<div style="display:none;" id="edit_<?php echo $row['catid']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit Category ID: <?php echo $row['catid'];?></strong></h4>
		<form method="POST" action="action_update_cats.php">
			<input type="hidden" name="catid" value="<?php echo $row['catid'];?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" value="<?php echo $row['title']; ?>" />
					</div>
				</div>
			</div></div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['catid']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy">Category: <?php echo $row['title']; ?></span><br /><br /></p>
		<a href="action_delete_cat.php?catid=<?php echo $row['catid']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>