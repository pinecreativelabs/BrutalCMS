<!-- Edit URL -->
<div style="display:none;" id="edit_<?php echo $lmodid; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo '/'.str_replace($bdir,'',$row->loc);?></strong></h4>
		<form method="POST" action="action_update_url.php">
			<input type="hidden" name="lastmod" value="<?php echo $row->lastmod;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Priority</label><br />
							<select name="priority">
								<option value="0.0" <?php echo ($row->priority == '0.0') ? 'selected' : ''; ?>>Unimportant</option>
								<option value="0.3" <?php echo ($row->priority == '0.3') ? 'selected' : ''; ?>>Low</option>
								<option value="0.5" <?php echo ($row->priority == '0.5') ? 'selected' : ''; ?>>Normal</option>
								<option value="0.8" <?php echo ($row->priority == '0.8') ? 'selected' : ''; ?>>High</option>
								<option value="1.0" <?php echo ($row->priority == '1.0') ? 'selected' : ''; ?>>Important</option>
							</select>
							<br /><br />							
							<label>Change Frequency</label><br />
							<select name="changefreq">
								<option value="always" <?php echo ($row->changefreq == 'always') ? 'selected' : ''; ?>>Always</option>
								<option value="hourly" <?php echo ($row->changefreq == 'hourly') ? 'selected' : ''; ?>>Hourly</option>
								<option value="daily" <?php echo ($row->changefreq == 'daily') ? 'selected' : ''; ?>>Daily</option>
								<option value="weekly" <?php echo ($row->changefreq == 'weekly') ? 'selected' : ''; ?>>Weekly</option>
								<option value="monthly" <?php echo ($row->changefreq == 'monthly') ? 'selected' : ''; ?>>Monthly</option>
								<option value="never" <?php echo ($row->changefreq == 'never') ? 'selected' : ''; ?>>Never</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $lmodid; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy"><?php echo '/'.str_replace($bdir,'',$row->loc);?></span><br /><br /></p>
		<a href="action_delete_url.php?id=<?php echo $lmodid; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>