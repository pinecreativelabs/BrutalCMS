<!-- Edit Stream -->
<div style="display:none;" id="edit_<?php echo $sid; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $title;?></strong></h4>
		<form method="POST" action="action_edit_stream.php">
			<input type="hidden" name="uname" value="<?php echo $current_user;?>" />
			<input type="hidden" name="sid" value="<?php echo $sid;?>" />
			<input type="hidden" name="pup" value="edit" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<div class="form-group">
							<label>Title</label><br />
							<input type="text" name="title" value="<?php echo $title;?>" /><br />
							<label>Description</label><br />
							<textarea name="description"><?php echo $description;?></textarea>
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Type</label><br />
							<select name="type">
								<option value="mixed" <?php echo ($type == 'mixed') ? 'selected' : ''; ?>>Mixed</option>
								<option value="audio" <?php echo ($type == 'audio') ? 'selected' : ''; ?>>Audio</option>
								<option value="blog" <?php echo ($type == 'blog') ? 'selected' : ''; ?>>Blog</option>
								<option value="event" <?php echo ($type == 'event') ? 'selected' : ''; ?>>Event</option>
								<option value="image" <?php echo ($type == 'image') ? 'selected' : ''; ?>>Image</option>
								<option value="product" <?php echo ($type == 'product') ? 'selected' : ''; ?>>Product</option>
								<option value="video" <?php echo ($type == 'video') ? 'selected' : ''; ?>>Video</option>
							</select>
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Active</label><br />
							<select name="active">
								<option value="true" <?php echo ($active == 'true') ? 'selected' : ''; ?>>true</option>
								<option value="false" <?php echo ($active == 'false') ? 'selected' : ''; ?>>false</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete Stream -->
<div style="display:none;" id="delete_<?php echo $sid; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Delete <?php echo $title;?></strong></h4>
		<form method="POST" action="action_edit_stream.php">
			<input type="hidden" name="uname" value="<?php echo $current_user;?>" />
			<input type="hidden" name="sid" value="<?php echo $sid;?>" />
			<input type="hidden" name="pup" value="del" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<p style="color: #ff0000; margin: 6px 0 6px 0; font-size: 14px; line-height: 140%;"><strong>WARNING:</strong><br />
						You are about to delete the <?php echo $title;?> channel. Any content posts associated with this channel will need to be re-assigned a new one.</p>
					</div>
				</div>
			</div>
			<button type="submit" name="del" class="del-btn">&#10006; Delete</button>
		</form>
	</div>
</div>
