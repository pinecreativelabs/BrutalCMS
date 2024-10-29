<!-- Edit User -->
<div style="display:none;" id="edit_<?php echo $ugid; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $title;?></strong></h4>
		<form method="POST" action="action_update_ugroup.php">
			<input type="hidden" name="ugid" value="<?php echo $ugid;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" value="<?php echo $title; ?>" /><br />
							<label>Description</label><br />
							<textarea name="description"><?php echo $desc; ?></textarea>
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<?php if(($ugid!='0')&&($ugid!='1')&&($ugid!='2')&&($ugid!='3')){?>
							<label>PAL</label> <small>(Permission Access Level)</small><br />
							<select name="pal">
								<option value="0" <?php echo ($pal == '0') ? 'selected' : ''; ?>>Guests (0)</option>
								<option value="1" <?php echo ($pal == '1') ? 'selected' : ''; ?>>Editors (1)</option>
								<option value="2" <?php echo ($pal == '2') ? 'selected' : ''; ?>>Admins (2)</option>
							</select><br />
							<?php } else { echo '<strong>PAL:</strong> '.$pal;}?>
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<?php if(($ugid!='0')&&($ugid!='1')&&($ugid!='2')&&($ugid!='3')){?>
							<label>Active</label><br />
							<select name="active">
								<option value="true" <?php echo ($active == 'true') ? 'selected' : ''; ?>>true</option>
								<option value="false" <?php echo ($active == 'false') ? 'selected' : ''; ?>>false</option>
							</select><br />
							<?php } else { echo '<strong>Active:</strong> '.$active;}?>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete Group -->
<div id="delete_<?php echo $ugid; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy">User Group ID: <?php echo $ugid; ?></span><br /><br /></p>
		<a href="action_delete_ugroup.php?id=<?php echo $ugid; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>
